<aside>
    <div class="dashboard_logo">
        <a href="{{route('home')}}">  <img src="{{asset('assets/images/general/logo2.png')}}" alt="Logo"></a>
    </div>
    {{--<div class="dashboard_user">--}}
        {{--<img src="img/find_2_face.png" alt="">--}}
        {{--<p class="Employer_name">Employer  Name</p>--}}
        {{--<p class="Example_examplegmail_com">Example.example@gmail.com</p>--}}
    {{--</div>--}}
    <div class="sidebar-menu">
        <ul>
            <li class="{{Request::routeIs('user.dashboard') ? "active_page" : "" }}">
                <a href="{{route('user.dashboard',  \Auth::id())}}">
                    <img src="{{asset('assets/images/general/dash_1.png')}}" alt="Dashboard"> Dashboard
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{route('lawyer.dashboard-profile',  \Auth::id())}}"> <img src="{{asset('assets/site/main/img/dash2.png')}}" alt="Person">--}}
                    {{--My profile--}}
                {{--</a>--}}
            {{--</li>--}}
            @if(Auth::user()->role_id == 2)
                <li class="{{Request::routeIs('user.settings') ? "active_page" : "" }}">
                    <a href="{{route('user.settings', Auth::id())}}">
                        <img src="{{asset('assets/images/general/dash_3.png')}}" alt="Settings">Settings
                    </a>
                </li>
            @endif
            <li class="{{Request::routeIs('user.messages') ? "active_page" : "" }}">
                <a href="{{route('messages')}}">
                    <img src="{{asset('assets/images/general/dash_4.png')}}" alt="Message">Messages
                </a>
            </li>
            <li class="{{Request::routeIs('user.bookings') ? "active_page" : "" }}">
                <a href="{{route('user.bookings', Auth::id())}}">
                    <img src="{{asset('assets/images/general/dash_5.png')}}" alt="">Bookings
                </a>
            </li>
            <li><a href="#"><img src="{{asset('assets/images/general/dash_6.png')}}" alt=""> Pricing plan</a></li>
            <li>    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <img src="{{asset('assets/images/general/dash_7.png')}}" alt="">Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
