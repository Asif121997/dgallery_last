@extends('layouts.app')
@section('header-links')

@endsection

@section('content')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">İstifadəçilər</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">İstifadəçilər</a></li>
                                        <li class="breadcrumb-item active">İstifadəçidə dəyişiklik et</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">İstifadəci dəyişikliyi</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('customers.update',['customer'=>$customer->id]) }}" method="POST" autocomplete="off">
                                            @csrf
                                            @method('PATCH')

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Ad</label>
                                                        <input type="text" class="form-control" placeholder="Ad" id="firstNameinput" name="name" value="{{$customer->name}}" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="lastname" class="form-label">Soyad</label>
                                                        <input type="text" class="form-control" placeholder="Soyad" id="lastname" name="lastname" value="{{$customer->lastname}}" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstEmailinput" class="form-label">E-poçt</label>
                                                        <input type="email" class="form-control" placeholder="E-poçt" id="firstEmailinput" name="email" value="{{$customer->email}}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Mobil</label>
                                                        <input type="text" class="form-control" placeholder="Mobil" id="phone" name="phone" value="{{$customer->phone}}" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstPasswordinput" class="form-label">Şifrə</label>
                                                        <input type="password" class="form-control" placeholder="Şifrə" id="firstPasswordinput" name="password" value="{{old('password')}}" autocomplete="new-password" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstPasswordConfirminput" class="form-label">Şifrəni təsdiqlə</label>
                                                        <input type="password" class="form-control" placeholder="Şifrəni təsdiqlə" id="firstPasswordConfirminput" name="password_confirmation" value="{{old('password_confirmation')}}" >
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="type" class="form-label">Satış dərəcəsi</label>
                                                        <select class="form-control" name="type">
                                                            <option value="0">Satış</option>
                                                            <option @if($customer->type == '1') selected @endif value="1">Topdan</option>
                                                            <option @if($customer->type == '2') selected @endif value="2">Diller</option>
                                                            <option @if($customer->type == '3') selected @endif value="3">Xüsusi</option>
                                                            <option @if($customer->type == '4') selected @endif value="4">Hamısı</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>

                                                

                                                
                                                
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Təsdiq et</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
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




