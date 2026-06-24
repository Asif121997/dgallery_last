@extends('layouts.design')
@section('header-links')
  <style>
  
    .sidebar {
      background: transparent;
      color: #242424;
      border-radius: 20px;
      padding: 20px;
    }
    .sidebar a {
      color: #242424;
      text-decoration: none;
      display: block;
      padding: 10px 15px;
      border-radius: 10px;
      transition: all 0.3s ease;
      margin-bottom: 10px;
    }
    .sidebar a:hover,
    .sidebar a.active {
      background: #f1f1f1;
    }
    .order-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      padding: 20px;
      border-radius: 20px;
      margin-bottom: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .order-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(255, 84, 110, 0.25);
    }
    .order-status {
      padding: 5px 12px;
      background: linear-gradient(90deg,#ff546e,#ff7f96);
      color: white;
      border-radius: 50px;
      font-size: 12px;
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0%, 100% { box-shadow: 0 0 0 0 rgba(255, 84, 110, 0.5); }
      50% { box-shadow: 0 0 0 10px rgba(255, 84, 110, 0); }
    }
    .order-products {
      display: none;
      margin-top: 15px;
    }
    .order-product {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(255, 255, 255, 0.6);
      padding: 10px;
      margin-bottom: 8px;
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
    }
    .order-product img {
      width: 50px;
      height: 50px;
      border-radius: 10px;
      object-fit: cover;
    }
    .order-cancel{
            width: 35px;
    height: 35px;
    display: flex;
    border: 2px solid #ff546e;
    text-align: center;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color: #ff546e;
    margin-left: 10px;
    }
  </style>
@endsection
@section('content')
 <div class="container my-4">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-lg-3 mb-4">
      <div class="sidebar">
        <h4 class="mb-4">Mənim hesabım</h4>
        <a href="{{route('information')}}"><i class="fa fa-user"></i> Şəxsi məlumatlar</a>
        <a href="{{route('panel')}}" class="active"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Sifarişlər</a>
        <a href="{{route('passwordEdit')}}"><i class="fa fa-lock"></i> Şifrəni yenilə</a>
        <a href="{{route('customer_logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıxış</a>
      </div>
    </div>

    <!-- Content -->
    <div class="col-lg-9">
      <h1 class="mb-4">Sifarişlərim</h1>
      @foreach($orders as $order)
      <div class="order-card">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="fw-bold fs-5">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</div>
            <div class="text-muted">{{date('d.m.Y',strtotime($order->created_at))}}</div>
          </div>
          <div style="display:flex;">
            
             @php $total = 0; @endphp

             @foreach(json_decode($order->orders) as $k=>$product)
                                                        @php 
                                                            $rowTotal = $product->product_count * $product->product_price;
                                                            $total += $rowTotal;
                                                        @endphp

                                                        @endforeach
            
            <span style="margin-right:10px;" class="fw-bold ms-3">{{$total}} ₼</span>
            
            <span >
              @if($order->status == 0)
                                                            <span style="background: #ffe700;color: white;" class="order-status">Gözləyir</span>
                                                            @elseif($order->status == 1)
                                                            <span style="background: #cece20;color: white;" class="order-status">Hazırlanır</span>
                                                            @elseif($order->status == 2)
                                                            <span style="background: orange;color: white;" class="order-status">Yoldadır</span>
                                                            @elseif($order->status == 3)
                                                            <span style="background: green;color: white;" class="order-status">Təhvil verildi</span>
                                                            @elseif($order->status == 4)
                                                            <span style="background: red;color: white;" class="order-status">İmtina edildi</span>
                                                            @endif
        </span>
        <!--<a href="" class="order-cancel"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
          </div>
        </div>
        <div class="order-products">
          @foreach(json_decode($order->orders) as $orderProduct)
          <div class="order-product">
            <div class="d-flex align-items-center gap-2">
              @if(isset($orderProduct->product_img) and $orderProduct->product_img != null)
              <img src="{{asset('storage/products/'.$orderProduct->product_img)}}">
              @endif
              <span>{{$orderProduct->product_name}}</span>
            </div>
            <span>{{$orderProduct->product_count}} ədəd x {{$orderProduct->product_price}} ₼</span>
          </div>
          @endforeach
          
        </div>
      </div>
      @endforeach

      

    </div>
  </div>
</div>
@endsection

@section('mainJs')
<script>
  $(document).ready(function(){
    $(".order-card").click(function(){
      $(this).find(".order-products").slideToggle();
      $(this).siblings().find(".order-products").slideUp();
    });
  });
</script>
@endsection