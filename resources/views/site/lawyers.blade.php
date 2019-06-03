@extends('site.layouts.app')

@section('content')
    <section class="find_1">
        <h3>Lorem ipsum dolor sit amet</h3>
        <div class="find_line"></div>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et semper orci, non </p>
    </section>
    <section class="find_2">
        <div class="find_2_size">
            @if(isset($categories))
                @foreach($categories as $category)
                    <a href="{{route('lawyers_by_category')}}">
                        <div class="find_2_box">
                            <img src="{{asset('assets/site/main/img/find1.png')}}" alt="" class="find_img">
                            <div class="find_box_absolute">
                                <img src="{{asset('assets/site/main/img/f1.png')}}" alt="">
                                <p>{{$category->name}} <br> Lawyers</p>
                                <button type="button" name="button">3 Lawyers</button>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
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
