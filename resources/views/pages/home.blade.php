@extends('welcome')
@section('content')
<div class="slider movie-items">
	<div class="container">
		<div class="row">
		
	    	<div  class="slick-multiItemSlider">
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="{{ asset('public/frontend/images/uploads/slider1.jpg')}}" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Sci-fi</a></span>
	    				</div>
	    				<h6><a href="#">Interstellar</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
				<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="{{ asset('public/frontend/images/uploads/slider2.jpg')}}" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="yell"><a href="#">action</a></span>
	    				</div>
	    				<h6><a href="#">The revenant</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="{{ asset('public/frontend/images/uploads/slider3.jpg')}}" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="green"><a href="#">comedy</a></span>
	    				</div>
	    				<h6><a href="#">Die hard</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="{{ asset('public/frontend/images/uploads/slider4.jpg')}}" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Sci-fi</a></span> <span class="orange"><a href="#">advanture</a></span>
	    				</div>
	    				<h6><a href="#">The walk</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="{{ asset('public/frontend/images/uploads/slider1.jpg')}}" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Sci-fi</a></span>
	    				</div>
	    				<h6><a href="#">Interstellar</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
				<div class="movie-item">
	    			<div class="mv-img">
	    				<a href="#"><img src="{{ asset('public/frontend/images/uploads/slider2.jpg')}}" alt="" width="285" height="437"></a>
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="yell"><a href="#">action</a></span>
	    				</div>
	    				<h6><a href="#">The revenant</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<img src="{{ asset('public/frontend/images/uploads/slider3.jpg')}}" alt="" width="285" height="437">
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="green"><a href="#">comedy</a></span>
	    				</div>
	    				<h6><a href="#">Die hard</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<img src="{{ asset('public/frontend/images/uploads/slider4.jpg')}}" alt="" width="285" height="437">
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="blue"><a href="#">Sci-fi</a></span> <span class="orange"><a href="#">advanture</a></span>
	    				</div>
	    				<h6><a href="#">The walk</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
	    		<div class="movie-item">
	    			<div class="mv-img">
	    				<img src="{{ asset('public/frontend/images/uploads/slider3.jpg')}}" alt="" width="285" height="437">
	    			</div>
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="green"><a href="#">comedy</a></span>
	    				</div>
	    				<h6><a href="#">Die hard</a></h6>
	    				<p><i class="ion-android-star"></i><span>7.4</span> /10</p>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>Thể lọai</h2>
					<a href="{{URL::to('/all-films')}}" class="viewall">Xem thêm <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links">
					@foreach($genres as $key=> $genre)
						<li class="<?php echo (0 == $key)? 'active' : ''; ?>"><a href="#tab{{$key+1}}">#{{$genre->TenTheLoai}}</a></li>
					@endforeach                      
					</ul>
				    <div class="tab-content">
				        <div id="tab1" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
								@foreach($films_1 as $film)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
					            				<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="" width="185" height="284">
					            			</div> 
					            			<div class="hvr-inner">
					            				<a  href="{{URL::to('/single-film/'.$film->IDf)}}"> Xem thêm <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$film->IMDB}}</span> /10</p>
					            			</div>
					            		</div>
				            		</div>
								@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab2" class="tab">
				           <div class="row">
				            	<div class="slick-multiItem">
								@foreach($films_2 as $film)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
												<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="" width="185" height="284">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="{{URL::to('/single-film/'.$film->IDf)}}"> Xem thêm <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$film->IMDB}}</span> /10</p>
					            			</div>
					            		</div>
				            		</div>
								@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab3" class="tab">
				        	<div class="row">
				            	<div class="slick-multiItem">
								@foreach($films_3 as $film)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
											<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="" width="185" height="284">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="{{URL::to('/single-film/'.$film->IDf)}}"> Xem thêm <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$film->IMDB}}</span> /10</p>
					            			</div>
					            		</div>
				            		</div>
								@endforeach
				            	</div>
				            </div>
			       	 	</div>
				    </div>
				</div>
				<div class="title-hd">
					<h2>Hãng phim</h2>
					<a href="{{URL::to('/all-films')}}" class="viewall">Xem thêm <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links-2">
					@foreach($manufacturers as $key=> $manufacturer)
						<li class="<?php echo (1 == $key)? 'active' : ''; ?>"><a href="#tab2{{$key+1}}">#{{$manufacturer->TenHSX}}</a></li>   
					@endforeach                   
					</ul>
				    <div class="tab-content">
				        <div id="tab21" class="tab">
				            <div class="row">
				            	<div class="slick-multiItem">
								@foreach($films_4 as $film)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
											<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="" width="185" height="284">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="{{URL::to('/single-film/'.$film->IDf)}}"> Xem thêm <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$film->IMDB}}</span> /10</p>
					            			</div>
					            		</div>
				            		</div>
								@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab22" class="tab active">
				           <div class="row">
				            	<div class="slick-multiItem">
								@foreach($films_5 as $film)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
											<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="" width="185" height="284">
					            			</div>
					            			<div class="hvr-inner">
					            				<a  href="{{URL::to('/single-film/'.$film->IDf)}}"> Xem thêm <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}}</a></h6>
					            				<p><i class="ion-android-star"></i><span>{{$film->IMDB}}</span> /10</p>
					            			</div>
					            		</div>
				            		</div>
								@endforeach
				            	</div>
				            </div>
				        </div>
				        <div id="tab23" class="tab">
				        	<div class="row">
				            	<div class="slick-multiItem">
									@foreach($films_6 as $film)
										<div class="slide-it">
											<div class="movie-item">
												<div class="mv-img">
													<img src="{{URL::to('public/uploads/films/'.$film->Anh)}}" alt="" width="185" height="284">
												</div>
												<div class="hvr-inner">
													<a  href="{{URL::to('/single-film/'.$film->IDf)}}"> Xem thêm <i class="ion-android-arrow-dropright"></i> </a>
												</div>
												<div class="title-in">
													<h6><a href="{{URL::to('/single-film/'.$film->IDf)}}">{{$film->TenPhim}}</a></h6>
													<p><i class="ion-android-star"></i><span>{{$film->IMDB}}</span> /10</p>
												</div>
											</div>
										</div>
									@endforeach
				            	</div>
				            </div>
			       	 	</div>
				    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="ads">
						<img src="{{URL::to('public/frontend/images/uploads/ads1.png')}}" alt="" width="336" height="296">
					</div>
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
				</div>
			</div>
		</div>
	</div>
