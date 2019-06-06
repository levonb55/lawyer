@if(Session::has('success'))
    <div class="success-message">
        <strong>Success: </strong>{{Session::get('success')}}
    </div>
@endif