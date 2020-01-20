@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-6 pt-5">
                <form action="{{ route('admin.variables.update', $variable->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h4 class="mb-3">{{ $variable->name }}</h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="value" id="textarea">{{ $variable->value }}</textarea>
                    </div>
                    <a href="{{ route('admin.variables.index') }}" type="button" class="btn">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection