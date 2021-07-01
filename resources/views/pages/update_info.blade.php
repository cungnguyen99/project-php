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
					<h1>Thông tin tài khoản</h1>
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
						<a href="#" class="redbtn">Tài khoản</a>
					</div>
					<div class="user-fav">
						<p>Thông tin</p>
						<ul>
							<li  class=""><a href="userprofile.html">{{$user->name}}</a></li>
							<li><a href="userfavoritelist.html">{{$user->phone}}</a></li>
							<li><a href="userrate.html">{{$user->email}}</a></li>
							<input style="opacity:0; display:none" id='customer_id' class="button arrow ticket-button" readonly value="{{$user->id}}"/>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
        <form action="{{URL::to('/save-info/'.$user->id)}}" method="post">
                    {{csrf_field()}}
            <div>
						<h4>Cập nhật tài khoản</h4>
            <?php
              $message=Session::get('message');
              $pass=Session::get('pass');
              $wrong=Session::get('wrong');
              if($message){
                echo "<script>";
                echo "alert('Cập nhật thông tin thành công.');";
                echo "</script>";
                Session::put('message',null);
              }
              if($pass){
                echo "<script>";
                echo "alert('Thay đổi mật khẩu thành công.');";
                echo "</script>";
                Session::put('pass',null);
              }
              if($wrong){
                echo "<script>";
                echo "alert('Bạn đã nhập sai mật khẩu cũ.');";
                echo "</script>";
                Session::put('wrong',null);
              }
            ?>
            </div>
						<div class="table-responsive">
								<div class="form-group">
									<label for="order_id">Tên</label>
									<input class="form-control" id="name" name="name" type="text" value="{{$user->name}}"/>
								</div>
								<div class="form-group">
									<label for="amount">Số điện thoại</label>
									<input class="form-control" id="amount"
										  name="phone" type="number" value="{{$user->phone}}"/>
								</div>
								<div class="form-group">
									<label for="order_desc">Email</label>
									<input class="form-control" type='text' id="order_desc" name="email" value='{{$user->email}}'/>
								</div>
								<input type="submit" class="btn btn-primary" value="Cập nhật thông tin"  id="btn-info"/>
						</div>
          </form>
				</div>
			</div>

      <div class="col-md-3 col-sm-12 col-xs-12">
			</div>
      <div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
        <form action="{{URL::to('/save-password/'.$user->id)}}" method="post">
                    {{csrf_field()}}
            <div>
						<h4>Thay đổi mật khẩu</h4>
            </div>
						<div class="table-responsive">
								<div class="form-group">
									<label for="order_id">Mật khẩu cũ <p id='old'></p></label>
									<input class="form-control" id="oldPass" name="oldPass" type="password" value=""/>
								</div>
								<div class="form-group">
									<label for="amount" >Mật khẩu mới <p id='new'></p></label>
									<input class="form-control" id="newPass"
										  name="newPass" type="password" value=""/>
								</div>
								<div class="form-group">
									<label for="order_desc">Nhập lại mật khẩu mới<p id='cf'></p></label>
									<input class="form-control" type='password' id="cfPass" name="cfPass" value=''/>
								</div>
								<input type="submit" class="btn btn-primary" value="Thay đổi mật khẩu"  id="btn-info-pass"/>
						</div>
          </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  $('#btn-info-pass').on('click', (e) => {
    if($('#cfPass').val() =='' ){
      $('#cf').html('<p>Nhập lại mật khẩu mới </p>');
    e.preventDefault();
    }
    if($('#newPass').val()==''){
      $('#new').html('<p>Nhập mật khẩu mới </p>');
    e.preventDefault();
    }
    if( $('#oldPass').val()==''){
      $('#old').html('<p>Nhập mật khẩu cũ </p>');
    e.preventDefault();
    }
    if($('#newPass').val()!=$('#cfPass').val()){
      $('#cf').html('<p>Mật khẩu không khớp.</p>');
      e.preventDefault();
    }
  })
})
</script>
@endsection