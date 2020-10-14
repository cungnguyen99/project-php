@extends('admin_layout')
@section('admin_content')
<div class="container-fluid register">
    <div class="row">
        <div class="col-md-3 register-left"><img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>You are 30 seconds away from earning your own money!</p><input type="submit" name="" value="Login" /><br/></div>
        <div class="col-md-9 register-right">
                    <h3 class="register-heading">Create a new film for...</h3>
                    <form action="/product/create" method="POST" enctype="multipart/form-data">
                        <div class="form-wrap register-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Film Name *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="genre" placeholder="Genre *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="country" placeholder="Country *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="time" placeholder="Time *" value="" /></div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                    <div class="button-wrapper"><span class="label">Upload File</span><input class="form-control custom-file-input" id="upload" name="url" type="file" multiple="multiple" /></div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" name="cast" placeholder="Cast *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="imdb" placeholder="Imdb *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="year" placeholder="Manufacture Year *" value="" /></div>
                                            <div class="form-group"><input class="form-control" type="text" name="description" placeholder="Description for film *" value="" /></div>
                                            <input class="btnRegister" type="submit" value="Create" /></div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
    </div>
</div>
@endsection