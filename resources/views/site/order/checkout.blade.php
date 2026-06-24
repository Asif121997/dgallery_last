
@extends('layouts.layout')
@section('content')
<!-- Page Title -->
        <section class="flat-spacing-2 pb-0">
            <div class="container">
                <div class="page-title">
                    <div class="breadcrumbs">
                        <ul class="bread-wrap">
                            <li><a href="{{route('homepage')}}" class="text-main-4 link-secondary">{{__('main.home')}}</a></li>
                            <li class="br-line w-12 bg-main"></li>
                            <li>{{__('main.cart')}}</li>
                        </ul>
                        <h1 class="heading fw-normal text-uppercase">
                            {{__('main.checkout')}}
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Page Title -->
        <!-- Checkout -->
        <section class="flat-spacing">
            <div class="container">
                <div class="s-checkout flex-xl-nowrap">
                    <div class="left-col">
                        <div class="s-wrap">
                            <form class="form-checkout-cart-main style-border">
                                <div class="box-ip-checkout">
                                    <h4 class="checkout-title">{{__('main.delivery')}}</h4>
                                    <div class="form-content-2">
                                        <div class="cols tf-grid-layout sm-col-2">
                                            <fieldset class="tf-field-2">
                                                <input class="tf-input" type="text" value="Vincent" placeholder="">
                                                <label class="tf-lable">{{__('main.first_name')}}</label>
                                            </fieldset>
                                            <fieldset class="tf-field-2">
                                                <input class="tf-input" type="text" placeholder="">
                                                <label class="tf-lable">{{__('main.last_name')}}</label>
                                            </fieldset>
                                        </div>
                                        <fieldset class="tf-field-2">
                                            <input class="tf-input" type="text" placeholder="">
                                            <label class="tf-lable">{{__('main.country')}}</label>
                                        </fieldset>
                                        <fieldset class="tf-field-2">
                                            <input class="tf-input" type="text" placeholder="">
                                            <label class="tf-lable">{{__('main.address')}}</label>
                                        </fieldset>
                                        
                                        
                                        <fieldset class="tf-field-2">
                                            <input class="tf-input" type="number" placeholder="">
                                            <label class="tf-lable">{{__('main.phone')}}</label>
                                        </fieldset>
                                    </div>
                                </div>
                                
                                
                                
                            </form>
                        </div>
                    </div>
                    <div class="right-col sticky-top">
                        <div class="tf-page-cart-sidebar">
                            <h4 class="checkout-title">YOUR CART</h4>
                            <ul class="list-order-product">
                            	@foreach($products as $product)
                                <li class="order-item">
                                    <div class="content">
                                        <div class="img-product">
                                            <img src="{{asset('storage/products/'.$product->product->img)}}" alt="{{$product->product->productTranslations->where('locale',App::getLocale())->first()->name}}" class="prd">
                                            <span class="text-caption quantity">{{$product->count}}</span>
                                        </div>
                                        <div class="info">
                                            <p class="name">{{$product->product->productTranslations->where('locale',App::getLocale())->first()->name}}
                                            </p>
                                            <span class="variant">{{$product->color->colorTranslations->where('locale',App::getLocale())->first()->name}}</span>
                                        </div>
                                    </div>
                                    <h6 class="price">@if($product->product->discount_price == '0.00')
                                            		${{$product->product->price}}
                                            	@else
                                            		${{$product->product->discount_price}}
                                            	@endif</h6>
                                </li>
                                @endforeach
                                
                            </ul>
                            <span class="br-line"></span>
                            <ul class="list-total">
                                <li class="total-item">
                                    <span>{{__('main.subtotal')}}:</span>
                                    <span>
                                    	@php $total = 0; @endphp

								@foreach($products as $product)
								    
									@if($product->product->discount_price != '0.00')
								    @php $total += $product->product->discount_price * $product->count; @endphp

								    @else
								    @php $total += $product->product->price * $product->count; @endphp
								    @endif
								@endforeach
								 ${{number_format($total,2)}} 
                                    </span>
                                </li>
                                
                            </ul>
                            <span class="br-line"></span>
                            <h4 class="last-total d-flex justify-content-between">
                                <span>{{__('main.subtotal')}}:</span>
                                <span class="total-price-order">${{number_format($total,2)}}  USD</span>
                            </h4>
                            <a href="thank-you.html" class="tf-btn btn-fill fw-medium animate-btn w-100">
                                {{__('main.placeorder')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Checkout -->

@endsection

@section('mainJs')
<script>
    $(window).load(function()
{
   var phones = [{ "mask": "+\\9\\94(##)###-##-##"}, { "mask": "+994(##)###-##-##"}];
    $('#phone').inputmask({ 
        mask: phones, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
});
</script>
@endsection