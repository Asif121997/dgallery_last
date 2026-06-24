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
                                <h4 class="mb-sm-0">Roles</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
                                        <li class="breadcrumb-item active">Role Create</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Role Create</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('roles.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="firstNameinput" class="form-label">Role name</label>
                                                        <input type="text" class="form-control" placeholder="Role name" id="firstNameinput" name="name" value="">
                                                    </div>
                                                </div>
                                                <h3>Permissions</h3>
                                                @foreach ($permissions as $permission)
                                                <div class="col-md-4">
                                                    <div>

                                                        <div class="form-check form-switch mb-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck{{ $permission->id }}" value="{{ $permission->id }}"   name="permissions[]">
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




