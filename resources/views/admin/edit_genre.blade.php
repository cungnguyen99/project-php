@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Edit info film...</h3>
                    @foreach($editGenre as $items=>$item)
                    <form action="{{URL::to('/update-genre/'.$item->ID)}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                            <div class="form-group"><input class="form-control" type="text" name="tentheloai" placeholder="Tên Thể Loại *" value="{{$item->TenTheLoai}}" /></div>
                                            <div class="form-group"><textarea class="form-control" rows="5" style="width: 60%; margin-top:4%;"  type="text" name="mota" placeholder="Mô Tả *" >{{$item->MoTa}}</textarea></div>
                                            <input class="btnRegister" style="width:26%;  margin-top:2.5%;" type="submit" value="Tạo mới" /></div>
                                </div>
                            </div>
                    </form>
                    @endforeach
                </div>
    </div>
</div>
@endsection