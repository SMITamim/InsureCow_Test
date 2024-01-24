<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAdmin');
    }
    public function Product()
    {
        $products = Products::all();
        $categories = Category::all();
       // return $centers;
        return view('product')->with('products',$products)->with('categories',$categories);
    }

    public function addProduct(Request $request)
    {
        
        $validate = $request->validate(
            [
                'name'=>'required',
                'category'=>'required',
                'price'=>'required',
                'quantity'=>'required',
                
            ]);
        $product = new Products();
        $existingProduct = Products::where('name',$request->name)->first();
        if ($existingProduct){
            return redirect()->back()->with('failed','Product Already Exist');
        }
        else {
            $product->name = $request->name;
        }
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        
        $product->save();
        return redirect()->back()->with('success','New Product Added');
    }
    public function getProduct(Request $request)
    {
        $product = Products::where('id',$request->id)->first();
        return $product;
    }

    public function deleteProduct(Request $request)
    {
        $product = Products::where('id',$request->id)->delete();
        return redirect()->back()->with('failed','Product Deleted Successfully');
    }

    public function updateProduct(Request $request)
    {
        
        
        $validate = $request->validate(
            [
                'name'=>'required',
                'category'=>'required',
                'price'=>'required',
                'quantity'=>'required',
            ]);

        $product = Products::where('id',$request->id)->first(); 
        
        /* if (!$product) {
            return redirect()->back()->with('failed', 'Product not found');
        } */
        $existingProduct = Products::where('name',$request->name)->where('name','<>',$product->name)->first();
        if ($existingProduct){
            return redirect()->back()->with('failed','Product Already Exist');
        }
        else {
            $product->name = $request->name;
        }
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        
        $product->save();
        return redirect()->back()->with('invalid',' Product Information Updated');
    }

}
