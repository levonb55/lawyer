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
                <li><a href="{{route('affiliate')}}">Affiliate</a></li>
            </ul>
        </div>
        <div class="footer_4">
            <p>Follow Us</p>
            <div class="footer_soc">
                <img src="{{asset('assets/images/general/facebook.png')}}" alt="Facebook">
                <img src="{{asset('assets/images/general/twitter.png')}}" alt="Twitter">
                <img src="{{asset('assets/images/general/instagram.png')}}" alt="Instagram">
            </div>
        </div>
    </div>

</footer>
<section class="lawyers_bottom">
    <p>Copyright &copy; {{date("Y") }}</p>
</section>

