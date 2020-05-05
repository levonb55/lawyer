@extends('admin.layouts.app')

@section('extra-stylesheets')
    <script src="{{ asset('assets/libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            toolbar: 'undo redo | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl | code',
            fontsize_formats: "6px 8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px",
            plugins: 'code',
            height : "420",
            resize: false,
            menubar: false
        });
    </script>
    <style>
        .tox-collection .tox-collection__group {
            height: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('admin.variables.update', $variable->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h4 class="variable-form-header">{{ $variable->name }}</h4>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="value" id="textarea">{{ $variable->value }}</textarea>
            </div>

            @error('value')
                <span class="error-message d-block text-danger mb-3" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <a href="{{ route('admin.variables.index') }}" type="button" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection