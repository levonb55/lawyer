@extends('site.layouts.app')

@section('content')
    @if(isset($terms))
    <section class="terms_title">
        <p>{{$terms[0]->main_title}}</p>
        <div class="terms_title_line">

        </div>
    </section>

    @foreach($terms->slice(1) as $term)
        <section class="terms">
            <p class="terms_text_1">{{$term->title}}</p>
            <p class="terms_text_2">{!! $term->description !!}</p>
        </section>
        @endforeach
    @endif
@endsection
