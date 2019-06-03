@extends('site.layouts.app')

@section('content')
    @if(isset($privacy))
        <section class="terms_title">
            <p>{{$privacy[0]->main_title}}</p>
            <div class="terms_title_line">

            </div>
        </section>

        @foreach($privacy->slice(1) as $pol)
            <section class="terms">
                <p class="terms_text_1">{{$pol->title}}</p>
                <p class="terms_text_2">{!! $pol->description !!}</p>
            </section>
        @endforeach
    @endif
@endsection
