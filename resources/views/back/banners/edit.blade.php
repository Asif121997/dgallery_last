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
                                <h4 class="mb-sm-0">Banners</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Banners</a></li>
                                        <li class="breadcrumb-item active">Banner Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Banner Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('banners.update',['banner' => $banner->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($banner->bannerTranslations  as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link  @if($k == 0)active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">

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
                                                        @foreach($banner->bannerTranslations  as $key=>$translation)
                                                        <div class="tab-pane @if($key == 0)active @endif" id="{{$translation->locale}}" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="{{$translation->name}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="special_title" class="form-label">Special Title({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Special Title" id="special_title" name="special_title[]" value="{{$translation->special_title}}">
                                                                    </div>
                                                                </div>

                                                                

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Text({{$translation->locale}})</label>
                                                                        <textarea id="editor{{$key + 1}}" name="text[]">{!!$translation->text!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="button_text" class="form-label">Button Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Button Text" id="button_text" name="btn_text[]" value="{{$translation->btn_text}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="button_text" class="form-label">Button Link({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Button Link" id="button_text" name="btn_link[]" value="{{$translation->btn_link}}">
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
                                                            <img width="100" src="{{asset('storage/banners/'.$banner->img)}}">

                                                            <input type="hidden" name="old_img" value="{{$banner->img}}">

                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>



                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Row</label>
                                                            <select class="form-control" name="row">
                                                                <option value="1">1</option>
                                                                <option @if($banner->row == '2') selected @endif value="2">2</option>
                                                                <option @if($banner->row == '3') selected @endif value="3">3</option>
                                                            </select>
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
    CKEDITOR.replace('editor1');
</script>
<script>
    CKEDITOR.replace('editor2');
</script>
<script>
    CKEDITOR.replace('editor3');
</script>
@endsection




