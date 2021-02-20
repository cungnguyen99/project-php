@extends('welcome')
@section('content')
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Đặt vé thành công</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
						<a href="#"><img src="images/uploads/user-img.png" alt=""><br></a>
						<a href="#" class="redbtn">Người dùng</a>
					</div>
					<div class="user-fav">
						<p>Thông tin</p>
						<ul>
							<li  class=""><a href="userprofile.html">{{$user->name}}</a></li>
							<li><a href="userfavoritelist.html">{{$user->phone}}</a></li>
							<li><a href="userrate.html">{{$user->email}}</a></li>
						</ul>
					</div>
					<div class="user-fav">
						<p>Vé phim</p>
						<ul>
							<li><a href="#">{{$filmTicket->TenPhim}} </a></li>
							<li><a href="#">Ngày Chiếu: {{$date->NgayChieu}}</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form action="#" class="user">
						<h4>Thanh toán</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Khách hàng</label>
								<input type="text" value="{{$user->name}}" placeholder="edwardkennedy">
							</div>
							<div class="col-md-6 form-it">
								<label>Tên phim</label>
								<input type="text" value="{{$filmTicket->TenPhim}}" placeholder="edward@kennedy.com">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Tổng tiền</label>
								<input type="text" value="5.000 VND" placeholder="Edward ">
							</div>
							<div class="col-md-6 form-it">
								<label>Giờ chiếu</label>
								<input type="text" value="{{$date->GioChieu}}" placeholder="Kennedy">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Phòng chiếu</label>
								<input type="text" value="{{$room}}" placeholder="Kennedy">
							</div>
							<div class="col-md-6 form-it">
								<label>Ghế</label>
								<input type="text" value="{{implode(',',$ticket)}}" placeholder="Kennedy">
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection