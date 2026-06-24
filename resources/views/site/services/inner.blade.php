@extends('layouts.design')
@section('content')

		<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>SERVİS</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><a href="{{route('services_az')}}">Servis</a></li>
							<li><span>{{$service->serviceTranslations->where('locale','az')->first()->title}}</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
				
		<!-- Blog Details Page -->
		<div id="blog_page_area">
			<div class="container">
				<div class="row">					
					<div class="col-md-12 col-xs-12">
						<!-- Single blog -->
						<div class="single_blog">								
							<div class="single_blog_img">
								<img src="{{asset('storage/services/'.$service->img)}}" alt="">
								
							</div>
						
							<div class="blog_content">
									
								<div class="blog_details">
									{!!$service->serviceTranslations->where('locale','az')->first()->text!!}
								</div>							
							</div>							
						</div>		
						<!-- End Single blog -->
					
					</div>
					
				</div>					
			</div>
		</div>

@endsection

@section('mainJs')
@endsection