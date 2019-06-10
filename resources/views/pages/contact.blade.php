@extends('main')

@section('title', 'Reach Legal - Contact')

@section('content')
    <section class="contact_main">
        <div class="contact_size">
            <div class="contact_size_left">
                <p>Send a Message</p>
                <input type="text" name="" value="" placeholder="Name">
                <input type="text" name="" value="" placeholder="Phone">
                <input type="text" name="" value="" placeholder="Message">
                <textarea name="name"  placeholder="E-mail"></textarea>
                <button type="button" name="button">Send</button>
            </div>
            <div class="contact_size_right">
                <p class="ContactInfo">Contact Info</p>
                <div class="ContactInfo_box">
                    <img src="{{asset('assets/images/general/contact1.png')}}" alt="Phone">
                    <p>+000 123 456 789</p>
                </div>
                <div class="ContactInfo_box">
                    <img src="{{asset('assets/images/general/contact2.png')}}" alt="Envelope">
                    <p>example.@gmail.com</p>
                </div>
                <div class="ContactInfo_box">
                    <img src="{{asset('assets/images/general/contact3.png')}}" alt="Globe">
                    <p>lorem ipsum.com</p>
                </div>
                <div class="contact_size_right_line">

                </div>
                <p class="contact_size_right_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mi mi, efficitur ut lorem sed, bibendum congue</p>
            </div>
            <div class="contact_size_map">

            </div>
        </div>
    </section>
@endsection
