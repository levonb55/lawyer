<ul class="navbar-nav ml-auto">
    <li class="nav-item active">
    </li>
    <li class="nav-item">
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
