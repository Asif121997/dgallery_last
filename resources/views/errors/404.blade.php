@extends('layouts.design')
@section('content')
	<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Səhifə tapılmadı</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Səhifə tapılmadı</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>

		<!-- 404 Page -->
		<div id="page_404_area">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<div class="page_404_content ">
							<h1>4<span>0</span>4</h1>
							<h3>Səhifə tapılmadı.</h3>
						</div>
						<div class="404_btn">
							<a href="{{route('homepage')}}" class="btn border-btn"><i class="fa fa-arrow-circle-o-left"></i> Əsas səhifəyə qayıt</a>
						</div>
					</div>	
				</div>
			</div>
		</div>

@endsection

