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
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="movie-img sticky-sb">
                        <img src="{{URL::to('public/uploads/films/'.$singleFilm->Anh)}}" alt="">
                        <div class="movie-btn">
                            <div class="btn-transform transform-vertical red">
                                <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Xem Trailer</a></div>
                                <div><a href="{{$singleFilm->Trailer}}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                            </div>
                            <div class="btn-transform transform-vertical">
                                <div><a href="{{URL::to('/book-ticket/'.$singleFilm->IDf)}}" class="item item-1 yellowbtn"> <i class="ion-card"></i> Mua vé</a></div>
                                <div><a href="{{URL::to('/book-ticket/'.$singleFilm->IDf)}}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct main-content">
                        <h1 class="bd-hd">{{$singleFilm->TenPhim}}</h1>
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
                                <p><span>{{$singleFilm->IMDB}}</span> /10<br>
                                </p>
                            </div>
                            <div class="rate-star">
                                <p>IMDB:  </p>
                                @for ($x = 0; $x < $singleFilm->IMDB; $x++)
                                    <i class="ion-ios-star"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="movie-tabs">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#overview">Tổng quát</a></li>
                                    <li><a href="#cast">  Diễn Viên </a></li>
                                    <li><a href="#moviesrelated">Phim liên quan </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overview" class="tab active">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <p> Bộ phim <span>{{$singleFilm->TenPhim}}</span> của đạo diễn <span> {{$singleFilm->DaoDien}}</span> với sự tham gia của các diễn viên, nam chính
                                                    trong vai <span>{{$singleFilm->NamChinh}}</span>, nữ chính trong vai <span>{{$singleFilm->NuChinh}}</span> cùng một số diễn viên
                                                    khác. Bộ phim của hãng <span>{{$singleFilm->TenHSX}}</span> sản xuất, thuộc thể lọai <span>{{$singleFilm->TenTheLoai}}</span>.</p>
                                                <div class="title-hd-sm">
                                                    <h4>Nội dung</h4>
                                                </div>
                                                <div class="mvsingle-item ov-item">
                                                    <p>{{$singleFilm->NoiDung}}</p>
                                                </div>
                                                <div class="title-hd-sm">
                                                    <h4>diễn viên</h4>
                                                </div>
                                                <!-- movie cast -->
                                                <div class="mvcast-item">
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                        <?php 
                                                            $words = explode(" ", $singleFilm->NamChinh);
                                                            $acronym = "";
                                                            foreach ($words as $w) {
                                                                $acronym .= $w[0];
                                                            }
                                                            echo '<h4>',$acronym.'</h4>'
                                                        ?>                                                            <a href="#">{{$singleFilm->NamChinh}}</a>
                                                        </div>
                                                        <p>...  {{$singleFilm->NamChinh}}</p>
                                                    </div>
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                        <?php 
                                                            $words = explode(" ", $singleFilm->NuChinh);
                                                            $acronym = "";
                                                            foreach ($words as $w) {
                                                                $acronym .= $w[0];
                                                            }
                                                            echo '<h4>',$acronym.'</h4>'
                                                        ?>
                                                            <a href="#">{{$singleFilm->NuChinh}}</a>
                                                        </div>
                                                        <p>...  {{$singleFilm->NuChinh}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="title-hd-sm">
                                                </div>
                                                <!-- movie user review -->
                                                <div class="mv-user-review-item">
                                                    <h3>Đặt vé ngay!</h3>
                                                    <p>
                                                        Quên việc đứng chờ mỏi chân ở rạp đi nhìn vé đi! Gì đây chỉ với chiếc điện thoại được cài đặt internet, bạn chỉ mất 5 phút cho việc đặt vé thôi. Bên cạnh đó còn vô số tiện ích khác như:
                                                    <p style="text-indent: 30px"> Nhận vé tơi khu vực VIP nhanh chóng </p>
                                                    <p style="text-indent: 30px">Tích điểm thưỏng đổi vé, combo nưóc - bỏng ngô</p>
                                                    <p style="text-indent: 30px">	Lựa chọn chỗ ngồi ưng ý</p>
                                                    <p style="text-indent: 30px">	Tiết kiệm thời gian: không phải xếp hàng mua vé</p>
                                                    <p style="text-indent: 30px">	Xem chi tiết các thông tin về phim như diễn viên, trailer, thể loại,...</p>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="sb-it">
                                                    <h6>Đạo diễn: </h6>
                                                    <p><a href="#">{{$singleFilm->DaoDien}}</a></p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Diễn viên chính: </h6>
                                                    <p><a href="#">{{$singleFilm->NamChinh}} </a>,<a href="#">{{$singleFilm->NuChinh}}</a></p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Thể loại:</h6>
                                                    <p><a href="#">{{$singleFilm->TenTheLoai}}</a></p>
                                                </div>
                                                <div class="sb-it">
                                                    <h6>Ngày Chiếu:</h6>
                                                    <p>{{$singleFilm->NgayKhoiChieu}} (V.N)</p>
                                                </div>
                                                <div class="sb-it">
                                                    <!-- <h6>Run Time:</h6>
                                                    <p>141 min</p> -->
                                                </div>
                                                <div class="sb-it">
                                                    <h6>IMDB:</h6>
                                                    <p>{{$singleFilm->IMDB}}</p>
                                                </div>
                                  
                                                <div class="ads">
                                                    <img src="images/uploads/ads1.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="cast" class="tab">
                                        <div class="row">
                                            <h2>{{$singleFilm->TenPhim}}</h2>
                                            <!-- //== -->
                                            <div class="title-hd-sm">
                                                <h4>Đạo diễn</h4>
                                            </div>
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <?php 
                                                            $words = explode(" ", $singleFilm->DaoDien);
                                                            $acronym = "";
                                                            foreach ($words as $w) {
                                                                $acronym .= $w[0];
                                                            }
                                                            echo '<h4>',$acronym.'</h4>'
                                                        ?>
                                                        <a href="#">{{$singleFilm->DaoDien}}</a>
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
                                                    <?php 
                                                        $words = explode(" ", $singleFilm->NamChinh);
                                                        $acronym = "";
                                                        foreach ($words as $w) {
                                                            $acronym .= $w[0];
                                                        }
                                                        echo '<h4>',$acronym.'</h4>'
                                                    ?>                                                       
                                                    <a href="#">{{$singleFilm->NamChinh}}</a>
                                                    </div>
                                                    <p>...  {{$singleFilm->NamChinh}}.</p>
                                                </div>
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                    <?php 
                                                            $words = explode(" ", $singleFilm->NuChinh);
                                                            $acronym = "";
                                                            foreach ($words as $w) {
                                                                $acronym .= $w[0];
                                                            }
                                                            echo '<h4>',$acronym.'</h4>'
                                                        ?>
                                                        <a href="#">{{$singleFilm->NuChinh}}</a>
                                                    </div>
                                                    <p>...  {{$singleFilm->NuChinh}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="moviesrelated" class="tab">
                                        <div class="row">
                                            <h3>Phim liên quan</h3>
                                            @foreach($relatedFilms as $relatedFilm)
                                                <div class="movie-item-style-2">
                                                    <img src="{{URL::to('public/uploads/films/'.$relatedFilm->Anh)}}" style="width:170px; height:261px" alt="">
                                                    <div class="mv-item-infor">
                                                        <h6><a href="{{URL::to('/single-film/'.$relatedFilm->IDf)}}">{{$relatedFilm->TenPhim}}</a></h6>
                                                        <p class="rate"><i class="ion-android-star"></i><span>{{$relatedFilm->IMDB}}</span> /10</p>
                                                        <p class="describe"> Bộ phim <span>{{$relatedFilm->TenPhim}}</span> của đạo diễn <span> {{$relatedFilm->DaoDien}}</span> với sự tham gia của các diễn viên, nam chính
                                                            trong vai <span>{{$relatedFilm->NamChinh}}</span>, nữ chính trong vai <span>{{$relatedFilm->NuChinh}}</span> cùng một số diễn viên
                                                            khác. Bộ phim của hãng <span>{{$relatedFilm->TenHSX}}</span> sản xuất, thuộc thể loại <span>{{$relatedFilm->TenTheLoai}}</span>.</p>
                                                        <p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
                                                        <p>Đạo diễn: <a href="#">{{$relatedFilm->DaoDien}}</a></p>
                                                        <p>Diễn viên: <a href="#">{{$relatedFilm->NamChinh}}, </a> <a href="#">{{$relatedFilm->NuChinh}}</a></p>
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
@endsection