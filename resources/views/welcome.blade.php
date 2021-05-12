<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<!-- Basic need -->
	<title>Rạp chiếu phim</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- CSS files -->
	<link rel="stylesheet" href="{{asset('public/frontend/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">

</head>
<body>
<!--preloading-->
<!-- <div id="preloader">
    {{-- <img class="logo" src="{{('public/frontend/images/logo1.png')}}" alt="" width="119" height="58"> --}}
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div> -->
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="#">
        	<div class="row">
        		 <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="******" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
						<input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
					</div>
            		<a href="#">Forget password ?</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="submit">Login</button>
           </div>
        </form>
        <div class="row">
        	<p>Or via social</p>
            <div class="social-btn-2">
            	<a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
            	<a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="#">
            <div class="row">
                 <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="password" name="email" id="email-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="password" id="repassword-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
           <div class="row">
             <button type="submit">sign up</button>
           </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="index-2.html"><img class="logo" src="{{('public/frontend/images/logo1.png')}}" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="first">
							<a class="btn btn-default dropdown-toggle lv1" href="{{URL::to('/home')}}">
							trang chủ
							</a>
						</li>
						<li class="first">
							<a  href="{{URL::to('/all-films')}}" class="btn btn-default dropdown-toggle lv1">
							phim
							</a>
						</li>
						<li class="first">
							<a class="btn btn-default dropdown-toggle lv1">
							tin tức
							</a>
						</li>
						<li class="first">
							<a class="btn btn-default dropdown-toggle lv1" >
							liên hệ
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
						<li><a href="#">trợ giúp</a></li>
						<?php
						$id=Session::get('id');
						$name=Session::get('name');
						?>
						@if($id)
							<li class=''><a href="{{URL::to('/cart/'.$id)}}">Giỏ hàng</a></li>
							<li class="btn"><a href="{{URL::to('/logout')}}">logout </a></li>
						@else
							<li class="btn"><a href="{{URL::to('/admin')}}">sign up </a></li>
						@endif
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->
			<form action="{{URL::to('/search')}}" method="POST">
	    <div class="top-search">
	    	<select>
				<option value="united">search movies</option>
				<option value="saab">movies</option>
			</select>
			{{csrf_field()}}
				<input type="text" name="keyword" placeholder="tìm phim theo tên, đạo diễn...">
				<input type="submit" name="btn_search" value=''>
	    </div>
			</form>
	</div>
</header>
<!-- END | Header -->

@yield('content')
<!--end of latest new v1 section-->
<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				 <a href="index-2.html"><img class="logo" src="{{('public/frontend/images/logo1.png')}}" alt=""></a>
				 <p>20 Lại yên, Hoài Dức<br>
				Hà nội, HN 10001</p>
				<p>Call us: <a href="#">(+01) 202 342 6789</a></p>
			</div>
			<div class="flex-child-ft item2">
				<h4>Resources</h4>
				<ul>
					<li><a href="#">Về chúng tôi</a></li> 
					<li><a href="#">Liên hệ</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>Điều khoản</h4>
				<ul>
					<li><a href="#">Terms of Use</a></li> 
					<li><a href="#">Privacy Policy</a></li>	
					<li><a href="#">Security</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item4">
				<h4>Tài khoản</h4>
				<ul>
					<li><a href="#">Tài khoản của tôi</a></li> 
					<li><a href="#">Hướng dẫn người dùng</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item5">
				<h4>Newsletter</h4>
				<p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
				<form action="#">
					<input type="text" placeholder="Nhập email...">
				</form>
				<a href="#" class="btn">Đăng kí ngay <i class="ion-ios-arrow-forward"></i></a>
			</div>
		</div>
	</div>
	<div class="ft-copyright">
		<div class="backtotop">
			<p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
		</div>
	</div>
</footer>
<!-- end of footer section-->

<!-- <script src="{{asset('public/frontend/js/jquery.js')}}"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="{{asset('public/frontend/js/plugins.js')}}"></script>
<script src="{{asset('public/frontend/js/plugins2.js')}}"></script>
<script src="{{asset('public/frontend/js/custom.js')}}"></script>
@stack('scripts')
@stack('scriptss')
</body>


</html>
