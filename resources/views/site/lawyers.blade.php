@extends('site.layouts.app')

@section('content')
    <section class="find_1">
        <h3>Lorem ipsum dolor sit amet</h3>
        <div class="find_line"></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et semper orci, non </p>
    </section>
    <section class="find_2">
        <div class="find_2_size">
            <a href="{{route('lawyers_by_category')}}">
                <div class="find_2_box">
                    <img src="{{asset('assets/site/main/img/find1.png')}}" alt="" class="find_img">
                    <div class="find_box_absolute">
                        <img src="{{asset('assets/site/main/img/f1.png')}}" alt="">
                        <p>Business <br> Lawyers</p>
                        <button type="button" name="button">3 Lawyers</button>
                    </div>
                </div>
            </a>
            <div class="find_2_box">
                <img src="{{asset('assets/site/main/img/find2.png')}}" alt="" class="find_img">
                <div class="find_box_absolute">
                    <img src="{{asset('assets/site/main/img/f6.png')}}" alt="">
                    <p>Civil Lawyers</p>
                    <button type="button" name="button">3 Lawyers</button>
                </div>
            </div>
            <div class="find_2_box">
                <img src="{{asset('assets/site/main/img/find3.png')}}" alt="" class="find_img">
                <div class="find_box_absolute">
                    <img src="{{asset('assets/site/main/img/f2.png')}}" alt="">
                    <p>Criminal</p>
                    <button type="button" name="button">3 Lawyers</button>
                </div>
            </div>
            <div class="find_2_box">
                <img src="{{asset('assets/site/main/img/find4.png')}}" alt="" class="find_img">
                <div class="find_box_absolute">
                    <img src="{{asset('assets/site/main/img/f3.png')}}" alt="">
                    <p>Divorce <br> Lawyers</p>
                    <button type="button" name="button">3 Lawyers</button>
                </div>
            </div>
            <div class="find_2_box">
                <img src="{{asset('assets/site/main/img/find5.png')}}" alt="" class="find_img">
                <div class="find_box_absolute">
                    <img src="{{asset('assets/site/main/img/f5.png')}}" alt="">
                    <p>Employment <br> Lawyers</p>
                    <button type="button" name="button">3 Lawyers</button>
                </div>
            </div>
            <div class="find_2_box">
                <img src="{{asset('assets/site/main/img/find6.png')}}" alt="" class="find_img">
                <div class="find_box_absolute">
                    <img src="{{asset('assets/site/main/img/f4.png')}}" alt="">
                    <p>Estate <br> Lawyers</p>
                    <button type="button" name="button">3 Lawyers</button>
                </div>
            </div>
            <div class="find_2_box">
                <img src="{{asset('assets/site/main/img/find7.png')}}" alt="" class="find_img">
                <div class="find_box_absolute">
                    <img src="{{asset('assets/site/main/img/f7.png')}}" alt="">
                    <p>Family <br> Lawyers</p>
                    <button type="button" name="button">3 Lawyers</button>
                </div>
            </div>
            <div class="find_2_box">
                <img src="{{asset('assets/site/main/img/find8.png')}}" alt="" class="find_img">
                <div class="find_box_absolute">
                    <img src="{{asset('assets/site/main/img/f8.png')}}" alt="">
                    <p>Immigration <br> Lawyers</p>
                    <button type="button" name="button">3 Lawyers</button>
                </div>
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
@endsection