</div>

<div class="trailers">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12">
				<div class="title-hd">
					<h2> Trailer</h2>
					<a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="videos">
				 	<div class="slider-for-2 video-ft">
				 		<div>
					    	<iframe class="item-video" src="https://www.youtube.com/embed/1Q8fG0TtVAY" data-src="https://www.youtube.com/embed/1Q8fG0TtVAY"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="https://www.youtube.com/embed/w0qQkSuWOS8" data-src="https://www.youtube.com/embed/w0qQkSuWOS8"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="https://www.youtube.com/embed/44LdLqgOpjo" data-src="https://www.youtube.com/embed/44LdLqgOpjo"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="https://www.youtube.com/embed/gbug3zTm3Ws" data-src="https://www.youtube.com/embed/gbug3zTm3Ws"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="https://www.youtube.com/embed/e3Nl_TCQXuw" data-src="https://www.youtube.com/embed/e3Nl_TCQXuw"></iframe>
					    </div>
					    <div>
					    	<iframe class="item-video" src="https://www.youtube.com/embed/NxhEZG0k9_w" data-src="https://www.youtube.com/embed/NxhEZG0k9_w"></iframe>
					    </div>
						
						
					</div>
					<div class="slider-nav-2 thumb-ft">
						<div class="item">
							<div class="trailer-img">
								<img src="{{URL::to('public/frontend/images/uploads/trailer7.jpg')}}"  alt="photo by Barn Images" width="4096" height="2737">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc">Wonder Woman</h4>
	                        	<p>2:30</p>
	                        </div>
						</div>
						<div class="item">
							<div class="trailer-img">
								<img src="{{URL::to('public/frontend/images/uploads/trailer2.jpg')}}"  alt="photo by Barn Images" width="350" height="200">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc">Oblivion: Official Teaser Trailer</h4>
	                        	<p>2:37</p>
	                        </div>
						</div>
						<div class="item">
							<div class="trailer-img">
								<img src="{{URL::to('public/frontend/images/uploads/trailer6.jpg')}}" alt="photo by Joshua Earle">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc">Exclusive Interview:  Skull Island</h4>
	                        	<p>2:44</p>
	                        </div>
						</div>
						<div class="item">
							<div class="trailer-img">
								<img src="{{URL::to('public/frontend/images/uploads/trailer3.png')}}" alt="photo by Alexander Dimitrov" width="100" height="56">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc">Logan: Director James Mangold Interview</h4>	
	                        	<p>2:43</p>
	                        </div>
						</div>
						<div class="item">
							<div class="trailer-img">
								<img src="{{URL::to('public/frontend/images/uploads/trailer4.png')}}"  alt="photo by Wojciech Szaturski" width="100" height="56">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc">Beauty and the Beast: Official Teaser Trailer 2</h4>	
	                        	<p>2: 32</p>
	                        </div>	
						</div>
						<div class="item">
							<div class="trailer-img">
								<img src="{{URL::to('public/frontend/images/uploads/trailer5.jpg')}}"  alt="photo by Wojciech Szaturski" width="360" height="189">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc">Fast&Furious 8</h4>	
	                        	<p>3:11</p>
	                        </div>	
						</div>
					
					</div>
				</div>   
			</div>
		</div>
	</div>
