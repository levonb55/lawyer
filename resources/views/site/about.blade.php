@extends('site.layouts.app')

@section('content')

<section class="about_1">
    <h2>ABOUT US</h2>
</section>
<div class="about_title">
    <p>Who We Are</p>
    <div class="about_title_line"></div>
</div>
@if(isset($first_content))
<section class="about_2">
    <h6>{{$first_content->main_title}}</h6>
    <div class="about_2_text">
        <p>{!! $first_content->description !!} </p>
    </div>
</section>
@endif
<div class="about_title">
    <p>What We Do</p>
    <div class="about_title_line"></div>
</div>
@if(isset($second_content))
<section class="about_3">
    <div class="about_3_size">
        <div class="about_3_left">
            <img src="{{asset($second_content->image_path)}}" alt="">
        </div>
        <div class="about_3_right">
            <h6>{{$second_content->main_title}}</h6>
            <p>{!! $second_content->description !!}</p>
        </div>
    </div>
</section>
@endif
@if(isset($third_content))
<section class="about_4">
    <h3>{{$third_content->main_title}}</h3>
    <p>{!! $third_content->description !!}</p>
    <button type="button" name="button">Join Now </button>
</section>
@endif
<section class="lawyers_7">
    <div class="opacity_bg">
    </div>
</section>
@endsection
