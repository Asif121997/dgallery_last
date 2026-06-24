@extends('layouts.design')
@section('header-links')
<style>
    
    .sidebar {
      background: transparent;
      color: #242424;
      border-radius: 20px;
      padding: 20px;
    }
    .sidebar h4 {
      color: #242424;
      text-align: center;
      margin-bottom: 20px;
    }
    .sidebar a {
      color: #242424;
      text-decoration: none;
      display: block;
      padding: 10px 15px;
      border-radius: 10px;
      transition: all 0.3s ease;
      margin-bottom: 10px;
    }
    .sidebar a:hover,
    .sidebar a.active {
      background: #f1f1f1;
    }
    /* ✅ Form və kart */
    .profile-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .profile-pic {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #ff546e;
      margin-bottom: 15px;
    }
    .upload-btn {
      background: linear-gradient(90deg,#ff546e,#ff7f96);
      border: none;
      color: #fff;
      padding: 8px 15px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.3s;
    }
    .upload-btn:hover {
      opacity: 0.9;
    }
    .form-control {
      border-radius: 12px;
      padding: 12px;
      margin-bottom: 15px;
    }
    .save-btn {
      background: linear-gradient(90deg,#ff546e,#ff7f96);
      border: none;
      padding: 12px 25px;
      color: #fff;
      border-radius: 12px;
      font-weight: bold;
      transition: 0.3s;
    }
    .save-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255,84,110,0.3);
    }
  </style>
@endsection
@section('content')
 <div class="container my-4">
  <div class="row">
    <!-- ✅ Sidebar -->
    <div class="col-lg-3 mb-4">
      <div class="sidebar">
        <h4>Mənim hesabım</h4>
        <a href="{{route('information')}}" class="active"><i class="fa fa-user"></i> Şəxsi Məlumatlar</a>
        <a href="{{route('panel')}}"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Sifarişlər</a>
        <a href="{{route('passwordEdit')}}"><i class="fa fa-lock"></i> Şifrəni Yenilə</a>
        <a href="{{route('customer_logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıxış</a>
      </div>
    </div>

    <!-- Content -->
    <div class="col-lg-9">
      <h1 class="mb-4">Şəxsi Məlumatlarım</h1>
      <div class="profile-card">

        @if(session('errormessage'))
                    <div style="color: white;background-color: #ff546e;" class="alert alert-danger">
                        {{ session('errormessage') }}
                    </div>
                @endif
        <form action="{{route('informationPost')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="text-center">
            @if(!empty(Auth::guard('customer')->user()->img))
            <img src="{{asset('storage/customers/'.Auth::guard('customer')->user()->img)}}" class="profile-pic" id="previewImage">
            @else
            <img src="{{asset('site/img/Default.png')}}" class="profile-pic" id="previewImage">
            @endif
            <div style="display: flex;justify-content: center;flex-wrap: nowrap;flex-direction: column;align-items: center;">
              <label style="width:100px;" class="upload-btn">
                Şəkil Seç <input type="file" hidden id="uploadInput" accept="image/*" name="img">

                <input type="text" hidden   name="old_img" value="{{Auth::guard('customer')->user()->img}}">
              </label>
              <span>
                  
              </span>
              @if(Auth::guard('customer')->user()->type == '0')
              <label style="min-width:100px;background:#dc8a0b;" class="upload-btn">
                İstifadəçi statusu : Satış
              </label>
              @elseif(Auth::guard('customer')->user()->type == '1')
              <label style="min-width:100px;background:#0bdca8;" class="upload-btn">
                İstifadəçi statusu : Topdan
              </label>
              @elseif(Auth::guard('customer')->user()->type == '2')
              <label style="min-width:100px;background:#ff0202;" class="upload-btn">
                İstifadəçi statusu : Diller
              </label>
              @elseif(Auth::guard('customer')->user()->type == '3')
              <label style="min-width:100px;background:#1a1275;" class="upload-btn">
                İstifadəçi statusu : Xüsusi
              </label>
              @elseif(Auth::guard('customer')->user()->type == '4')
              <label style="min-width:100px;background:#dc0bad;" class="upload-btn">
                İstifadəçi statusu : VIP
              </label>
              @endif
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Ad" value="{{Auth::guard('customer')->user()->name}}" >
            </div>
            <div class="col-md-6">
              <input type="text" name="lastname" class="form-control" placeholder="Soyad" value="{{Auth::guard('customer')->user()->lastname}}" required>
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control" placeholder="Email" value="{{Auth::guard('customer')->user()->email}}" required>
            </div>
            <div class="col-md-6">
              <input name="phone" id="phone" type="text" placeholder="+994(__)___-__-__" aria-label="Telefon" name="phone" class="form-control" required   value="{{Auth::guard('customer')->user()->phone}}">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="address" placeholder="Ünvan" style="width:100%;">{{Auth::guard('customer')->user()->address}}</textarea>
            </div>
            
          </div>

          <div class="text-end mt-3">
            <button type="submit" class="save-btn">Yadda Saxla</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('mainJs')
<script>
  document.getElementById("uploadInput").addEventListener("change", function(event){
    const reader = new FileReader();
    reader.onload = function(){
      document.getElementById("previewImage").src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
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