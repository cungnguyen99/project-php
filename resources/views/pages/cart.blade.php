@extends('welcome')
@section('content')
<style>

.silver, .plat {
  float: left;
  width: 250px;
  background: white;
  text-align: center;
}

.gold {
  float: left;
  position: relative;
  width: 250px;
  top: -50px;
  padding: 50px 0;
  background: #3498db;
  text-align: center;
  border-radius: 5px;
}
.gold > .price {
  background: white;
  color: rgba(0, 0, 0, 0.7);
}
.gold > h1, .gold > h2, .gold > p, .gold > span {
  color: white;
}

h1 {
  margin: 20px 0 10px 0;
  font-size: 1.25em;
  color: rgba(0, 0, 0, 0.8);
}

h2 {
  font-size: .75em;
  color: rgba(0, 0, 0, 0.6);
  font-weight: 100;
  letter-spacing: 1px;
}

p {
  color: rgba(0, 0, 0, 0.4);
  margin: 10px 0;
  font-weight: 100;
  font-size: .75em;
}

span {
  margin-bottom: 20px;
  padding-bottom: 10px;
  display: inline-block;
  width: 125px;
  font-size: 1em;
  font-weight: 700;
  letter-spacing: 1px;
  color: rgba(0, 0, 0, 0.5);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.price {
  height: 100px;
  width: 100px;
  text-align: center;
  background-color: #e74c3c;
  border-radius: 50%;
  line-height: 100px;
  color: #fff;
  font-size: 1.5em;
  font-weight: 100;
  margin: 20px auto;
}

button {
  display: block;
  margin: 20px auto;
  width: 150px;
  height: 35px;
  border-bottom: 5px solid #c0392b;
  background: #e74c3c;
  border: none;
  border-radius: 5px;
  color: white;
  font-size: .75em;
  font-weight: 100;
  transition: all ease-in-out .2s;
}
button:hover {
  background: #c0392b;
}

</style>
<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Giỏ hàng của bạn</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
                @foreach($carts as $cart)
                <div class="col-md-4">
                    <div class='gold'>
                        <h1>{{$cart->TenPhim}}</h1>
                        <h2>Ngày Chiếu: {{$cart->NgayChieu}}</h2>
                        <div class='price'><img style="border-radius:50%" src="{{URL::to('public/uploads/films/'.$cart->Anh)}}" alt=""></div>
                        <p>.</p>
                        <span>{{$cart->GioChieu}}</span>
                        <p>Phòng</p>
                        <span>{{$cart->MaPhong}}</span>
                        <p>Ghế</p>
                        <span>{{implode('-',$chairs)}}</span>
                        <p>Ngày đặt</p>
                        <span>{{$cart->time}}</span>
                        <a onclick="return confirm('Bạn có muốn xóa không.')" href={{route('cancel', ['order_id'=>$cart->MaDonHang])}}><button>Hủy vé</button></a>
                    </div>  
                    </div>
                @endforeach
		</div>
	</div>
</div>
@endsection