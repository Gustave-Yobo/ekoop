<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function add(Request $request, $id)
    {
        // if(Auth::check()){
        //     $prod_id = $request->input('product_id');
        //     if(Product::find($prod_id)){
        //         $wish = new Wishlist();
        //         $wish->prod_id = $prod_id;
        //         $wish->user_id = Auth::id();
        //         $wish->save();
        //         return response()->json(['status' => "Product Added to Wishlist"]);
        //     }else{
        //         return response()->json(['status' => "Product doesnot exist"]);
        //     }
        // }else{
        //     return response()->json(['status' => "Login to Continue"]);
        // }

        if(Auth::check()){
            $prod_id = $request->input('product_id');
            $product = Product::find($id);
            if(Product::find($prod_id)){
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return redirect('wishlist')->with('status', $product->name. " added to Wishlist");
            }else{
                return redirect()->back()->with('status', $product->name. " doesnot exist");
            }
        }else{
            return redirect('login')->with('status', "Login to Continue");
        }
    }

    public function deleteitem(Request $request, $id)
    {
        // if(Auth::check()){
        //     $prod_id = $request->input('prod_id');
        //     if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exixts()){
        //         $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
        //         $wish->delete();
        //         return response()->json(['status' => "Item Removed from Wishlist"]);
        //     }
        // }else{
        //     return response()->json(['status' => "Login to continue"]);
        // }

        if(Auth::check()){
            $cartItem = Wishlist::find($id);
            $cartItem->delete();
            return redirect()->back()->with('status', "Item Removed Successfully");
        }
    }

    public function wishlistcount()
    {
        $wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$wishlistcount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
