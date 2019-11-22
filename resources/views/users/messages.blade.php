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
                <button class="callingBoxPhone callingBoxPhone2 accept" title="Accept"><i class="fas fa-phone"></i></button>
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
{{--                                        <div class="onlineOrOffline" title="Online"></div>--}}
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
    <div class="container">
        <div class="video-container">
            <video id="my-video" style="background: red; width: 200px; height: 200px;" class="my-video"></video>
            <video id="user-video" class="user-video"></video>
        </div>
    </div>
@endsection

@section('extra-scripts')
    {{--    <script src="{{ asset('assets/libs/js/socket.js') }}"></script>--}}
    <script src="{{ asset('js/message.js') }}"></script>
    <script src="{{ asset('js/components/MessageDashboard.js') }}"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simple-peer/9.6.0/simplepeer.min.js"></script>
    <script>

        class Video {

            userStream = null;
            hasMedia = false;
            peers = {};
            otherUserId = '';
            channel = '';
            peer = '' ;
            callInitiator = '';
            call = '';
            waitingCall = null;
            outGoingCall = $('.outgoing-call');
            inComingCall = $('.incoming-call');

            constructor() {
                this.getPermission();
                this.setupLaravelEcho();
            }

            getPermission() {
                navigator.mediaDevices.getUserMedia({video: true, audio: false})
                    .then((stream) => {
                        this.showMyVideo(stream);
                    })
                    .catch(err => {
                        throw new Error(`Unable to fetch stream ${err}`);
                    });
            }

            startPeer(receiver, initiator = true) {
                const peer = new SimplePeer({
                    initiator,
                    stream: this.userStream,
                    trickle: false
                });

                peer.on('signal', (data) => {
                    $.ajax({
                        method: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: appUrl + '/calling',
                        data: {
                            type: 'signal',
                            caller: @json(auth()->id()),
                            receiver: receiver,
                            data: data
                        }
                    })
                    .then(() => {})
                    .catch(() => {
                        console.log('Call Failed!');
                    });
                });

                peer.on('stream', (stream) => {
                    this.showUserVideo(stream);
                });

                peer.on('close', () => {
                    let peer = this.peers[receiver];
                    if(peer !== undefined) {
                        peer.destroy();
                    }
                    this.peers[receiver] = undefined;
                    document.querySelector('.video-container').remove();
                });

                return peer;
            }

            callTo(receiver)  {
                this.outGoingCall.show();
                this.callInitiator = authUser;
                this.peers[receiver] = this.startPeer(receiver);
            }

            setupLaravelEcho()  {
                Echo.channel('call-' +  @json(auth()->id()))
                    .listen('NewVideoCall', (call) => {
                        if(call.data.type === 'answer'){
                            this.peerSignal(call);
                            this.outGoingCall.hide();
                        } else if (call.data.type === 'offer'){
                            this.waitingCall = call;
                            this.inComingCall.show();
                        }
                    });
            }

            peerSignal(call) {
                let caller = call.caller;
                this.peer = this.peers[caller];
                if(this.peer === undefined) {
                    this.otherUserId = caller;
                    this.peer = this.startPeer(caller, false);
                }
                call.data.sdp += "\n";
                this.peer.signal(call.data);
            }

            showMyVideo(stream) {
                let myVideo = document.getElementById('my-video');
                this.hasMedia = true;
                this.userStream = stream;

                try {
                    myVideo.srcObject = stream;
                } catch (e) {
                    myVideo.src = URL.createObjectURL(stream);
                }
                myVideo.play();
            }

            showUserVideo(stream) {
                let userVideo = document.getElementById('user-video');

                try {
                    userVideo.srcObject = stream;
                } catch (e) {
                    userVideo.src = URL.createObjectURL(stream);
                }
                userVideo.play();
            }

            removePeer() {
                document.querySelector('.video-container').remove();
                if(this.peer) {
                    this.peer.destroy();
                }
            }
        }

        let video = new Video();

        $('.contact-phone').on('click', function (e) {
            e.stopPropagation();
            video.callTo($(this).parents('.chat_list').data('contact'));
        });

        $('.accept').on('click', function (e) {
            video.inComingCall.hide();
            if(video.waitingCall){
                video.peerSignal(video.waitingCall)
            }
        });
    </script>
@section('newMessage-popup-script')
@endsection
@endsection
