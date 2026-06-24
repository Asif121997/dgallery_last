<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    public function about(){

        $page = Page::where('type','about')->first();
        $meta['title'] = $page->pageTranslations->where('locale','az')->first()->name;

        $lang = [
            'az' => 'haqqimizda',
            'en' => 'en/about',
            'ru' => 'ru/o-nas'
        ];
        return view('site.pages.about',compact('page','lang','meta'));
    }
    
    public function product_return(){

        $page = Page::where('type','product_return')->first();
        $meta['title'] = $page->pageTranslations->where('locale','az')->first()->name;

        $lang = [
            'az' => 'mehsul-qaytarilmasi',
            'en' => 'en/about',
            'ru' => 'ru/mehsul-qaytarilmasi'
        ];
        return view('site.pages.about',compact('page','lang','meta'));
    }
    
    public function warranty_conditions(){

        $page = Page::where('type','warranty_conditions')->first();
        $meta['title'] = $page->pageTranslations->where('locale','az')->first()->name;

        $lang = [
            'az' => 'zemanetin-sertleri',
            'en' => 'en/about',
            'ru' => 'ru/zemanetin-sertleri'
        ];
        return view('site.pages.about',compact('page','lang','meta'));
    }
    public function privacy_policy(){

        $page = Page::where('type','privacy_policy')->first();
        $meta['title'] = $page->pageTranslations->where('locale','az')->first()->name;

        $lang = [
            'az' => 'mexfilik-siyaseti',
            'en' => 'en/about',
            'ru' => 'ru/mexfilik-siyaseti'
        ];
        return view('site.pages.about',compact('page','lang','meta'));
    }
    
    public function sales_rules(){

        $page = Page::where('type','sales_rules')->first();
        $meta['title'] = $page->pageTranslations->where('locale','az')->first()->name;

        $lang = [
            'az' => 'satis-qaydalari',
            'en' => 'en/about',
            'ru' => 'ru/satis-qaydalari'
        ];
        return view('site.pages.about',compact('page','lang','meta'));
    }
    
    public function delivery(){

        $page = Page::where('type','delivery')->first();
        $meta['title'] = $page->pageTranslations->where('locale','az')->first()->name;

        $lang = [
            'az' => 'catdirilma',
            'en' => 'en/about',
            'ru' => 'ru/catdirilma'
        ];
        return view('site.pages.about',compact('page','lang','meta'));
    }
}
