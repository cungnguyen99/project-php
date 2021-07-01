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
                $mess=Session::get('message');
                if($mess){
                    echo '
                <p style="font-weight: 700; color: #cc2121">'
                ,$mess.
                '</p>';
                Session::put('message',null);
                }
            ?>
        </div>
        <div class="col-md-9 register-right">
                    <form action="{{URL::to('/save-film')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group"><input  type="text" name="tenphim" placeholder="Tên Phim *" value="" /></div>
                                            <div class="form-group">
                                                <select  type="text" name="theloai" style=" width: 60% ">
                                                    <option value="" disabled selected>Thể loại phim *</option>
                                                    @foreach($genres_id as $items=>$item)
                                                        <option value="{{$item->ID}}">{{$item->TenTheLoai}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select  type="text" name="hangsx" style=" width: 60% ">
                                                    <option value="" disabled selected>Hãng sản xuất *</option>
                                                    @foreach($manufacturers_id as $items=>$item)
                                                        <option value="{{$item->ID}}">{{$item->TenHSX}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group"><input  type="text" name="daodien" placeholder="Đạo diễn *" value="" /></div>
                                            <div class="form-group"><input  type="text" onfocus="(this.type='date')" name="ngaykc" placeholder="Ngày Khởi chiếu *" value="" /></div>
                                            <div class="form-group">
                                                <div class="maxl" id='create-film'>
                                                    <div class="button-wrapper"><span class="label" style='background:#0062cc'>Upload File</span>
                                                    <span style='font-size: smaller; width: auto; white-space: pre' id='filename'></span><input class="form-control custom-file-input" id="upload" name="url" type="file" /></div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group"><input  type="text" name="namchinh" placeholder="Nam chính *" value="" /></div>
                                            <div class="form-group"><input  type="text" name="nuchinh" placeholder="Nữ chính *" value="" /></div>
                                            <div class="form-group"><input  type="text" name="tongchiphi" placeholder="Trailer *" value="" /></div>
                                            <div class="form-group"><input  type="number" min="0" max="10" name="imdb" placeholder="IMDB *" value="" /></div>
                                            <div class="form-group"><input  type="text" onfocus="(this.type='date')" name="ngaykt" placeholder="Ngày Kết thúc *" value="" /></div>
                                            <div class="form-group"><input  type="text" name="noidung" placeholder="Nội dung *" value="" /></div>
                                            <input class="btnRegister" type="submit" value="Tạo mới" /></div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
    </div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  $('#create-film').on('click', (e) => {
    $('#filename').html(this.val());
  })
  document.getElementById('upload').onchange = function () {
    $('#filename').html(this.value);
};
})
</script>
@endsection