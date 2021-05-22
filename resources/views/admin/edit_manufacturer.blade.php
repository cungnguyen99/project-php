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
            </div>        <div class="col-md-9 register-right">
                    @foreach($editManufacturer as $items=>$item)
                    <form action="{{URL::to('/update-manufacturer/'.$item->ID)}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                            <div class="form-group"><input  type="text" name="tenhsx" placeholder="Tên hãng sản xuất *" value="{{$item->TenHSX}}" /></div>
                                            <div class="form-group"><input  type="text" name="tennuoc" placeholder="Tên nước *" value="{{$item->TenNuoc}}" /></div>
                                            <input class="btnRegister" style="width:26%;  margin-top:2.5%;" type="submit" value="Tạo mới" /></div>
                                </div>
                            </div>
                    </form>
                    @endforeach
                </div>
    </div>
</div>
@endsection