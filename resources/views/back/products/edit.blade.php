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
                                        <li class="breadcrumb-item active">Product Edit</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Product Edit</h4>
                                    
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <form action="{{ route('products.update',['product'=>$product->id]) }}" method="POST" id="productForm" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul class="nav nav-pills nav-custom nav-custom-success mb-3" role="tablist">
                                                        @foreach($product->productTranslations as $k=>$translation)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($k == 0) active @endif" data-bs-toggle="tab" href="#{{$translation->locale}}" role="tab">

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
                                                        @foreach($product->productTranslations as $k=>$translation)
                                                        <div class="tab-pane  @if($k == 0) active @endif" id="{{$translation->locale}}" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="firstNameinput" class="form-label">Name({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Name" id="firstNameinput" name="name[]" value="{{$translation->name}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Overview({{$translation->locale}})</label>
                                                                        <textarea id="editor1{{$k}}" name="overview[]">{!!$translation->overview!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Description({{$translation->locale}})</label>
                                                                        <textarea id="editor2{{$k}}" name="description[]">{!!$translation->description!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                
                                                                

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Page Title({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Title" id="title" name="page_title[]" value="{{$translation->page_title}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="title" class="form-label">Page Description({{$translation->locale}})</label>
                                                                        <textarea id="editor4{{$k}}" name="page_description[]">{!!$translation->page_description!!}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="keywords" class="form-label">Page Keywords({{$translation->locale}})</label>
                                                                        <input type="text" class="form-control" placeholder="Keywords" id="keywords" name="page_keywords[]" value="{{$translation->page_keywords}}">
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
                                                            <label for="img" class="form-label">Kateqoriya</label>
                                                            <select name="category_id[]" class="form-control js-example-basic-multiple" multiple>
                                                                <option value="0">Seçin</option>
                                                                @foreach($categories as $cat)

                                                                <option @if(in_array($cat->id, $productCategoryIds)) selected @endif value="{{$cat->id}}">{{$cat->categoryTranslations->where('locale','en')->first()->name}}</option>

                                                                @if($cat->children->count())
                                                                    @foreach($cat->children as $child)
                                                                        <option @if(in_array($child->id, $productCategoryIds)) selected @endif value="{{$child->id}}"> --- {{$child->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                        
                                                                        @if($child->children->count())
                                                                            @foreach($child->children as $chil)
                                                                                <option @if(in_array($chil->id, $productCategoryIds)) selected @endif value="{{$chil->id}}"> ------ {{$chil->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                                    @if($chil->children->count())
                                                                                        @foreach($chil->children as $chi)
                                                                                            <option @if(in_array($chi->id, $productCategoryIds)) selected @endif value="{{$chi->id}}"> -------- {{$chi->categoryTranslations->where('locale','en')->first()->name}}</option>
                                                                                                @if($chi->children->count())
                                                                                                    @foreach($chi->children as $ch)
                                                                                                        <option @if(in_array($ch->id, $productCategoryIds)) selected @endif value="{{$ch->id}}"> ---------- {{$ch->categoryTranslations->where('locale','en')->first()->name}}</option>

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
                                                                <option @if(in_array($size->id, $productSizeIds)) selected @endif value="{{$size->id}}">{{@$size->category->categoryTranslations->where('locale','en')->first()->name}} >>> {{$size->name}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="options" class="form-label">Filterlər</label>
                                                            <select name="option_id[]" class="form-control js-example-basic-multiple" multiple>
                                                                <option value="0">Seçin</option>
                                                                @foreach($optionGroups as $group)
                                                                @if($group->category)

                                                                <optgroup label="{{@$group->category->categoryTranslations->where('locale','en')->first()->name}} >>> {{$group->optionGroupTranslations->where('locale','en')->first()->name}}">
                                                                    @foreach($group->options as $option)
                                                                        <option @if(in_array($option->id,$option_IDS)) selected @endif value="{{$option->id}}">{{$option->optionTranslations->where('locale','en')->first()->name}}</option>

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
                                                            <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" min="0" step="0.01">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="discount_price" class="form-label">Endirim qiymət</label>
                                                            <input type="number" class="form-control" id="discount_price" name="discount_price" value="{{$product->discount_price}}" min="0" step="0.01">
                                                        </div>
                                                    </div>
                                                    
                                                   

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Reyting</label>
                                                            <select name="review" class="form-control">
                                                                <option value="1">1 star</option>
                                                                <option @if($product->review == 2) selected @endif value="2">2 star</option>
                                                                <option @if($product->review == 3) selected @endif value="3">3 star</option>
                                                                <option @if($product->review == 4) selected @endif value="4">4 star</option>
                                                                <option @if($product->review == 5) selected @endif value="5">5 star</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                   

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="img" class="form-label">Rəsm</label>
                                                            <img width="100" src="{{asset('storage/products/'.$product->img)}}">
                                                            <input type="hidden" name="old_img" value="{{$product->img}}">
                                                            <input type="file" class="form-control" id="img" name="img" value="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="gallery" class="form-label">Digər rəsmlər</label>

                                                                <ul class="list-unstyled mb-2 mt-2" id="dropzone-preview">
                                                                @forelse ($product->images as $gallery)
                                                                    <input type="hidden" name="all_galleries[]" value="{{ $gallery->id }}">
                                                                    <li class="mt-2 dz-processing dz-image-preview dz-success dz-complete"
                                                                        id="dropzone-preview">
                                                                        <input type="hidden" name="current_galleries[]"
                                                                            value="{{ $gallery->id }}">
                                                                        <div class="border rounded">
                                                                            <div class="d-flex align-items-center p-2">
                                                                                <div class="flex-shrink-0 me-3">
                                                                                    <div class="avatar-sm bg-light rounded">
                                                                                        <img  height='60' class="w-100 rounded d-block"
                                                                                            src="{{asset('storage/products/'.$gallery->img)}}"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex-grow-1">
                                                                                    <div class="pt-1">
                                                                                        <h5 class="fs-14 mb-1" data-dz-name="">
                                                                                            {{ $gallery->img }}</h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ms-3"> <button type="button"
                                                                                        class="btn btn-sm btn-danger img-block-remove">Delete</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @empty
                                                                    <li class="mt-2 dz-processing dz-image-preview dz-success dz-complete"
                                                                        id="">
                                                                        <div class="border rounded">
                                                                            <div class="d-flex align-items-center p-2">
                                                                                No gallery image exists
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforelse



                                                            </ul>
                                                            <input type="file" class="form-control" id="gallery" name="gallery[]" value="" multiple>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="datasheet" class="form-label">Datasheet</label>
                                                            <ul class="list-unstyled mb-2 mt-2" id="dropzone-preview">
                                                                @if(!empty($product->datasheet))
                                                                    <li class="mt-2 dz-processing dz-image-preview dz-success dz-complete"
                                                                        id="dropzone-preview">
                                                                        <input type="hidden" name="old_datasheet"
                                                                            value="{{ $product->datasheet }}">
                                                                        <div class="border rounded">
                                                                            <div class="d-flex align-items-center p-2">
                                                                                <div class="flex-shrink-0 me-3">
                                                                                    <div class="avatar-sm bg-light rounded">
                                                                                        <img  height='60' class="w-100 rounded d-block"
                                                                                            src="{{asset('storage/products/'.$product->datasheet)}}"
                                                                                            alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex-grow-1">
                                                                                    <div class="pt-1">
                                                                                        <h5 class="fs-14 mb-1" data-dz-name="">
                                                                                            {{ $product->datasheet }}</h5>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex-shrink-0 ms-3"> <button type="button"
                                                                                        class="btn btn-sm btn-danger img-block-remove">Delete</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @else
                                                                    <li class="mt-2 dz-processing dz-image-preview dz-success dz-complete"
                                                                        id="">
                                                                        <div class="border rounded">
                                                                            <div class="d-flex align-items-center p-2">
                                                                                No datasheet exists
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endif



                                                            </ul>
                                                            <input type="file" class="form-control" id="datasheet" name="datasheet" value="">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck"  name="status"  @if($product->status == 1) checked @endif>
                                                                <label class="form-check-label" for="SwitchCheck">Active</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="featured"  name="featured"  @if($product->featured == 1) checked @endif>
                                                                <label class="form-check-label" for="featured">Featured</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="sale"  name="sale"  @if($product->sale == 1) checked @endif>
                                                                <label class="form-check-label" for="sale">Sale</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="special"  name="special"  @if($product->special == 1) checked @endif>
                                                                <label class="form-check-label" for="special">Special</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="home"  name="home"  @if($product->home == 1) checked @endif>
                                                                <label class="form-check-label" for="home">Home</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="new"  name="new"  @if($product->new == 1) checked @endif>
                                                                <label class="form-check-label" for="new">Yeni məhsul</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="limited"  name="limited"  @if($product->limited == 1) checked @endif>
                                                                <label class="form-check-label" for="limited">Məhdud sayda</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="stock"  name="stock"  @if($product->stock == 1) checked @endif>
                                                                <label class="form-check-label" for="stock">Stock</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div>
                                                            
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="two_hand"  name="two_hand"  @if($product->two_hand == 1) checked @endif>
                                                                <label class="form-check-label" for="two_hand">İkinci əl</label>
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
    CKEDITOR.replace('editor40');
    CKEDITOR.replace('editor50');
    CKEDITOR.replace('editor60');

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

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $('.img-block-remove').on('click',function(e){
        console.log($(this).closest('#dropzone-preview').remove());
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




