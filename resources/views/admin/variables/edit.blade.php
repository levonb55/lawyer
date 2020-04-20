@extends('admin.layouts.app')

@section('extra-stylesheets')
    <script src="{{ asset('assets/libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            toolbar: 'undo redo | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 36px",
            height : "420",
            resize: false,
            menubar: false
        });
    </script>
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