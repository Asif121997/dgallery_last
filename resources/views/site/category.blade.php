
@extends('layouts.layout')
@section('content')
 <!-- Page Title -->
        <section class="flat-spacing-2 pb-0">
            <div class="container">
                <div class="page-title type-2">
                    <div class="breadcrumbs">
                        <ul class="bread-wrap">
                            <li><a href="{{route('homepage')}}" class="text-main-4 link-secondary">{{__('main.home')}}</a></li>
                            <li class="br-line w-12 bg-main"></li>
                            <li>
                                <p>{{$category->categoryTranslations->where('locale',App::getLocale())->first()->name}}</p>
                            </li>
                        </ul>
                        <h1 class="heading fw-normal text-uppercase">
                            {{$category->categoryTranslations->where('locale',App::getLocale())->first()->name}}
                            <span class="number-count">
                                {{count($products)}}
                            </span>
                        </h1>
                    </div>
                    <div class="box-text">
                        <div class="text-main-4">
                            {!!$category->categoryTranslations->where('locale',App::getLocale())->first()->description!!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Category -->
        <div class="flat-spacing-5">
            <div class="container-6">
                <div class="swiper tf-swiper" data-preview="5" data-tablet="4" data-mobile-sm="3" data-mobile="2" data-space-lg="30"
                    data-space-md="20" data-space="15" data-pagination="2" data-pagination-sm="3" data-pagination-md="4" data-pagination-lg="5">
                    <div class="swiper-wrapper">
                        @foreach($globalCategories as $globalCateg)
                        <!-- item  -->
                        <div class="swiper-slide">
                            <div class="box_collection--V01 style_2 hover-img">
                                <a href="{{route('category-products',['slug'=>$globalCateg->categoryTranslations->where('locale',App::getLocale())->first()->slug])}}" class="image img-style">
                                    <img src="{{asset('storage/categories/'.$globalCateg->icon_image)}}" data-src="{{asset('storage/categories/'.$globalCateg->icon_image)}}" alt="{{$globalCateg->categoryTranslations->where('locale',App::getLocale())->first()->name}}" class=" lazyload">
                                </a>
                                <a href="shop-default.html" class="name-cls link">
                                    <span class="h5 fw-normal text-uppercase">
                                        {{$globalCateg->categoryTranslations->where('locale',App::getLocale())->first()->name}}
                                    </span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="sw-dot-default d-flex d-xl-none tf-sw-pagination"></div>
                </div>
            </div>
        </div>
        <!-- /Category -->
        <!-- Product -->
        <div class="flat-spacing pt-0">
            <span class="br-line cus-width d-block bg-line"></span>
            <div class="tf-shop-control style-2 mb_10 border-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <div class="tf-control-filter justify-content-between pe-xxl-30">
                                <button class="tf-btn-filter h5 link">
                                    <span class="icon icon-filter d-xl-none"></span>
                                    <span class="text">{{__('main.filter')}}</span>
                                </button>
                                <button id="reset-filter" class="btn-check-none tf-btn-line">
                                    <span class="text-body">{{__('main.clearall')}}</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tf-group-layout justify-content-end">
                                <ul class="tf-control-layout">
                                    <li class="tf-view-layout-switch sw-layout-2 d-none d-md-flex" data-value-layout="tf-col-2">
                                        <div class="item icon-grid-2">
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </li>
                                    <li class="tf-view-layout-switch sw-layout-3 active d-none d-md-flex" data-value-layout="tf-col-3">
                                        <div class="item icon-grid-3">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </li>
                                    <li class="tf-view-layout-switch sw-layout-4 d-none d-xl-flex" data-value-layout="tf-col-4">
                                        <div class="item icon-grid-4">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </li>

                                </ul>
                                <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                    <div class="btn-select">
                                        <span class="text-sort-value">Best selling</span>
                                        <span class="icon icon-arrow-angle-down"></span>
                                    </div>
                                    <div class="dropdown-menu">
                                        <div class="select-item active" data-sort-value="best-selling">
                                            <span class="text-value-item">Best selling</span>
                                        </div>
                                        <div class="select-item" data-sort-value="a-z">
                                            <span class="text-value-item">Alphabetically, A-Z</span>
                                        </div>
                                        <div class="select-item" data-sort-value="z-a">
                                            <span class="text-value-item">Alphabetically, Z-A</span>
                                        </div>
                                        <div class="select-item" data-sort-value="price-low-high">
                                            <span class="text-value-item">Price, low to high</span>
                                        </div>
                                        <div class="select-item" data-sort-value="price-high-low">
                                            <span class="text-value-item">Price, high to low</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="canvas-sidebar sidebar-filter canvas-filter left pe-xxl-30">
                            <div class="canvas-wrapper">

                                <div class="canvas-header d-flex d-xl-none">
                                    <span class="title">{{__('main.filter')}}</span>
                                    <span class="icon-close link icon-close-popup" data-bs-dismiss="offcanvas"></span>
                                </div>
                                <div class="canvas-body">
                                    <div class="apply-filter-wrap">
                                        <p class="title h6 fw-normal text-uppercase d-xl-none">{{__('main.AppliedFilters')}}</p>
                                        <div id="product-count-grid" class="count-text text-main-4 d-xl-none">{{__('main.NoFilterSelected')}}</div>
                                        <div class="meta-filter-shop">
                                            <div id="applied-filters" class="check-yes"></div>
                                        </div>
                                    </div>
                                    <div class="widget-facet">
                                        <div class="facet-title h6 fw-normal" data-bs-target="#availability" role="button" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="availability">
                                            <span class="h6 fw-normal text-uppercase">{{__('main.availability')}}</span>
                                            <span class="icon ic-accordion-custom"></span>
                                        </div>
                                        <div id="availability" class="collapse show">
                                            <ul class="collapse-body filter-group-check current-scrollbar">
                                                <li class="list-item">
                                                    <input type="radio" name="availability" class="tf-check style-2" id="inStock">
                                                    <label for="inStock" class="label">
                                                        <span>{{__('main.instock')}}</span>
                                                    </label>
                                                </li>
                                                <li class="list-item disabled">
                                                    <input type="radio" name="availability" class="tf-check style-2" id="outStock">
                                                    <label for="outStock" class="label">
                                                        <span>{{__('main.outofstock')}}</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget-facet">
                                        <div class="facet-title h6 fw-normal" data-bs-target="#categories" role="button" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="categories">
                                            <span class="h6 fw-normal text-uppercase">{{__('main.category')}}</span>
                                            <span class="icon ic-accordion-custom"></span>
                                        </div>
                                        <div id="categories" class="collapse show">
                                            <ul class="collapse-body filter-group-check current-scrollbar">
                                                @foreach($globalCategories as $globalC)
                                                <li class="list-item">
                                                    <input type="checkbox" name="category" class="tf-check style-2" id="category{{$globalC->id}}" value="{{$globalC->categoryTranslations->where('locale',App::getLocale())->first()->slug}}">
                                                    <label for="category{{$globalC->id}}" class="label">
                                                        <span>{{$globalC->categoryTranslations->where('locale',App::getLocale())->first()->name}}</span>
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    @foreach($optionGroups as $optionGroup)

                                    <div class="widget-facet">
                                        <div class="facet-title h6 fw-normal" data-bs-target="#materials" role="button" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="materials">
                                            <span class="h6 fw-normal text-uppercase">{{$optionGroup->optionGroups->optionGroupTranslations->where('locale',App::getLocale())->first()->name}}</span>
                                            <span class="icon ic-accordion-custom"></span>
                                        </div>
                                        <div id="materials" class="collapse show">
                                            <ul class="collapse-body filter-group-check current-scrollbar">

                                                
                                                @foreach($optionGroup->optionGroups->options as $option)
                                                <li class="list-item">
                                                    <input type="checkbox" name="filter[]" class="tf-check style-2" id="{{$optionGroup->optionGroups->optionGroupTranslations->where('locale',App::getLocale())->first()->name}}{{$option->id}}" value="{{$option->id}}">
                                                    <label for="{{$optionGroup->optionGroups->optionGroupTranslations->where('locale',App::getLocale())->first()->name}}{{$option->id}}" class="label">
                                                        <span>{{$option->optionTranslations->where('locale',App::getLocale())->first()->name}}</span>
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach


                                    <div class="widget-facet">
                                        <div class="facet-title h6 fw-normal" data-bs-target="#stone-color" role="button" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="stone-color">
                                            <span class="h6 fw-normal text-uppercase">{{__('main.materials')}}</span>
                                            <span class="icon ic-accordion-custom"></span>
                                        </div>
                                        <div id="stone-color" class="collapse show">
                                            <ul class="collapse-body filter-group-check current-scrollbar">
                                                @foreach($colors as $color)
                                                <li class="list-item">

                                                    <input type="checkbox" name="color" class="tf-check style-2" id="color{{$color->id}}" value="{{$color->colorTranslations->where('locale',App::getLocale())->first()->slug}}">
                                                    <label for="color{{$color->id}}" class="label">
                                                        <img src="{{asset('storage/materials/'.$color->img)}}" alt="Colour" class="img-check">
                                                        <span>{{$color->colorTranslations->where('locale',App::getLocale())->first()->name}}</span>
                                                    </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget-facet">
                                        <div class="facet-title h6 fw-normal" data-bs-target="#price" role="button" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="price">
                                            <span class="h6 fw-normal text-uppercase">{{__('main.price')}}</span>
                                            <span class="icon ic-accordion-custom"></span>
                                        </div>
                                        <div id="price" class="collapse show">
                                            <ul class="collapse-body filter-group-check current-scrollbar">
                                                <li class="list-item">
                                                    <input type="radio" name="price" class="tf-check style-2" id="u-500">
                                                    <label for="u-500" class="label">
                                                        <span>Under $500</span><span class="count-wrap">[ <span class="count">20</span> ]</span>
                                                    </label>
                                                </li>
                                                <li class="list-item">
                                                    <input type="radio" name="price" class="tf-check style-2" id="u-1000">
                                                    <label for="u-1000" class="label">
                                                        <span>Under $1000</span><span class="count-wrap">[ <span class="count">20</span> ]</span>
                                                    </label>
                                                </li>
                                                <li class="list-item">
                                                    <input type="radio" name="price" class="tf-check style-2" id="u-2000">
                                                    <label for="u-2000" class="label">
                                                        <span>Under $2000</span><span class="count-wrap">[ <span class="count">20</span> ]</span>
                                                    </label>
                                                </li>
                                                <li class="list-item">
                                                    <input type="radio" name="price" class="tf-check style-2" id="up-2000">
                                                    <label for="up-2000" class="label">
                                                        <span>Over $2000</span><span class="count-wrap">[ <span class="count">20</span> ]</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget-facet">
                                        <div class="facet-title h6 fw-normal" data-bs-target="#size" role="button" data-bs-toggle="collapse"
                                            aria-expanded="true" aria-controls="size">
                                            <span class="h6 fw-normal text-uppercase">{{__('main.size')}}</span>
                                            <span class="icon ic-accordion-custom"></span>
                                        </div>
                                        <div id="size" class="collapse show">
                                            <div class="collapse-body filter-size-box flat-check-list">
                                                @foreach($sizes as $size)
                                                <div class="check-item size-item size-check"><span class="count size">{{$size->name}}</span></div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="canvas-bottom d-xl-none">
                                    <button id="reset-filter" class=" tf-btn btn-reset">
                                        <span class=" fw-medium">{{__('main.clearall')}}</span>
                                    </button>
                                    <button type="button" class="tf-btn btn-fill animate-btn" data-bs-dismiss="offcanvas">
                                        <span class=" fw-medium">{{__('main.apply')}}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="wrapper-control-shop gridLayout-wrapper">
                            <div class="wrapper-shop tf-grid-layout tf-col-3" id="gridLayout">
                                @foreach($products as $product)
                                <!-- Product Item -->
                                <div class="loadItem card_product--V01 grid" data-availability="In stock" data-category="ring"
                                    data-material="sterling-silver" data-size="6">
                                    <div class="card_product-wrapper">
                                                <a href="{{route('product_inner',['slug' => $product->productTranslations->where('locale',App::getLocale())->first()->slug])}}" class="product-img">
                                                    <img src="{{asset('storage/products/'.$product->img)}}" data-src="{{asset('storage/products/'.$product->img)}}"
                                                        alt="{{$product->productTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload img-product">
                                                    <img src="{{asset('storage/products/'.$product->datasheet)}}" data-src="{{asset('storage/products/'.$product->datasheet)}}"
                                                        alt="{{$product->productTranslations->where('locale',App::getLocale())->first()->name}}" class="lazyload img-hover">
                                                </a>
                                                <ul class="list-product-btn">
                                                    
                                                    <li>
                                                        <a href="{{route('product_inner',['slug' => $product->productTranslations->where('locale',App::getLocale())->first()->slug])}}"
                                                            class="hover-tooltip tooltip-left box-icon">
                                                            <span class="icon icon-shop-cart"></span>
                                                            <span class="tooltip">{{__('main.addToCart')}}</span>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                                
                                                
                                            </div>
                                            <div class="card_product-info">
                                                <a href="product-default.html" class="name-product h5 fw-normal link text-line-clamp-2">
                                                    {{$product->productTranslations->where('locale',App::getLocale())->first()->name}}
                                                </a>
                                                <div class="price-wrap">
                                                    @if($product->discount_price == '0.00')
                                                    <span class="price-new h5 text-secondary-4">${{$product->price}}</span>
                                                    @else
                                                    <span class="price-new h5 text-secondary-4">${{$product->discount_price}}</span>
                                                    <span class=" price-old fw-normal">${{$product->price}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                </div>
                                @endforeach
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Product -->
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
		var color_id = $(this).data('color') || 0;
		var count = 1;
		var product_id = $(this).data('product');
		
		
		$.ajax({
            url: '{{route("add_basket")}}', // Laravel route
            method: 'POST',
            data: {
                color_id: color_id,
                count: count,
                product_id: product_id,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status === 'success') {
	                Swal.fire({
					  
					  icon: "success",
					  title: "Məhsul səbətə əlavə olundu.",
					  showConfirmButton: false,
					  timer: 1500
					});
					updateBasketCount();
					updateBasketMCPrice();
                    updateMiniBasketCart();
	            }
            },
            error: function (xhr) {
                
            }
        });
	});


	function updateBasketCount() {
	    $.ajax({
	        url: "{{ route('basket_count') }}",
	        method: "GET",
	        success: function(response) {
	            // məsələn #basketCount id-li span-da göstərirsən
	            $('#basketCount').text(response.count);
	        }
	    });
	}



