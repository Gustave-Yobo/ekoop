<?php

namespace App\Http\Controllers\Admin;

// use App\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/product/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product/', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';
        $products->update();
        return redirect('products')->with('status', "Product Updated Succesfully");
    }

    public function destroy($id)
    {
        $products = Product::find($id);

        if($products->image){
            $path = 'assets/uploads/product/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('products')->with('status', "Product Deleted Successfully");
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $products = new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product/', $filename);
            $products->image = $filename;
        }

        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->description = $request->input('description');
        $products->price = $request->input('price');
        $products->qty = $request->input('qty');
        $products->status = $request->input('status') == TRUE ? '1':'0';
        $products->trending = $request->input('trending') == TRUE ? '1':'0';
        $products->save();
        return redirect('products')->with('status', "Product Added Succesfully");
    }

    // public function getAddToCart(Request $request, $id){
    //     $product = Product::find($id);
    //     $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //     $cart = new Cart($oldCart);
    //     $cart->add($product, $product->id);

    //     $request->session()->put('cart', $cart);
    //     return redirect('category')->with('status', "Added successfully");
    // }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
}
