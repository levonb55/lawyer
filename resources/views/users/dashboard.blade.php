@extends('users.layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="profile_1_2">
        @if($user->image)
            <img src="{{asset('assets/images/profile/' . $user->image)}}" alt="" class="find_2_face">
        @else
            <img src="{{asset('assets/images/general/find_2_face.png')}}" alt="" class="find_2_face">
        @endif
        <p class="profile_1_2_name">{{$user->first_name . ' ' . $user->last_name}}</p>

        @if($user->role_id === 2 )
            @if($user->lawyer->company)
                <p class="profile_1_2_fname">{{$user->lawyer->company}}</p>
            @endif

            @if($user->lawyer->address)
                <div class="loc_and_text">
                    <img src="{{asset('assets/images/general/loc.png')}}" alt="Location sign">
                    <p>{{$user->lawyer->address}}</p>
                </div>
            @endif

            <div class="profile_1_2_block">
                <div class="">
                    <img src="{{asset('assets/images/general/find_2_1.png')}}" alt="">
                    <p>{{$category ? $category->name : '' }}</p>
                </div>
            </div>
            <p class="profile_1_2_text">{{$user->lawyer->background}}</p>

            <div class="profile_1_2_soc">
                @if($user->lawyer->facebook)
                    <a href="{{$user->lawyer->facebook}}">
                        <img src="{{asset('assets/images/general/p_facebook.png')}}" alt="Facebook">
                    </a>
                @endif
                @if($user->lawyer->twitter)
                    <a href="{{$user->lawyer->twitter}}">
                        <img src="{{asset('assets/images/general/p_twit.png')}}" alt="Twitter">
                    </a>
                @endif
                @if($user->lawyer->instagram)
                    <a href="{{$user->lawyer->instagram}}">
                        <img src="{{asset('assets/images/general/p_insta.png')}}" alt="Instagram">
                    </a>
                @endif
                @if($user->lawyer->linkedin)
                    <a href="{{$user->lawyer->linkedin}}">
                        <img src="{{asset('assets/images/general/p_link.png')}}" alt="Linkedin">
                    </a>
                @endif
            </div>
        @endif
        </div>

@endsection
