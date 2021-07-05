@extends('welcome')
@section('content')
<div class="hero sr-single-hero sr-single">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single" style="padding-top:69px; padding-bottom:69px">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">RẠP CHIẾU PHIM BLOCK</h1>
					<div class="social-btn">
						<a href="#" class="parent-btn"></a>
						<div class="hover-bnt">
							<a href="#" class="parent-btn"></a>
							<div class="hvr-item">
								<a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
							</div>
						</div>		
					</div>
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>Block</span> /Buster<br>
							</p>
						</div>
						<div class="rate-star">
							<p>Các bộ phim đang chiếu  </p>
							<i class="ion-ios-star"></i>
						</div>
					</div>
					<div class="movie-tab">
			
					 </div>
					</div>
                </div>
			</div>
        </div>
    </div>
</div>
<div class="page-single" >
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p>Xem tất cả <span>bộ phim</span> trên buster</p>
					<a  href="moviegrid.html" class="grid"><i class="ion-grid active"></i></a>
				</div>
				<div class="flex-wrap-movielist">
				@foreach($films as $film)
						<div class="movie-item-style-2 movie-item-style-1">
							<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="">
							<div class="hvr-inner">
	            				<a  href="{{URL::to('/single-film/'.$film->IDf)}}"> Xem thêm <i class="ion-android-arrow-dropright"></i> </a>
	            			</div>
							<div class="mv-item-infor">
								<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}}</a></h6>
								<p class="rate"><i class="ion-android-star"></i><span>{{$film->IMDB}}</span> /10</p>
							</div>
						</div>
				@endforeach	
				</div>		
				<div class="topbar-filter">
					
					<div class="pagination2">
						{{$films->links()}}
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="searh-form">
						<h4 class="sb-title">Tìm phim theo giờ chiếu</h4>
						<form class="form-style-1" action="{{URL::to('/search')}}" method="POST">
						{{csrf_field()}}
							<div class="row">
								<div class="col-md-12 form-it">
									<label>Ngày chiếu</label>
									<input type="date" name='date' placeholder="Ngày chiếu">
								</div>
								<div class="col-md-12 ">
									<input class="submit" name="btn_search" type="submit" value="Tìm kiếm">
								</div>
							</div>
						</form>
					</div>
					<div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection