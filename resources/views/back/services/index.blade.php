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
                                <h4 class="mb-sm-0">Services</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Services</a></li>
                                        <li class="breadcrumb-item active">Service List</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Service List</h4>
                                    <a href="{{route('services.create')}}" class="btn btn-success btn-label">
                                        <i class="las la-plus-circle label-icon align-middle fs-16 me-2"></i>
                                         Create</a>
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
                                                        
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rows as $row)
                                                    <tr>
                                                        <td>
                                                            <img width="100" src="{{asset('storage/services/'.$row->img)}}">
                                                        </td>
                                                        <td>{{$row->serviceTranslations->where('locale','az')->first()->title}}</td>
                                                        <td>
                                                            <div class="form-check form-switch mb-3">
                                                                <input class="form-check-input toggle-status" type="checkbox" role="switch" id="SwitchCheck{{$row->id}}"  name="status" @if($row->status == 1) checked @endif data-id="{{$row->id}}">
                                                            </div>
                                                        </td>
                                                        
                                                        
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <a href="{{ route('services.edit', ['service' => $row->id]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                <form action="{{ route('services.destroy', $row->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="link-danger fs-15" style="border: 0;background: transparent;"onclick="return confirm('Are you sure you want to delete?');"><i class="ri-delete-bin-line"></i></button>
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
            $('.toggle-status').change(function () {
                let blogId = $(this).data('id');
                let status = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    url: '{{route("blogs.statusChange")}}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status,
                        blog_id: blogId,
                    },
                    success: function (response) {
                        console.log('Status yeniləndi:', response.message);
                    },
                    error: function (xhr) {
                        alert('Xəta baş verdi!');
                    }
                });
            });
        });
    </script>
@endsection
