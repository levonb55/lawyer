<footer>
    <div class="footer_size">
        <div class="footer_1">
            <p>Reach Legal</p>
            <ul>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('privacy')}}">Privacy and Terms</a></li>
            </ul>
        </div>
        <div class="footer_2">
            <p>Discover</p>
            <ul>
                <li><a href="{{route('lawyers.categories')}}">Find Lawyers</a></li>
            </ul>
        </div>
        <div class="footer_3">
            <p>Lawyers</p>
            <ul>
                @guest
                    <li><a href="{{route('register')}}">Sign up</a></li>
                @endguest
                <li><a href="{{route('why')}}">Why Reach Legal</a></li>
                <li><a href="{{route('affiliate')}}">Affiliate</a></li>
            </ul>
        </div>
        <div class="footer_4">
            <p>Follow Us</p>
            <div class="footer_soc">
                @if($variables['facebook'])
                    <a href="{{ strip_tags($variables['facebook']) }}" target="_blank">
                        <img src="{{asset('assets/images/general/facebook.png')}}" alt="Facebook">
                    </a>
                @endif
                @if($variables['twitter'])
                    <a href="{{ strip_tags($variables['twitter']) }}" target="_blank">
                        <img src="{{asset('assets/images/general/twitter.png')}}" alt="Twitter">
                    </a>
                @endif
                @if($variables['instagram'])
                    <a href="{{ strip_tags($variables['instagram']) }}" target="_blank">
                        <img src="{{asset('assets/images/general/instagram.png')}}" alt="Instagram">
                    </a>
                @endif
            </div>
        </div>
    </div>

</footer>
<section class="lawyers_bottom">
    <p>Copyright &copy; {{date("Y") }}</p>
</section>

