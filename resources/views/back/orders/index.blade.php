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
                                <h4 class="mb-sm-0">Orders</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                                        <li class="breadcrumb-item active">Order List</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <form action="{{route('orders.index')}}">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="name" placeholder="Ad" @if(request()->name) value="{{request()->name}}" @endif>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="lastname" placeholder="Soyad" @if(request()->lastname) value="{{request()->lastname}}" @endif>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="email" placeholder="Email" @if(request()->email) value="{{request()->email}}" @endif>
                            </div>

                            <div class="form-group col-md-3">
                                <input name="phone" id="phone" type="text" placeholder="+994(__)___-__-__" aria-label="Telefon" name="phone"  class="form-control" @if(request()->phone) value="{{request()->phone}}" @endif>
                            </div>

                            <div class="form-group col-md-3">
                                <select id="city" class="form-control" name="city" >
                                    <option value="0">Şəhər</option>
                                    <option value="Ağcabədi" {{ request('city') == 'Ağcabədi' ? 'selected' : '' }}>Ağcabədi</option>
                                    <option value="Ağdam" {{ request('city') == 'Ağdam' ? 'selected' : '' }}>Ağdam</option>
                                    <option value="Ağdaş" {{ request('city') == 'Ağdaş' ? 'selected' : '' }}>Ağdaş</option>
                                    <option value="Ağdərə" {{ request('city') == 'Ağdərə' ? 'selected' : '' }}>Ağdərə</option>
                                    <option value="Ağstafa" {{ request('city') == 'Ağstafa' ? 'selected' : '' }}>Ağstafa</option>
                                    <option value="Ağsu" {{ request('city') == 'Ağsu' ? 'selected' : '' }}>Ağsu</option>
                                    <option value="Astara" {{ request('city') == 'Astara' ? 'selected' : '' }}>Astara</option>
                                    <option value="Babək" {{ request('city') == 'Babək' ? 'selected' : '' }}>Babək</option>
                                    <option value="Bakı" {{ request('city') == 'Bakı' ? 'selected' : '' }}>Bakı</option>
                                    <option value="Balakən" {{ request('city') == 'Balakən' ? 'selected' : '' }}>Balakən</option>
                                    <option value="Beylqəan" {{ request('city') == 'Beylqəan' ? 'selected' : '' }}>Beyləqan</option>
                                    <option value="Bərdə" {{ request('city') == 'Bərdə' ? 'selected' : '' }}>Bərdə</option>
                                    <option value="Biləsuvar" {{ request('city') == 'Biləsuvar' ? 'selected' : '' }}>Biləsuvar</option>
                                    <option value="Cəbrayıl" {{ request('city') == 'Cəbrayıl' ? 'selected' : '' }}>Cəbrayıl</option>
                                    <option value="Cəlilabad" {{ request('city') == 'Cəlilabad' ? 'selected' : '' }}>Cəlilabad</option>
                                    <option value="Culfa" {{ request('city') == 'Culfa' ? 'selected' : '' }}>Culfa</option>
                                    <option value="Daşkəsən" {{ request('city') == 'Daşkəsən' ? 'selected' : '' }}>Daşkəsən</option>
                                    <option value="Füzuli" {{ request('city') == 'Füzuli' ? 'selected' : '' }}>Füzuli</option>
                                    <option value="Gədəbəy" {{ request('city') == 'Gədəbəy' ? 'selected' : '' }}>Gədəbəy</option>
                                    <option value="Gəncə" {{ request('city') == 'Gəncə' ? 'selected' : '' }}>Gəncə</option>
                                    <option value="Goranboy" {{ request('city') == 'Goranboy' ? 'selected' : '' }}>Goranboy</option>
                                    <option value="Göyçay" {{ request('city') == 'Göyçay' ? 'selected' : '' }}>Göyçay</option>
                                    <option value="Göygöl" {{ request('city') == 'Göygöl' ? 'selected' : '' }}>Göygöl</option>
                                    <option value="Göytəpə" {{ request('city') == 'Göytəpə' ? 'selected' : '' }}>Göytəpə</option>
                                    <option value="Hacıqabul" {{ request('city') == 'Hacıqabul' ? 'selected' : '' }}>Hacıqabul</option>
                                    <option value="Horadiz" {{ request('city') == 'Horadiz' ? 'selected' : '' }}>Horadiz</option>
                                    <option value="İmişli" {{ request('city') == 'İmişli' ? 'selected' : '' }}>İmişli</option>
                                    <option value="İsmayıllı" {{ request('city') == 'İsmayıllı' ? 'selected' : '' }}>İsmayıllı</option>
                                    <option value="Kəlbəcər" {{ request('city') == 'Kəlbəcər' ? 'selected' : '' }}>Kəlbəcər</option>
                                    <option value="Kürdəmir" {{ request('city') == 'Kürdəmir' ? 'selected' : '' }}>Kürdəmir</option>
                                    <option value="Laçın" {{ request('city') == 'Laçın' ? 'selected' : '' }}>Laçın</option>
                                    <option value="Lerik" {{ request('city') == 'Lerik' ? 'selected' : '' }}>Lerik</option>
                                    <option value="Lənkəran" {{ request('city') == 'Lənkəran' ? 'selected' : '' }}>Lənkəran</option>
                                    <option value="Masallı" {{ request('city') == 'Masallı' ? 'selected' : '' }}>Masallı</option>
                                    <option value="Mingəçevir" {{ request('city') == 'Mingəçevir' ? 'selected' : '' }}>Mingəçevir</option>
                                    <option value="Naftalan" {{ request('city') == 'Naftalan' ? 'selected' : '' }}>Naftalan</option>
                                    <option value="Naxçıvan" {{ request('city') == 'Naxçıvan' ? 'selected' : '' }}>Naxçıvan</option>
                                    <option value="Neftçala" {{ request('city') == 'Neftçala' ? 'selected' : '' }}>Neftçala</option>
                                    <option value="Oğuz" {{ request('city') == 'Oğuz' ? 'selected' : '' }}>Oğuz</option>
                                    <option value="Ordubad" {{ request('city') == 'Ordubad' ? 'selected' : '' }}>Ordubad</option>
                                    <option value="Qax" {{ request('city') == 'Qax' ? 'selected' : '' }}>Qax</option>
                                    <option value="Qazax" {{ request('city') == 'Qazax' ? 'selected' : '' }}>Qazax</option>
                                    <option value="Qəbələ" {{ request('city') == 'Qəbələ' ? 'selected' : '' }}>Qəbələ</option>
                                    <option value="Qobustan" {{ request('city') == 'Qobustan' ? 'selected' : '' }}>Qobustan</option>
                                    <option value="Quba" {{ request('city') == 'Quba' ? 'selected' : '' }}>Quba</option>
                                    <option value="Qubadlı" {{ request('city') == 'Qubadlı' ? 'selected' : '' }}>Qubadlı</option>
                                    <option value="Qusar" {{ request('city') == 'Qusar' ? 'selected' : '' }}>Qusar</option>
                                    <option value="Saatlı" {{ request('city') == 'Saatlı' ? 'selected' : '' }}>Saatlı</option>
                                    <option value="Sabirabad" {{ request('city') == 'Sabirabad' ? 'selected' : '' }}>Sabirabad</option>
                                    <option value="Şabran" {{ request('city') == 'Şabran' ? 'selected' : '' }}>Şabran</option>
                                    <option value="Şahbuz" {{ request('city') == 'Şahbuz' ? 'selected' : '' }}>Şahbuz</option>
                                    <option value="Salyan" {{ request('city') == 'Salyan' ? 'selected' : '' }}>Salyan</option>
                                    <option value="Şamaxı" {{ request('city') == 'Şamaxı' ? 'selected' : '' }}>Şamaxı</option>
                                    <option value="Samux" {{ request('city') == 'Samux' ? 'selected' : '' }}>Samux</option>
                                    <option value="Şəki" {{ request('city') == 'Şəki' ? 'selected' : '' }}>Şəki</option>
                                    <option value="Şəmkir" {{ request('city') == 'Şəmkir' ? 'selected' : '' }}>Şəmkir</option>
                                    <option value="Şərur" {{ request('city') == 'Şərur' ? 'selected' : '' }}>Şərur</option>
                                    <option value="Şirvan" {{ request('city') == 'Şirvan' ? 'selected' : '' }}>Şirvan</option>
                                    <option value="Siyəzən" {{ request('city') == 'Siyəzən' ? 'selected' : '' }}>Siyəzən</option>
                                    <option value="Sumqayıt" {{ request('city') == 'Sumqayıt' ? 'selected' : '' }}>Sumqayıt</option>
                                    <option value="Şuşa" {{ request('city') == 'Şuşa' ? 'selected' : '' }}>Şuşa</option>
                                    <option value="Tərtər" {{ request('city') == 'Tərtər' ? 'selected' : '' }}>Tərtər</option>
                                    <option value="Tovuz" {{ request('city') == 'Tovuz' ? 'selected' : '' }}>Tovuz</option>
                                    <option value="Ucar" {{ request('city') == 'Ucar' ? 'selected' : '' }}>Ucar</option>
                                    <option value="Xaçmaz" {{ request('city') == 'Xaçmaz' ? 'selected' : '' }}>Xaçmaz</option>
                                    <option value="Xankəndi" {{ request('city') == 'Xankəndi' ? 'selected' : '' }}>Xankəndi</option>
                                    <option value="Xırdalan" {{ request('city') == 'Xırdalan' ? 'selected' : '' }}>Xırdalan</option>
                                    <option value="Xızı" {{ request('city') == 'Xızı' ? 'selected' : '' }}>Xızı</option>
                                    <option value="Xocalı" {{ request('city') == 'Xocalı' ? 'selected' : '' }}>Xocalı</option>
                                    <option value="Xocavənd" {{ request('city') == 'Xocavənd' ? 'selected' : '' }}>Xocavənd</option>
                                    <option value="Xudat" {{ request('city') == 'Xudat' ? 'selected' : '' }}>Xudat</option>
                                    <option value="Yardımlı" {{ request('city') == 'Yardımlı' ? 'selected' : '' }}>Yardımlı</option>
                                    <option value="Yevlax" {{ request('city') == 'Yevlax' ? 'selected' : '' }}>Yevlax</option>
                                    <option value="Zaqatala" {{ request('city') == 'Zaqatala' ? 'selected' : '' }}>Zaqatala</option>
                                    <option value="Zəngilan" {{ request('city') == 'Zəngilan' ? 'selected' : '' }}>Zəngilan</option>
                                    <option value="Zərdab" {{ request('city') == 'Zərdab' ? 'selected' : '' }}>Zərdab</option> 
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control" name="view">
                                    <option value="100">View</option>
                                    <option value="2" @if(request()->view and request()->view == 2) selected @endif>Görülməyib</option>
                                    <option value="1" @if(request()->view and request()->view == 1) selected @endif>Görülüb</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <select class="form-control" name="status">
                                    <option value="100">Status</option>
                                    <option value="1001" @if(request()->status and request()->status == 1001) selected @endif>Gözləyir</option>
                                    <option value="1" @if(request()->status and request()->status == 1) selected @endif>Hazırlanır</option>
                                    <option value="2" @if(request()->status and request()->status == 2) selected @endif>Yoldadır</option>
                                    <option value="3" @if(request()->status and request()->status == 3) selected @endif>Təhvil verildi</option>
                                    <option value="4" @if(request()->status and request()->status == 4) selected @endif>İmtina edildi</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="date" name="date" class="form-control">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary w-100">Filterlə</button>
                            </div>

                            <div class="form-group">
                                <a class="btn btn-danger w-100" href="{{route('orders.index')}}">Sıfırla</a>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Order List</h4>
                                    
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
                                                        
                                                        <th scope="col">OrderID</th>
                                                        <th scope="col">Name Lastname</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Phone</th>
                                                        <th scope="col">City</th>
                                                        <th scope="col">View</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Tarix</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($rows as $row)
                                                    <tr>
                                                        <td>#{{ str_pad($row->id, 6, '0', STR_PAD_LEFT) }}</td>
                                                        <td>{{$row->name}} {{$row->lastname}}</td>
                                                        <td>{{$row->email}}</td>
                                                        <td>{{$row->phone}}</td>
                                                        <td>{{$row->city}}</td>
                                                        <td>
                                                            @if($row->view == 0)
                                                            <span style="background: orange;color: white;padding: 10px;border-radius: 5px;">Görülməyib</span>
                                                            @else
                                                            <span style="background: green;color: white;padding: 10px;border-radius: 5px;">Görülüb</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->status == 0)
                                                            <span style="background: #ffe700;color: white;padding: 10px;border-radius: 5px;">Gözləyir</span>
                                                            @elseif($row->status == 1)
                                                            <span style="background: #cece20;color: white;padding: 10px;border-radius: 5px;">Hazırlanır</span>
                                                            @elseif($row->status == 2)
                                                            <span style="background: orange;color: white;padding: 10px;border-radius: 5px;">Yoldadır</span>
                                                            @elseif($row->status == 3)
                                                            <span style="background: green;color: white;padding: 10px;border-radius: 5px;">Təhvil verildi</span>
                                                            @elseif($row->status == 4)
                                                            <span style="background: red;color: white;padding: 10px;border-radius: 5px;">İmtina edildi</span>
                                                            @endif
                                                        </td>
                                                        
                                                        <td>
                                                            {{$row->created_at}}
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="hstack gap-3 flex-wrap">
                                                                <a href="{{ route('orders.show', ['order' => $row->id]) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                <form action="{{ route('orders.destroy', $row->id) }}" method="POST">
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

@section('footer-scripts')
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
    $(window).load(function()
{
   var phones = [{ "mask": "+\\9\\94(##)###-##-##"}, { "mask": "+994(##)###-##-##"}];
    $('#phone').inputmask({ 
        mask: phones, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
});
</script>
@endsection
