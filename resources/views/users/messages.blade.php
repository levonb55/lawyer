@extends('users.layouts.main')

@section('title', 'Messages')

@section('newMessage-popup-style')
@endsection

@section('content')

    <div class="nav-btn pull-left">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="messaging">

        <div class="callingBox outgoing-call">
            <p>Calling to</p>
            <p class="callingBoxTitle"> Cristiano Ronaldo </p>
            <button class="callingBoxPhone" title="Cancel"><i class="fas fa-phone"></i></button>
        </div>

        <div class="callingBox incoming-call">
            <p class="callingBoxTitle"> Cristiano Ronaldo </p>
            <p>is calling</p>
            <div class="callingBoxFlex">
                <button class="callingBoxPhone" title="Decline"><i class="fas fa-phone"></i></button>
                <button class="callingBoxPhone callingBoxPhone2" title="Accept"><i class="fas fa-phone"></i></button>
            </div>
        </div>

        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="inbox_chat scroll">
                    @if(!$contacts->count())
                        <div class="text-center mt-4 no-contact">No Contact yet.</div>
                    @endif

                    @foreach($contacts as $contact)
                        <div class="chat_list" data-contact="{{ $contact->id }}">
                            <div class="chat_people">
                                <div class="chat_img">
                                    <img src="{{asset('assets/images/profile/' . $contact->image)}}" alt="sunil">
                                </div>
                                <div class="chat_ib">
                                    <h5>
                                        {{ $contact->full_name }}
                                        <span class="chat_date"></span>
                                        <span class="badge badge-warning unread unread-{{ $contact->id }}">{{ $contact->unread }}</span>
                                    </h5>
                                    <div class="onlineBox">
                                        <div class="contact-phone" title="Make a call"><i class="fa fa-phone"></i></div>
                                        <div class="onlineOrOffline" title="Online"></div>
                                    </div>
                                </div>

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
                            {{--                            <input type="text" name="content" id="content" class="write_msg" placeholder="Type a message" autofocus autocomplete="off"/>--}}
                            <textarea class="message-content" name="content" id="content"
                                      placeholder="Type a message ..." autofocus></textarea>
                            <div class="uploadAndSendBtn">
                                <label class="btnFooterLabel btnFooterLabe2">
                                    <input type="file" class="message-file d-none" name="file">
                                    <span class="bg_none text-center hand" title="Attach a file"><i
                                                class="fas fa-paperclip"></i></span>
                                </label>
                                <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane"
                                                                              aria-hidden="true"></i></button>
                                <div class="progress  upload-progress upload-progress2">
                                    <div class="progress-bar bg-success upload-progress-number"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>
@endsection

@section('extra-scripts')
    {{--    <script src="{{ asset('assets/libs/js/socket.js') }}"></script>--}}
    <script src="{{ asset('js/message.js') }}"></script>
    <script src="{{ asset('js/components/MessageDashboard.js') }}"></script>
@section('newMessage-popup-script')
@endsection
@endsection
