<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <h3 class="menu-title">Admin</h3><
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ route('admin.variables.index') }}">
                        <i class="menu-icon fa  fa-table"></i>Content
                    </a>
                </li>
{{--                <li class="menu-item-has-children dropdown">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Home</a>--}}
{{--                    <ul class="sub-menu children dropdown-menu">--}}
{{--                        <li><i class="fa fa-bars"></i><a href="{{route('home_first')}}">First Content</a></li>--}}
{{--                        <li><i class="fa fa-bars"></i><a href="{{route('home_second')}}">Second Content</a></li>--}}
{{--                        <li><i class="fa fa-bars"></i><a href="{{route('home_third')}}">third Content</a></li>--}}
{{--                        --}}{{--<li><i class="fa fa-bars"></i><a href="{{route('home_fourth')}}">Fourth Content</a></li>--}}
{{--                        --}}{{--<li><i class="fa fa-bars"></i><a href="{{route('home_fifth')}}">Fifth Content</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="menu-item-has-children dropdown">--}}
{{--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-table"></i>About</a>--}}
{{--                    <ul class="sub-menu children dropdown-menu">--}}
{{--                        <li><i class="fa fa-bars"></i><a href="{{route('about_first')}}">First Content</a></li>--}}
{{--                        <li><i class="fa fa-bars"></i><a href="{{route('about_second')}}">Second Content</a></li>--}}
{{--                        <li><i class="fa fa-bars"></i><a href="{{route('about_third')}}">third Content</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                </li>--}}
{{--                <li class="menu-item-has-children dropdown">--}}
{{--                    <a href="{{route('admin_terms')}}" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-table"></i>Terms</a>--}}
{{--                </li>--}}
{{--                <li class="menu-item-has-children dropdown">--}}
{{--                    <a href="{{route('admin_privacy')}}" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-table"></i>Privacy</a>--}}
{{--                </li>--}}
                <li class="menu-item-has-children dropdown">
                    <a href="{{route('admin_categories')}}" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-table"></i>Categories Lawyers</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{route('admin.referrals')}}"> <i class="menu-icon fa  fa-table"></i>Referral Codes</a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
