@extends('welcome')
@section('content')
<style>
  .arrow {
    background: black
  }
  .arrow:hover {
    background: #ffda00;
    color:black;
  }
  .arrow:active,
  .arrow:focus {
    background: #ffda00;
    color:black;

  }
  .arrow:after {
    content: "\F054";
  }
  .arrow:hover:after {
    animation: bounceright 0.3s alternate ease infinite;
  }
  .button {
    display: inline-block;
    font-family: "Montserrat", "Trebuchet MS", Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    position: relative;
    padding: 0.8em 1.4em;
    padding-right: 4.7em;
    border: none;
    color:  #ffda00;
    border: 2px solid #ffda00;
    transition: 0.2s;
  }
  .button:before,
  .button:after {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    padding-top: inherit;
    padding-bottom: inherit;
    width: 2em;
    content: "\00a0";
    font-family: 'FontAwesome', sans-serif;
    font-size: 1.2em;
    text-align: center;
    transition: 0.2s;
    transform-origin: 50% 60%;
  }
  .button:before {
    background: rgba(0, 0, 0, 0.1);
  }
  .button:hover {
    background: #ffda00;
  }
  .button:active,
  .button:focus {
    background: #ffda00;
    outline: none;
    color:black;
  }
  .button {
    min-width: 14em;
  }
</style>
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Thanh toán online</h1>
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
						<h4>Thanh toán</h4>
						<div class="table-responsive">
								<div class="form-group">
									<label for="language">Loại hàng hóa </label>
									<select name="order_type" id="order_type" class="form-control">
										<option value="topup">Nạp tiền điện thoại</option>
										<option value="billpayment">Thanh toán hóa đơn</option>
										<option value="fashion">Thời trang</option>
										<option value="other">Khác - Xem thêm tại VNPAY</option>
									</select>
								</div>
								<div class="form-group">
									<label for="order_id">Mã hóa đơn</label>
									<input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>"/>
								</div>
								<div class="form-group">
									<label for="amount">Số tiền</label>
									<input class="form-control" id="amount"
										   name="amount" type="number" value="10000"/>
								</div>
								<div class="form-group">
									<label for="order_desc">Nội dung thanh toán</label>
									<textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>
								</div>
								<div class="form-group">
									<label for="bank_code">Ngân hàng</label>
									<select name="bank_code" id="bank_code" class="form-control">
										<option value="">Không chọn</option>
										<option value="NCB"> Ngan hang NCB</option>
										<option value="AGRIBANK"> Ngan hang Agribank</option>
										<option value="SCB"> Ngan hang SCB</option>
										<option value="SACOMBANK">Ngan hang SacomBank</option>
										<option value="EXIMBANK"> Ngan hang EximBank</option>
										<option value="MSBANK"> Ngan hang MSBANK</option>
										<option value="NAMABANK"> Ngan hang NamABank</option>
										<option value="VNMART"> Vi dien tu VnMart</option>
										<option value="VIETINBANK">Ngan hang Vietinbank</option>
										<option value="VIETCOMBANK"> Ngan hang VCB</option>
										<option value="HDBANK">Ngan hang HDBank</option>
										<option value="DONGABANK"> Ngan hang Dong A</option>
										<option value="TPBANK"> Ngân hàng TPBank</option>
										<option value="OJB"> Ngân hàng OceanBank</option>
										<option value="BIDV"> Ngân hàng BIDV</option>
										<option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
										<option value="VPBANK"> Ngan hang VPBank</option>
										<option value="MBBANK"> Ngan hang MBBank</option>
										<option value="ACB"> Ngan hang ACB</option>
										<option value="OCB"> Ngan hang OCB</option>
										<option value="IVB"> Ngan hang IVB</option>
										<option value="VISA"> Thanh toan qua VISA/MASTER</option>
									</select>
								</div>
								<div class="form-group">
									<label for="language">Ngôn ngữ</label>
									<select name="language" id="language" class="form-control">
										<option value="vn">Tiếng Việt</option>
										<option value="en">English</option>
									</select>
								</div>
								<button type="button" class="btn btn-primary" data-url="{{ route('submit_vnpay') }}" id="btn-vnpay">Thanh toán Popup</button>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
@push('scriptss')
<script>
	$(document).ready(function(){  
		$("#btn-vnpay").click(function (e) {
			$.ajax({
							url: $(this).data('url'),
							method: 'POST',
							dataType: 'json',
							data: {
									_token: $('meta[name="csrf-token"]').attr('content'),
									customer_id: $('#customer_id').val(),
									money:$('').val(),
									order_id:$('#order_id').val(),
									note: $('#order_desc').val(),
									payment_method: 1,
									status: 0,
							},
							success: function (vnp_Url) {
								// debugger;
								// chỗ này nó sẽ nhận cái url ở hàm SubmitVnPay trả về
									window.location.href = vnp_Url;
							},
							error: function (data) {
									alert('Lỗi rồi nha')
							},
					});
		})
	})
</script>
@endpush
@endsection