</script>

<script>
    const rangeMin = document.getElementById("range-min"),
          rangeMax = document.getElementById("range-max"),
          minInput = document.getElementById("min-price"),
          maxInput = document.getElementById("max-price"),
          progress = document.getElementById("progress");

    const minGap = 1;
    const range = {{ number_format($maxPrice + 1, 0, '.', '') }};

    function updateProgress() {
      let minVal = parseInt(rangeMin.value),
          maxVal = parseInt(rangeMax.value);

      progress.style.left = (minVal / range) * 100 + "%";
      progress.style.right = 100 - (maxVal / range) * 100 + "%";

      minInput.value = minVal;
      maxInput.value = maxVal;
    }

    rangeMin.addEventListener("input", () => {
      if (parseInt(rangeMax.value) - parseInt(rangeMin.value) <= minGap) {
        rangeMin.value = parseInt(rangeMax.value) - minGap;
      }
      updateProgress();
    });

    rangeMax.addEventListener("input", () => {
      if (parseInt(rangeMax.value) - parseInt(rangeMin.value) <= minGap) {
        rangeMax.value = parseInt(rangeMin.value) + minGap;
      }
      updateProgress();
    });

    minInput.addEventListener("change", () => {
      rangeMin.value = minInput.value;
      updateProgress();
    });

    maxInput.addEventListener("change", () => {
      rangeMax.value = maxInput.value;
      updateProgress();
    });

    updateProgress();
  </script>
  
