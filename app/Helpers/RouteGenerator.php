<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class RouteGenerator
{
    public static function getCategoryPath($category)
    {
        $categoryPath = '';

        $parentCategory = $category->parent;
        while ($parentCategory) {
            $categoryPath = $parentCategory->categoryTranslations[0]->slug . '/' . $categoryPath;
            $parentCategory = $parentCategory->parent;
        }

        return $categoryPath . $category->categoryTranslations[0]->slug;
    }

    public static function generateSlug($category,$slug)
    {
        $categoryPath = '';

        $parentCategory = $category->parent;
//        while ($parentCategory) {
//            $parentCategory = $parentCategory->parent;
        if($parentCategory){
            $categoryPath = $parentCategory->categoryTranslations[0]->slug . '/' . $categoryPath;
        }
//        }

        return $categoryPath.Str::slug($slug);
    }

    public static function categoryBreadcrumbs($category)
    {
        $breadcrumb = '';
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18L15 12L9 6" stroke="#101828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>';

        $parentCategory = $category->parent;
        while ($parentCategory) {
            $breadcrumb = ' <a href="'.route('categories',['categories'=>$parentCategory->categoryTranslations[0]->slug]).'">'.$parentCategory->categoryTranslations[0]->name.'</a>'.$icon.$breadcrumb;
            $parentCategory = $parentCategory->parent;
        }

        return $breadcrumb;
    }

    public static function postInnerBreadcrumbs($category)
    {
        $breadcrumb = '';
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M9 18L15 12L9 6" stroke="#101828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>';

        $parentCategory = $category;
        while ($parentCategory) {
            $breadcrumb = ' <a href="'.route('categories',['categories'=>$parentCategory->categoryTranslations[0]->slug]).'">'.$parentCategory->categoryTranslations[0]->name.'</a>'.$icon.$breadcrumb;
            $parentCategory = $parentCategory->parent;
        }

        return $breadcrumb;
    }

    public static function getPostCategoryPath($categories)
    {
        $categoryPath = '';
        if($categories){
            $parentCategory = $categories->parent;
            while ($parentCategory) {
                $categoryPath = ' <a href="'.route('categories',['categories'=>$parentCategory->categoryTranslations[0]->slug]).'">'.$parentCategory->categoryTranslations[0]->name.'</a>';
                $parentCategory = $parentCategory->parent;
            }
            return $categoryPath;
        }else{
            return 'no';
        }

    }

    public static function generateCustomSlug($model,$name,$slug, $recordId = null)
    {
        $slug = is_null($slug) ? Str::slug($name) : Str::slug($slug);
        $originalSlug = $slug;
        $counter = 1;

        while ($model::where('slug', $slug)
            ->whereHas('category',function($query){
                $query->where('deleted_at',null);
            })
            ->when($recordId, function ($query) use ($recordId) {
                // Exclude the current record when updating
                return $query->where('id', '<>', $recordId);
            })
            ->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    public static function generateCustomSlugV2($model,$name,$slug,$identifierColumn = 'id', $recordId = null)
    {
        $slug = is_null($slug) ? Str::slug($name) : Str::slug($slug);
        $originalSlug = $slug;
        $counter = 1;

        while ($model::where('slug', $slug)
            ->where(function ($query) use ($identifierColumn,$recordId) {
                // Exclude the current record when updating
                if ($recordId !== null) {
                    $query->where($identifierColumn, '<>', $recordId);
                }
            })
            ->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
