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
                                <h4 class="mb-sm-0">Categories</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
                                        <li class="breadcrumb-item active">Category Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Category Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('categories.update',['category'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($category->categoryTranslations  as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($k == 0)active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">

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
                                                        @foreach($category->categoryTranslations  as $k=>$translation)
                                                        <div class="tab-pane @if($k == 0)active @endif" id="{{$translation->locale}}" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="{{$translation->name}}">
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Title({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title[]" value="{{$translation->title}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description({{$translation->locale}})</label>
                                                                        <textarea id="editor{{$k+1}}" name="description[]">{!!$translation->description!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="banner_text" class="form-label">Banner Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Banner Text" id="banner_text" name="banner_text[]" value="{{$translation->banner_text}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="banner_discount_text" class="form-label">Banner Discount Text({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Banner Discount Text" id="banner_discount_text" name="banner_discount_text[]" value="{{$translation->banner_discount_text}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Keywords({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="keywords[]" value="{{$translation->keywords}}">
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
                                                            <label for="img" class="form-label">Categories</label>
                                                            <select name="parent_id" class="form-control">
                                                                <option value="0">Seçin</option>
                                                              
                                                                
                                                                @foreach($categories as $cat)

                                                                <option @if($cat->id == $category->parent_id) selected @endif value="{{$cat->id}}">{{$cat->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                    @if($cat->children->count())
                                                            
                                                                        @foreach($cat->children as $child)
                                                                        <option @if($child->id == $category->parent_id) selected @endif value="{{$child->id}}">--{{$child->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                         @if($child->children->count())
                                                            
                                                                            @foreach($child->children as $chil)
                                                                            <option  @if($chil->id == $category->parent_id) selected @endif value="{{$chil->id}}">----{{$chil->categoryTranslations->where('locale','en')->first()->name}}</option>

                                                                            
                                                                                @if($chil->children->count())
                                                            
                                                                                    @foreach($chil->children as $chi)

                                                                                    <option  @if($chi->id == $category->parent_id) selected @endif value="{{$chi->id}}">------{{$chi->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                                        @if($chi->children->count())
                                                            
                                                                                            @foreach($chi->children as $ch)
                                                                                            <option  @if($ch->id == $category->parent_id) selected @endif value="{{$ch}}">--------{{$ch->categoryTranslations->where('locale','en')->first()->name}}</option>

                                                                                            @endforeach
                                                                                            
                                                                                        @endif
                                                                                    @endforeach
                                                                                    
                                                                                @endif
                                                                            @endforeach
                                                                            
                                                                        @endif
                                                                        @endforeach
                                                                       
                                                                        
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="row" class="form-label">Row</label>
                                                            
                                                            <select class="form-control" name="row">
                                                                
                                                                <option value="1">1</option>
                                                                <option @if($category->row == '2') selected @endif value="2">2</option>
                                                                <option @if($category->row == '3') selected @endif value="3">3</option>
                                                                
                                                            </select>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Image</label>
                                                            <img width="100" src="{{asset('storage/categories/'.$category->img)}}">
                                                            <input type="hidden" name="old_img" value="{{$category->img}}">
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Icon Image</label>
                                                            <img width="100" src="{{asset('storage/categories/'.$category->icon_image)}}">
                                                            <input type="hidden" name="old_icon_img" value="{{$category->icon_image}}">
                                                            <input type="file" class="form-control" id="img" name="icon_image" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input @if($category->status == 1) checked @endif class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status">
                                                                <label class="form-check-label" for="SwitchCheck">Active</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input @if($category->home == 1) checked @endif class="form-check-input" type="checkbox" role="switch" id="home"  name="home">
                                                                <label class="form-check-label" for="home">Home</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input @if($category->show_home == 1) checked @endif class="form-check-input" type="checkbox" role="switch" id="show_home"  name="show_home">
                                                                <label class="form-check-label" for="show_home">Show Products in Home</label>
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




