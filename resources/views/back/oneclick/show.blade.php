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
                                <h4 class="mb-sm-0">Bir Kliklə al</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bir Kliklə al</a></li>
                                        
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
                                    <h4 class="card-title mb-0 flex-grow-1">Bir Kliklə al</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('oneClickOrders.update',['oneClickOrder'=>$order->id]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                               

                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Məhsul adı</th>
                                                            
                                                            <th>Nömrə</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        <tr>
                                                            <td><a href="{{route('product_inner_az',['slug'=>$order->product->first()->productTranslations->where('locale','az')->first()->slug])}}" target="_blank">{{$order->product->first()->productTranslations->where('locale','az')->first()->name}}</a></td>
                                                            
                                                            <td>{{$order->phone}}</td>
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




