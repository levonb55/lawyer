@extends('main')

@section('title', 'Reach Legal - About')

@section('content')

    <section class="about_1">
        <h2>ABOUT US</h2>
    </section>

    <section class="who_we_are">
        <div class="about_title">
            <p>Who We Are</p>
            <div class="about_title_line"></div>
        </div>
        <section class="about_2">
            <div class="about_2_text">
                {!! $variables['about-who-we-are'] !!}
            </div>
        </section>
    </section>

    <section>
        <div class="about_title">
            <p>What We Do</p>
            <div class="about_title_line"></div>
        </div>
        <section class="about_3">
            <div class="about_3_size">
                <div class="about_3_left">
                    <img src="{{asset('assets/images/general/about1.png')}}" alt="">
                </div>
                <div class="about_3_right">
                    <p>{!! $variables['about-what-we-do'] !!}</p>
                </div>
            </div>
        </section>
    </section>

    <section class="about_4">
        <h3>Our team</h3>
        <p>{!! $variables['about-our-team'] !!}</p>
        <button type="button" name="button">Join Now </button>
    </section>

    <section class="lawyers_7">
        <div class="opacity_bg">
        </div>
    </section>

@endsection
