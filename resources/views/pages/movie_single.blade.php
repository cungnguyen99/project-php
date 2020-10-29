@extends('welcome')
@section('content')
<div class="hero mv-single-hero">
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
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
		<?php
		echo $singleFilm
		?>
		@foreach($singleFilm as $film)
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Xem Trailer</a></div>
							<div><a href="https://www.youtube.com/embed/o-0hcF97wy0" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
						<div class="btn-transform transform-vertical">
							<div><a href="#" class="item item-1 yellowbtn"> <i class="ion-card"></i> Mua vé</a></div>
							<div><a href="#" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{$film->TenPhim}}</h1>
					<div class="social-btn">
						<a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
						<div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
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
							<p><span>{{$film->IMDB}}</span> /10<br>
							</p>
						</div>
						<div class="rate-star">
							<p>IMDB:  </p>
							<?php
								for ($x = 0; $x <$film->IMDB; $x++) {
								echo "<i class='ion-ios-star'></i>";
								}
							?>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Tổng quát</a></li>
								<li><a href="#cast">  Diễn Viên </a></li>
								<li><a href="#media"> Media</a></li>
								<li><a href="#moviesrelated">Phim liên quan </a></li>                        
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
						            		<p> Bộ phim <span>{{$film->TenPhim}}</span> của đạo diễn <span> {{$film->DaoDien}}</span> với sự tham gia của các diễn viên, nam chính
											trong vai <span>{{$film->NamChinh}}</span>, nữ chính trong vai <span>{{$film->NuChinh}}</span> cùng một số diễn viên 
											khác. Bộ phim thuộc hãng <span>{{$film->TenHSX}}</span> sản xuất thuộc thể loại <span>{{$film->TenTheLoai}}</span>.</p>
						            		<div class="title-hd-sm">
												<h4>Videos & Photos</h4>
												<a href="#" class="time">All 5 Videos & 245 Photos <i class="ion-ios-arrow-right"></i></a>
											</div>
											<div class="mvsingle-item ov-item">
												<a class="img-lightbox"  data-fancybox-group="gallery" href="{{URL::to('public/frontend/images/uploads/image11.jpg')}}" ><img src="{{URL::to('public/frontend/images/uploads/image1.jpg')}}" alt=""></a>
												<a class="img-lightbox"  data-fancybox-group="gallery" href="{{URL::to('public/frontend/images/uploads/image21.jpg')}}" ><img src="{{URL::to('public/frontend/images/uploads/image2.jpg')}}" alt=""></a>
												<a class="img-lightbox"  data-fancybox-group="gallery" href="{{URL::to('public/frontend/images/uploads/image31.jpg')}}" ><img src="{{URL::to('public/frontend/images/uploads/image3.jpg')}}" alt=""></a>
												<div class="vd-it">
													<img class="vd-img" src="{{URL::to('public/frontend/images/uploads/image4.jpg')}}" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="{{URL::to('public/frontend/images/uploads/play-vd.png')}}" alt=""></a>
												</div>
											</div>
											<div class="title-hd-sm">
												<h4>diễn viên</h4>
												<a href="#" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left">
														<img src="{{URL::to('public/frontend/images/uploads/cast1.jpg')}}" alt="">
														<a href="#">{{$film->NamChinh}}</a>
													</div>
													<p>...  {{$film->NamChinh}}</p>
												</div>
												<div class="cast-it">
													<div class="cast-left">
														<img src="{{URL::to('public/frontend/images/uploads/cast7.jpg')}}" alt="">
														<a href="#">{{$film->NuChinh}}</a>
													</div>
													<p>...  {{$film->NuChinh}}</p>
												</div>
											</div>
											<div class="title-hd-sm">
												<h4>bình luận</h4>
												<a href="#" class="time">Xem tất cả <i class="ion-ios-arrow-right"></i></a>
											</div>
											<!-- movie user review -->
											<div class="mv-user-review-item">
												<h3>Best Marvel movie in my opinion</h3>
												<div class="no-star">
												<?php 
														for ($x = 0; $x <$film->IMDB; $x++) {
															echo "<i class='ion-android-star'></i>";
															}
													?>
												</div>
												<p class="time">
													17 December 2016 by <a href="#"> hawaiipierson</a>
												</p>
												<p>
												Quên việc đứng chờ mỏi chân ở rạp để nhận vé đi! Giờ đây chỉ với chiếc điện thoại được cài đặt ứng dụng CGV bạn chỉ mất 5 phút cho việc đặt vé thôi. Bên cạnh đó còn vô số tiện ích khác như:
												
													</br>Nhận vé tại khu vực VIP nhanh chóng
													</br>​Tích điểm thưởng đổi vé, combo nước - bỏng ngô
													</br>Lựa chọn chỗ ngồi ưng ý
													</br>Tiết kiệm thời gian: không phải đến trước xếp hàng mua vé
													</br>Xem chi tiết các thông tin về phim như diễn viên, trailer, độ tuổi, thể loại,...
												</p>
											</div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Đạo diễn: </h6>
						            			<p><a href="#">{{$film->DaoDien}}</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Stars: </h6>
						            			<p><a href="#">{{$film->NamChinh}} </a>,<a href="#">{{$film->NuChinh}}</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Thể loại:</h6>
						            			<p><a href="#">{{$film->TenTheLoai}}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Ngày Chiếu:</h6>
						            			<p>{{$film->NgayKhoiChieu}} (V.N)</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Run Time:</h6>
						            			<p>141 min</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>IMDB:</h6>
						            			<p>{{$film->IMDB}}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Từ khóa:</h6>
						            			<p class="tags">
						            				<span class="time"><a href="#">superhero</a></span>
													<span class="time"><a href="#">marvel universe</a></span>
													<span class="time"><a href="#">comic</a></span>
													<span class="time"><a href="#">blockbuster</a></span>
													<span class="time"><a href="#">final battle</a></span>
						            			</p>
						            		</div>
						            		<div class="ads">
												<img src="images/uploads/ads1.png" alt="">
											</div>
						            	</div>
						            </div>
						        </div>
						        <div id="cast" class="tab">
						        	<div class="row">
						            	<h3>Cast & Crew of</h3>
					       	 			<h2>{{$film->TenPhim}}</h2>
										<!-- //== -->
					       	 			<div class="title-hd-sm">
											<h4>Đạo diễn</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<h4>JW</h4>
													<a href="#">{{$film->DaoDien}}</a>
												</div>
												<p>...  Đạo diễn</p>
											</div>
										</div>
					
										<!-- //== -->
										<div class="title-hd-sm">
											<h4>Cast</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<img src="{{URL::to('public/frontend/images/uploads/cast1.jpg')}}" alt="">
													<a href="#">{{$film->NamChinh}}</a>
												</div>
												<p>...  {{$film->NamChinh}}.</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="{{URL::to('public/frontend/images/uploads/cast7.jpg')}}" alt="">
													<a href="#">{{$film->NuChinh}}</a>
												</div>
												<p>...  {{$film->NuChinh}}</p>
											</div>
										</div>
										<!-- //== -->
										<div class="title-hd-sm">
											<h4>Produced by</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<h4>VA</h4>
													<a href="#">Victoria Alonso</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>MB</h4>
													<a href="#">Mitchel Bell</a>
												</div>
												<p>...  co-producer (as Mitch Bell)</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JC</h4>
													<a href="#">Jamie Christopher</a>
												</div>
												<p>...  associate producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>LD</h4>
													<a href="#">Louis D’Esposito</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JF</h4>
													<a href="#">Jon Favreau</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>KF</h4>
													<a href="#">Kevin Feige</a>
												</div>
												<p>...  producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>AF</h4>
													<a href="#">Alan Fine</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JF</h4>
													<a href="#">Jeffrey Ford</a>
												</div>
												<p>...  associate producer</p>
											</div>
										</div>
						            </div>
					       	 	</div>
					       	 	<div id="media" class="tab">
						        	<div class="row">
						        		<div class="rv-hd">
						            		<div>
						            			<h3>Videos & Photos of</h3>
					       	 					<h2>Skyfall: Quantum of Spectre</h2>
						            		</div>
						            	</div>
						            	<div class="title-hd-sm">
											<h4>Videos <span>(8)</span></h4>
										</div>
										<div class="mvsingle-item media-item">
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item1.jpg" alt="">
													<a class="fancybox-media hvr-grow"  href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Trailer:  Watch New Scenes</a></h6>
													<p class="time"> 1: 31</p>
												</div>
											</div>
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item2.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Featurette: “Avengers Re-Assembled</a></h6>
													<p class="time"> 1: 03</p>
												</div>
											</div>
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item3.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Interview: Robert Downey Jr</a></h6>
													<p class="time"> 3:27</p>
												</div>
											</div>
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item4.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Interview: Scarlett Johansson</a></h6>
													<p class="time"> 3:27</p>
												</div>
											</div>
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item1.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Featurette: Meet Quicksilver & The Scarlet Witch</a></h6>
													<p class="time"> 1: 31</p>
												</div>
											</div>
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item2.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Interview: Director Joss Whedon</a></h6>
													<p class="time"> 1: 03</p>
												</div>
											</div>
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item3.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Interview: Mark Ruffalo</a></h6>
													<p class="time"> 3:27</p>
												</div>
											</div>
											<div class="vd-item">
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/vd-item4.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
												<div class="vd-infor">
													<h6> <a href="#">Official Trailer #2</a></h6>
													<p class="time"> 3:27</p>
												</div>
											</div>
										</div>
										<div class="title-hd-sm">
											<h4>Photos <span> (21)</span></h4>
										</div>
										<div class="mvsingle-item">
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image11.jpg" ><img src="images/uploads/image1.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery"  href="images/uploads/image21.jpg" ><img src="images/uploads/image2.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image31.jpg" ><img src="images/uploads/image3.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image41.jpg" ><img src="images/uploads/image4.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image51.jpg" ><img src="images/uploads/image5.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image61.jpg" ><img src="images/uploads/image6.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image71.jpg" ><img src="images/uploads/image7.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image81.jpg" ><img src="images/uploads/image8.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image91.jpg" ><img src="images/uploads/image9.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image101.jpg" ><img src="images/uploads/image10.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image111.jpg" ><img src="images/uploads/image1-1.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image121.jpg" ><img src="images/uploads/image12.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image131.jpg" ><img src="images/uploads/image13.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image141.jpg" ><img src="images/uploads/image14.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image151.jpg" ><img src="images/uploads/image15.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image161.jpg" ><img src="images/uploads/image16.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image171.jpg" ><img src="images/uploads/image17.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image181.jpg" ><img src="images/uploads/image18.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image191.jpg" ><img src="images/uploads/image19.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image201.jpg" ><img src="images/uploads/image20.jpg" alt=""></a>
											<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image211.jpg" ><img src="images/uploads/image2-1.jpg" alt=""></a>
										</div>
						        	</div>
					       	 	</div>
					       	 	<div id="moviesrelated" class="tab">
					       	 		<div class="row">
					       	 			<h3>Phim liên quan</h3>
					       	 			<h2>{{$film->TenPhim}}</h2>
										<div class="movie-item-style-2">
										@foreach($relatedFilms as $film)
											<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" width="185" height="284" alt="">
											<div class="mv-item-infor">
												<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}} <span>(2012)</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
												<p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Joss Whedon</a></p>
												<p>Stars: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
											</div>
										</div>
									@endforeach
					       	 		</div>
					       	 	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection