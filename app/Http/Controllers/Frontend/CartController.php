<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request, $id)
    {
        // $product_id = $request->input('product_id');
        // $product_qty = $request->input('product_qty');

        // if(Auth::ckeck()){
        //     $prod_check = Product::where('id', $product_id)->first();

        //     if($prod_check){
        //         if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()){
        //             return response()->json(['status' => $prod_check->name." Already added to cart"]);
        //         }else{
        //             $cartItem = new Cart();
        //             $cartItem->prod_id = $product_id;
        //             $cartItem->user_id = Auth::id();
        //             $cartItem->prod_qty = $product_qty;
        //             $cartItem->save();
        //             return response()->json(['status' => $prod_check->name." Added to cart"]);
        //         }
        //     }
        // }else{
        //     return response()->json(['status' => "Login to continue"]);
        // }

        if(Auth::id()){
            $user=auth()->user();
            $product = Product::find($id);
            $prod_check = Product::where('id', $product->id)->first();

            if($prod_check){
                if(Cart::where('prod_id', $product->id)->where('user_id', Auth::id())->exists()){
                    return redirect()->back()->with('status', $product->name." Already added to cart");
                }else{
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->prod_id = $product->id;
                    $cart->prod_qty = $request->product_qty;
                    $cart->save();
                    return redirect('cart')->with('status', $product->name. " Added to cart");
                }
            }
        }else{
            return redirect('login')->with('status', "Login to continue");
        }
    }

    public function viewcart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if(Auth::chech()){
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exixts()){
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity updated"]);
            }
        }
    }

    public function deleteproduct(Request $request, $id)
    {
        // if(Auth::check()){
        //     $prod_id = $request->input('prod_id');
        //     if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exixts()){
        //         $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
        //         $cartItem->delete();
        //         return response()->json(['status' => "Product Deleted Successfully"]);
        //     }
        // }else{
        //     return response()->json(['status' => "Login to continue"]);
        // }

        if(Auth::check()){
            $cartItem = Cart::find($id);
            $cartItem->delete();
            return redirect()->back()->with('status', "Item Removed Successfully");
        }
    }

    public function cartcount()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }

    public function index()
    {
        //
    }

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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
