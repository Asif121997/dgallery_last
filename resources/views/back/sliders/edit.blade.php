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
                                <h4 class="mb-sm-0">Sliders</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sliders</a></li>
                                        <li class="breadcrumb-item active">Slider Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Slider Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('sliders.update',['slider' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($slider->sliderTranslations  as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($k == 0)active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">

                                                                @if($translation->locale == 'en')
                                                                English
                                                                @elseif($translation->locale == 'ru')
                                                                Russian
                                                                @elseif($translation->locale == 'ar')
                                                                Arabic

                                                                @endif
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                    <div class="tab-content text-muted">
                                                        @foreach($slider->sliderTranslations  as $k=>$translation)
                                                        <div class="tab-pane  @if($k == 0)active @endif" id="{{$translation->locale}}" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Title({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="title[]" value="{{$translation->title}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description({{$translation->locale}})</label>
                                                                        <textarea id="editor{{$k + 1}}" name="description[]">{!!$translation->description!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Alert Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Alert Text" id="title" name="alert_text[]" value="{{$translation->alert_text}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">First Button Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="First Button Text" id="title" name="first_btn_text[]" value="{{$translation->first_btn_text}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">First Button Link({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="First Button Link" id="title" name="first_btn_link[]" value="{{$translation->first_btn_link}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Last Button Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Last Button Text" id="title" name="last_btn_text[]" value="{{$translation->last_btn_text}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Last Button Link({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Last Button Link" id="title" name="last_btn_link[]" value="{{$translation->last_btn_link}}">
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
                                                            <img width="100" src="{{asset('storage/sliders/'.$slider->img)}}">
                                                            <input type="hidden" name="old_img" value="{{$slider->img}}">
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="image_2" class="form-label">Image 2</label>
                                                            <img width="100" src="{{asset('storage/sliders/'.$slider->image_2)}}">
                                                            <input type="hidden" name="old_image_2" value="{{$slider->image_2}}">
                                                            <input type="file" class="form-control" id="image_2" name="image_2" value="">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status" @if($slider->status == 1) checked @endif>
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
    CKEDITOR.replace('editor1');
</script>
<script>
    CKEDITOR.replace('editor2');
</script>
<script>
    CKEDITOR.replace('editor3');
</script>
@endsection




