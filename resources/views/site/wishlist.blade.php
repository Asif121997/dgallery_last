@extends('layouts.design')
@section('content')
<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Sevimlilər</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Sevimlilər</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
		<!-- Wishlist Page -->
		<div class="wishlist-page">
			<div class="container">
				<div class="table-responsive">
				    @if(count($products))
					<table class="table cart-table cart_prdct_table text-center">
						<thead>
							<tr>
								<th class="cpt_no">#</th>
								<th class="cpt_img">Şəkil</th>
								<th class="cpt_pn">Ad</th>
								<th class="stock">Stok</th>
								<th class="cpt_p">Qiymət</th>
								<th class="add-cart">Səbətə əlavə et</th>
								<th class="cpt_r">Sil</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $k=>$product)
							
							<tr>
								<td><span class="cart-number">{{$k+ 1}}</span></td>
								<td><a href="javascript:void(0)" data-tip="Ətraflı bax" class="zoom-icon" data-id="{{$product->product->id}}">
								    <img src="{{asset('storage/products/'.$product->product->img)}}" alt="{{$product->product->productTranslations->where('locale','az')->first()->name}}" /></a></td>
								<td><a href="{{route('product_inner_az',['slug' => $product->product->productTranslations->where('locale','az')->first()->slug])}}" class="cart-pro-title">{{$product->product->productTranslations->where('locale','az')->first()->name}}</a></td>
								<td><p class="stock in-stock">
									@if($product->product->stock == 1)
									<p style="color:green;">Stokda var</p>
									@else
									<p style="color:red;">Stokda yoxdur</p>
									@endif
								</p></td>
								<td><p class="cart-pro-price">
									@if(!Auth::guard('customer')->check() or Auth::guard('customer')->user()->type == '0')
									
									@if($globalSettings->discount_check == 1)
									{{$product->product->wholesale_price}}
									
									@else
									₼ 
										@if($product->product->discount_price != '0.00')
										{{$product->product->discount_price}}
										@else
										{{$product->product->price}}
										@endif
									@endif
										

										
										@elseif(Auth::guard('customer')->user()->type == '1')
										₼ {{$product->product->wholesale_price}}
										@elseif(Auth::guard('customer')->user()->type == '2')
										₼ {{$product->product->diller_price}}
										@elseif(Auth::guard('customer')->user()->type == '3')
										₼ {{$product->product->special_price}}
										@elseif(Auth::guard('customer')->user()->type == '4')
										<div class="all-price">
											<div class="price-item">
												<label>Satış :  </label>
												@if($product->product->discount_price != '0.00')
												{{$product->product->discount_price}}
												@else
												{{$product->product->price}}
												@endif

												@if($product->product->discount_price != '0.00')
												<span>₼ {{$product->product->price}}</span>
												@endif
											</div>
											<div class="price-item">
												<label>Topdan :  </label>
												₼ {{$product->product->wholesale_price}}
											</div>

											<div class="price-item">
												<label>Diller :  </label>
												₼ {{$product->product->diller_price}}
											</div>
										</div>
										@endif
								</p></td>
								<td>
								    @if($product->product->stock == '1')
								    <a href="javascript:void(0)" class="btn border-btn addBasket" data-product="{{$product->product->id}}" data-color="{{$product->product->color_id}}">Səbətə əlavə et</a>
								    @endif
								</td>
								<td><a class="cp_remove removeWishlist" data-id="{{$product->id}}"><i class="fa fa-trash"></i></a></td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
					@else
				    <div style="color: white;background-color: #ff546e;width:100%;text-align:center;" class="alert alert-danger">
								        Sevimlilərdə məhsul yoxdur.
								    </div>	
					@endif
				</div>
			</div>
		</div>
@endsection

@section('mainJs')
<script>
	
	$('.removeWishlist').click(function(){
		var pr_id = $(this).data('id');
		var row = $(this).closest('tr'); // həmin sətiri götür


		$.ajax({
            url: '{{route("wishlist_remove")}}', // Laravel route
            method: 'POST',
            data: {
                pr_id: pr_id,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                updateWishlistCount();
                row.remove();



            },
            error: function (xhr) {
                
            }
        });
	})
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