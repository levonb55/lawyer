@extends('site.layouts.app')

@section('content')
<section class="find_2">
    <div class="find_2_size">
        <div class="find_2_left">
            <h3>Find lawyers in City + Specialization</h3>
            <p class="find_2_left_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Donec quis mi eget erat dignissim temporLorem ipsum dolor sit amet, consectetur
                adipiscing elit. Donec quis mi eget erat dignissim tempor</p>
            <div class="find_2_left_inputs">
                <input type="text" name="" value="" placeholder="Enter Postcode">
                <button type="button" name="button">Search</button>
            </div>
            <div class="find_2_left_select">
                <p>We found 55 professional lawyers</p>
                <select class="" name="">
                    <option value="">Rating</option>
                    <option value="">Rating</option>
                    <option value="">Rating</option>
                </select>
            </div>
            <div class="find_2_left_block" id="style-2">

                <div class="find_2_left_box">
                    <div class="find_2_left_box_left">
                        <div class="find_2_left_box_left_img">
                            <img src="{{asset('assets/site/main/img/find_2_face.png')}}" alt="">
                        </div>
                        <div class="find_2_left_box_left_names">
                            <p>Lawyer Name</p>
                            <p>Lawyer Firm Name</p>
                            <div class="find_2_left_box_left_names_flex">
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_1.png')}}" alt="">
                                    <p> Civil</p>
                                </div>
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_2.png')}}" alt="">
                                    <p>   Immigration</p>
                                </div>
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_3.png')}}" alt="">
                                    <p> Criminal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="find_2_left_box_right">
                        <div class="find_2_left_box_right_stars">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                        </div>
                        <div class="find_2_left_box_right_btn">
                            <a href="{{route('lawyer_profile')}}"> <button type="button" name="button">View profile </button></a>
                        </div>
                    </div>
                </div>
                <div class="find_2_left_box">
                    <div class="find_2_left_box_left">
                        <div class="find_2_left_box_left_img">
                            <img src="{{asset('assets/site/main/img/find_2_face.png')}}" alt="">
                        </div>
                        <div class="find_2_left_box_left_names">
                            <p>Lawyer Name</p>
                            <p>Lawyer Firm Name</p>
                            <div class="find_2_left_box_left_names_flex">
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_1.png')}}" alt="">
                                    <p> Civil</p>
                                </div>
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_2.png')}}" alt="">
                                    <p>   Immigration</p>
                                </div>
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_3.png')}}" alt="">
                                    <p> Criminal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="find_2_left_box_right">
                        <div class="find_2_left_box_right_stars">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                        </div>
                        <div class="find_2_left_box_right_btn">
                            <button type="button" name="button">View profile </button>
                        </div>
                    </div>
                </div>
                <div class="find_2_left_box">
                    <div class="find_2_left_box_left">
                        <div class="find_2_left_box_left_img">
                            <img src="{{asset('assets/site/main/img/find_2_face.png')}}" alt="">
                        </div>
                        <div class="find_2_left_box_left_names">
                            <p>Lawyer Name</p>
                            <p>Lawyer Firm Name</p>
                            <div class="find_2_left_box_left_names_flex">
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_1.png')}}" alt="">
                                    <p> Civil</p>
                                </div>
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_2.png')}}" alt="">
                                    <p>   Immigration</p>
                                </div>
                                <div class="find_2_left_box_left_names_flex_box">
                                    <img src="{{asset('assets/site/main/img/find_2_3.png')}}" alt="">
                                    <p> Criminal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="find_2_left_box_right">
                        <div class="find_2_left_box_right_stars">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                            <img src="{{asset('assets/site/main/img/find_star.png')}}" alt="">
                        </div>
                        <div class="find_2_left_box_right_btn">
                            <button type="button" name="button">View profile </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="find_2_right">
            <img src="{{asset('assets/site/main/img/find_2_map.png')}}" alt="">
        </div>
    </div>
</section>

<section class="lawyers_7">
    <div class="opacity_bg">
        <div class="lawyers_7_size">
            <h3>Join the community </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis
                libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis
                in faucibus orci luctus et</p>
            <div class="">
                <input type="text" name="" value="" placeholder="Enter your email">
                <button type="button" name="button">Join</button>
            </div>
        </div>
    </div>
</section>
@endsection
