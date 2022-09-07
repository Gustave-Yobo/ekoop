@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category Page</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-stiped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($category->count() > 0)
                        @foreach ($category as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="cate-image" alt="Not found">
                                </td>
                                <td>
                                    <a href="{{'edit-category/'.$item->id}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{'delete-category/'.$item->id}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td><span>No category in database.</span></td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
