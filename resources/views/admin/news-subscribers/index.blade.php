@extends('admin.layouts.app')

@section('content')
    <div class="content mt-3">

        @include('admin.partials._messages')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">News Subscribers</strong>
                    </div>
                    <div class="card-body">
                        @if($subscribers->count() > 0)
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Emails</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribers as $subscriber)
                                    <tr>
                                        <td>{{ $subscriber->email }}</td>
                                        <td>
                                            <form action="{{ route('admin.news-subscribers.destroy', $subscriber->id) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Remove">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="no-subscriber">No subscriber</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                {{ $subscribers->links() }}
            </div>
        </div>
    </div>
@endsection