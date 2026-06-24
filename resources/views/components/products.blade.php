@if(count($products))
						@foreach($products as $product)	
						
						
						<div class="col-lg-4 col-md-4 col-sm-6">
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
										<span class="product-new-label new-badge">YENİ MƏHSUL</span>
										@endif
										@if($product->sale == 1)
										<span class="product-new-label">Endirimdə</span>
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
												₼ {{$product->wholesale_price}}
										

										
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
								        Hal-hazırda bu kateqoriyalara uyğun məhsul yoxdur.
								    </div>
				
				@endif
				<div class="col-lg-12">
					<div class="blog_pagination pgntn_mrgntp fix">
						@if ($products instanceof \Illuminate\Pagination\LengthAwarePaginator || $products instanceof \Illuminate\Pagination\Paginator)
    {{ $products->links() }}
@endif
					</div>
				</div>