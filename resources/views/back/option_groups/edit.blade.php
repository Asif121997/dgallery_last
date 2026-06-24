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
                                        <li class="breadcrumb-item active">Option Group Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Option Group Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('option_groups.update',['option_group' => $optionGroup->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($optionGroup->optionGroupTranslations as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link  @if($k == 0) active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">

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
                                                        @foreach($optionGroup->optionGroupTranslations as $k=>$translation)
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
                                                
                                                
                                                 <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Categories</label>
                                                            <select name="category_id[]" class="form-control  js-example-basic-multiple" multiple>
                                                                @foreach($categories as $cat)

                                                                <option @if(in_array($cat->id, $OptionGroupCategoryIds)) selected @endif value="{{$cat->id}}">{{$cat->categoryTranslations->where('locale','en')->first()->name}}</option>

                                                                @if($cat->children->count())
                                                                    @foreach($cat->children as $child)
                                                                        <option @if(in_array($child->id, $OptionGroupCategoryIds)) selected @endif value="{{$child->id}}"> -- {{$child->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                        
                                                                        @if($child->children->count())
                                                                            @foreach($child->children as $chil)
                                                                                <option @if(in_array($chil->id, $OptionGroupCategoryIds)) selected @endif value="{{$chil->id}}"> ---- {{$chil->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                                
                                                                                    @if($chil->children->count())
                                                                                        @foreach($chil->children as $chi)
                                                                                            <option @if(in_array($chi->id, $OptionGroupCategoryIds)) selected @endif value="{{$chi->id}}"> ------ {{$chi->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                                                @if($chi->children->count())
                                                                                                    @foreach($chi->children as $ch)
                                                                                                        <option @if(in_array($ch->id, $OptionGroupCategoryIds)) selected @endif value="{{$ch->id}}"> -------- {{$ch->categoryTranslations->where('locale','en')->first()->name}}</option>

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
                                                            <img width="64" src="{{asset('storage/options/'.$optionGroup->icon)}}"/>
                                                            <input type="hidden" name="old_icon" value="{{$optionGroup->icon}}"/>
                                                            <input type="file" class="form-control"  id="icon" name="icon" >
                                                        </div>
                                                    </div>

                                                <div class="col-md-12">
                                                    <div>
                                                        
                                                        <div class="form-check form-switch mb-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status"@if($optionGroup->status == 1) checked @endif>
                                                            <label class="form-check-label" for="SwitchCheck" >Active</label>
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




