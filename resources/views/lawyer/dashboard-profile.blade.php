@extends('lawyer.layouts.app')

@section('content')

    <div class="profile_1_2">
        @if($lawyer->image)
            <img src="{{asset('assets/images/profile/' . $lawyer->image)}}" alt="" class="find_2_face">
        @else
            <img src="{{asset('assets/site/main/img/find_2_face.png')}}" alt="" class="find_2_face">
        @endif
        <p class="profile_1_2_name">{{$lawyer->first_name . ' ' . $lawyer->last_name}}</p>

            @if($lawyer->lawyer->company)
                <p class="profile_1_2_fname">{{$lawyer->lawyer->company}}</p>
            @endif

            @if($lawyer->lawyer->address)
                <div class="loc_and_text">
                    <img src="{{asset('assets/site/main/img/loc.png')}}" alt="Location sign">
                    <p>{{$lawyer->lawyer->address}}</p>
                </div>
            @endif

            <div class="profile_1_2_block">
                <div class="">
                    <img src="{{asset('assets/site/main/img/find_2_1.png')}}" alt="">
                    <p>{{$category->name}}</p>
                </div>
            </div>
            <p class="profile_1_2_text">{{$lawyer->lawyer->background}}</p>

            <div class="profile_1_2_soc">
                @if($lawyer->lawyer->facebook)
                    <a href="{{$lawyer->lawyer->facebook}}">
                        <img src="{{asset('assets/site/main/img/p_facebook.png')}}" alt="Facebook">
                    </a>
                @endif
                @if($lawyer->lawyer->twitter)
                    <a href="{{$lawyer->lawyer->twitter}}">
                        <img src="{{asset('assets/site/main/img/p_twit.png')}}" alt="Twitter">
                    </a>
                @endif
                @if($lawyer->lawyer->instagram)
                    <a href="{{$lawyer->lawyer->instagram}}">
                        <img src="{{asset('assets/site/main/img/p_insta.png')}}" alt="Instagram">
                    </a>
                @endif
                @if($lawyer->lawyer->linkedin)
                    <a href="{{$lawyer->lawyer->linkedin}}">
                        <img src="{{asset('assets/site/main/img/p_link.png')}}" alt="Linkedin">
                    </a>
                @endif
            </div>
        </div>

@endsection
