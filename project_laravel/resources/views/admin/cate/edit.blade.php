@extends('admin.master')
@section('controller','Danh mục')
@section('action','Sửa')
@section('content')
    <div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.blocks.error')
        <form action="" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Danh mục cha</label>
                <select class="form-control" name="sltParent">
                    <option value="0">Vui lòng chọn danh mục cha!</option>
                    <?php cate_parent($parent,0,"--",$data["parent_id"]) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên danh mục</label>
                <input class="form-control" name="txtCateName" placeholder="Vui lòng nhập tên danh mục!" value="{!! old('txtCateName',isset($data) ? $data['name']: null) !!}" />
            </div>
            <div class="form-group">
                <label>Từ khóa danh mục</label>
                <input class="form-control" name="txtKeywords" placeholder="Vui lòng nhập từ khóa danh mục!" value="{!! old('txtKeywords',isset($data) ? $data['keywords']: null) !!}"/>
            </div>
            <div class="form-group">
                <label>Thứ tự danh mục</label>
                <input class="form-control" name="txtOrder" placeholder="Vui lòng nhập thứ tự danh mục!" value="{!! old('txtOrder',isset($data) ? $data['order']: null) !!}"/>
            </div>
            <div class="form-group">
                <label>Miêu tả danh mục</label>
                <textarea class="form-control" rows="3" name="txtDescription" value="">{!! old('txtDescription',isset($data) ? $data['description']: null) !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Sửa danh mục</button>
            <button type="reset" class="btn btn-default">Làm lại</button>
            <form>
@endsection()