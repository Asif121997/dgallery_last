@extends('layouts.design')
@section('header-links')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
    .password-item{
    position:relative;
}
.password-item span{
    position: absolute;
    right: 2%;
    top: 21%;
    font-size: 25px;
    cursor: pointer;
}
</style>
@endsection
@section('content')
		
		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Şifrəni yenilə</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Şifrəni yenilə</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
		
		<!-- Login Page -->
		<div class="login_page_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="create_account_area caa_pdngbtm">
							<form id="registerForm" action="{{route('passwordResetUpdate')}}" method="post">
								@csrf
								@if(session('errormessage'))
								    <div style="color: white;background-color: #ff546e;" class="alert alert-danger">
								        {{ session('errormessage') }}
								    </div>
								@endif

								@if(session('successmessage'))
								    <div style="color: white;background-color: #ff546e;" class="alert alert-danger">
								        {{ session('successmessage') }}
								    </div>
								@endif
								<h2 class="caa_heading">Şifrəni yenilə</h2>
								<div class="caa_form_area">
									
									<div class="caa_form_group">
									    <input type="hidden" name="token" value="{{ $token }}">
									    <div class="form-group clearfix">
                            <input name="email" type="hidden" class="form-control" placeholder="Email" aria-label="Email Address" @if(request()->email) value="{{request()->email}}" @endif>
                        </div>
										
										<div class="caf_form">
											<label><span>*</span>Yeni Şifrə</label>
											<div class="input-area  password-item"><input type="password" name="new_password" required/>
											<span><i class="fa-solid fa-eye"></i></span></div>
										</div>
										
										<div class="caf_form">
											<label><span>*</span>Yeni Şifrənin Təkrarı</label>
											<div class="input-area  password-item"><input type="password" name="confirm_password" required/>
											<span><i class="fa-solid fa-eye"></i></span></div>
										</div>

										<button class="btn btn-default acc_btn" type="submit"> 
											<span> <i class="fa fa-user btn_icon"></i> Göndər </span> 
										</button>
									</div>
								</div>
							</form>
						</div>
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