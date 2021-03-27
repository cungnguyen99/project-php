@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Edit showtimes film...</h3>
                    @foreach($editshow as $items=>$item1)
                    <form action="{{URL::to('/update-showtime/'.$item1->showID)}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="{{$item1->NgayChieu}}" /></div>
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="tenphong" style=" width: 60% ">
                                                    <option value="" disabled selected>Tên phòng *</option>
                                                    @foreach($rooms as $items=>$item3)
                                                        @if($item1->MaPhong==$item3->roomID)
                                                            <option selected value="{{$item3->roomID}}">{{$item3->TenPhong}}</option>
                                                        @else
                                                            <option value="{{$item3->roomID}}">{{$item3->TenPhong}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="tenphim" style=" width: 60% ">
                                                    <option value="" disabled selected>Tên phim *</option>
                                                    @foreach($films_id as $items=>$item2)
                                                        @if($item1->MaPhim==$item2->IDf)
                                                            <option selected value="{{$item2->IDf}}">{{$item1->TenPhim}}</option>
                                                        @else
                                                            <option value="{{$item2->IDf}}">{{$item2->TenPhim}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="gbd" style=" width: 35% ">
                                                    <option value="" disabled selected>Giờ bắt đầu*</option>
                                                    <?php
                                                        for ($x = 0; $x <= 23; $x++) {
                                                            if($item1->GioBatDau==$x)
                                                                echo '<option selected value="',$x.'">',$x.'h</option>/';
                                                            else
                                                                echo '<option value="',$x.'">',$x.'h</option>/';   
                                                        }                                                     
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="gkt" style=" width: 35% ">
                                                    <option value="" disabled selected>Giờ kết thúc*</option>
                                                    <?php
                                                         for ($x = 0; $x <= 23; $x++) {
                                                            if($item1->GioKetThuc==$x)
                                                                echo '<option selected value="',$x.'">',$x.'h</option>/';
                                                            else
                                                                echo '<option value="',$x.'">',$x.'h</option>/';   
                                                        } 
                                                    ?>
                                                </select>
                                            </div>
                                            <input class="btnRegister" type="submit" value="Tạo mới" /></div>
                                          </div>
                                </div>
                            </div>
                    </form>
                    @endforeach
                </div>
    </div>
</div>
@endsection