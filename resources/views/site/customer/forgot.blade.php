@extends('layouts.design')
@section('content')
		
		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Şifrəni unutdum</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Şifrəni unutdum</span></li>
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
							<form id="registerForm" action="{{route('forgotPasswordPost')}}" method="post">
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
								<h2 class="caa_heading">Şifrəni unutdum</h2>
								<div class="caa_form_area">
									
									<div class="caa_form_group">
										
										<div class="caf_form">
											<label><span>*</span>E-poçt ünvanı</label>
											<div class="input-area"><input type="email" name="email" required/></div>
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

@endsection