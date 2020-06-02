@if(session('create'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        You successfully {{session('create')}}
    </div>
@endif

@if(session('update'))
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
        <span class="badge badge-pill badge-primary">Success</span>
        You successfully {{session('update')}}
    </div>
@endif

@if(session('delete'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        {{session('delete')}}
    </div>
@endif