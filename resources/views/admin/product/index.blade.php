@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-stiped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($products->count() > 0)
                        @foreach ($products as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->qty}}</td>
                                <td>
                                    <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="cate-image" alt="Not found">
                                </td>
                                <td>
                                    <a href="{{'edit-products/'.$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{'delete-products/'.$item->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td><span>No products in database.</span></td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
