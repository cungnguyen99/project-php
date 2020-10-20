@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Edit info film...</h3>
                    @foreach($editManufacturer as $items=>$item)
                    <form action="{{URL::to('/update-manufacturer/'.$item->ID)}}" method="post">
                    {{csrf_field()}}
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                            <div class="form-group"><input class="form-control" type="text" name="tenhsx" placeholder="Tên hãng sản xuất *" value="{{$item->TenHSX}}" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="tennuoc" placeholder="Tên nước *" value="{{$item->TenNuoc}}" /></div>
                                            <input class="btnRegister" style="width:26%;  margin-top:2.5%;" type="submit" value="Tạo mới" /></div>
                                </div>
                            </div>
                    </form>
                    @endforeach
                </div>
    </div>
</div>
@endsection