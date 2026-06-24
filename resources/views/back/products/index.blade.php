@extends('layouts.app')
@section('header-links')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        .form-group{
            margin-bottom:15px;
        }
    </style>
@endsection
@section('content')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Məhsul Listi</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Məhsul Listi</a></li>
                                        <li class="breadcrumb-item active">Məhsul Listi</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    
                    <form action="{{route('products.index')}}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Məhsulun adı" @if(request()->name) value="{{request()->name}}" @endif>
                            </div>

                            
                            <div class="form-group col-md-6">
                                <select class="form-control" name="stock">
                                    <option value="100">Stock</option>
                                    <option value="1" @if(isset(request()->stock) and request()->stock == 1) selected @endif>Stokda var</option>
                                    <option value="0" @if(isset(request()->stock) and request()->stock == 0) selected @endif>Stokda yoxdur</option>
                                </select>
                            </div>

                           

                            <div class="form-group">
                                <button class="btn btn-primary w-100">Filterlə</button>
                            </div>

                            <div class="form-group">
                                <a class="btn btn-danger w-100" href="{{route('products.index')}}">Sıfırla</a>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Məhsul Listi</h4>
                                    <a href="{{route('products.create')}}" class="btn btn-success btn-label">
                                        <i class="las la-plus-circle label-icon align-middle fs-16 me-2"></i>
                                         Yeni Məhsul əlavə et</a>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            @if(session('success'))
                                            <div class="alert alert-success alert-dismissible bg-success text-white alert-label-icon fade show" role="alert">
                                                <i class="ri-notification-off-line label-icon"></i><strong>{{ session('success') }}</strong>
                                                - {{ session('text') }}
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            @endif
                                            <table id="example" class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        
                                                        <th scope="col">Şəkil</th>
                                                        <th scope="col">Ad</th>
                                                        <th scope="col">Rəng</th>
                                                        <th scope="col">Satış </th>
                                                        <th scope="col">Endirim </th>
                                                        <th scope="col">Topdan </th>
                                                        <th scope="col">Diller </th>
                                                        <th scope="col">Alış qiyməti </th>
                                                        <th scope="col">Xüsusi </th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Stok</th>
                                                        <th scope="col">Aktiv</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rows as $row)
                                                    <tr>
                                                        
                                                        <td>
                                                            <img src="{{asset('storage/products/'.$row->img)}}" width="100">
                                                        </td>
                                                        <td>
                                                            {{@$row->productTranslations->where('locale','az')->first()->name}}
                                                        </td>
                                                        
                                                        <td>
                                                            <div style="background:{{@$row->color->color_code}};width: 30px;height: 30px;border-radius: 50%;"></div>
                                                        </td>
                                                      
                                                       
                                                        <td>
                                                            {{$row->price}} &#8380;
                                                        </td>

                                                        <td>
                                                            {{$row->discount_price}} &#8380;
                                                        </td>
                                                        
                                                        <td>
                                                            @if(!empty($row->wholesale_price) or $row->wholesale_price == '0.00')
                                                            {{$row->wholesale_price}} &#8380;
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                             @if(!empty($row->diller_price) or $row->diller_price == '0.00')
                                                            {{$row->diller_price}} &#8380;
                                                             @endif
                                                        </td>
                                                        
                                                        <td>
                                                             @if(!empty($row->purchase_price) or $row->purchase_price == '0.00')
                                                            {{$row->purchase_price}} &#8380;
                                                             @endif
                                                        </td>
                                                        
                                                        <td>
                                                             @if(!empty($row->special_price) or $row->special_price == '0.00')
                                                            {{$row->special_price}} &#8380;
                                                             @endif
                                                        </td>

                                                        <td>
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input toggle-status" type="checkbox" role="switch" id="SwitchCheck{{$row->id}}"  name="status" @if($row->status == 1) checked @endif data-id="{{$row->id}}">
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input toggle-stock" type="checkbox" role="switch" id="SwitchCheck{{$row->id}}"  name="status" @if($row->stock == 1) checked @endif data-id="{{$row->id}}">
                                                            </div>
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <a href="{{ route('products.edit', ['product' => $row->id]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                <form action="{{ route('products.destroy', $row->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="link-danger fs-15" style="border: 0;background: transparent;"onclick="return confirm('Silinməyə əminsiniz?');"><i class="ri-delete-bin-line"></i></button>
                                                                    {{-- <i class="pg-icon">bin_alt</i> --}}
                                                                </form>
                                                                
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                                
                                            </table>
                                            <!-- end table -->
                                        </div>
                                        <!-- end table responsive -->
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
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <script>
        
        $(document).ready(function () {
    $(document).on('change', '.toggle-status', function () {
        let productId = $(this).data('id');
        let status = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '{{ route("products.statusChange") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status,
                product_id: productId,
            },
            success: function (response) {
                console.log('Status yeniləndi:', response.message);
            },
            error: function () {
                alert('Xəta baş verdi!');
            }
        });
    });
});
    </script>
    
      <script>
        
        $(document).ready(function () {
    $(document).on('change', '.toggle-stock', function () {
        let productId = $(this).data('id');
        let stock = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: '{{ route("products.stockChange") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                stock: stock,
                product_id: productId,
            },
            success: function (response) {
                console.log('Stok yeniləndi:', response.message);
            },
            error: function () {
                alert('Xəta baş verdi!');
            }
        });
    });
});
    </script>
@endsection
