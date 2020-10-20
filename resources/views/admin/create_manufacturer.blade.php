@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Create a new genre for...</h3>
                    <form action="{{URL::to('/save-manufacturer')}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                            <div class="form-group"><input class="form-control" type="text" name="tenhsx" placeholder="Tên hãng sản xuất *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="tennuoc" placeholder="Tên Nước *" value="" /></div>
                                            <input class="btnRegister" style="width:26%;  margin-top:2.5%;" type="submit" value="Tạo mới" /></div>
                                </div>
                            </div>
                    </form>
                </div>
    </div>
</div>
@endsection