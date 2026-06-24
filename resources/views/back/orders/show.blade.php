@extends('layouts.app')
@section('header-links')
<style>
    table{
            width: 80%!important;
    margin: 0 auto;
    margin-top: 50px;
    border: 1px solid grey;
    border-collapse: collapse;
    margin-top:50px!important;
    }

    table , th, td{
            
    border: 1px solid grey;
    }
    th,td{
        text-align: center;
        padding:5px;
    }
</style>
@endsection

@section('content')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Order</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                                        
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show mb-3" role="alert">
                                <i class="ri-error-warning-line label-icon"></i><strong>{{ session('error') }}</strong>
                                - {{ session('text') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Color Create</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('orders.update',['order'=>$order->id]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-labe">Order ID</label>
                                                    <input class="form-control" type="text" value="#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}" disabled>
                                                </div>
                                                <div class="form-group col-md-6">
                                                   
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-labe">Ad</label>
                                                    <input class="form-control" type="text" value="{{$order->name}}" disabled>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-labe">Soyad</label>
                                                    <input class="form-control" type="text" value="{{$order->lastname}}" disabled>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-labe">Email</label>
                                                    <input class="form-control" type="text" value="{{$order->email}}" disabled>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-labe">Telefon</label>
                                                    <input class="form-control" type="text" value="{{$order->phone}}" disabled>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-labe">Şəhər</label>
                                                    <input class="form-control" type="text" value="{{$order->city}}" disabled>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="form-labe">Ünvan</label>
                                                    <input class="form-control" type="text" value="{{$order->address}}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-labe">Ünvan</label>
                                                    <textarea class="form-control" disabled>{{$order->note}}</textarea>
                                                </div>

                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Məhsul adı</th>
                                                            <th>Məhsul endirimi</th>
                                                            <th>Məhsul rəngi</th>
                                                            <th>Məhsul qiyməti</th>
                                                            <th>Məhsul sayı</th>
                                                            <th>Məhsulun ümumi qiyməti</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $total = 0; @endphp
                                                        @foreach(json_decode($order->orders) as $k=>$product)
                                                        @php 
                                                            $rowTotal = $product->product_count * $product->product_price;
                                                            $total += $rowTotal;
                                                        @endphp
                                                        <tr>
                                                            <td>{{$product->product_name}}</td>
                                                            <td>{{$product->discount}}</td>
                                                            <td>{{$product->product_color}}</td>
                                                            <td>{{$product->product_price}}</td>
                                                            <td>{{$product->product_count}}</td>
                                                            <td>{{number_format($product->product_count * $product->product_price,2)}}</td>
                                                        </tr>
                                                        @endforeach
                                                        <!-- Toplam üçün ayrıca sətir -->
                                                        <tr style="font-weight: bold; background-color: #f1f1f1;">
                                                            <td colspan="5" style="text-align: right;">Cəmi:</td>
                                                            <td>{{ number_format($total, 2) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                                <div class="form-group">
                                                    <label class="form-labe">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="0">Gözləyir</option>
                                                        <option value="1" @if($order->status == 1) selected @endif>Hazırlanır</option>
                                                        <option value="2" @if($order->status == 2) selected @endif>Yoldadır</option>
                                                        <option value="3" @if($order->status == 3) selected @endif>Təhvil verildi</option>
                                                        <option value="4" @if($order->status == 4) selected @endif>İmtina edildi</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <button style="margin-top:25px;float: right;" class="btn btn-primary">Təsdiqlə</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>
                    <!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            
        
@endsection




