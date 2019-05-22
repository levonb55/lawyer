@extends('admin.layouts.app')

@section('content')
    @if(session('update'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            You successfully {{session('update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Terms</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('admin_dashboard')}}">Dashboard</a></li>
                        <li><a href="{{route('terms')}}">Terms</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>First Content</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{route('update_home_content',$terms[0]->id)}}" id="update_content{{$terms[0]->id}}"  method="post"  class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Main Title</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="main_title"  value="{{$terms[0]->main_title}}"  class="form-control">
                        </div>
                    </div>
                </form>
                <div class="card-footer">
                    <button  form="update_content{{$terms[0]->id}}" class="btn btn-success btn-sm">
                        Update
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Terms</strong>
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
                                @foreach($terms->slice(1) as $term)
                                    <form id="works_update" method="post" action="{{route('update_home_content',$term->id)}}">
                                        @csrf
                                        <tr>
                                            <td>
                                                <textarea name="title" style="width: 400px">{{$term->title}}</textarea>
                                            </td>
                                            <td>
                                                <textarea name="description" style="width: 400px">{{$term->description}}</textarea>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary">edit</button>
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
@endsection
