@extends('main')

@section('title', 'Reach Legal - Ask')

@section('content')
    <section class="ask_section">
        <div class="ask_size">
            <div class="ask_size_left">
                <p>Ask a Lawyer</p>
                <textarea name="name" rows="8" cols="80" placeholder="Describe your question"></textarea>
                <select class="" name="">
                    <option value="">Area of law</option>
                </select>
                <button type="" name="button">Submit question</button>
            </div>
            <div class="ask_size_right">
                <div class="ask_size_right_box">
                    <div class="ask_size_right_box_top">
                        <img src="{{asset('assets/images/general/ask1.png')}}" alt="Loudspeaker">
                        <p>Confidential and Secure</p>
                    </div>
                    <p class="ask_size_right_box_text">Legaly guarantees to keep your information private. Our services are
                        safe, and secure, so you can ask your legal question with confidence.</p>
                </div>
                <div class="ask_size_right_box">
                    <div class="ask_size_right_box_top">
                        <img src="{{asset('assets/images/general/ask2.png')}}" alt="Hands">
                        <p>Trusted Lawyers</p>
                    </div>
                    <p class="ask_size_right_box_text">Whether you have a complex legal question,
                        or a general inquiry, we ensure to find the right lawyer that specializes
                        in your situation. Trusted and experienced lawyers, provide you with free
                        legal advice right in the comfort of your home, so that you can resolve your issues quickly!</p>
                </div>
                <div class="ask_size_right_box">
                    <div class="ask_size_right_box_top">
                        <img src="{{asset('assets/images/general/ask3.png')}}" alt="Lock">
                        <p>Simple, Quick, and Free</p>
                    </div>
                    <p class="ask_size_right_box_text">No need to spend thousands of dollars
                        for legal advice, or search endlessly for lawyer referrals. We guarantee
                        a quality service, from start to end, so you can get started on resolving
                        your legal issues, with the right lawyer!</p>
                </div>
            </div>
        </div>
    </section>
@endsection
