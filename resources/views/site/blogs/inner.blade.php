@extends('layouts.design')
@section('content')

	<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>{{$blog->blogTranslations->where('locale',App::getLocale())->first()->name}}</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><a href="{{route('blogs_'.App::getLocale())}}">Bloqlar</a></li>
							<li><span>{{$blog->blogTranslations->where('locale',App::getLocale())->first()->name}}</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
				
		<!-- Blog Details Page -->
		<div id="blog_page_area">
			<div class="container">
				<div class="row">					
					<div class="col-md-8 col-xs-12">
						<!-- Single blog -->
						<div class="single_blog">								
							<div class="single_blog_img">
								<img src="{{asset('storage/blogs/'.$blog->img)}}" alt="">
								<div class="blog_date text-center">
									<div class="bd_day"> {{date('d',strtotime($blog->created_at))}}</div>
									<div class="bd_month">{{date('M',strtotime($blog->created_at))}}</div>
								</div>
							</div>
						
							<div class="blog_content">
								<ul class="post-meta">
									<li><i class="ti-user"></i> <a href="#">{{$blog->user->name}}</a></li>									
									
									<li><i class="ti-eye"></i> <a href="#">{{$blog->show}} baxış</a></li>
								</ul>	
								<div class="blog_details">
									{!! $blog->blogTranslations->where('locale',App::getLocale())->first()->text !!}
								</div>							
							</div>							
						</div>		
						<!-- End Single blog -->
						
						<!-- Blog Comments -->
						
					</div>
				
					<!-- Blog Sidebar -->
					<div class="col-md-4 col-xs-12">							
						<div class="single_sidebar search_widget">
							<h3 class="sdbr_title">Axtar</h3>
							<div class="sdbr_inner">
								<form class="search_form" method="get" action="{{route('blogs_az')}}">
									<input type="text" class="form-control search_input" name="search" id="s" placeholder="Axtar ...">
									<button type="submit" class="search_button"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</div>

						<div class="single_sidebar category">
							<h3 class="sdbr_title">Kateqoriyalar</h3>
							<div class="sdbr_inner">
							<!-- treeview start -->
								<ul>
									@foreach($categories as $category)
									<li><a href="{{route('blogs_az',['category' => $category->name])}}">{{$category->name}}</a></li>
									@endforeach
									
								</ul>
							</div>
						</div>
						
						

						<div class="single_sidebar popular_post">
							<h3 class="sdbr_title">Yeni paylaşılanlar</h3>
							<div class="sdbr_inner">
								@foreach($lastBlogs as $lastBlog)
								<div class="single_popular_post fix">
									<a href="{{route('blog_inner_'.App::getLocale(),['slug'=>$lastBlog->blogTranslations->where('locale',App::getLocale())->first()->slug])}}" class="spp_img"><img src="{{asset('storage/blogs/'.$lastBlog->img)}}" alt="{{$lastBlog->blogTranslations->where('locale',App::getLocale())->first()->name}}" /></a>
									<div class="spp_text fix">
										<a href="{{route('blog_inner_'.App::getLocale(),['slug'=>$lastBlog->blogTranslations->where('locale',App::getLocale())->first()->slug])}}">{{$lastBlog->blogTranslations->where('locale',App::getLocale())->first()->name}}</a>
										<p>Paylaşdı : {{$blog->user->name}}</p>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>

						<div class="single_sidebar tags fix">
							<h3 class="sdbr_title">Teqlər</h3>
							<div class="sdbr_inner">
								@foreach($tags as $tag)
								<a href="{{route('blogs_az',['tag' => $tag->name])}}">{{$tag->name}}</a>
								@endforeach
								
							</div>
						</div>
											
						
					</div><!-- End Blog Sidebar -->
					
					
@if(count($products))
	<!-- Related Product Area -->
	<div class="related_prdct_area text-center">
		<div class="container">		
				<!-- Section Title -->
				<div class="rp_title text-center"><h3>Məhsullar</h3></div>
				
				<div class="row">

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
										
										<li><a  class="similaraddBasket" data-product="{{$product->id}}" data-color="{{$product->color_id}}" href="javascript:void(0)" data-tip="Səbətə əlavə et"><i class="ti-shopping-cart"></i></a></li>
										@endif
									</ul>
									<div class="product-badges">
										@if($product->sale == 1)
										<span class="product-new-label">Endirimdə</span>
										@endif

										@if($product->new == 1)
										<span class="product-new-label new-badge">Yeni</span>
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
												<label>Topdan : </label>
												₼ {{$product->wholesale_price}}
											</div>

											<div class="price-item">
												<label>Diller : </label>
												₼ {{$product->diller_price}}
											</div>
										</div>
										@endif
									
									
									</div>
									@if($product->stock == 1)
										<a class="add-to-cart stock-green" >Stokda var</a>
										@else
										<a class="add-to-cart stock-red">Stokda yoxdur</a>
										@endif
								</div>
							</div>
						</div>	
						@endforeach
						
						
					
					
								
			</div>
		</div>
	</div>
	@endif
					
				</div>					
			</div>
		</div>

@endsection

@section('mainJs')
@endsection