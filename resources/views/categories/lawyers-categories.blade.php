@extends('main')

@section('title', 'Reach Legal - Categories')

@section('content')
    <section class="find_1">
        <h3>Lawyers By Categories</h3>
        <div class="find_line"></div>
{{--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et semper orci, non </p>--}}
    </section>
    <section class="find_2">
        <div class="find_2_size">
            @if(isset($categories))
                @foreach($categories as $category)
                    <a href="{{route('lawyers.category', $category->id)}}">
                        <div class="find_2_box">
                            <img src="{{asset('assets/images/categories/images/' . $category->image)}}" alt="Law" class="find_img">
                            <div class="find_box_absolute">
                                <img src="{{asset('assets/images/categories/icons/' . $category->icon)}}" alt="">
                                <p>{{$category->name}} <br> Lawyers</p>
                                <button type="button" name="button">{{$category->lawyers->count()}} Lawyers</button>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </section>

    @include('partials._join-community')

@endsection
