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
                                <h4 class="mb-sm-0">Options</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Options</a></li>
                                        <li class="breadcrumb-item active">Option List</li>
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
                                    <h4 class="card-title mb-0 flex-grow-1">Option List</h4>
                                    <a href="{{route('options.create')}}" class="btn btn-success btn-label">
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
                                            <table  id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                                <thead class="table-light">
                                                    <tr>
                                                        
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Group</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rows as $row)
                                                    <tr  data-id="{{ $row->id }}">
                                                        <td>{{$row->order}}</td>

                                                        <td>{{$row->optionTranslations->where('locale','en')->first()->name}}</td>
                                                       <td>{{@$row->option_group->first()->optionGroupTranslations->where('locale','en')->first()->name}}</td>

                                                        
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <a href="{{ route('options.edit', ['option' => $row->id]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                <form action="{{ route('options.destroy', $row->id) }}" method="POST">
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>

   <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "ordering": true,
            });
        });
        $("#example tbody").sortable({
            update: function (event, ui) {
                // Get the new row order
                    var newOrder = $(this).sortable('toArray', {
                        attribute: 'data-id'
                    });

                    // Send an AJAX request to update the server-side data
                    $.ajax({
                        url: "{{ route('datatable.updateOrderOptions') }}",
                        type: "GET",
                        data: {
                            order: newOrder,
                        }
                    });

                    // Reset the row index column (if applicable)
                    dataTable.order([0, 'asc']).draw(false);
            }
        });

       
    </script>
@endsection
