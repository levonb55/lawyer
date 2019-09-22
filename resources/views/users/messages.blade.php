@extends('users.layouts.main')

@section('title', 'Messages')

@section('content')

    <div class="nav-btn pull-left">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar"  placeholder="Search" >
                        </div>
                    </div>
                </div>
                <div class="inbox_chat scroll">
                    @if(!$contacts->count())
                        <div class="text-center mt-4">No Contact yet.</div>
                    @endif

                    @foreach($contacts as $contact)
                        <div class="chat_list" data-contact="{{ $contact->id }}">
                            <div class="chat_people">
                                <div class="chat_img">
                                    @if($contact->image)
                                        <img src="{{asset('assets/images/profile/' . $contact->image)}}" alt="sunil">
                                    @else
                                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                    @endif
                                </div>
                                <div class="chat_ib">
                                    <h5>{{ $contact->full_name }} <span class="chat_date"></span></h5>
                                </div>
                                <span class="badge badge-warning unread unread-{{ $contact->id }}">{{ $contact->unread }}</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="mesgs">
                <div class="load-messages text-center">Loading ...</div>
                <div class="msg_history" data-messages="">
                    <div>Click on any contact to get messages!</div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <form id="message-form">
                            <input type="hidden" name="contact" id="contact">
                            <input type="hidden" name="user" value="{{ auth()->id() }}" id="user">
                            <input type="text" name="content" id="content" class="write_msg" placeholder="Type a message" autofocus autocomplete="off"/>
                            <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>
@endsection

@section('extra-scripts')
    <script src="{{ asset('assets/libs/js/socket.js') }}"></script>
    <script src="{{ asset('js/message.js') }}"></script>
    <script src="{{ asset('js/components/MessageDashboard.js') }}" ></script>
@endsection
