<?php

namespace App\Helpers;

use App\Models\Category;

class DataTransformService
{
    public static function transformSlider($data,$lang)
    {
        
        return [
            'id' => $data->id,
            'img' => $data->image->file_name ? asset('storage/sliders/resized/' . $data->image->file_name) : '',
            'title' => $data->sliderTranslations->where('locale',$lang)->first()->title ?? null,
            'text' => $data->sliderTranslations[Session('lang')]->text ?? null,
            'btn_text' => $data->sliderTranslations[Session('lang')]->btn_text ?? null,
            'btn_url' => $data->sliderTranslations[Session('lang')]->btn_url ?? null,
            'status' => $data->status,
        ];
    }




    public static function transformCategory($category)
    {
        $transformedCategory = [
            'id' => $category->id,
            'parent_id' => $category->parent_id,
            'name' => $category->categoryTranslations[0]->name,
            'slug' => $category->categoryTranslations[0]->slug,
            'icon' => $category->explode_img,
            'status' => $category->status,
            'children' => []
        ];
        if ($category->children->isNotEmpty()) {
            foreach ($category->children as $child) {
                $transformedCategory['children'][] = self::transformCategory($child);
            }
        }

        return $transformedCategory;
    }

    public static function transformFaq($faqGroup)
    {
        return [
            'id' => $faqGroup->id,
            'faq_group_name' => $faqGroup->faqGroupTranslations[0]->name,
            'faqs' => $faqGroup->questions->map(function ($faq) {
                return [
                    'id' => $faq->id,
                    'question' => $faq->faqTranslations[0]->name,
                    'answer' => $faq->faqTranslations[0]->text
                ];
            })
        ];
    }

    public static function transformService($service,$lang)
    {
        return [
        'id' => $service->id,
        'name' => $service->serviceTranslations->where('locale',$lang)->first()->title,
        'text' => $service->serviceTranslations->where('locale',$lang)->first()->text,
        
    ];
    }

    public static function transformAchievement($achievement,$lang)
    {
        return [
            'id' => $achievement->id,
            'img' => $achievement->img,
            'name' => $achievement->achievementTranslations->where('locale',$lang)->first()->title,
            'short_text' => $achievement->achievementTranslations->where('locale',$lang)->first()->short_text,
            'text' => $achievement->achievementTranslations->where('locale',$lang)->first()->text,
            'slug' => $achievement->achievementTranslations->where('locale',$lang)->first()->slug,
        ];
    }

    public static function transformBlog($blog,$lang)
    {
        return [
            'id' => $blog->id,
            'img' => $blog->img ? asset('storage/blogs/resized/' . $blog->img) : null,
            'name' => $blog->blogTranslations->where('locale',$lang)->first()->title,
            'short_text' => $blog->blogTranslations->where('locale',$lang)->first()->short_text,
            'text' => $blog->blogTranslations->where('locale',$lang)->first()->text,
            'slug' => $blog->blogTranslations->where('locale',$lang)->first()->slug,
            'created_at' => date_format($blog->created_at, 'd-m-Y'),
            'category' => $blog->categories->map(function ($category) {
                return [
                    'name' => $category->categoryTranslations[0]->name,
                    'slug' => $category->categoryTranslations[0]->slug,
                ];
            })];
    }

    public static function transformBlogComment($comment)
    {
        return [
            'id' => $comment->id,
            'blog_id' => $comment->blog_id,
            'name' => $comment->name,
            'comment' => $comment->comment,
            'created_at' => $comment->created_at->format('d/m/Y H:i')
        ];
    }

    public static function transformTestimonial($testimonial)
    {
        return [
            'id' => $testimonial->id,
            'img' => $testimonial->img ? asset('storage/testimonials/resized/' . $testimonial->img) : null,
            'name' => $testimonial->testimonialTranslations[0]->name,
            'job' => $testimonial->testimonialTranslations[0]->job,
            'text' => $testimonial->testimonialTranslations[0]->text,
        ];
    }
}
