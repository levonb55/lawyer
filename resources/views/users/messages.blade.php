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
        <div class="video-container">
            <div class="video-containerBlock">
              <div class="video_containerBlockBottom">
                  <video id="my-video"  class="my-video"></video>
                  <div class="video_containerBlockBottomControls">
                      <button class="callingBoxPhone cancel-call" title="Cancel"><i class="fas fa-phone"></i></button>
                      <button class="callingBoxPhone videoCallIcon" title="Cancel"><i class="fas fa-microphone"></i></button>
                      <button class="callingBoxPhone videoCallIcon" title="Cancel"><i class="fas fa-video"></i></button>
                  </div>
                  <div></div>
              </div>
                <video id="user-video" class="user-video"></video>
            </div>
        </div>
        <div class="callingBox outgoing-call">
            <p>Calling to</p>
            <p class="callingBoxTitle receiver"></p>
            <button class="callingBoxPhone cancel-call" title="Cancel"><i class="fas fa-phone"></i></button>
        </div>

        <div class="callingBox incoming-call">
            <p class="callingBoxTitle caller"></p>
            <p>is calling</p>
            <div class="callingBoxFlex">
                <button class="callingBoxPhone decline-call" title="Decline"><i class="fas fa-phone"></i></button>
                <button class="callingBoxPhone callingBoxPhone2 accept-call" title="Accept"><i class="fas fa-phone"></i></button>
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
                                    <h5 class="full_name">
                                        {{ $contact->full_name }}
                                        <span class="chat_date"></span>
                                        <span class="badge badge-warning unread unread-{{ $contact->id }}">{{ $contact->unread }}</span>
                                    </h5>
                                    <div class="onlineBox">
                                        <div class="make-call" title="Make a call"><i class="fa fa-phone"></i></div>
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

@endsection

@section('extra-scripts')
    {{--    <script src="{{ asset('assets/libs/js/socket.js') }}"></script>--}}
    <script src="{{ asset('js/message.js') }}"></script>
    <script src="{{ asset('js/components/MessageDashboard.js') }}"></script>
{{--    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simple-peer/9.6.0/simplepeer.min.js"></script>
    <script>

        class Video {

            userStream = null;
            peers = {};
            peer = '' ;
            waitingCall = null;
            outGoingCall = $('.outgoing-call');
            inComingCall = $('.incoming-call');
            contact = '';
            callingSound = '';

            constructor() {
                this.setupLaravelEcho();
            }

            getPermission(receiver = null, receiverName = null) {
                navigator.mediaDevices.getUserMedia({video: true, audio: false})
                    .then((stream) => {
                        this.showMyVideo(stream);

                        if(receiver) {
                            this.makeCallingSound();
                            $('.receiver').text(receiverName);
                            this.outGoingCall.show();
                            this.peers[receiver] = this.startPeer(receiver);
                        } else {
                            this.inComingCall.hide();
                            if(this.waitingCall){
                                this.peerSignal(this.waitingCall);
                            }
                        }

                    })
                    .catch(() => {
                        if(!receiver) {
                            this.stopCallingSound();
                            this.inComingCall.hide();
                            this.rejectCall(this.contact, 'reject');
                        }
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
                        url: '/calling',
                        data: {
                            type: 'signal',
                            caller: authUser,
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

            callTo(receiver, receiverName)  {
                this.getPermission(receiver, receiverName);
                this.contact = receiver;
            }

            setupLaravelEcho()  {
                Echo.private(`call.${authUser}`)
                    .listen('NewVideoCall', (call) => {
                        if(call.data.type === 'answer'){
                            this.stopCallingSound();
                            this.peerSignal(call);
                            this.outGoingCall.hide();
                        } else if (call.data.type === 'offer'){
                            this.makeCallingSound();
                            this.waitingCall = call;
                            $('.caller').text(call.callerName);
                            this.inComingCall.show();
                            this.contact = call.caller;
                            this.peer = '';
                            this.peers = {};
                        }
                    });

                Echo.private(`reject-call.${authUser}`)
                    .listen('NewVideoCall', (call) => {
                        if(call.data === 'reject') {
                            this.stopOutgoingCall();
                        } else if (call.data === 'cancel') {
                            this.stopIncomingCall();
                        }
                    });
            }

            peerSignal(call) {
                let caller = call.caller;
                this.peer = this.peers[caller];
                if(this.peer === undefined) {
                    this.stopCallingSound();
                    this.peer = this.startPeer(caller, false);
                }
                call.data.sdp += "\n";
                this.peer.signal(call.data);
            }

            showMyVideo(stream) {
                let myVideo = document.getElementById('my-video');
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

            rejectCall(contact, type) {
                $.ajax({
                    method: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '/reject-call',
                    data: {
                        contact : contact,
                        type: type
                    }
                })
                .then(() => {})
                .catch(() => {
                    console.log('Call Failed!');
                });
            }

            makeCallingSound() {
                // this.callingSound = new Audio('/assets/sounds/calling.mp3');
                // let playMusic = this.callingSound.play();
                // playMusic.then(() => {
                //     console.log('playing');
                // }).catch(() => {
                //     console.log('blocked');
                // });
            }

            stopCallingSound() {
                // this.callingSound.pause();
            }

            makeDropSound() {
                // let audio = new Audio('/assets/sounds/drop.mp3');
                // audio.play();
            }

            stopIncomingCall() {
                this.makeDropSound();
                this.stopCallingSound();
                this.inComingCall.hide();
            }

            stopOutgoingCall() {
                this.makeDropSound();
                this.stopCallingSound();
                this.outGoingCall.hide();
            }
        }

        let video = new Video();

        $('.make-call').on('click', function (e) {
            e.stopPropagation();
            let chatList = $(this).parents('.chat_list');
            video.callTo(chatList.data('contact'), chatList.find('.full_name').text());
        });

        $('.accept-call').on('click', function () {
            video.getPermission();
        });

        $('.decline-call').on('click', function () {
            video.stopIncomingCall();
            video.rejectCall(video.contact, 'reject');
        });

        $('.cancel-call').on('click', function () {
            video.stopOutgoingCall();
            video.rejectCall(video.contact, 'cancel');
        });
    </script>
@section('newMessage-popup-script')
@endsection
@endsection
