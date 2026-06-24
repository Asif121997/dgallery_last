@extends('layouts.design')
@section('content')
<!-- Banner Home -->
@if($slider)
        <section class="tf-slideshow">
            <div class="slider_wrap type-2">
                <div class="sld-image">
                    <img src="{{asset('storage/sliders/'.$slider->img)}}" data-src="{{asset('storage/sliders/'.$slider->img)}}" alt="{{$slider->sliderTranslations->where('locale',App::getLocale())->first()->title}}" class="lazyload">

                </div>
                <div class="sld-content-2">
                    <div class="container">
                        <div class="content-sld text-center">

                            <h6 class="text-white text-uppercase">{{$slider->sliderTranslations->where('locale',App::getLocale())->first()->alert_text}}</h6>
                            <p class="title-sld-3 font-2">
                                {{$slider->sliderTranslations->where('locale',App::getLocale())->first()->title}}

                            </p>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12 offset-sm-6">
                                <div class="content-sld-2">

                                    <div class="sub-title-sld-2 ">
                                        {!!$slider->sliderTranslations->where('locale',App::getLocale())->first()->description!!}
                                    </div>
                                    <div class="btn-group">
                                        @if(!empty($slider->sliderTranslations->where('locale',App::getLocale())->first()->first_btn_text))
                                        <a href="{{$slider->sliderTranslations->where('locale',App::getLocale())->first()->first_btn_link}}" class="tf-btn type-large style-white-2">
                                            {{$slider->sliderTranslations->where('locale',App::getLocale())->first()->first_btn_text}}
                                            <i class="icon-arrow-right fs-24"></i>
                                        </a>
                                        @endif
                                        @if(!empty($slider->sliderTranslations->where('locale',App::getLocale())->first()->last_btn_text))
                                        <a href="{{$slider->sliderTranslations->where('locale',App::getLocale())->first()->last_btn_link}}" class="text-white link text-uppercase">
                                            {{$slider->sliderTranslations->where('locale',App::getLocale())->first()->last_btn_text}}
                                        </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sld-img-item d-none d-xxl-block">
                    <img src="{{asset('site/images/slider/img-item.jpg')}}" data-src="{{asset('site/images/slider/img-item.jpg')}}" alt="Image" class="lazyload">
                </div>
            </div>

            
        </section>
