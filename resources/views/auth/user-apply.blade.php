<section class="login">
    <div class="opacity_bg">
        <div class="login_size">
            <div class="login_left">
                <h6>Employer Registration</h6>
                <img src="{{asset('assets/site/main/img/login_1.png')}}" alt="Person">
                <p>I want to search & hire talent</p>
                <p>Lorem ipsum dolor sit amet</p>
                {{--<button type="button" name="button">Apply</button>--}}
                <a href="{{route('register')}}">
                    <button>Apply</button>
                </a>
            </div>
            <div class="login_left">
                <h6>Remote Worker Registration</h6>
                <img src="{{asset('assets/site/main/img/login_2.png')}}" alt="Person">
                <p>I want to search & hire talent</p>
                <p>Lorem ipsum dolor sit amet</p>
                {{--<button type="button" name="button">Try for free</button>--}}
               <a  href="{{route('client.register')}}">
                   <button>Try for free</button>
               </a>
            </div>
        </div>
    </div>
</section>
