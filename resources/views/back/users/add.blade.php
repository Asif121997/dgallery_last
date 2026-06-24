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
                                <h4 class="mb-sm-0">Users</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                        <li class="breadcrumb-item active">User Create</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">User Create</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Name</label>
                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name" value="{{old('name')}}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstEmailinput" class="form-label">Email</label>
                                                        <input type="email" class="form-control" placeholder="Email" id="firstEmailinput" name="email" value="{{old('email')}}" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstPasswordinput" class="form-label">Passsword</label>
                                                        <input type="password" class="form-control" placeholder="Passsword" id="firstPasswordinput" name="password" value="{{old('password')}}" autocomplete="new-password" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="firstPasswordConfirminput" class="form-label">Password confirmation</label>
                                                        <input type="password" class="form-control" placeholder="Password confirmation" id="firstPasswordConfirminput" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                                                    </div>
                                                </div>

                                                <h3>Permissions</h3>
                                                @foreach ($permissions as $permission)
                                                <div class="col-md-4">
                                                    <div>
                                                        
                                                        <div class="form-check form-switch mb-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck{{ $permission->id }}" value="{{ $permission->name }}" name="permissions[]">
                                                            <label class="form-check-label" for="SwitchCheck{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
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




