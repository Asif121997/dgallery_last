@extends('layouts.design')
@section('content')
	<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Bloqlar</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Bloqlar</span></li>
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
							@foreach($blogs as $blog)
							<!-- Single blog -->
							<div class="col-lg-4 col-md-4 col-sm-6">						
								<div class="single_blog">
									<div class="single_blog_img">
										<a href="{{route('blog_inner_'.App::getLocale(),['slug'=>$blog->blogTranslations->where('locale',App::getLocale())->first()->slug])}}"><img src="{{asset('storage/blogs/'.$blog->img)}}" alt="{{$blog->blogTranslations->where('locale',App::getLocale())->first()->name}}"></a>
										<div class="blog_date text-center">
											<div class="bd_day"> {{date('d',strtotime($blog->created_at))}}</div>
											<div class="bd_month">{{date('M',strtotime($blog->created_at))}}</div>
										</div>
									</div>
														
									<div class="blog_content">
										<ul class="post-meta">
											<li><i class="ti-user"></i> <a href="#">{{$blog->user->name}}</a></li>									
											
											<li><i class="ti-eye"></i> <a href="#">{{$blog->show}} baxış</a></li>
										</ul>
										<h4 class="post_title"><a href="{{route('blog_inner_'.App::getLocale(),['slug'=>$blog->blogTranslations->where('locale',App::getLocale())->first()->slug])}}">{{$blog->blogTranslations->where('locale',App::getLocale())->first()->name}}</a> </h4>															
										{!!$blog->blogTranslations->where('locale',App::getLocale())->first()->short_text!!}
									</div>
								</div>
							</div>
							<!-- End Single blog -->
							@endforeach
	
							
						</div>
						{{$blogs->links()}}	
										
					</div>
					<!-- Blog Sidebar -->
					
								
				</div>							
			</div>
		</div>


@endsection

@section('mainJs')
@endsection