<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/cars/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result = url('admin/images/cars').'/'.$tmp_file_name;
            // }
        return $result;
    }
    
    public function index()
    {
        $products = Product::with('vendor')->get();
        $categories = Categorie::all();
        Session::put('menu','products');
        return view('dashboard.cars',compact('products','categories'));
    }

    public function create(Request $request)
    {
        $img_product = 'img_product';
        $product = new product;
        $product->name_product = $request->name_product;
        $product->type_product = $request->type_product;
        $product->desc = $request->desc;
        // $product->seats = $request->seats;
        $product->categorie_id = $request->categorie_id;
        $product->img_product = $this->uploadFile($request,$img_product);
        $product->day_price = $request->day_price;
        // $product->model = $request->model;
        // $product->fisrt_registartion = $request->fisrt_registartion;
        // $product->fuel = $request->fuel;
        // $product->engine_size = $request->engine_size;
        // $product->power = $request->power;
        // $product->color = $request->color;
        // $product->millage = $request->millage;
        $product->save();
         return redirect('products')
         ->with('success','Data product successfully added!');
    }

    public function update(Request $request,$id)
    {
        $img_product_file = $request->file('img_product');
        $img_product = 'img_product';
        $product = Product::find($id);
        $product->name_product = $request->name_product;
        $product->type_product = $request->type_product;
        $product->categorie_id = $request->categorie_id;
        $product->desc = $request->desc;
        // $product->seats = $request->seats;
        if($img_product_file!=null)
        {
            $product->img_product = $this->uploadFile($request,$img_product);
        }else
        {
            $product->img_product = $request->old_img_product;
        }
        $product->day_price = $request->day_price;
        // $product->model = $request->model;
        // $product->fisrt_registartion = $request->fisrt_registartion;
        // $product->fuel = $request->fuel;
        // $product->engine_size = $request->engine_size;
        // $product->power = $request->power;
        // $product->color = $request->color;
        // $product->millage = $request->millage;
        $product->save();
         return redirect('products')
         ->with('success','Data product successfully updated!');
    }

    public function delete($id)
    {
        Product::find($id)->delete();
         return redirect('products')
         ->with('success','Data product successfully deleted!');
    }
}
