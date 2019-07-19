@extends('admin.layouts.app')

@section('content')
    <div class="content mt-3">
{{--        <div class="animated fadeIn">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-10"> </div>--}}
{{--                <div class="col-md-2">--}}
{{--                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#smallmodal">Add Category</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <br>--}}
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Referral Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{ $user->referral }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
{{--        </div><!-- .animated -->--}}
    </div>
@endsection