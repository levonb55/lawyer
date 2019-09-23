@extends('users.layouts.main')

@section('title', 'Bookings')

@section('extra-styles')
    <link href='{{ asset('assets/libs/@fullcalendar/core/main.css') }}' rel='stylesheet' />
    <link href="{{ asset('assets/libs/@fullcalendar/daygrid/main.css') }}" rel='stylesheet' />
@endsection

@section('content')
    <div class="nav-btn pull-left">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="clear"></div>
    <div id='calendar'></div>
    <div class="calendar_btn">
        <button type="button" name="button">User Name</button>
    </div>

    <div class="year_btn">
        <div id='Year_array_prev'> <span class="fc-icon fc-icon-chevron-left"></span> </div>
        <div id='Year_array_next'> <span class="fc-icon fc-icon-chevron-right"></span> </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('assets/libs/@fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('assets/libs/@fullcalendar/daygrid/main.js') }}"></script>
@endsection
