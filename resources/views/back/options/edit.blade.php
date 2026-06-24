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
                                <h4 class="mb-sm-0">Options</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Options</a></li>
                                        <li class="breadcrumb-item active">Option Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Option Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('options.update',['option' => $option->id]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($option->optionTranslations as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($k==0)active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">

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
                                                        @foreach($option->optionTranslations as $k=>$translation)
                                                        <div class="tab-pane @if($k==0)active @endif" id="{{$translation->locale}}" role="tabpanel">
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

                                                        <label for="firstNameinput" class="form-label">Option Groups</label>
                                                        <select class="form-control" name="option_group_id">
                                                            @foreach($optionGroups as $optionGroup)
                                                                <option @if($optionGroup->id == $option->option_group_id) selected @endif value="{{$optionGroup->id}}">{{$optionGroup->optionGroupTranslations->where('locale','en')->first()->name}}</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div>
                                                        
                                                        <div class="form-check form-switch mb-3">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status" @if($option->status == 1) checked @endif>
                                                            <label class="form-check-label" for="SwitchCheck">Active</label>
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




