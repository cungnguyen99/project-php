@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Create a new film for...</h3>
                    <form action="{{URL::to('/save-film')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" name="tenphim" placeholder="Tên Phim *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="theloai" placeholder="Thể loại *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="hangsx" placeholder="Hãng sản xuất *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="daodien" placeholder="Đạo diễn *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="" /></div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <div class="button-wrapper"><span class="label">Upload File</span><input class="form-control custom-file-input" id="upload" name="url" type="file" multiple="multiple" /></div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" name="namchinh" placeholder="Nam chính *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="nuchinh" placeholder="Nữ chính *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="tongchiphi" placeholder="Tổng chi phí *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" onfocus="(this.type='date')" name="ngaykt" placeholder="Ngày Kết thúc *" value="" /></div>
                                            <input class="btnRegister" type="submit" value="Tạo mới" /></div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
    </div>
</div>
@endsection