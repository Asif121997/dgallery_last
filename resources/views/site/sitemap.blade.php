<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{route('homepage')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('about_az')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('services_az')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('services_az')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    @foreach($services as $service)
    <url>
        <loc>{{route('service_inner',['slug' => $service->serviceTranslations->where('locale','az')->first()->slug])}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    @endforeach
    
    <url>
        <loc>{{route('blogs_az')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    @foreach($blogs as $blog)
    <url>
        <loc>{{route('blog_inner_az',['slug' => $blog->blogTranslations->where('locale','az')->first()->slug])}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    @endforeach
    
    <url>
        <loc>{{route('contact_az')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('product_return')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('warranty_conditions')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('privacy_policy')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('sales_rules')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('delivery')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('basket')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc>{{route('wishlist')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    
    @foreach($categories as $category)
    <url>
        <loc>{{route('category-products',['slug' => $category->categoryTranslations->where('locale','az')->first()->slug])}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    @endforeach
    
    @foreach($products as $product)
    <url>
        <loc>{{route('product_inner_az',['slug' => $product->productTranslations->where('locale','az')->first()->slug])}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    @endforeach
    
    
    
     
    



   

</urlset>