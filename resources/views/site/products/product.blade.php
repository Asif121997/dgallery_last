@extends('layouts.layout')

@section('content')
  <!-- Page Title -->
        <div class="flat-spacing-16 pb-0">
            <div class="container">
                <div class="page-title border-0">
                    <div class="breadcrumbs">
                        <ul class="bread-wrap mb-0">
                            <li><a href="{{route('homepage')}}" class="text-main-4 link">{{__('main.home')}}</a></li>
                            <li class="br-line w-12 bg-main"></li>
                            <li>
                                <p>{{$product->productTranslations->where('locale',App::getLocale())->first()->name}}</p>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Title -->
        <!-- Product Detail -->
        <section class="themesFlat">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="thumbs-slider">
                                    <div class="flat-wrap-media-product">
                                        <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                            <div class="swiper-wrapper">


                                                @foreach($product->images as $image)
                                                <div class="swiper-slide" data-color="gold" data-size="48">
                                                    <a href="{{asset('storage/products/'.$image->img)}}" target="_blank" class="item"
                                                        data-pswp-width="593px" data-pswp-height="744px">
                                                        <img class="tf-image-zoom lazyload" data-zoom="{{asset('storage/products/'.$image->img)}}"
                                                            data-src="{{asset('storage/products/'.$image->img)}}"
                                                            src="{{asset('storage/products/'.$image->img)}}" alt="img-product">
                                                    </a>
                                                </div>
                                                @endforeach
                                                

                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div dir="ltr" class="swiper tf-product-media-thumbs" data-preview="4" data-direction="horizontal">
                                        <div class="swiper-wrapper stagger-wrap">


                                            @foreach($product->images as $image)
                                            <!-- item -->
                                            <div class="swiper-slide stagger-item" data-color="gold">
                                                <div class="item">
                                                    <img data-src="{{asset('storage/products/'.$image->img)}}"
                                                        src="{{asset('storage/products/'.$image->img)}}" alt="" class="lazyload">
                                                </div>
                                            </div>
                                            @endforeach
                                            

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap">
                                <div class="tf-zoom-main sticky-top"></div>
                                <div class="tf-product-info-list other-image-zoom">
                                    <div class="tf-product-info-heading">
                                        <ul class="product-info-rate rate-wrap">

                                                
                                                @if($product->review == 1)
                                                <li><i class="icon-star"></i></li>
                                                @elseif($product->review == 2)
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                @elseif($product->review == 3)
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                @elseif($product->review == 4)
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                @elseif($product->review == 5)

                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                <li><i class="icon-star"></i></li>
                                                @endif

                                            
                                        </ul>
                                        <h3 class="product-info-name fw-normal">
                                            {{$product->productTranslations->where('locale',App::getLocale())->first()->name}}
                                        </h3>
                                        <div class="product-info-price">
                                            <div class="price-wrap">
                                                @if($product->discount_price == '0.00')
                                                <span class="price-new price-on-sale h4">${{$product->price}}</span>
                                                @else
                                                <span class="price-new price-on-sale h4">${{$product->discount_price}}</span>
                                                <span class="price-old compare-at-price fw-normal h6">${{$product->price}}</span>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="product-infor-sub h6 fw-normal text-main-4">
                                            {!!$product->productTranslations->where('locale',App::getLocale())->first()->overview!!}
                                        </div>
                                        

                                    </div>
                                    <div class="tf-product-info-variant">
                                        <div class="variant-picker-item variant-color">
                                            <div class="variant-picker-label h6 fw-normal">

                                                {{__('main.Material')}}:
                                                
                                            </div>
                                            <div class="variant-picker-values">
                                                @if(isset($product->color->id))
                                                <div class="hover-tooltip color-btn style-image-square active-btn" data-color_id="{{$product->color_id}}">
                                                    <span class="check-color">
                                                        <img src="{{asset('storage/materials/'.$product->color->img)}}" alt="">
                                                    </span>
                                                    <span class="tooltip">{{$product->color->colorTranslations->where('locale',App::getLocale())->first()->name}}</span>
                                                </div>
                                                @endif
                                                
                                            </div>
                                        </div>
                                            

                                        
                                        @if(count($product->sizeList))
                                        <div class="variant-picker-item variant-size">
                                            <div class="variant-picker-label h6 fw-normal">
                                                {{__('main.size')}}:
                                                
                                            </div>
                                            <div class="variant-picker-values">
                                                <div class="btn-group">
                                                    @foreach($product->sizeList as $k=>$prSize)
                                                    <span class="size-btn @if($k == 0) active-btn @endif" data-size_id="{{$prSize->id}}">{{$prSize->name}}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label h6 fw-normal">{{__('main.quantity')}}</div>

                                            <div class="variant-picker-values">
                                                <div class="wg-quantity">
                                                    <button class="btn-quantity btn-decrease"><i class="icon-minus"></i></button>
                                                    <input class="quantity-product" type="text" name="number" value="1">
                                                    <button class="btn-quantity btn-increase"><i class="icon-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-total-quantity">
                                        <div class="group-btn">

                                            <a href="javascript:void(0)"
                                                class="tf-btn btn-fill-2 text-uppercase fw-medium animate-btn addBasket">

                                                {{__('main.addToBag')}}
                                                
                                            </a>
                                            <!-- <div class="group-btn-action">

                                                <a href="javascript:void(0);" class="tf-btn-icon hover-tooltip btn-add-wishlist">
                                                    <span class="icon icon-heart-2"></span>
                                                    <span class="tooltip">Add to Wishlist</span>
                                                </a>
                                                <a href="#compare" data-bs-toggle="modal" aria-controls="compare" class="tf-btn-icon hover-tooltip">
                                                    <span class="icon icon-compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>

                                            </div> -->
                                        </div>
                                        

                                    </div>
                                    <div class="tf-product-share">
                                        <ul class="tf-social-icon">
                                            <li>
                                                <a href="#" class="social-facebook">
                                                    <span class="icon"><i class="icon-facebook"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="social-instagram">
                                                    <span class="icon"><i class="icon-instagram"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="social-x">
                                                    <span class="icon"><i class="icon-x"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="social-snapchat">
                                                    <span class="icon"><i class="icon-snapchat"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tf-sticky-btn-atc">
                <div class="container">
                    <div class="tf-height-observer w-100 d-flex align-items-center">
                        <div class="tf-sticky-atc-product d-flex align-items-center">
                            <div class="tf-sticky-atc-img">
                                <img class="lazyload" data-src="{{asset('site/images/products/detail/prd-detail-1.jpg')}}" alt=""
                                    src="{{asset('site/images/products/detail/prd-detail-1.jpg')}}">
                            </div>

                            <div class="tf-sticky-atc-title fw-5 d-lg-block d-none">{{__('main.haloRing')}}</div>

                        </div>
                        <div class="tf-sticky-atc-infos">
                            <form class="">
                                <div class="tf-sticky-atc-variant-price text-center tf-select">
                                    <select>
                                        <option selected="selected">Gold / 48 - $1,499.00</option>
                                        <option>Gold / 50 - $1,999.00</option>
                                        <option>Gold / 52 - $2,499.00</option>
                                        <option>Titanium / 48 - $1,499.00</option>
                                        <option>Titanium / 50 - $1,999.00</option>
                                        <option>Titanium / 52 - $2,499.00</option>
                                        <option>Titanium / 54 - $2,999.00</option>
                                        <option>Rose / 48 - $1,899.00</option>
                                        <option>Rose / 50 - $2,399.00</option>
                                        <option>Rose / 52 - $2,799.00</option>
                                    </select>
                                </div>
                                <div class="tf-sticky-atc-btns">
                                    <div class="tf-product-info-quantity">
                                        <div class="wg-quantity">
                                            <button type="button" class="btn-quantity minus-btn"><i class="icon-minus"></i></button>
                                            <input class="quantity-product" type="text" name="number" value="1">
                                            <button type="button" class="btn-quantity plus-btn"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="tf-btn btn-fill animate-btn fw-medium addBasket">{{__('main.addToCart')}}</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Product Detail -->
        <!-- Product Desciption -->
        <div class="flat-spacing-3">
            <div class="container">
                <div class="widget-accordion wd-product-descriptions">
                    <div class="accordion-title collapsed" data-bs-target="#description" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="description" role="button">
                        <span class="icon icon-arrow-right-down"></span>

                        <span>{{__('main.description')}}</span>

                    </div>
                    <div id="description" class="collapse widget-desc">
                        <div class="accordion-body">
                            <h6 class="text-main-4 fw-normal">

                                {!!$product->productTranslations->where('locale',App::getLocale())->first()->description!!}

                            </h6>
                        </div>
                    </div>
                </div>
                <div class="widget-accordion wd-product-descriptions">
                    <div class="accordion-title collapsed" data-bs-target="#material" data-bs-toggle="collapse" aria-expanded="true"
                        aria-controls="material" role="button">
                        <span class="icon icon-arrow-right-down"></span>
                        <span>{{__('main.additionalinformation')}}</span>

                    </div>
                    <div id="material" class="collapse widget-material">
                        <div class="accordion-body">
                            <table class="table-material">
                                <tbody>
                                    <tr>

                                        <td class="h6">{{__('main.material')}}</td>
                                        <td class="h6">{{$product->color->colorTranslations->where('locale',App::getLocale())->first()->name}}</td>
                                    </tr>
                                    

                                    <tr>
                                        <td class="h6">Stone</td>
                                        <td class="h6">Diamond</td>
                                    </tr>

                                    
                                    <tr>
                                        <td class="h6">{{__('main.size')}}</td>
                                        <td class="h6">
                                            @foreach($product->sizeList as $prSize)
                                                {{ $prSize->name }}@if(!$loop->last), @endif
                                            @endforeach
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
        <!-- /Product Desciption -->
        @if(count($similarProducts))

        <!-- For You -->
        <section class="flat-spacing-3">
            <div class="container">
                <div class="sect-top wow fadeInUp">

                    <h3 class="s-title">{{__('main.similarproducts')}}</h3>

                    <div class="group-btn-slider">
                        <div class="nav-prev-swiper tf-sw-nav">
                            <i class="icon-arrow-left"></i>
                        </div>
                        <div class="nav-next-swiper tf-sw-nav">
                            <i class="icon-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div dir="ltr" class="swiper tf-swiper wow fadeInUp" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="2"
                    data-space-lg="30" data-space-md="20" data-space="15" data-pagination="2" data-pagination-sm="2" data-pagination-md="3"
                    data-pagination-lg="4">
                    <div class="swiper-wrapper">

                        @foreach($similarProducts as $similarProduct)
                        <!-- item  -->
                        <div class="swiper-slide">
                                        <div class="card_product--V01 type-space-35">
                                            <div class="card_product-wrapper">
                                                <a href="{{route('product_inner',['slug' => $similarProduct->productTranslations->where('locale',App::getLocale())->first()->slug])}}" class="product-img">
                                                    <img src="{{asset('storage/products/'.$similarProduct->img)}}" data-src="{{asset('storage/products/'.$similarProduct->img)}}"
                                                        alt="{{$similarProduct->productTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload img-product">
                                                    <img src="{{asset('storage/products/'.$similarProduct->datasheet)}}" data-src="{{asset('storage/products/'.$similarProduct->datasheet)}}"
                                                        alt="{{$similarProduct->productTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload img-hover">
                                                </a>
                                                <ul class="list-product-btn">
                                                    
                                                    <li>
                                                        <a href="{{route('product_inner',['slug' => $similarProduct->productTranslations->where('locale',App::getLocale())->first()->slug])}}"
                                                            class="hover-tooltip tooltip-left box-icon">
                                                            <span class="icon icon-shop-cart"></span>
                                                            <span class="tooltip">{{__('main.addToCart')}}</span>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                
                                                
                                            </div>
                                            <div class="card_product-info">
                                                <a href="product-default.html" class="name-product h5 fw-normal link text-line-clamp-2">
                                                    {{$similarProduct->productTranslations->where('locale',App::getLocale())->first()->name}}
                                                </a>
                                                <div class="price-wrap">
                                                    @if($similarProduct->discount_price == '0.00')
                                                    <span class="price-new h5 text-secondary-4">${{$similarProduct->price}}</span>
                                                    @else
                                                    <span class="price-new h5 text-secondary-4">${{$similarProduct->discount_price}}</span>
                                                    <span class=" price-old fw-normal">${{$similarProduct->price}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        @endforeach
                        

                    </div>
                    <div class="sw-dot-default tf-sw-pagination d-xl-none"></div>
                </div>
            </div>
        </section>
        <!-- /For You -->

        @endif
        
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

@section('mainJs')

<script>
        $('.addBasket').click(function(){

            var color_id = $('.color-btn').data('color_id');

            var size_id = $('.size-btn.active-btn').data('size_id');

            var quantity = $('.quantity-product').val();

            var product_id = {{$product->id}};



            $.ajax({
            url: '{{route("add_basket")}}', // Laravel route
            method: 'POST',
            data: {
                color_id: color_id,
                quantity: quantity,
                product_id: product_id,
                size_id: size_id,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                      position: "top-end",
                      icon: "success",
                      title: "Məhsul səbətə əlavə olundu.",
                      showConfirmButton: false,
                      timer: 1500
                    });
                    updateBasketCount();
                }
            },
            error: function (xhr) {
                
            }
        });
        });

        
    </script>

@endsection