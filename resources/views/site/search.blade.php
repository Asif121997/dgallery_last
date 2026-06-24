@extends('layouts.design')
@section('header-links')
<style>
    .childcat{
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    padding: 2% 11%;
    border-radius: 5px;
    margin-bottom: 25px;
    text-align: center;
    /* min-height: 250px; */
    align-items: center;
    display: flex
;
    flex-direction: row;
    }
    .childcat .catImage{
    margin-right: 18px;
    }
    .childcat .catImage img{
            max-width: 70px;
    }
    .childCategories .row{
        
    justify-content: center;
    }
</style>
@endsection
@section('content')

		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Axtarış</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>

							
							<li><span>{{$search}}</span></li>
						</ul>					
					</div>	

				</div>
			</div>
		</div>
		
		
		   
			@if(count($categoryList))
		<section class="childCategories">
		    <div class="container">
		        <div class="row">
		            @foreach($categoryList as $children)
		            <div class="col-md-4">
		                <a href="{{route('category-products',['slug' => $children->categoryTranslations->where('locale','az')->first()->slug])}}">
		                    <div class="childcat">
    		                    <div class="catImage">
    		                        @if(!empty($children->icon_image))
    		                        <img src="{{asset('storage/categories/'.$children->icon_image)}}">
    		                        @endif
    		                    </div>
    		                    <h4>{{$children->categoryTranslations->where('locale','az')->first()->name}}</h4>
    		                </div>
		                </a>
		            </div>
		            @endforeach
		        </div>
		    </div>
		</section>
		@endif
		
		
			
		
		
		<!-- Shop Product Area -->
		<div class="shop_page_area">
			<div class="container">
				<div class="shop_bar_tp fix">
						<div class="row">
						<div class="col-sm-3 col-xs-12 short_by_area">
							<div class="short_by_inner">
    <label>Çeşidlə:</label>
    <select class="sort-select">
        
        <option value="">Seçin</option>
        <option value="cheap" {{ request('sort') == 'cheap' || !request()->has('sort') ? 'selected' : '' }}>Əvvəlcə ucuz</option>
        <option value="expensive" {{ request('sort') == 'expensive' ? 'selected' : '' }}>Əvvəlcə bahalı</option>
         <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Populyar</option>
        <option value="sale" {{ request('sort') == 'sale' ? 'selected' : '' }}>Endirimdə</option>
        <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Yeni gələnlər</option>
    </select>
</div>
						</div>
						
							<div class="col-sm-4 col-xs-12 short_by_area">
							<div class="short_by_inner">
    <label>Anbar:</label>
    <select class="stock-select">
        
         <option value="stockAll" {{ request('stock') == 'stockAll' ? 'selected' : '' }}>Hamısı</option>
         <option value="inStock" {{ request('stock') == 'inStock' ? 'selected' : '' }}>Stokda var</option>
        <option value="outStock" {{ request('stock') == 'outStock' ? 'selected' : '' }}>Məhsul bitib</option>
        
    </select>
