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

    .password-item{
      position:relative;
    }
    .password-item span{
          position: absolute;
    right: 6%;
    top: 9%;
    cursor: pointer;
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
        <a href="{{route('information')}}"><i class="fa fa-user"></i> Şəxsi Məlumatlar</a>
        <a href="{{route('panel')}}"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Sifarişlər</a>
        <a href="{{route('passwordEdit')}}" class="active"><i class="fa fa-lock"></i> Şifrəni Yenilə</a>
        <a href="{{route('customer_logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Çıxış</a>
      </div>
    </div>

    <!-- Content -->
    <div class="col-lg-9">
      <h1 class="mb-4">Şifrəni Yenilə</h1>
      <div class="profile-card">
@if ($errors->any())
    
            @foreach ($errors->all() as $error)
                <div style="color: white;background-color: #ff546e;" class="alert alert-danger">
                        {{ $error }}
                    </div>
            @endforeach
        
@endif
        @if(session('success'))
                    <div style="color: white;background-color: #ff546e;" class="alert alert-danger">
                        {{ session('success') }}
                    </div>
                @endif

        <form action="{{route('passwordUpdate')}}" method="post" >
          @csrf
          

          <div class="row mt-4">
            <div class="col-md-12 password-item">
              <input type="password" name="old_password" class="form-control" placeholder="Köhnə Şifrə" >
              <span><i class="fa-solid fa-eye"></i></span>
            </div>

            <div class="col-md-12 password-item">
              <input type="password" name="new_password" class="form-control" placeholder="Yeni Şifrə" >
              <span><i class="fa-solid fa-eye"></i></span>
            </div>

            <div class="col-md-12 password-item">
              <input type="password" name="confirm_password" class="form-control" placeholder="Yeni Şifrənin Təkrarı" >
              <span><i class="fa-solid fa-eye"></i></span>
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
  $('.password-item span').click(function(){
    let input = $(this).closest('.password-item').find('input'); // inputu tapırıq
    let currentType = input.attr('type'); // hazırki type-i oxuyuruq

    if(currentType === 'password'){
      input.attr('type', 'text'); // əgər password-dursa text et
    }else{
      input.attr('type', 'password'); // əks halda password et
    }

    // istəsən iconu da dəyiş
    $(this).find('i').toggleClass('fa-eye fa-eye-slash');
  });
</script>
@endsection