</div>
<!-- latest new v1 section-->
<div class="latestnew">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="ads">
					<img src="{{URL::to('public/frontend/images/uploads/ads2.png')}}" alt="" width="728" height="106">
				</div>
				<div class="title-hd">
					<h2>Thông tin</h2>
				</div>
				<div class="tabs">
					<ul class="tab-links-3">
						<li class="active"><a href="#tab31">#Movies </a></li>
						<li><a href="#tab32"> #TV Shows </a></li>              
						<li><a href="#tab33">  # Celebs</a></li>                       
					</ul>
				    <div class="tab-content">
				        <div id="tab31" class="tab active">
				            <div class="row">
				            	<div class="blog-item-style-1">
				            		<img src="{{ asset('public/frontend/images/uploads/thongtin.jpg')}}" alt="" width="170" height="250">
				            		<div class="blog-it-infor">
				            			<h3><a href="#">Giới thiệu chung</a></h3>
				            			<p>Exclusive: <span>Trung tâm Chiếu phim Block Buster </span>là đơn vị sự nghiệp công lập, trực thuộc Bộ Văn hóa, Thể thao và Du lịch, được thành lập vào ngày 29 tháng 12 năm 1997. <span>Trung tâm Chiếu phim Block Buster</span> có chức năng tổ chức chiếu phim phục vụ các nhiệm vụ chính trị, xã hội, hợp tác quốc tế; điều tra xã hội học...</p>
				            		</div>
				            	</div>
				            </div>
				        </div>
				        <div id="tab32" class="tab">
				           <div class="row">
				            	<div class="blog-item-style-1">
				            		<img src="{{ asset('public/frontend/images/uploads/blog-it2.jpg')}}" alt="" width="170" height="250">
				            		<div class="blog-it-infor">
				            			<h3><a href="#">Tab 2</a></h3>
				            			<span class="time">13 hours ago</span>
				            			<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
				            		</div>
				            	</div>
				            </div>
				        </div>
				        <div id="tab33" class="tab">
				        	<div class="row">
				            	<div class="blog-item-style-1">
				            		<img src="{{ asset('public/frontend/images/uploads/blog-it1.jpg')}}" alt="" width="170" height="250">
				            		<div class="blog-it-infor">
				            			<h3><a href="#">Tab 3</a></h3>
				            			<span class="time">13 hours ago</span>
				            			<p>Exclusive: <span>Amazon Studios </span>has acquired Victoria Woodhull, with Oscar winning Room star <span>Brie Larson</span> polsed to produce, and play the first female candidate for the presidency of the United States. Amazon bought it in a pitch package deal. <span> Ben Kopit</span>, who wrote the Warner Bros film <span>Libertine</span> that has...</p>
				            		</div>
				            	</div>
				            </div>
			       	 	</div>
				    </div>
				</div>
			</div>
			<div class="col-md-4">
			<div class="ads">
						<img src="{{URL::to('public/frontend/images/uploads/ads1.png')}}" alt="" width="336" height="296">
					</div>
			</div>
		</div>
	</div>
</div>
@endsection