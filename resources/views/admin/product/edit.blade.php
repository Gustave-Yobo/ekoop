@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-products/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-select">
                            <option value="">{{$products->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{$products->name}}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$products->slug}}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Price</label>
                        <input type="number" value="{{$products->price}}" class="form-control" name="price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{$products->qty}}" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$products->status == '1' ? 'checked':''}} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$products->trending == '1' ? 'checked':''}} name="trending">
                    </div>
                    @if ($products->image)
                        <img src="{{asset('assets/uploads/product/'.$products->image)}}" alt="Product image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