</div>
						</div>

						<div class="col-sm-5 col-xs-12 show_area">
							<div class="show_inner">
								<label>Say:</label>
								<select class="show-select sort-count-select">
									<option value="12" {{ request('count') == 12 || !request('count') ? 'selected' : '' }}>12</option>
									<option value="16" {{ request('count') == 16 ? 'selected' : '' }}>16</option>
									<option value="20" {{ request('count') == 20 ? 'selected' : '' }} >20</option>
									<option value="all" {{ request('count') == 'all' ? 'selected' : '' }}>Hamısı</option>
								</select>
							</div>
						</div>
					</div>
				</div>	
					
				<div class="shop_details text-center">
					<div class="row">	
					@if(count($products))
						@foreach($products as $product)	
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="product-grid">
								<div class="product-image">
									<a href="{{route('product_inner_'.App::getLocale(),['slug'=>$product->productTranslations->where('locale',App::getLocale())->first()->slug])}}">
										<img class="pic-1" src="{{asset('storage/products/'.$product->img)}}"  alt="{{$product->productTranslations->where('locale',App::getLocale())->first()->name}}">
										<img class="pic-2" src="{{asset('storage/products/'.$product->img)}}"  alt="{{$product->productTranslations->where('locale',App::getLocale())->first()->name}}">
									</a>
									<ul class="social">
										<li><a href="javascript:void(0)" data-tip="Qısa məlumat" class="zoom-icon" data-id="{{$product->id}}"><i class="ti-zoom-in"></i></a></li>
										<li>
											<a href="javascript:void(0)" data-id="{{$product->id}}" class="addWishlist" data-tip="Sevimlilərə əlavə et">
												@if(in_array($product->id,$checkWishlist))
												<i class="fa fa-heart"></i>
												@else
												<i class="fa fa-heart-o"></i>
												@endif
											</a>
										</li>
										@if($product->stock == 1)
										
										<li><a class="addBasket" href="javascript:void(0)" data-product="{{$product->id}}" data-color="{{$product->color_id}}" data-tip="Səbətə əlavə et"><i class="ti-shopping-cart "></i></a></li>
										@endif
									</ul>
									<div class="product-badges">
									    	@if($product->new == 1)
										<span class="product-new-label new-badge">Yeni məhsul</span>
										@endif
										@if($product->sale == 1)
										<span class="product-new-label">Endrimdə</span>
										@endif
										
										@if($product->percent != 0)
										<span class="product-new-label">-{{$product->percent}}%</span>
										@endif
										
										@if($product->two_hand != 0)
										<span style="background:#e00022;" class="product-new-label">İkİncİ əl</span>
										@endif
										
										@if($product->limited != 0)
										<span style="background:#ff9133;" class="product-new-label">Məhdud sayda</span>
										@endif

									
									</div>
								</div>
								<ul class="rating">
									<li class="fa fa-star"></li>
									@if($product->review >= 2)
									<li class="fa fa-star"></li>
									@endif
									@if($product->review >= 3)
									<li class="fa fa-star"></li>
									@endif
									@if($product->review >= 4)
									<li class="fa fa-star"></li>
									@endif
									@if($product->review >= 5)
									<li class="fa fa-star"></li>
									@endif
									
								</ul>
								<div class="product-content">
									<h3 class="title"><a href="{{route('product_inner_'.App::getLocale(),['slug'=>$product->productTranslations->where('locale',App::getLocale())->first()->slug])}}">{{$product->productTranslations->where('locale',App::getLocale())->first()->name}}</a></h3>
									<div class="price">
										
										@if(!Auth::guard('customer')->check() or Auth::guard('customer')->user()->type == '0')
										
										@if($globalSettings->discount_check == 1)
										    ₼  {{$product->wholesale_price}}
                                            
                                                <span>₼ {{$product->price}}</span>
                                            
										@else
                                            ₼ 
                                            @if($product->discount_price != '0.00')
                                                {{$product->discount_price}}
                                            @else
                                                {{$product->price}}
                                            @endif
                                            
                                            @if($product->discount_price != '0.00')
                                                <span>₼ {{$product->price}}</span>
                                            @endif
										@endif
										
										@elseif(Auth::guard('customer')->user()->type == '1')
										₼ {{$product->wholesale_price}}
										@elseif(Auth::guard('customer')->user()->type == '2')
										₼ {{$product->diller_price}}
										@elseif(Auth::guard('customer')->user()->type == '3')
										₼ {{$product->special_price}}
										@elseif(Auth::guard('customer')->user()->type == '4')
										<div class="all-price">
											<div class="price-item">
												<label>Satış :  </label>
												@if($product->discount_price != '0.00')
												{{$product->discount_price}}
												@else
												{{$product->price}}
												@endif

												@if($product->discount_price != '0.00')
												<span>₼ {{$product->price}}</span>
												@endif
											</div>
											<div class="price-item">
												<label>Topdan :  </label>
												₼ {{$product->wholesale_price}}
											</div>

											<div class="price-item">
												<label>Diller :  </label>
												₼ {{$product->diller_price}}
											</div>
										</div>
										@endif
									
									
									</div>
									@if($product->stock == 1)
										<a class="add-to-cart stock-green">Stokda var</a>
										@else
										<a class="add-to-cart stock-red">Məhsul bitib</a>
										@endif
								</div>
							</div>
						</div><!-- End Col -->	
						@endforeach
				    @else
				    <div style="color: white;background-color: #ff546e;width:100%;text-align:center;" class="alert alert-danger">
								        Axtarışa uyğun məhsul tapılmadı
								    </div>
				    @endif
												
													
					</div>
				</div>
					
				<!-- Blog Pagination -->
				<div class="col-xs-12">
					<div class="blog_pagination pgntn_mrgntp fix">
						{{$products->links()}}
					</div>
				</div>	
			</div>
		</div>

@endsection

@section('mainJs')

<script>
    document.querySelector('.sort-select').addEventListener('change', function() {
        let sort = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('sort', sort); // url-ə sort parametri əlavə edir
        window.location.href = url.toString(); // yönləndirir
    });
    
      document.querySelector('.stock-select').addEventListener('change', function() {
        let sort = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('stock', sort); // url-ə sort parametri əlavə edir
        window.location.href = url.toString(); // yönləndirir
    });

    document.querySelector('.sort-count-select').addEventListener('change', function() {
        let sort = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('count', sort); // url-ə sort parametri əlavə edir
        window.location.href = url.toString(); // yönləndirir
    });
</script>

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
					updateMiniBasketCart();
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
@endsection