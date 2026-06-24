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
                                        <li class="breadcrumb-item active">Banner Create</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Banner Create</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
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
                                                        <div class="tab-pane" id="arabic" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name(Arabic)</label>

                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="special_title" class="form-label">Short Text(Arabic)</label>

                                                                        <input type="text" class="form-control" placeholder="Special Title" id="special_title" name="special_title[]" value="">
                                                                    </div>
                                                                </div>

                                                                

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">

                                                                        <label for="title" class="form-label">Text(Arabic)</label>

                                                                        <textarea id="editor1" name="text[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">

                                                                        <label for="button_text" class="form-label">Button Text(Arabic)</label>

                                                                        <input type="text" class="form-control" placeholder="Button Text" id="button_text" name="btn_text[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">

                                                                        <label for="button_text" class="form-label">Button Link(Arabic)</label>

                                                                        <input type="text" class="form-control" placeholder="Button Link" id="button_text" name="btn_link[]" value="">
                                                                    </div>
                                                                </div>


                                                                

                                                                
                                                                <input type="hidden" name="locale[]" value="ar">

                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>

                                                        <div class="tab-pane active" id="english" role="tabpanel">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="">
                                                                    </div>
                                                                </div>

                                                                


                                                                <div class="col-md-12">
                                                                    <div class="mb-3">

                                                                        <label for="special_title" class="form-label">Short Text(English)</label>

                                                                        <input type="text" class="form-control" placeholder="Special text" id="special_title" name="special_title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Text(English)</label>
                                                                        <textarea id="editor2" name="text[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="button_text" class="form-label">Button Text(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Button Text" id="button_text" name="btn_text[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="button_text" class="form-label">Button Link(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Button Link" id="button_text" name="btn_link[]" value="">
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

                                                                        <label for="special_title" class="form-label">Short Text(Russian)</label>

                                                                        <input type="text" class="form-control" placeholder="Special title" id="special_title" name="special_title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Text(Russian)</label>
                                                                        <textarea id="editor3" name="text[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="button_text" class="form-label">Button Text(Russian)</label>
                                                                        <input type="text" class="form-control" placeholder="Button Text" id="button_text" name="btn_text[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="button_text" class="form-label">Button Link(Russian)</label>
                                                                        <input type="text" class="form-control" placeholder="Button Link" id="button_text" name="btn_link[]" value="">
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
                                                            <label for="img" class="form-label">Image</label>
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">

                                                            <label for="img" class="form-label">Row</label>
                                                            <select class="form-control" name="row">
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
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




