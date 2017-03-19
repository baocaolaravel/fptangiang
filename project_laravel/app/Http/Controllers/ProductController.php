<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Auth;
use App\Cate;
use App\Product;
use App\ProductImages;
use App\Http\Requests\ProductRequest;
use Input,File;
use Request;


class ProductController extends Controller {

    public function getList(){
        $data = Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list',compact('data'));
    }
    public function getAdd(){
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $product_request){
        $file_name = $product_request->file('fImages')->getClientOriginalName();
        $product = new Product();
        $product->name = $product_request->txtName;
        $product->alias = changeTitle($product_request->txtName);
        $product->price = $product_request->txtPrice;
        $product->intro = $product_request->txtIntro;
        $product->content = $product_request->txtContent;
        $product->image = $file_name;
        $product->keywords = $product_request->txtKeywords;
        $product->description = $product_request->txtDescription;
        $product->user_id = Auth::user()->id;
        $product->cate_id = $product_request->sltParent;
        $product_request->file('fImages')->move('resources/upload/',$file_name);
        $product->save();
        $product_id = $product->id;
        if(Input::hasFile('fProductDetail')){
            foreach (Input::file('fProductDetail')as $file){
                $product_img = new ProductImages();
                if(isset($file)){
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Thành công! Sản phẩm đã được thêm vào!']);
    }
    public function getDelete ($id){
        $product_detail = Product::find($id)->pimages->toArray();
        foreach ($product_detail as $value){
            File::delete('resources/upload/detial/'.$value["image"]);
        }
        $product = Product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete();
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Thành công! Sản phẩm đã được xóa!']);
    }
    public function getEdit($id){
        $cate = Cate::select('id','name','parent_id')->get()->toArray();
        $product = Product::find($id);
        $product_image = Product::find($id)->pimages;
        return view('admin.product.edit',compact('cate','product','product_image'));
    }
    public function postEdit($id,Request $request){
        $product = Product::find($id);
        $product->name = Request::input('txtName');
        $product->alias = changeTitle(Request::input('txtName'));
        $product->price = Request::input('txtPrice');
        $product->intro = Request::input('txtIntro');
        $product->content = Request::input('txtContent');
        $product->keywords = Request::input('txtKeywords');
        $product->description = Request::input('txtDescription');
        $product->user_id = Auth::user()->id;
        $product->cate_id = Request::input('sltParent');
        $img_current = 'resources/upload/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('resources/upload/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "Không có File";
        }
        $product->save();
         if(!empty(Request::file('fEditDetail'))){
            foreach (Request::file('fEditDetail') as $file) {
                $product_image = new ProductImages();
                if(isset($file)){
                    $product_image->image = $file->getClientOriginalName();
                    $product_image->product_id = $id;
                    $file->move('resources/upload/detail/',$file->getClientOriginalName());
                    $product_image->save();
                }
            }
        }
        return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Thành công! Hoàn thành sửa sản phẩm']);
    }
    public function getDelImg($id){
        if(Request::ajax()){
            $idHinh = (int)Request::get('idHinh');
            $image_detail = ProductImages::find($idHinh);
            if(!empty($image_detail)){
                $img = 'resources/upload/detail'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Oke";
        }
    }

}
