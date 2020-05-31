@extends('main')

@section('title', 'Reach Legal - Contact')

@section('content')
    <section class="contact_main">

        @include('partials._messages')

        <div class="contact_size">
            <form action="{{route('contact.send')}}" method="POST" class="contact_size_left">
                @csrf
                <p>Send a Message</p>
                <input type="text" name="name" placeholder="Name" required autofocus autocomplete="off">
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="text" name="subject" placeholder="Subject" autocomplete="off">
                <textarea name="message"  placeholder="Message" required></textarea>
                <button type="submit">Send</button>
            </form>
            <div class="contact_size_right">
                <p class="ContactInfo">Contact Info</p>
                <div class="ContactInfoBody">
                    @if($variables['phone'])
                        <div class="ContactInfo_box">
                            <img src="{{asset('assets/images/general/contact1.png')}}" alt="Phone">
                            <p>{!! $variables['phone'] !!}</p>
                        </div>
                    @endif
                    @if($variables['email'])
                        <div class="ContactInfo_box">
                            <img src="{{asset('assets/images/general/contact2.png')}}" alt="Envelope">
                            <p>{!! $variables['email'] !!}</p>
                        </div>
                    @endif
                    @if($variables['address'])
                        <div class="ContactInfo_box">
                            {{--  <img src="{{asset('assets/images/general/contact3.png')}}" alt="Globe">--}}
                            <i class="fas fa-map-marker-alt"></i>
                            <p>{!! $variables['address'] !!}</p>
                        </div>
                    @endif
                </div>
{{--                <div class="contact_size_right_line">--}}

{{--                </div>--}}
{{--                <p class="contact_size_right_text">--}}
{{--                    {!! $variables['contact-additional-info'] !!}--}}
{{--                </p>--}}
            </div>
            <div class="contact_size_map">

            </div>
        </div>
    </section>
@endsection