@endif

        <!-- /Banner Home -->
        <!-- Collection -->
        <div class="flat-spacing-3 pb-0">
            <div class="container">
                <div dir="ltr" class="swiper tf-swiper wow fadeInUp" data-preview="3" data-tablet="2" data-mobile-sm="2" data-mobile="1"
                    data-pagination="1" data-pagination-sm="2" data-pagination-md="2" data-pagination-lg="3">
                    <div class="swiper-wrapper">


                        @foreach($FirstBanners as $banner)
                        <!-- item  -->
                        <div class="swiper-slide">
                            <div class="promo-circle hover-img">
                                <div class="image img-style">
                                    <img src="{{asset('storage/banners/'.$banner->img)}}" data-src="{{asset('storage/banners/'.$banner->img)}}" alt="{{$banner->bannerTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload">
                                </div>
                                <h3 class="title">
                                    <a href="{{$banner->bannerTranslations->where('locale',App::getLocale())->first()->btn_link}}" class="text-primary-3">
                                        {{$banner->bannerTranslations->where('locale',App::getLocale())->first()->name}}
                                    </a>
                                </h3>
                                <p class="sub-title font-4 letter-space-0">
                                   {{$banner->bannerTranslations->where('locale',App::getLocale())->first()->special_title}}
                                </p>
                                <a href="{{$banner->bannerTranslations->where('locale',App::getLocale())->first()->btn_link}}" class="tf-btn type-large border-0 fw-medium">
                                    {{$banner->bannerTranslations->where('locale',App::getLocale())->first()->btn_text}}

                                    <i class="icon icon-arrow-top-right-2"></i>
                                </a>
                            </div>
                        </div>


                        @endforeach
                        

                    </div>
                    <div class="sw-dot-default tf-sw-pagination"></div>
                </div>
            </div>
        </div>
        <!-- /Collection -->
        <!-- Best Seller -->
        <section class="flat-spacing-3 flat-animate-tab product-tablist">
            <div class="container">
                <div class="sect-top align-items-end wow fadeInUp">

                    <h2 class="s-title text-capitalize">{{__('main.best_sellers')}}</h2>
                    <ul class="tab-prd" role="tablist">

                        @foreach($globalCategories as $k=>$globalCategory)
                        <li>
                            <h5><a href="#{{$globalCategory->categoryTranslations->where('locale',App::getLocale())->first()->slug}}" class="btn-tab @if($k==0) active @endif" data-bs-toggle="tab">{{$globalCategory->categoryTranslations->where('locale',App::getLocale())->first()->name}}</a></h5>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
                <div class="tab-content">
                    @foreach($globalCategories as $k=>$globalCategory)
                    <div class="tab-pane @if($k==0) active show @endif" id="{{$globalCategory->categoryTranslations->where('locale',App::getLocale())->first()->slug}}" role="tabpanel">

                        <div class="tf-btn-swiper-item wow fadeInUp">
                            <div dir="ltr" class="swiper tf-swiper" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="2"
                                data-space-lg="30" data-space-md="20" data-space="15" data-pagination="2" data-pagination-sm="2"
                                data-pagination-md="3" data-pagination-lg="4">
                                <div class="swiper-wrapper">


                                    @foreach($globalCategory->specialLatestProducts as $catProduct)
                                    <!-- item  -->
                                    <div class="swiper-slide">
                                        <div class="card_product--V01 type-space-35">
                                            <div class="card_product-wrapper">
                                                <a href="{{route('product_inner',['slug' => $catProduct->productTranslations->where('locale',App::getLocale())->first()->slug])}}" class="product-img">
                                                    <img src="{{asset('storage/products/'.$catProduct->img)}}" data-src="{{asset('storage/products/'.$catProduct->img)}}"
                                                        alt="{{$catProduct->productTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload img-product">
                                                    <img src="{{asset('storage/products/'.$catProduct->datasheet)}}" data-src="{{asset('storage/products/'.$catProduct->datasheet)}}"
                                                        alt="{{$catProduct->productTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload img-hover">
                                                </a>
                                                <ul class="list-product-btn">
                                                    
                                                    <li>
                                                        <a href="{{route('product_inner',['slug' => $catProduct->productTranslations->where('locale',App::getLocale())->first()->slug])}}"
                                                            class="hover-tooltip tooltip-left box-icon">
                                                            <span class="icon icon-shop-cart"></span>
                                                            <span class="tooltip">{{__('main.addToCart')}}</span>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                
                                                
                                            </div>
                                            <div class="card_product-info">
                                                <a href="product-default.html" class="name-product h5 fw-normal link text-line-clamp-2">
                                                    {{$catProduct->productTranslations->where('locale',App::getLocale())->first()->name}}
                                                </a>
                                                <div class="price-wrap">
                                                    @if($catProduct->discount_price == '0.00')
                                                    <span class="price-new h5 text-secondary-4">${{$catProduct->price}}</span>
                                                    @else
                                                    <span class="price-new h5 text-secondary-4">${{$catProduct->discount_price}}</span>
                                                    <span class=" price-old fw-normal">${{$catProduct->price}}</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                    

                                </div>
                                <div class="sw-dot-default tf-sw-pagination d-flex d-xxl-none"></div>
                            </div>
                            <div class="nav-swiper style-2 nav-prev-swiper d-none d-xxl-flex">
                                <i class="icon-arrow-left"></i>
                            </div>
                            <div class="nav-swiper style-2 nav-next-swiper d-none d-xxl-flex">
                                <i class="icon-arrow-right"></i>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    

                </div>
            </div>
        </section>
        <!-- /Best Seller -->

        
        <!-- Banner Image Text -->
        <div class="flat-spacing-12">
            @foreach($SecondBanners as $k=>$SecondBanner)
                @if($k == 0)
                <div class="flat-spacing-5 pt-0">
                    <div class="container">
                        <div class="banner_V03 hover-img4">
                            <div class="bn-image img-style4">
                                <img src="{{asset('storage/banners/'.$SecondBanner->img)}}" data-src="{{asset('storage/banners/'.$SecondBanner->img)}}" alt="{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload">
                            </div>
                            <div class="bn-content wow fadeInUp">
                                <h1 class="fw-normal">
                                    <a href="{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_link}}" class="title">{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->name}}</a>
                                </h1>
                                <p class="sub-title text-main-8 ">
                                    {{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->special_title}}
                                </p>
                                <a href="{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_link}}" class="tf-btn btn-def-2 type-large px-0">
                                    {{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_text}}
                                    <i class="icon icon-arrow-right-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="container">
                    <div class="banner_V03 hover-img4 flex-wrap-reverse">
                        <div class="bn-content wow fadeInUp">
                            <h1 class="fw-normal">
                                <a href="{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_link}}" class="title">{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->name}}
                                </a>
                            </h1>
                            <p class="sub-title text-main-8 ">
                                {{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->special_title}}
                            </p>
                            <a href="{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_link}}" class="tf-btn btn-def-2 type-large px-0">
                                {{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_text}}
                                <i class="icon icon-arrow-right-3"></i>
                            </a>
                        </div>
                        <div class="bn-image img-style4">
                            <img src="{{asset('storage/banners/'.$SecondBanner->img)}}" data-src="{{asset('storage/banners/'.$SecondBanner->img)}}" alt="{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload">
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            

        </div>
        <!-- /Banner Image Text -->
        
       
        <!-- Gallery -->
        <section>
            <div class="container">
                <h2 class="s-title text-center text-capitalize wow fadeInUp">{{__('main.JustForYou')}}</h2>
            </div>
            <div class="tf-grid-layout md-col-2 xl-col-3 gap-0">

                @foreach($ThirdBanners as $ThirdBanner)
                <div class="gallery-V01 wow fadeInUp">
                    <a href="shop-default.html" class="image">
                        <img src="{{asset('storage/banners/'.$ThirdBanner->img)}}" data-src="{{asset('storage/banners/'.$ThirdBanner->img)}}" alt="" class="lazyload">
                    </a>
                    <div class="content">
                        <div class="wrap-name">
                            <a href="shop-default.html" class="h4 fw-normal link text-line-clamp-1">{{$ThirdBanner->bannerTranslations->where('locale',App::getLocale())->first()->name}}</a>
                            <p class="text-main-8">{{$ThirdBanner->bannerTranslations->where('locale',App::getLocale())->first()->special_title}}</p>
                        </div>
                        <div class="text-nowrap">
                            <a href="{{$SecondBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_link}}" class="tf-btn btn-def-2 type-large px-0">
                                {{$ThirdBanner->bannerTranslations->where('locale',App::getLocale())->first()->btn_text}}

                                <i class="icon icon-arrow-right-3"></i>
                            </a>
                        </div>
                    </div>
                </div>

                @endforeach
                
            </div>
        </section>
        <!-- /Gallery -->
       

        <!-- Icon Box -->
        <div class="flat-spacing-8 bg-light-peach ">
            <div class="container">
                <div class="tf-swiper swiper sw-iconbox" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space-lg="80"
                    data-space-md="30" data-space="15" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        <!-- item 1 -->
                        <div class="swiper-slide">
                            <div class="box_icon--V01 wow fadeInLeft">
                                <span class="icon">
                                    <i class="icon-box"></i>
                                </span>
                                <div class="content">

                                    <h4 class="title">{{__('main.FreeShipping')}}</h4>
                                    <p class="text text-main-4">{{__('main.FreeShipping')}}</p>

                                </div>
                            </div>
                        </div>
                        <!-- item 2 -->
                        <div class="swiper-slide">
                            <div class="box_icon--V01 wow fadeInLeft" data-wow-delay="0.1s">
                                <span class="icon">
                                    <i class="icon-credit-card"></i>
                                </span>
                                <div class="content">

                                    <h4 class="title">{{__('main.FelxiblePayment')}}</h4>
                                    <p class="text text-main-4">{{__('main.FelxiblePaymentText')}}</p>

                                </div>
                            </div>
                        </div>
                        <!-- item 3 -->
                        <div class="swiper-slide">
                            <div class="box_icon--V01 wow fadeInLeft" data-wow-delay="0.2s">
                                <span class="icon">
                                    <i class="icon-return"></i>
                                </span>
                                <div class="content">

                                    <h4 class="title">{{__('main.DaysReturn')}}</h4>
                                    <p class="text text-main-4">{{__('main.DaysReturnText')}}</p>

                                </div>
                            </div>
                        </div>
                        <!-- item 4 -->
                        <div class="swiper-slide">
                            <div class="box_icon--V01 wow fadeInLeft" data-wow-delay="0.3s">
                                <span class="icon">
                                    <i class="icon-headphone"></i>
                                </span>
                                <div class="content">

                                    <h4 class="title">{{__('main.PremiumSupport')}}</h4>
                                    <p class="text text-main-4">{{__('main.PremiumSupportText')}}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sw-dot-default tf-sw-pagination"></div>
                </div>
            </div>
        </div>
        <!-- /Icon Box -->
@endsection