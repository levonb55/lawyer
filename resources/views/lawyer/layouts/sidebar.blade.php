<aside>
    <div class="dashboard_logo">
        <a href="{{route('welcome')}}">  <img src="{{asset('assets/site/main/img/logo2.png')}}" alt="Logo"></a>
    </div>
    {{--<div class="dashboard_user">--}}
        {{--<img src="img/find_2_face.png" alt="">--}}
        {{--<p class="Employer_name">Employer  Name</p>--}}
        {{--<p class="Example_examplegmail_com">Example.example@gmail.com</p>--}}
    {{--</div>--}}
    <div class="sidebar-menu">
        <ul>
            <li class="{{Request::routeIs('lawyer.dashboard-profile') ? "active_page" : "" }}">
                <a href="{{route('lawyer.dashboard-profile',  \Auth::id())}}">
                    <img src="{{asset('assets/site/main/img/dash_1.png')}}" alt="Dashboard"> Dashboard
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{route('lawyer.dashboard-profile',  \Auth::id())}}"> <img src="{{asset('assets/site/main/img/dash2.png')}}" alt="Person">--}}
                    {{--My profile--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="{{Request::routeIs('lawyer.dashboard') ? "active_page" : "" }}">
                <a href="{{route('lawyer.dashboard', \Auth::id())}}">
                    <img src="{{asset('assets/site/main/img/dash_3.png')}}" alt="Settings">Settings
                </a>
            </li>
            <li class="{{Request::routeIs('lawyer_messages') ? "active_page" : "" }}">
                <a href="{{route('lawyer_messages')}}">
                    <img src="{{asset('assets/site/main/img/dash_4.png')}}" alt="Message">Message
                </a>
            </li>
            <li class="{{Request::routeIs('lawyer_calendar') ? "active_page" : "" }}">
                <a href="{{route('lawyer_calendar')}}">
                    <img src="{{asset('assets/site/main/img/dash_5.png')}}" alt=""> Booking
                </a>
            </li>
            <li><a href="#"><img src="{{asset('assets/site/main/img/dash_6.png')}}" alt=""> Pricing plan</a></li>
            <li>    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <img src="{{asset('assets/site/main/img/dash_7.png')}}" alt="">Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
