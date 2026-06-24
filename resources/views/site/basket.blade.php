
@extends('layouts.layout')
@section('content')
<!-- Page Title -->
        <section class="flat-spacing-2 pb-0">
            <div class="container">
                <div class="page-title">
                    <div class="breadcrumbs">
                        <ul class="bread-wrap">
                            <li><a href="index.html" class="text-main-4 link">{{__('main.home')}}</a></li>
                            <li class="br-line w-12 bg-main"></li>
                            <li>{{__('main.cart')}}</li>
                        </ul>
                        <h1 class="heading fw-normal">
                            {{__('main.shoppingCart')}}
                        </h1>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Shop Cart -->
        <section class="flat-spacing s-shop-cart each-list-prd">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="left mb-xl-10">
                            <div class="table-shop-cart table-order-detail">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="order_product h6 fw-normal">{{__('main.product')}}</th>
                                            <th class="order_color h6 fw-normal">{{__('main.color')}}</th>
                                            <th class="order_size h6 fw-normal">{{__('main.size')}}</th>
                                            <th class="order_price h6 fw-normal">{{__('main.price')}}</th>
                                            <th class="order_quantity h6 fw-normal">{{__('main.quantity')}}</th>
                                            <th class="order_subtotal h6 fw-normal">{{__('main.subtotal')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($products as $product)
                                        <tr class="file-delete order_item each-prd">
                                            <td>
                                                <div class="order_product">
                                                    <a href="#" class="image">
                                                        <img src="{{asset('storage/products/'.$product->product->img)}}" alt="{{$product->product->productTranslations->where('locale',App::getLocale())->first()->name}}">
                                                    </a>
                                                    <div class="infor">
                                                        <a href="#" class="prd-name h6 fw-normal link">
                                                            {{$product->product->productTranslations->where('locale',App::getLocale())->first()->name}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>


                                            <td class="order_color each-color">
                                            	<div class="hover-tooltip color-btn style-image-square active-btn">
                                                    <span class="check-color">
                                                        <img src="{{asset('storage/materials/'.$product->color->img)}}" alt="">
                                                    </span>
                                                    
                                                </div>
                                            </td>
                                            <td class="order_size each-size">{{$product->size->name}}</td>
                                            <td class="order_price each-price">
                                            	@if($product->product->discount_price == '0.00')
                                            		${{$product->product->price}}
                                            	@else
                                            		${{$product->product->discount_price}}
                                            	@endif
                                            </td>
                                            <td>
                                                <div class="order_quantity">
                                                    <div class="wg-quantity style-2" data-product="{{$product->id}}">
                                                        <button class="btn-quantity minus-quantity"><i class="icon-minus"></i></button>
                                                        <input class="quantity-product" type="text" name="number" value="{{$product->count}}">
                                                        <button class="btn-quantity plus-quantity"><i class="icon-plus"></i></button>
                                                    </div>
                                                    <span class="remove tf-btn-line style-line-2 fw-normal" data-product="{{$product->id}}">{{__('main.remove')}}</span>
                                                </div>
                                            </td>
                                            <td class="order_subtotal each-subtotal-price"></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-8"></div>

                    <div class="col-xl-4">
                        <div class="right">
                            <div class="checkout-sidebar">
                                <form class="form-checkout-sidebar" action="{{route('checkout')}}">
                                    <div class="form-content">
                                        <h4 class="title-total">
                                            {{__('main.total')}}:
                                            <span class="each-total-price"></span>
                                        </h4>
                                        <p class="tax-text">
                                            
                                        </p>
                                        <span class="br-line"></span>
                                        <div class="checkbox-wrap">
                                            <input id="agree-term" type="checkbox" class="tf-check style-4" required>
                                            <label for="agree-term">{{__('main.aggreeText')}}</label>
                                        </div>
                                    </div>
                                    <button type="button" id="checkout-btn" class="tf-btn btn-fill fw-medium animate-btn w-100">
                                        {{__('main.aggreeText')}}
                                    </button>
                                </form>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Shop Cart -->
       

@endsection

@section('mainJs')
<script>
	function updateBasketCount() {
	    $.ajax({
	        url: "{{ route('basket_count') }}",
	        method: "GET",
	        success: function(response) {
	            // məsələn #basketCount id-li span-da göstərirsən
	            $('#basketCount').text(response.count);
	            updateMiniBasketCart();
	        }
	    });
	}


	function updateBasketPrice() {
	    $.ajax({
	        url: "{{ route('basket_total_price') }}",
	        method: "GET",
	        success: function(response) {
	            // məsələn #basketCount id-li span-da göstərirsən
	            $('#totalPrice').text('₼ '+response.total_price);
	        }
	    });
	}
	$('.cp_remove').click(function(){
		var pr_id = $(this).data('id');
		var row = $(this).closest('tr'); // həmin sətiri götür


		$.ajax({
            url: '{{route("basket_remove")}}', // Laravel route
            method: 'POST',
            data: {
                pr_id: pr_id,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                updateBasketCount();
                updateBasketPrice();
                updateBasketMCPrice();
                updateMiniBasketCart();
                row.remove();



            },
            error: function (xhr) {
                
            }
        });
	})
</script>
<script>
	$('.cp_quntty input').change(function(){

		var count = $(this).val();
		var pr_id = $(this).data('id');
		var row = $(this).closest('tr').find('.BasketProductTotalPrice .cpp_total');
		$.ajax({
            url: '{{route("basket_count_change")}}', // Laravel route
            method: 'POST',
            data: {
                pr_id: pr_id,
                count: count,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                row.text('₼ '+response.total_price);
                updateBasketPrice();



            },
            error: function (xhr) {
                
            }
        });
		
	})
</script>

<script>
	$(document).on('click', '.plus-quantity, .minus-quantity', function (e) {
    e.preventDefault();

    var wrapper = $(this).closest('.wg-quantity');
    var input   = wrapper.find('.quantity-product');
    var pr_id = wrapper.data('product');


    // Kiçik delay — əvvəl plugin input-u dəyişsin
    setTimeout(function () {
        var quantity = input.val();


        $.ajax({
            url: '{{route("basket_count_change")}}', // Laravel route
            method: 'POST',
            data: {
                pr_id: pr_id,
                count: quantity,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                
                



            },
            error: function (xhr) {
                
            }
        });

    }, 50);
});
$('.remove').click(function(){

     
		var pr_id = $(this).data('product');
		var row = $(this).closest('tr'); // həmin sətiri götür


		$.ajax({
            url: '{{route("basket_remove")}}', // Laravel route
            method: 'POST',
            data: {
                pr_id: pr_id,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                
                row.remove();



            },
            error: function (xhr) {
                
            }
        });
	     
            
})

</script>

@endsection