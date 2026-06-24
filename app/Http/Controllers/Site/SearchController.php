<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\OptionGroups;
use App\Models\Options;
use App\Models\ProductCategory;
use App\Models\Product;
class SearchController extends Controller
{
 public function search()
{
    $search = trim(request()->search);
    $keywords = preg_split('/\s+/', $search);

    // Məhsullar
    $productsQuery = Product::where('status','1')
        ->distinct() // ← təkrarı qarşısını alır
        ->whereHas('productTranslations', function ($q2) use ($search, $keywords) {
            $q2->where('locale', 'az')
                ->where(function ($query) use ($search, $keywords) {
                    // Tam uyğun
                    $query->where('name', 'like', $search);
                    // Tam ifadəyə uyğun (LIKE %search%)
                    $query->orWhere('name', 'like', '%' . $search . '%');
                    // Hər bir sözə görə
                    foreach ($keywords as $word) {
                        $query->orWhere('name', 'like', '%' . $word . '%');
                    }
                });
        });

    // Kateqoriyalar
    $categories = Category::active()
        ->whereHas('categoryTranslations', function ($q) use ($search, $keywords) {
            $q->where('locale', 'az')
                ->where(function ($query) use ($search, $keywords) {
                    $query->where('name', 'like', '%' . $search . '%');
                    foreach ($keywords as $word) {
                        $query->orWhere('name', 'like', '%' . $word . '%');
                    }
                });
        })
        ->pluck('id');

    $categoryList = Category::active()
        ->whereHas('categoryTranslations', function ($q) use ($search, $keywords) {
            $q->where('locale', 'az')
                ->where(function ($query) use ($search, $keywords) {
                    $query->where('name', 'like', '%' . $search . '%');
                    foreach ($keywords as $word) {
                        $query->orWhere('name', 'like', '%' . $word . '%');
                    }
                });
        })
        ->get();

    // Kateqoriyadakı məhsullar da əlavə olunur
    if ($categories->count() > 0) {
        $productsQuery->orWhereHas('categories', function ($q) use ($categories) {
            $q->whereIn('categories.id', $categories);
        });
    }

    // Tam uyğun gələnləri əvvələ çək
    $productsQuery->join('product_translations as pt', 'products.id', '=', 'pt.product_id')
        ->where('pt.locale', 'az')
        ->select('products.*')
        ->orderByRaw("
            CASE
                WHEN pt.name = ? THEN 1
                WHEN pt.name LIKE ? THEN 2
                WHEN pt.name LIKE ? THEN 3
                ELSE 4
            END
        ", [$search, $search . '%', '%' . $search . '%']);

    // Stock filter
    if (request()->stock) {
        if (request()->stock == 'inStock') {
            $productsQuery->where('products.stock', 1);
        } elseif (request()->stock == 'outStock') {
            $productsQuery->where('products.stock', 0);
        }
    }

    // Sort filter
    if (request()->sort) {
        switch (request()->sort) {
            case 'cheap':
                $productsQuery->orderBy('products.price', 'asc');
                break;
            case 'expensive':
                $productsQuery->orderBy('products.price', 'desc');
                break;
            case 'popular':
                $productsQuery->orderBy('products.show_count', 'desc');
                break;
            case 'sale':
                $productsQuery->orderBy('products.sale', 'asc');
                break;
            case 'new':
                $productsQuery->orderBy('products.new', 'desc');
                break;
            default:
                $productsQuery->orderBy('products.id', 'desc');
        }
    } else {
        $productsQuery->orderBy('products.price', 'asc');
    }
    $productsQuery->active();
    // Pagination
    if (request()->count) {
        switch (request()->count) {
            case 12:
                $products = $productsQuery->paginate(12)->withQueryString();
                break;
            case 16:
                $products = $productsQuery->paginate(16)->withQueryString();
                break;
            case 20:
                $products = $productsQuery->paginate(20)->withQueryString();
                break;
            case 'all':
                $products = $productsQuery->get();
                break;
            default:
                $products = $productsQuery->paginate(12)->withQueryString();
        }
    } else {
        $products = $productsQuery->paginate(12)->withQueryString();
    }
    $meta['title'] = 'Axtarış';
    
    $lang = [
            'az' => '/search',
            'ru' => '/ru/search',
        ];
    return view('site.search', compact('products', 'search', 'categories', 'categoryList','meta','lang'));
}




}
