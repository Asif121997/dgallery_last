@extends('layouts.app')
@section('header-links')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Müştəri listi</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Müştəri listi</a></li>
                                        <li class="breadcrumb-item active">Müştəri listi</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Müştəri listi</h4>
                                    <a href="{{route('customers.create')}}" class="btn btn-success btn-label">
                                        <i class="las la-plus-circle label-icon align-middle fs-16 me-2"></i>
                                         Yeni müştəri yarat</a>
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
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        
                                                        <th scope="col">Ad və Soyad</th>
                                                        <th scope="col">E-poçt</th>
                                                        <th scope="col">Mobil</th>
                                                        <th scope="col">Sifarişlər</th>
                                                        <th scope="col">Dərəcə</th>
                                                        <th scope="col">Yeni</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rows as $row)
                                                    <tr>
                                                        
                                                        <td>{{$row->name}} {{$row->lastname}}</td>
                                                        <td>{{$row->email}}</td>
                                                        <td>{{$row->phone}}</td>
                                                        <td>
                                                           
                                                                <a href="{{route('orders.index',['email' => $row->email])}}" class="btn btn-success">Sifarişlər</a>

                                                        </td>
                                                        
                                                        <td>
                                                            @if($row->type == '0')
                                                                <a style="background:#dc8a0b;border:1px solid #dc8a0b;"  class="btn btn-success">Satış</a>
                                                            @elseif($row->type == '1')
                                                                <a style="background:#0bdca8;border:1px solid #0bdca8;"  class="btn btn-success">Topdan</a>
                                                            @elseif($row->type == '2')
                                                                <a style="background:#ff0202;border:1px solid #ff0202;"  class="btn btn-success">Diller</a>
                                                            @elseif($row->type == '3')
                                                                <a style="background:#1a1275;border:1px solid #1a1275;"  class="btn btn-success">Xüsusi</a>
                                                            @elseif($row->type == '4')
                                                                <a style="background:#dc0bad;border:1px solid #dc0badd;"  class="btn btn-success">Hamısı</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->new == 0)
                                                                <a href="{{route('customers.new',['customer' => $row->id])}}" style="background:#0b29dc;border:1px solid #dc0badd;"  class="btn btn-success">Yeni</a>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <a href="{{ route('customers.edit', ['customer' => $row->id]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                <form action="{{ route('customers.destroy', $row->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="link-danger fs-15" style="border: 0;background: transparent;"onclick="return confirm('Silinməsinə əminsiniz?');"><i class="ri-delete-bin-line"></i></button>
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

@section('footer-scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
