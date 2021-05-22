@extends('admin_layout')
@section('admin_content')
<style>
.register{
    background: none !important;
    margin-top: 0%;
    padding: 6% 2%;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-top-right-radius: 10% 50%;
    border-bottom-right-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
input, select,textarea{
    display: block;
    width: 85% !important;
    border: 1px solid #ebebeb;
    padding: 11px 20px;
    box-sizing: border-box;
    font-weight: 500;
    font-size: 13px;
}
input:not([disabled]):not([type="submit"]):focus, select:focus, textarea:focus {
    border: 1px solid #ff6801;
    outline:none;
}
.register .register-form{
    padding: 10% 2%;
    margin: 0% 0% !important;
}
input.btnRegister{
    width:26% !important;
    margin-left:60%;
}
</style>
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
        <h3>Admin</h3>
            <p>Nhập đầy đủ các trường để thêm phim mới vào hệ thống!
            </div>            <div class="col-md-9 register-right">
                    @foreach($editshow as $items=>$item1)
                    <form action="{{URL::to('/update-showtime/'.$item1->showID)}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group"><input  type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="{{$item1->NgayChieu}}" /></div>
                                            <div class="form-group">
                                                <select  type="text" name="tenphong" style=" width: 60% ">
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
                                                <select  type="text" name="tenphim" style=" width: 60% ">
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
                                                <select  type="text" name="gbd" style=" width: 35% ">
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
                                                <select  type="text" name="gkt" style=" width: 35% ">
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