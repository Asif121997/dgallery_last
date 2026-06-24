@extends('layouts.design')
@section('content')
	<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>{{$page->pageTranslations->where('locale',App::getLocale())->first()->name}}</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>{{$page->pageTranslations->where('locale',App::getLocale())->first()->name}}</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
	<!-- About Page -->
	
	<div class="about_page_area fix">
		<div class="container">
			<div class="row about_inner">
				<div class="about_img_area col-lg-6 col-md-12 col-xs-12">
					
					  <img src="{{asset('storage/pages/'.$page->img)}}" alt="">
					
				</div>
				
				<div class="about_content_area col-lg-6  col-md-12 col-xs-12">
					<h2>{{$page->pageTranslations->where('locale',App::getLocale())->first()->name}}</h2>
					{!!$page->pageTranslations->where('locale',App::getLocale())->first()->text!!}
				</div>
				
			</div>
			
			
		</div>
	</div>
@endsection

@section('mainJs')

@endsection