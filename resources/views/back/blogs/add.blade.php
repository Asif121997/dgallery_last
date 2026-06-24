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
                                        <li class="breadcrumb-item active">Blog Create</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Blog Create</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#azerbaijani" role="tab">
                                                                Azerbaijani
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#english" role="tab">
                                                                English
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#russian" role="tab">
                                                                Russian
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content text-muted">
                                                        <div class="tab-pane active" id="azerbaijani" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name(Azerbaijani)</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Short Text(Azerbaijani)</label>
                                                                        <textarea id="editor10" name="short_text[]"></textarea>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Text(Azerbaijani)</label>
                                                                        <textarea id="editor20" name="text[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Title(Azerbaijani)</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description(Azerbaijani)</label>
                                                                        <textarea id="editor30" name="description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Keywords(Azerbaijani)</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="keywords[]" value="">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="locale[]" value="az">
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <div class="tab-pane" id="english" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Short Text(English)</label>
                                                                        <textarea id="editor11" name="short_text[]"></textarea>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Text(English)</label>
                                                                        <textarea id="editor21" name="text[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Title(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description(English)</label>
                                                                        <textarea id="editor31" name="description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Keywords(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="keywords[]" value="">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <input type="hidden" name="locale[]" value="en">
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <div class="tab-pane" id="russian" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name(Russian)</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Short Text(Russian)</label>
                                                                        <textarea id="editor12" name="short_text[]"></textarea>
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Text(Russian)</label>
                                                                        <textarea id="editor22" name="text[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Title(Russian)</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description(Russian)</label>
                                                                        <textarea id="editor32" name="description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Keywords(Russian)</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="keywords[]" value="">
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <input type="hidden" name="locale[]" value="ru">
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Product Categories</label>
                                                            <select name="product_category_id"  class="form-control">
                                                                <option value="0">Seçin</option>
                                                                @foreach($productCategories as $cat)
                                                                <option value="{{$cat->id}}">{{$cat->categoryTranslations->where('locale','az')->first()->name}}</option>
                                                                    @if($cat->children->count())
                                                            
                                                                        @foreach($cat->children as $child)
                                                                        <option value="{{$child->id}}">--{{$child->categoryTranslations->where('locale','az')->first()->name}}</option>
                                                                         @if($child->children->count())
                                                            
                                                                            @foreach($child->children as $chil)
                                                                            <option value="{{$chil->id}}">----{{$chil->categoryTranslations->where('locale','az')->first()->name}}</option>
                                                                                @if($chil->children->count())
                                                            
                                                                                    @foreach($chil->children as $chi)
                                                                                    <option value="{{$chi->id}}">------{{$chi->categoryTranslations->where('locale','az')->first()->name}}</option>
                                                                                        @if($chi->children->count())
                                                            
                                                                                            @foreach($chi->children as $ch)
                                                                                            <option value="{{$ch->id}}">--------{{$ch->categoryTranslations->where('locale','az')->first()->name}}</option>
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
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Image</label>
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status" checked>
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




