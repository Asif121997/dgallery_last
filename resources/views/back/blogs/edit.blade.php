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
                                <h4 class="mb-sm-0">Blogs</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Blogs</a></li>
                                        <li class="breadcrumb-item active">Blog Edit</li>
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
                                        <form action="{{ route('blogs.update',['blog'=>$blog->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($blog->blogTranslations  as $k=>$translation)
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
                                                        @foreach($blog->blogTranslations  as $k=>$translation)
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
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title[]" value="{{$translation->title}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description({{$translation->locale}})</label>
                                                                        <textarea id="editor3{{$k}}" name="description[]">{!!$translation->description!!}</textarea>
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
                                                            <label for="img" class="form-label">Product Categories</label>
                                                            <select name="product_category_id" class="form-control" >
                                                                <option value="0">Seçin</option>
                                                                @foreach($productCategories as $cat)
                                                                <option @if($cat->id == $blog->product_category_id) selected @endif value="{{$cat->id}}">{{$cat->categoryTranslations->where('locale','az')->first()->name}}</option>

                                                                @if($cat->children->count())
                                                                    @foreach($cat->children as $child)
                                                                        <option @if($child->id == $blog->product_category_id) selected @endif value="{{$child->id}}"> --- {{$child->categoryTranslations->where('locale','az')->first()->name}}</option>
                                                                        
                                                                        @if($child->children->count())
                                                                            @foreach($child->children as $chil)
                                                                                <option @if($chil->id == $blog->product_category_id) selected @endif value="{{$chil->id}}"> ------ {{$chil->categoryTranslations->where('locale','az')->first()->name}}</option>
                                                                                    @if($chil->children->count())
                                                                                        @foreach($chil->children as $chi)
                                                                                            <option @if($chi->id == $blog->product_category_id) selected @endif value="{{$chi->id}}"> -------- {{$chi->categoryTranslations->where('locale','az')->first()->name}}</option>
                                                                                                @if($chi->children->count())
                                                                                                    @foreach($chi->children as $ch)
                                                                                                        <option @if($ch->id == $blog->product_category_id) selected @endif value="{{$ch->id}}"> ---------- {{$ch->categoryTranslations->where('locale','az')->first()->name}}</option>
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
                                                            <label>Categories</label>
                                                            <select class="form-control" name="category_id">
                                                                <option value="0">Select</option>

                                                                @foreach($categories as $category)
                                                                <option @if($blog->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label>Tags</label>
                                                            <select class="form-control  js-example-basic-multiple" name="tag_id[]" multiple>
                                                                <option value="0">Select</option>

                                                                @foreach($tags as $tag)
                                                                <option @if(in_array($tag->id,$blogTagsList)) selected @endif  value="{{$tag->id}}">{{$tag->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Image</label>
                                                            <img width="100" src="{{asset('storage/blogs/'.$blog->img)}}">
                                                            <input type="hidden" name="old_img" value="{{$blog->img}}">
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status" @if($blog->status == 1) checked @endif>
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




