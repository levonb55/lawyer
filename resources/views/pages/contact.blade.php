@extends('main')

@section('title', 'Reach Legal - Contact')

@section('content')
    <section class="contact_main">
        <div class="contact_size">
            <div class="contact_size_left">
                <p>Send a Message</p>
                <input type="text" name="name" value="" placeholder="Name">
                <input type="text" name="phone" value="" placeholder="Phone">
                <input type="email" name="email" value="" placeholder="E-mail">
                <textarea name="message"  placeholder="Message"></textarea>
                <button type="submit" name="button">Send</button>
            </div>
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
                    @if($variables['location'])
                        <div class="ContactInfo_box">
                            {{--  <img src="{{asset('assets/images/general/contact3.png')}}" alt="Globe">--}}
                            <i class="fas fa-map-marker-alt"></i>
                            <p>{!! $variables['location'] !!}</p>
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
