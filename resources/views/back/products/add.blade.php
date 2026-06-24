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
                                <h4 class="mb-sm-0">Products</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                        <li class="breadcrumb-item active">Product Create</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Kateqoriya yarat</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        <li class="nav-item">

                                                            <a class="nav-link active" data-bs-toggle="tab" href="#arabic" role="tab">
                                                                Arabic

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
                                                                        <label for="title" class="form-label">Overview(English)</label>
                                                                        <textarea id="editor12" name="overview[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description(English)</label>
                                                                        <textarea id="editor22" name="description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Page Title(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="page_title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Page Description(English)</label>
                                                                        <textarea id="editor42" name="page_description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Page Keywords(English)</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="page_keywords[]" value="">
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
                                                                        <label for="title" class="form-label">Overview(Russian)</label>
                                                                        <textarea id="editor13" name="overview[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description(Russian)</label>
                                                                        <textarea id="editor23" name="description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Page Title(Russian)</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="page_title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Page Description(Russian)</label>
                                                                        <textarea id="editor43" name="page_description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Page Keywords(Russian)</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="page_keywords[]" value="">
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
                                                                        <label for="firstNameinput" class="form-label">Məhsulun adı</label>
                                                                        <input type="text" class="form-control" placeholder=" " id="firstNameinput" name="name[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Qısa təsvir</label>
                                                                        <textarea id="editor11" name="overview[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Texniki göstəricilər</label>
                                                                        <textarea id="editor21" name="description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                

                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Səhifə adı</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="page_title[]" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Page Description(Azerbaijani)</label>
                                                                        <textarea id="editor41" name="page_description[]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Açar sözlər</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="page_keywords[]" value="">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="locale[]" value="ar">
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Kateqoriya</label>
                                                            <select name="category_id[]" multiple class="form-control js-example-basic-multiple">
                                                                <option value="0">Seçin</option>
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
                                                            <label for="size" class="form-label">Size</label>
                                                            <select name="size_id[]"  class="form-control js-example-basic-multiple" id="size" multiple>
                                                                <option value="0">Seçin</option>
                                                                @foreach($sizes as $size)
                                                                <option value="{{$size->id}}">{{@$size->category->categoryTranslations->where('locale','en')->first()->name}} >>> {{$size->name}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="options" class="form-label">Options</label>
                                                            <select name="option_id[]" class="form-control js-example-basic-multiple" multiple>
                                                                <option value="0">Seçin</option>
                                                                @foreach($optionGroups as $group)
                                                                @if($group->category)

                                                                <optgroup label="{{$group->category->categoryTranslations->where('locale','en')->first()->name}} >>> {{$group->optionGroupTranslations->where('locale','en')->first()->name}}">
                                                                    @foreach($group->options as $option)
                                                                        <option value="{{$option->id}}">{{$option->optionTranslations->where('locale','en')->first()->name}}</option>

                                                                    @endforeach
                                                                    
                                                                </optgroup>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Qiymət</label>
                                                            <input type="number" class="form-control" id="price" name="price" value="" min="0" step="0.01">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="discount_price" class="form-label">Endirimli</label>
                                                            <input type="number" class="form-control" id="discount_price" name="discount_price" value="0.00" min="0" step="0.01">
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Reytinq</label>
                                                            <select name="review" class="form-control">
                                                                <option value="1">1 star</option>
                                                                <option value="2">2 star</option>
                                                                <option value="3">3 star</option>
                                                                <option value="4">4 star</option>
                                                                <option value="5">5 star</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                   


                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Əsas Şəkil</label>
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">

                                                            <label for="datasheet" class="form-label">Hover Şəkil</label>
                                                            <input type="file" class="form-control" id="datasheet" name="datasheet" value="">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="mb-3">

                                                            <label for="gallery" class="form-label">Əlavə Şəkillər</label>
                                                            <input type="file" class="form-control" id="gallery" name="gallery[]" value="" multiple>
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

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="featured"  name="featured">
                                                                <label class="form-check-label" for="featured">Featured</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="sale"  name="sale">
                                                                <label class="form-check-label" for="sale">Endirimdə</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="special"  name="special">
                                                                <label class="form-check-label" for="special">Special</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="home"  name="home">
                                                                <label class="form-check-label" for="home">Home</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="new"  name="new" checked>
                                                                <label class="form-check-label" for="new">Yeni məhsul</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="limited"  name="limited" checked>
                                                                <label class="form-check-label" for="limited">Məhdud sayda</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="stock"  name="stock" checked>
                                                                <label class="form-check-label" for="stock">Stokda var</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="two_hand"  name="two_hand" >
                                                                <label class="form-check-label" for="two_hand">İkinci əl</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Təsdiq et</button>
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
    CKEDITOR.replace('editor11');
    CKEDITOR.replace('editor21');
    CKEDITOR.replace('editor31');
    CKEDITOR.replace('editor41');
    CKEDITOR.replace('editor51');
    CKEDITOR.replace('editor61');

    CKEDITOR.replace('editor12');
    CKEDITOR.replace('editor22');
    CKEDITOR.replace('editor32');
    CKEDITOR.replace('editor42');
    CKEDITOR.replace('editor52');
    CKEDITOR.replace('editor62');

    CKEDITOR.replace('editor13');
    CKEDITOR.replace('editor23');
    CKEDITOR.replace('editor33');
    CKEDITOR.replace('editor43');
    CKEDITOR.replace('editor53');
    CKEDITOR.replace('editor63');

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

<script>
$(function() {

    function recalc() {
        var price = parseFloat($('#price').val().replace(',', '.'));
        var percent = $('#percent').val().replace(',', '.');

        // Percent boşdursa və ya 0-dırsa – nəticəni boş et
        if (percent === "" || percent === "0" || percent === "0.0" || percent === "0.00") {
            $('#discount_price').val("");
            return;
        }

        percent = parseFloat(percent);
        price = isNaN(price) ? 0 : price;

        var discountAmount = price * (percent / 100);
        var discountedPrice = price - discountAmount;

        $('#discount_price').val(discountedPrice.toFixed(2));
    }

    $('#percent').on('input change', recalc);

});
</script>


@endsection




