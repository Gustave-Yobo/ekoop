@extends('layouts.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">
                    Home
                </a> /
                <a href="{{url('wishlit')}}">
                    Wishlist
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{asset('assets/uploads/product/'.$item->products->image)}}" height="70px" width="70px" alt="Image here">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{$item->products->name}}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6> Rs {{$item->products->price}}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                @if($item->products->qty >= $item->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width:130px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                @else
                                    <h6>Out of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <form action="{{url('add-to-cart/'.$item->id)}}" method="POST">
                                    @csrf
                                        <input type="hidden" value="1" min="1" class="form-control" style="width:100px" name="product_qty">

                                        <br>

                                        <button type="submit" class="btn btn-success me-3 float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                                        {{-- <input type="submit" class="btn btn-primary me-3 float-start" value="Add to Cart"> --}}
                                    </form>
                                {{-- <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart</button> --}}
                            </div>
                            <div class="col-md-2 my-auto">
                                {{-- <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Remove</button> --}}
                                <a href="{{'delete-wishlist-item/'.$item->id}}" class="btn btn-danger text-white" onclick="return confirm('Are you sure?')" ><i class="fa fa-trash"></i> Remove</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h4>There are no products in your Wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
