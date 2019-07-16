@extends('admin.layouts.app')

@section('content')
    @include('admin.partials._messages')

    <div class="breadcrumbs">
        <div class="col-sm-4">
{{--            <div class="page-header float-left">--}}
{{--                <div class="page-title">--}}
{{--                    <h1>First Content</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('admin_categories')}}">Categories</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-10"> </div>
                <div class="col-md-2">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#smallmodal">Add Category</a>
                </div>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Categories</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                        @csrf
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                @if($category->image)
                                                    <img src="{{asset('assets/images/categories/images/' . $category->image)}}" alt="Law">
                                                @endif
                                            </td>
                                            <td>
                                                @if($category->icon)
                                                    <img src="{{asset('assets/images/categories/icons/' . $category->icon)}}" alt="Law">
                                                @else
                                                    <img src="{{asset('assets/images/general/find_2_1.png')}}" alt="Law">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('categories_edit', $category->id)}}" class="btn btn-primary">
                                                    Edit
                                                </a>
                                                <form method="post" action="{{route('categories_delete',$category->id)}}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger" type="submit" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>

    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('categories_store')}}" method="post" id="add_resource" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="name" placeholder="Text" class="form-control" value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">
		                    	        <strong>{{ $errors->first('name') }}</strong>
		                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="text-input" class=" form-control-label">Upload image for category</label>
                            <input type="file" class="form-control-file" name="image">
                            @error('image')
                                <span class="text-danger">
                                    <strong>You can upload only an image.</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="text-input" class=" form-control-label">Upload icon for category</label>
                            <input type="file" class="form-control-file" name="icon">
                            @error('icon')
                            <span class="text-danger">
                                <strong>You can upload only an icon.</strong>
                            </span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="add_resource" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
