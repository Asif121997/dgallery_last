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
                                <h4 class="mb-sm-0">Colors</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Colors</a></li>
                                        <li class="breadcrumb-item active">Color Create</li>
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

                                        <form action="{{ route('colors.update',['color' => $color->id]) }}" method="POST" enctype="multipart/form-data">

                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">

                                                        @foreach($color->colorTranslations as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($k == 0) active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">

                                                                @if($translation->locale == 'ar')
                                                                    Arabic

                                                                @elseif($translation->locale == 'en')
                                                                    English
                                                                @elseif($translation->locale == 'ru')
                                                                    Russian
                                                                @endif
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                    <div class="tab-content text-muted">

                                                        @foreach($color->colorTranslations as $k=>$translation)
                                                        <div class="tab-pane @if($k == 0) active @endif" id="{{$translation->locale}}" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="{{$translation->name}}">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="locale[]" value="{{$translation->locale}}">
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="firstNameinput" class="form-label">Color Code</label>
                                                            <input type="color" class="form-control"  id="firstNameinput" name="color_code" value="{{$color->color_code}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Img</label>
                                                            <img width="20" src="{{asset('storage/colors/'.$color->img)}}">
                                                            <input type="file" class="form-control"  id="img" name="img">
                                                            <input type="hidden" name="old_img" value="{{$color->img}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                


                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
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




