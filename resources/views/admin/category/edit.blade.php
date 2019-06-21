@extends('admin.layouts.app')

@section('content')
    <form action="{{route('categories_update', $category->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        <div class="row">
            <div class="col-md-5">
                <h3>Category Update</h3>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Category Name" name="name"
                           value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>



{{--        <div class="row form-group">--}}
{{--            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>--}}
{{--            <div class="col-12 col-md-9">--}}
{{--                <input type="text" id="text-input" name="name" placeholder="Text" class="form-control" value="{{old('name')}}">--}}
{{--                @if ($errors->has('name'))--}}
{{--                    <span class="text-danger">--}}
{{--                        <strong>{{ $errors->first('name') }}</strong>--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="text-input" class=" form-control-label">Upload image for category</label>--}}
{{--            <input type="file" class="form-control-file" name="image">--}}
{{--            @error('image')--}}
{{--            <span class="text-danger">--}}
{{--                <strong>You can upload only image.</strong>--}}
{{--            </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
    </form>
@endsection