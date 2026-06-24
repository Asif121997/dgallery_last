@extends('layouts.design')
@section('content')
		
		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Hesab</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Hesab</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
		
		<!-- Login Page -->
		<div class="login_page_area">
			<div class="container">
			    @if(session('customersuccessmessage'))
								    <div style="color: white;background-color: #ff546e;" class="alert alert-danger">
								        {{ session('customersuccessmessage') }}
								    </div>
								@endif
								
								@if(session('customererrormessage'))
								    <div style="color: white;background-color: #ff546e;" class="alert alert-danger">
								        {{ session('customererrormessage') }}
								    </div>
								@endif
				<div class="row">
				    
					<div class="col-md-6 col-sm-6 col-xs-12 mx-auto">
						<div class="create_account_area ">
							<form id="registerForm" action="{{route('customer_register')}}" method="post">
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
								<h2 class="caa_heading">Hesab yarat</h2>
								<div class="caa_form_area">
									<p> </p>
									<div class="caa_form_group">
										<div class="caf_form">
											<label><span>*</span>Adınız</label>
											<div class="input-area"><input type="text" name="name" required/></div>
										</div>

										<div class="caf_form">
											<label><span>*</span>E-poçt</label>
											<div class="input-area"><input type="email" name="email" required/></div>
										</div>

										<div class="caf_form">
											<label><span>*</span>Mobil nömrə</label>
											<div class="input-area">
												<input name="phone" id="phone" type="text" placeholder="+994(__)___-__-__" aria-label="Telefon" name="phone" required>
											</div>
											@error('phone')
				                                <span style="color: red;">{{ $message }}</span>
				                            @enderror
										</div>

										<div class="caf_form">
											<label><span>*</span>Şifrə</label>
											<div class="input-area"><input id="userPassword" type="password"  name="password" required/></div>
											<p class="userPasswordText" style="color:red;text-align: left;font-size: 13px;"></p>
										</div>

										<div class="caf_form">
											<label><span>*</span>Təkrar şifrə</label>
											<div class="input-area"><input id="confirmInput" type="password"  name="confirm_password"/></div>
											<p class="confirmPasswordText" style="color:red;text-align: left;font-size: 13px;"></p>
										</div>

										<button class="btn btn-default acc_btn" type="submit"> 
											<span> <i class="fa fa-user btn_icon"></i> Qeydiyyat</span> 
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--<div class="col-md-6 col-sm-6 col-xs-12">-->
					<!--	<div class="create_account_area">-->
					<!--		<h2 class="caa_heading">Hesaba gİrİş</h2>-->
					<!--		@if (\Session::has('error'))-->
		   <!--                 <div class="alert alert-dark" role="alert" style="color: white;background-color: #fe6f85;border-color: #fe7086;">-->
		   <!--                   {!! \Session::get('error') !!}-->
		   <!--                 </div>-->
		   <!--                 @endif-->
					<!--		<form method="post" action="{{route('customerLoginPost')}}">-->
					<!--			@csrf-->
					<!--			<div class="caa_form_area">-->
					<!--				<div class="caa_form_group">-->
					<!--					<div class="login_email">-->
					<!--						<label>E-poçt</label>-->
					<!--						<div class="input-area"><input type="email"  name="email"/></div>-->
					<!--					</div>-->
					<!--					<div class="login_password">-->
					<!--						<label>Şifrə</label>-->
					<!--						<div class="input-area"><input type="password"  name="password"/></div>-->
					<!--					</div>-->
					<!--					<p class="forgot_password">-->
					<!--						<a href="{{route('forgotPassword')}}" title="Recover your forgotten password" rel="">Şifrəni unutdum</a>-->
					<!--					</p>-->
					<!--					<button type="submit" id="acc_Login" class="btn btn-default acc_btn"> -->
					<!--						<span> <i class="fa fa-lock btn_icon"></i> Daxil ol </span> -->
					<!--					</button>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</form>-->
					<!--	</div>-->
					<!--</div>-->
				</div>
			</div>
		</div>		
		

@endsection

@section('mainJs')
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

<script type="text/javascript">
    $('#userPassword').keyup(function(){
        var password = $('#userPassword').val();
        
        if(password.length < 5){
            $('p.userPasswordText').text('Simvol sayı minimum 5 simvol olmalıdır.');
        }else{
            $('p.userPasswordText').text(' ');
        }
    });
</script>

<script type="text/javascript">
    $('#confirmInput').keyup(function(){
        var password = $('#userPassword').val();
        var value = $(this).val();
        if(password == value){
            $('p.confirmPasswordText').text(' ');
        }else{
            $('p.confirmPasswordText').text('Şifrələr eyni deyil');
        }
    });

    $('#userPassword').keyup(function(){
        var password = $('#confirmInput').val();
        var value = $(this).val();
        if(password == value){
            $('p.confirmPasswordText').text(' ');
        }else{
            $('p.confirmPasswordText').text('Şifrələr eyni deyil');
        }
    })
</script>
@endsection