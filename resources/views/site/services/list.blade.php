@extends('layouts.design')
@section('content')
	<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Servis</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Servis</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
				
		<!-- Blog Page -->
		<div id="blog_page_area">
			<div class="container">
				<div class="row">				
		
					<div class="col-md-12 col-xs-12">
						<div class="row">
						    @foreach($services as $service)
							<!-- Single blog -->
							<div class="col-lg-4 col-md-6 col-sm-6">						
								<div class="single_blog">
									<div class="single_blog_img">
										<a href="{{route('service_inner',['slug'=> $service->serviceTranslations->where('locale','az')->first()->slug])}}"><img src="{{asset('storage/services/'.$service->img)}}" alt="{{$service->serviceTranslations->where('locale','az')->first()->title}}"></a>
										
									</div>
														
									<div class="blog_content">
									
										<h4 class="post_title"><a href="{{route('service_inner',['slug'=> $service->serviceTranslations->where('locale','az')->first()->slug])}}">{{$service->serviceTranslations->where('locale','az')->first()->title}}</a> </h4>															
										<div>
											{!!$service->serviceTranslations->where('locale','az')->first()->short_text!!}
										
										</div>
									</div>
								</div>
							</div>
							<!-- End Single blog -->
                            @endforeach	
							
						</div>
						
											
					</div>
								
				</div>							
			</div>
		</div>

@endsection

@section('mainJs')
@endsection