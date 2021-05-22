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
            <p>Nhập đầy đủ các trường để thêm phim mới vào hệ thống!
            </div>
        <div class="col-md-9 register-right">
                        <form action="{{URL::to('/update-film/'.$editFilm->IDf)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="form-wrap register-form">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group"><input  type="text" name="tenphim" placeholder="Tên Phim *" value="{{$editFilm->TenPhim}}" /></div>
                                                <div class="form-group">
                                                    <select  type="text" name="theloai" style=" width: 60% ">
                                                    <option value="" disabled selected>Thể loại *</option>
                                                        @foreach($genres as $items=>$item)
                                                            @if($item->ID==$editFilm->MaTheLoai)
                                                            <option selected value="{{$item->ID}}">{{$item->TenTheLoai}}</option>
                                                            @else
                                                            <option value="{{$item->ID}}">{{$item->TenTheLoai}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select  type="text" name="hangsx" style=" width: 60% ">
                                                        <option value="" disabled selected>Hãng sản xuất *</option>
                                                        @foreach($manufacturers as $items=>$item)
                                                        @if($item->ID==$editFilm->MaHSX)
                                                        <option selected value="{{$item->ID}}">{{$item->TenHSX}}</option>
                                                            @else
                                                            <option value="{{$item->ID}}">{{$item->TenHSX}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group"><input  type="text" name="daodien" placeholder="Đạo diễn *" 
                                                value="{{$editFilm->DaoDien}}" /></div>
                                                <div class="form-group"><input  type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="{{$editFilm->NgayKhoiChieu}}" /></div>
                                                <div class="form-group">
                                                    <div class="maxl">
                                                        <div class="button-wrapper"><span class="label">Upload File</span><input value="{{$editFilm->Anh}}" class="form-control custom-file-input" id="upload" name="url" type="file" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group"><input  type="text" name="namchinh" placeholder="Nam chính *" value="{{$editFilm->NamChinh}}" /></div>
                                                <div class="form-group"><input  type="text" name="nuchinh" placeholder="Nữ chính *" value="{{$editFilm->NuChinh}}" /></div>
                                                <div class="form-group"><input  type="text" name="tongchiphi" placeholder="Tổng chi phí *" value="{{$editFilm->Trailer}}" /></div>
                                                <div class="form-group"><input  type="text" name="imdb" placeholder="IMDB *" value="{{$editFilm->IMDB}}" /></div>
                                                <div class="form-group"><input  type="text" onfocus="(this.type='date')" name="ngaykt" placeholder="Ngày Kết thúc *" value="{{$editFilm->NgayKetThuc}}" /></div>
                                                <input class="btnRegister" type="submit" value="Update" /></div>
                                        </div>
                                    </div>
                                </div>
                        </form>
        </div>
    </div>
</div>
@endsection