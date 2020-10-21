@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Edit info film...</h3>
                    @foreach($editFilm as $items=>$item)
                    <form action="{{URL::to('/update-film/'.$item->ID)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" name="tenphim" placeholder="Tên Phim *" value="{{$item->TenPhim}}" /></div>
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="theloai" style=" width: 60% ">
                                                    <option value="" disabled selected>Thể loại phim *</option>
                                                    @foreach($genres_id as $items=>$item)
                                                        <option value="{{$item->ID}}">{{$item->TenTheLoai}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" type="text" name="hangsx" style=" width: 60% ">
                                                    <option value="" disabled selected>Hãng sản xuất *</option>
                                                    @foreach($manufacturers_id as $items=>$item)
                                                        <option value="{{$item->ID}}">{{$item->TenHSX}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group"><input class="form-control" type="text" name="daodien" placeholder="Đạo diễn *" value="{{$item->DaoDien}}" /></div>
                                            <div class="form-group"><input class="form-control" type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="{{$item->NgayKhoiChieu}}" /></div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <div class="button-wrapper"><span class="label">Upload File</span><input value="{{$item->Anh}}" class="form-control custom-file-input" id="upload" name="url" type="file" /></div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" name="namchinh" placeholder="Nam chính *" value="{{$item->NamChinh}}" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="nuchinh" placeholder="Nữ chính *" value="{{$item->NuChinh}}" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="tongchiphi" placeholder="Tổng chi phí *" value="{{$item->TongChiPhi}}" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="imdb" placeholder="IMDB *" value="{{$item->IMDB}}" /></div>
                                            <div class="form-group"><input class="form-control" type="text" onfocus="(this.type='date')" name="ngaykt" placeholder="Ngày Kết thúc *" value="{{$item->NgayKetThuc}}" /></div>
                                            <input class="btnRegister" type="submit" value="Update" /></div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    @endforeach
                </div>
    </div>
</div>
@endsection