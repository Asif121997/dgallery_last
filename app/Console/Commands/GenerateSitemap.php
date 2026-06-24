<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $achievementUrls = DB::table('achievements')
                ->join('achievement_translations', 'achievement_translations.achievement_id', '=', 'achievements.id')
                ->where('locale', 'az')
                ->pluck('slug');
                
            $categoryUrls = DB::table('categories')
                ->join('category_translations', 'category_translations.category_id', '=', 'categories.id')
                ->where('locale', 'az')
                ->whereNull('deleted_at')
                ->pluck('slug');
                
            $serviceUrls = DB::table('services')
                ->join('service_translations', 'service_translations.service_id', '=', 'services.id')
                ->where('locale', 'az')
                ->where('services.status', 1)
                ->pluck('slug');
            $blogUrls = DB::table('blogs')
                ->join('blog_translations', 'blog_translations.blog_id', '=', 'blogs.id')
                ->where('locale', 'az')
                ->whereNull('deleted_at')
                ->pluck('slug');
            $seoPageUrls = DB::table('seo_pages')
                ->join('seo_page_translations', 'seo_page_translations.page_id', '=', 'seo_pages.id')
                ->where('locale', 'az')
                ->pluck('slug');

            $sitemap = Sitemap::create();
            $sitemap->add(env('APP_URL'));

            $sitemap->add(env('APP_URL'));
            $sitemap->add(env('APP_URL') . 'haqqimda');
            $sitemap->add(env('APP_URL') . 'ugurlarim');
            $sitemap->add(env('APP_URL') . 'xidmetler');
            $sitemap->add(env('APP_URL') . 'bloqlar');
            $sitemap->add(env('APP_URL') . 'elaqe');
            $sitemap->add(env('APP_URL') . 'qalereya');
            $sitemap->add(env('APP_URL') . 'faq');
            foreach ($achievementUrls as $achievementUrl) {
                $sitemap->add(env('APP_URL') . 'ugurlarim/' . $achievementUrl);
            }
            
            
            foreach ($categoryUrls as $categoryUrl) {
                $sitemap->add(env('APP_URL') . 'bloqlar/' . $categoryUrl);
            }

            foreach ($blogUrls as $blogUrl) {
                $sitemap->add(env('APP_URL') . 'bloqlar/' . $blogUrl);
            }

            foreach ($seoPageUrls as $seoPageUrl) {
                $sitemap->add(env('APP_URL') . 'bloqlar/' . $seoPageUrl);
            }

            $sitemap->add(env('APP_URL') . 'xidmetler');
            foreach ($serviceUrls as $serviceUrl) {
                $sitemap->add(env('APP_URL') . 'xidmetler/' . $serviceUrl);
            }

            
            $sitemap->writeToFile(public_path('sitemap.xml'));

            Log::info('Sitemap generated successfully!');
        } catch (\Exception $e) {
            Log::error('Sitemap error: ' . $e->getMessage());
        }
    }
}
