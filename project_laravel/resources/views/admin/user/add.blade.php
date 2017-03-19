@extends('admin.master')
@section('controller','Người dùng')
@section('action','Thêm')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.blocks.error')
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên người dùng</label>
                <input class="form-control" name="txtUser" placeholder="Vui lòng nhập tên người dùng!" value="{!! old('txtUser') !!}"/>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="txtPass" placeholder="Vui lòng nhập mật khẩu!" />
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" class="form-control" name="txtRePass" placeholder="Vui lòng nhập lại mật khẩu!" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="txtEmail" placeholder="Vui lòng nhập Email!" value="{!! old('txtEmail') !!}" />
            </div>
            <div class="form-group">
                <label>Phân quyền</label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="1" checked="" type="radio">Quản trị viên
                </label>
                <label class="radio-inline">
                    <input name="rdoLevel" value="2" type="radio">Thành viên
                </label>
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Làm lại</button>
        </form>
    </div>
@endsection()
