@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Create a new genre for...</h3>
                    <form action="{{URL::to('/save-film')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                            <div class="form-group"><input class="form-control" type="text" name="tentheloai" placeholder="Tên Thể Loại *" value="" /></div>
                                            <div class="form-group"><textarea class="form-control" rows="5" style="width: 60%; margin-top:4%;"  type="text" name="mota" placeholder="Mô Tả *" value=""></textarea></div>
                                            <input class="btnRegister" style="width:26%;  margin-top:2.5%;" type="submit" value="Tạo mới" /></div>
                                </div>
                            </div>
                    </form>
                </div>
    </div>
</div>
@endsection