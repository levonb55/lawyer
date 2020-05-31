@if(Session::has('success'))
    <div class="success-message">
        {{Session::get('success')}}
    </div>
@endif