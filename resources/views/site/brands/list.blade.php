@extends('layouts.design')
@section('content')
	<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3>Brendlər</h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="{{route('homepage')}}">Ana Səhifə</a></li>
							<li><span>Brendlər</span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
				
		<!-- Blog Page -->
		<!--  Brand -->
		<section id="brand_area" style="background:transparent;" class="text-center">
			<div class="container">					
				<div class="row">
					<div class="row">
						
							@foreach($brands as $brand)
							
							@php
    $brandsSelected = collect((array) request()->brand);

    if ($brandsSelected->contains($brand->id)) {
        $brandsSelected = $brandsSelected->reject(fn($id) => $id == $brand->id);
    } else {
        $brandsSelected->push($brand->id);
    }
@endphp
							<div class="col-md-2"> 
								<a href="{{ route('product_'.App::getLocale(), array_merge(
    request()->except('brand'),
    ['brand' => $brandsSelected->values()->all()]
)) }}">
									<img src="{{asset('storage/brands/'.$brand->img)}}" alt="{{$brand->name}}" class="img-responsive" />
								</a> 
							</div>
							@endforeach
						
					</div>
				</div>
			</div>        
		</section>  


@endsection

@section('mainJs')
@endsection