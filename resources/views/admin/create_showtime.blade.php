@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Create a new showtime for...</h3>
                    <form action="{{URL::to('/save-showtime')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="" /></div>
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="tenphong" style=" width: 60% ">
                                                    <option value="" disabled selected>Tên phòng *</option>
                                                    @foreach($rooms as $items=>$item)
                                                        <option value="{{$item->roomID}}">{{$item->TenPhong}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="tenphim" style=" width: 60% ">
                                                    <option value="" disabled selected>Tên phim *</option>
                                                    @foreach($films as $items=>$item)
                                                        <option value="{{$item->IDf}}">{{$item->TenPhim}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" name="gbd" placeholder="Giờ bắt đầu *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="gkt" placeholder="Giờ kết thúc *" value="" /></div>
                                            <input class="btnRegister" type="submit" value="Tạo mới" /></div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
    </div>
</div>
@endsection