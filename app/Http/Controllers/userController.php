<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Events\ProductPurchased;
use Illuminate\Http\Request;

class userController extends Controller
{
   public function __construct()
    {
        $this->middleware('checkAdmin');
    } 

    public function ProductView()
    {
        $products = Products::all();
        $categories = Category::all();
        return view('userDashboard')->with('products', $products)->with('categories', $categories);
    }

    public function getUserProduct(Request $request)
    {
        $product = Products::find($request->id);
        return $product;
    }

    public function updateUserProduct(Request $request)
    {
       
        
        $request->validate([
            'id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        
        event(new ProductPurchased($request->id, $request->quantity));

        
        
        return redirect()->back()->with('success', 'Product purchased successfully.'); 
    }
}
