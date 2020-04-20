@extends('main')

@section('title', 'Reach Legal - Privacy')

@section('content')

    <section class="terms_title">
        <p>{!! $variables['privacy-policy-header'] !!}</p>
        <div class="terms_title_line">

        </div>
    </section>

    <section class="terms">
        {!! $variables['privacy-policy-text'] !!}
    </section>

@endsection
