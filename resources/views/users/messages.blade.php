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
                    @if(!$users->count())
                        <div class="text-center mt-4">No Contact yet.</div>
                    @endif
                    @foreach($users as $user)
                        @if($user->id == auth()->id())
                            @continue;
                        @endif
                        <div class="chat_list" data-sender="{{ $user->id }}">
                            <div class="chat_people">
                                <div class="chat_img">
                                    @if($user->image)
                                        <img src="{{asset('assets/images/profile/' . $user->image)}}" alt="sunil">
                                    @else
                                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                    @endif
                                </div>
                                <div class="chat_ib">
                                    <h5>{{ $user->full_name }} <span class="chat_date"></span></h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
                    <div>Click on any contact to get messages!</div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <form id="message-form">
                            <input type="text" name="content" class="write_msg" placeholder="Type a message" autofocus />
                            <input type="hidden" name="receiver" id="receiver">
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
    <script src="{{ asset('js/message.js') }}"></script>
    <script src="{{ asset('js/components/MessageDashboard.js') }}" ></script>
@endsection