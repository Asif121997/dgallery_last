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
                                <h4 class="mb-sm-0">Option Groups</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Option Groups</a></li>
                                        <li class="breadcrumb-item active">Option Group Create</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Option Group Create</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('option_groups.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">

                                                        
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#english" role="tab">

                                                                English
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#russian" role="tab">
                                                                Russian
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#arabic" role="tab">
                                                                Arabic
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content text-muted">
                                                        
                                                        <div class="tab-pane active" id="english" role="tabpanel">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="">
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
                                                                <!--end col-->
                                                                <input type="hidden" name="locale[]" value="ru">
                                                            </div>
                                                            <!--end row-->
                                                        </div>

                                                        <div class="tab-pane" id="arabic" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name(Arabic)</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="locale[]" value="ar">
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div>
                                                        
                                                        <div class="form-check form-switch mb-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status">
                                                            <label class="form-check-label" for="SwitchCheck">Active</label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                 <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Categories</label>
                                                            <select name="category_id[]"  class="form-control  js-example-basic-multiple" multiple>
                                                                @foreach($categories as $cat)

                                                                <option value="{{$cat->id}}">{{$cat->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                    @if($cat->children->count())
                                                            
                                                                        @foreach($cat->children as $child)
                                                                        <option value="{{$child->id}}">--{{$child->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                         @if($child->children->count())
                                                            
                                                                            @foreach($child->children as $chil)
                                                                            <option value="{{$chil->id}}">----{{$chil->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                                @if($chil->children->count())
                                                            
                                                                                    @foreach($chil->children as $chi)
                                                                                    <option value="{{$chi->id}}">------{{$chi->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                                        @if($chi->children->count())
                                                            
                                                                                            @foreach($chi->children as $ch)
                                                                                            <option value="{{$ch->id}}">--------{{$ch->categoryTranslations->where('locale','en')->first()->name}}</option>

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
                                                            <label for="icon" class="form-label">Icon</label>
                                                            <input type="file" class="form-control"  id="icon" name="icon" value="">
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




