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
input, select{
    display: block;
    width: 85% !important;
    border: 1px solid #ebebeb;
    padding: 11px 20px;
    box-sizing: border-box;
    font-weight: 500;
    font-size: 13px;
}
input:focus, select:focus {
    border: 1px solid #ff6801;
    outline:none;
}
.register .register-form{
    padding: 10% 2%;
    margin: 0% 0% !important;
}
input.btnRegister{
    padding: 2.5% 0;
}
</style>
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
        <h3>Admin</h3>
            <p>Nhập đầy đủ các trường để thêm phim mới vào hệ thống!<br/></p>
            <?php
                $error=Session::get('error');
                if($error){
                    echo '
                <p>'
                ,$error.
                '</p>';
                Session::put('error',null);
                }
            ?>
        </div>
        <div class="col-md-9 register-right">
                    <form action="{{URL::to('/save-showtime')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group"><input  type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="" /></div>
                                            <div class="form-group">
                                                <select  type="text" name="tenphong" style=" width: 60% ">
                                                    <option value="" disabled selected>Tên phòng *</option>
                                                    @foreach($rooms as $items=>$item)
                                                        <option value="{{$item->roomID}}">{{$item->TenPhong}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select  type="text" name="tenphim" style=" width: 60% ">
                                                    <option value="" disabled selected>Tên phim *</option>
                                                    @foreach($films as $items=>$item)
                                                        <option value="{{$item->IDf}}">{{$item->TenPhim}}</option>
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
                </div>
    </div>
</div>
@endsection