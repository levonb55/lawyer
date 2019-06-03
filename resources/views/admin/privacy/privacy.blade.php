@extends('admin.layouts.app')

@section('content')
    @if(session('create'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            You successfully {{session('create')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('update'))
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully {{session('update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('delete'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Success</span>
            You successfully {{session('delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>First Content</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('admin_privacy')}}">Privacy</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Privacy</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('update_home_content',$privacy[0]->id)}}" id="update_content{{$privacy[0]->id}}"  method="post"  class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Main Title</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="main_title"  value="{{$privacy[0]->main_title}}"  class="form-control">
                        </div>
                    </div>
                </form>
                <div class="card-footer">
                    <button  form="update_content{{$privacy[0]->id}}" class="btn btn-success btn-sm">
                        Update
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-10"> </div>
                <div class="col-md-2">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#mediumModal">Add Privacy</a>
                </div>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Privacy</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($privacy->slice(1) as $policy)
                                    <form id="works_update" method="post" action="{{route('update_home_content',$policy->id)}}">
                                        @csrf
                                        <tr>
                                            <td>
                                                <textarea name="title" style="width: 400px">{{$policy->title}}</textarea>
                                            </td>
                                            <td>
                                                <textarea name="description" style="width: 400px">{{$policy->description}}</textarea>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">edit</button>
                                                <a href="{{route('delete_content',$policy->id)}}" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>

    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add Privacy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add_privacy')}}" method="post" id="save_term" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="title" placeholder="Text" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="text-danger">
		                    	        <strong>{{ $errors->first('title') }}</strong>
		                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Description</label></div>
                            <div class="col-12 col-md-9">
                                <textarea type="file" id="file-input" name="description" class="form-control-file" placeholder="Description ..."> </textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">
		                    	        <strong>{{ $errors->first('description') }}</strong>
		                            </span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="save_term" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