<script>
$(document).ready(function(){

    function applyFilters(url = null){

        let baseUrl = $('#filterForm').attr('action');

        let data1 = $('#filterForm').serializeArray();
        let data2 = $('#topFilterForm').serializeArray();

        let combinedData = data1.concat(data2);

        if(url){
            let pageMatch = url.match(/page=\d+/);
            if(pageMatch){
                combinedData.push({
                    name: 'page',
                    value: pageMatch[0].split('=')[1]
                });
            }
        }

        let query = $.param(combinedData);

        $.ajax({
            url: baseUrl,
            type: "GET",
            data: query,
            success: function(response){
                $('#productArea').html(response);
                window.history.pushState({}, '', baseUrl + '?' + query);
            }
        });
    }

    // Filter dəyişiklikləri
    $(document).on('change', '#filterForm input, #filterForm select, #topFilterForm select', function(){
        applyFilters();
    });

    // Pagination
    $(document).on('click', '.pagination a', function(e){
        e.preventDefault();
        applyFilters($(this).attr('href'));
    });

    // PRICE RANGE
    let rangeMin = $('#range-min');
    let rangeMax = $('#range-max');
    let inputMin = $('#min-price');
    let inputMax = $('#max-price');

    rangeMin.on('input', function(){
        inputMin.val($(this).val());
        inputMin.trigger('change');
    });

    rangeMax.on('input', function(){
        inputMax.val($(this).val());
        inputMax.trigger('change');
    });

    inputMin.on('input', function(){
        rangeMin.val($(this).val());
    });

    inputMax.on('input', function(){
        rangeMax.val($(this).val());
    });

});
</script>


@endsection