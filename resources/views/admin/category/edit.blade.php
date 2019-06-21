@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <form action="{{route('categories_update', $category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3>Category Update</h3>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name"
                           value="{{$category->name}}">
                    @error('name')
                        <span class="text-danger">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" id="image-input">
                    @if($category->image)
                        <img src="{{asset('assets/images/categories/' . $category->image)}}" alt="Law" class="dash_img_add" width="140" height="140">
                    @else
                        <img src="{{asset('assets/images/general/add.png')}}" alt="" class="dash_img_add" width="140" height="140">
                    @endif
                    <input type="file" class="form-control-file" name="image" id="category-image">
                    @error('image')
                        <span class="text-danger">
                            <strong>You can upload only an image.</strong>
                        </span>
                    @enderror
                </div>
                <a class="btn" href="{{route('admin_categories')}}">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection