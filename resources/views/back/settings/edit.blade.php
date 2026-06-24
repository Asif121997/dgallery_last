@extends('layouts.app')
@section('content')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Settings</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                                        <li class="breadcrumb-item active">Setting Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Setting Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('settings.update',['setting'=>$setting->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($setting->settingsTranslations  as $k=>$translation)
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
                                                        @foreach($setting->settingsTranslations  as $k=>$translation)
                                                        <div class="tab-pane @if($k == 0)active @endif" id="{{$translation->locale}}" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="site_title" class="form-label">Site title({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="site_title" name="site_title[]" value="{{$translation->site_title}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="site_desc" class="form-label">Site Description({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="site_desc" name="site_desc[]" value="{{$translation->site_desc}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="site_keywords" class="form-label">Site Keywords({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="site_keywords" name="site_keywords[]" value="{{$translation->site_keywords}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="slogan" class="form-label">Slogan({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="slogan" name="slogan[]" value="{{$translation->slogan}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="copyrights" class="form-label">Copyrights({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="copyrights" name="copyrights[]" value="{{$translation->copyrights}}">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="contact_text" class="form-label">Contact Page Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="contact_text" name="contact_text[]" value="{{$translation->contact_text}}">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="footer_text" class="form-label">Footer Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="footer_text" name="footer_text[]" value="{{$translation->footer_text}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="address" class="form-label">Address({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="" id="address" name="address[]" value="{{$translation->address}}">
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
                                                            <label for="logo_light" class="form-label">Logo</label>
                                                            <img width="100" src="{{asset('storage/logo/'.$setting->logo_light)}}">
                                                            <input type="hidden" name="old_logo_light" value="{{$setting->logo_light}}">
                                                            <input type="file" class="form-control" id="logo_light" name="logo" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="section_img" class="form-label">Section Image</label>
                                                            <img width="100" src="{{asset('storage/logo/'.$setting->img)}}">
                                                            <input type="hidden" name="old_section_img" value="{{$setting->img}}">
                                                            <input type="file" class="form-control" id="section_img" name="section_img" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" placeholder="" id="phone" name="phone" value="{{$setting->phone}}">
                                                        </div>
                                                    </div>

                                                   

                                                    

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="text" class="form-control" placeholder="" id="email" name="email" value="{{$setting->email}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="whatsapp" class="form-label">Whatsapp</label>
                                                            <input type="text" class="form-control" placeholder="" id="whatsapp" name="whatsapp" value="{{$setting->whatsapp}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="facebook" class="form-label">Facebook</label>
                                                            <input type="text" class="form-control" placeholder="" id="facebook" name="facebook" value="{{$setting->facebook}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="instagram" class="form-label">Instagram</label>
                                                            <input type="text" class="form-control" placeholder="" id="instagram" name="instagram" value="{{$setting->instagram}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="twitter" class="form-label">X</label>
                                                            <input type="text" class="form-control" placeholder="" id="twitter" name="twitter" value="{{$setting->twitter}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="youtube" class="form-label">Youtube</label>
                                                            <input type="text" class="form-control" placeholder="" id="youtube" name="youtube" value="{{$setting->youtube}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="tiktok" class="form-label">Tiktok</label>
                                                            <input type="text" class="form-control" placeholder="" id="tiktok" name="tiktok" value="{{$setting->tiktok}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="map" class="form-label">Map</label>
                                                            <input type="text" class="form-control" placeholder="" id="map" name="map" value="{{$setting->map}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="valyuta" class="form-label">Valyuta(Dollar)</label>
                                                            <input type="text" class="form-control" placeholder="" id="valyuta" name="valyuta" value="{{$setting->valyuta}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="valyuta_eur" class="form-label">Valyuta(Euro)</label>
                                                            <input type="text" class="form-control" placeholder="" id="valyuta_eur" name="valyuta_eur" value="{{$setting->valyuta_eur}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="discount_check" @if($setting->discount_check == 1) checked @endif>
                                                                <label class="form-check-label" for="SwitchCheck">Endirim</label>
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

@section('pageJs')
@endsection
