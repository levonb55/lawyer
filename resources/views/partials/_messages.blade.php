@if(Session::has('success'))
    <div>
        <strong>Success: </strong>{{Session::get('success')}}
    </div>
@endif