@extends('admin.master')
@section('controller','Sản phẩm')
@section('action','Sửa')
@section('content')
    <style>
        .img_current {width: 150px;}
        .img_detail {width: 200px; margin-bottom: 20px;}
        .icon_del {position: relative;margin-left: -20px; margin-top: -70px;}
        #insert {margin-top: 20px;}
    </style>
    <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
            @include('admin.blocks.error')
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Danh mục cha</label>
                <select class="form-control" name="sltParent">
                    <option value="">Vui lòng chọn danh mục cha!</option>
                    <?php cate_parent($cate,0,"--",$product["cate_id"])?>
                </select>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input class="form-control" name="txtName" placeholder="Vui lòng nhập tên san phẩm!" value="{!! old('txtName'),isset($product) ? $product['name']:null !!}" />
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input class="form-control" name="txtPrice" placeholder="Vui lòng nhạp giá sản phẩm!" value="{!! old('txtPrice'),isset($product) ? $product['price']:null !!}"/>
            </div>
            <div class="form-group">
                <label>Thông tin</label>
                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro'),isset($product) ? $product['intro']:null !!}</textarea>
                <script type="text/javascript">ckeditor('txtIntro')</script>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent'),isset($product) ? $product['content']:null !!}</textarea>
                <script type="text/javascript">ckeditor('txtContent')</script>
            </div>
            <div class="form-group">
                <label>Hình ảnh hiện hành</label>
                <img src="{!! asset('resources/upload/'.$product['image']) !!}" class="img_current"/>
                <input type="hidden" name="img_current" value="{!! $product['image'] !!}"/>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Từ khóa sản phẩm</label>
                <input class="form-control" name="txtKeywords" placeholder="Vui lòng nhập từ khóa sản phẩm!"value="{!! old('txtKeywords'),isset($product) ? $product['keywords']:null !!}"/>
            </div>
            <div class="form-group">
                <label>Miêu tả sản phẩm</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription'),isset($product) ? $product['description']:null !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Làm lại</button>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-4">
            @foreach($product_image as $key => $item)
                <div class="form-group" id="{!! $key !!}">
                    <img src="{!! asset('resources/upload/detail/'.$item['image']) !!}" class="img_detail" idhinh="{!! $item['id'] !!}" id="{!! $key !!}"/>
                    <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                </div>
            @endforeach
            <button type="button" class="btn btn-primary" id="addImages">Thêm hình ảnh</button>
                <div id="insert"></div>
        </div>
    </form>
@endsection()
