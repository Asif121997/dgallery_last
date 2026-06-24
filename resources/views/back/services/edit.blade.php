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
                                <h4 class="mb-sm-0">Services</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                        <li class="breadcrumb-item active">Service Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Blog Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('services.update',['service'=>$service->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($service->serviceTranslations  as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link  @if($k == 0)active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">
                                                                @if($translation->locale == 'az')
                                                                Azerbaijani
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
                                                        @foreach($service->serviceTranslations  as $k=>$translation)
                                                        <div class="tab-pane @if($k == 0)active @endif" id="{{$translation->locale}}" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="{{$translation->title}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Short Text({{$translation->locale}})</label>
                                                                        <textarea id="editor1{{$k}}" name="short_text[]">{!!$translation->short_text!!}</textarea>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Text({{$translation->locale}})</label>
                                                                        <textarea id="editor2{{$k}}" name="text[]">{!!$translation->text!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Title({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="page_title[]" value="{{$translation->page_title}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description({{$translation->locale}})</label>
                                                                        <textarea id="editor3{{$k}}" name="page_description[]">{!!$translation->page_description!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Keywords({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="page_keywords[]" value="{{$translation->page_keywords}}">
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
                                                            <label for="img" class="form-label">Image</label>
                                                            <img width="100" src="{{asset('storage/services/'.$service->img)}}">
                                                            <input type="hidden" name="old_img" value="{{$service->img}}">
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status" @if($service->status == 1) checked @endif>
                                                                <label class="form-check-label" for="SwitchCheck">Active</label>
                                                            </div>
                                                            
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
@section('pageJs')
<script>
    CKEDITOR.replace('editor10');
    CKEDITOR.replace('editor20');
    CKEDITOR.replace('editor30');

    CKEDITOR.replace('editor11');
    CKEDITOR.replace('editor21');
    CKEDITOR.replace('editor31');

    CKEDITOR.replace('editor12');
    CKEDITOR.replace('editor22');
    CKEDITOR.replace('editor32');
</script>
<script>
    
</script>
<script>
    
</script>
@endsection




