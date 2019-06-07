@extends('site.layouts.app')

@section('content')
    <section class="profile_1">
        <div class="profile_1_1">
            @if($lawyer->image)
                <img src="{{asset('assets/images/profile/' . $lawyer->image)}}" alt="" class="find_2_face">
            @else
                <img src="{{asset('assets/site/main/img/find_2_face.png')}}" alt="" class="find_2_face">
            @endif
            <div class="profile_1_stars">
                <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
            </div>
            <p class="profile_reviews">3 reviews</p>
            <button type="button" name="button">Add review</button>
            <div class="profile_1_1_bottom">
                <img src="{{asset('assets/site/main/img/p_icon.png')}}" alt="" class="p_icon">
                <p>Lorem Ipsum</p>
            </div>
            <div class="profile_1_1_bottom">
                <img src="{{asset('assets/site/main/img/p_icon2.png')}}" alt="" class="p_icon2">
                <p>Lorem Ipsum</p>
            </div>
            <div class="profile_1_1_bottom">
                <img src="{{asset('assets/site/main/img/p_icon_3.png')}}" alt="" class="p_icon_3">
                <p>Lorem Ipsum</p>
            </div>
        </div>
        <div class="profile_1_2">
            <p class="profile_1_2_name">{{$lawyer->first_name . ' ' . $lawyer->last_name}}</p>
            <p class="profile_1_2_fname">{{$lawyer->lawyer->company}}</p>

            @if($lawyer->lawyer->address)
                <div class="loc_and_text">
                    <img src="{{asset('assets/site/main/img/loc.png')}}" alt="Location sign">
                        <p>{{$lawyer->lawyer->address}}</p>
                </div>
            @endif

            <div class="profile_1_2_block">
                <div class="">
                    <img src="{{asset('assets/site/main/img/find_2_1.png')}}" alt="">
                    <p>{{$category->name}}</p>
                </div>
                {{--<div class="">--}}
                    {{--<img src="{{asset('assets/site/main/img/find_2_2.png')}}" alt="">--}}
                    {{--<p>Immigration</p>--}}
                {{--</div>--}}
                {{--<div class="">--}}
                    {{--<img src="{{asset('assets/site/main/')}}img/find_2_3.png" alt="">--}}
                    {{--<p>Criminal</p>--}}
                {{--</div>--}}
            </div>
            <p class="profile_1_2_text">{{$lawyer->lawyer->background}}</p>
            <div class="profile_1_2_soc">

                @if($lawyer->lawyer->facebook)
                    <a href="{{$lawyer->lawyer->facebook}}">
                        <img src="{{asset('assets/site/main/img/p_facebook.png')}}" alt="Facebook">
                    </a>
                @endif
                @if($lawyer->lawyer->twitter)
                    <a href="{{$lawyer->lawyer->twitter}}">
                        <img src="{{asset('assets/site/main/img/p_twit.png')}}" alt="Twitter">
                    </a>
                @endif
                @if($lawyer->lawyer->instagram)
                    <a href="{{$lawyer->lawyer->instagram}}">
                        <img src="{{asset('assets/site/main/img/p_insta.png')}}" alt="Instagram">
                    </a>
                @endif
                @if($lawyer->lawyer->linkedin)
                    <a href="{{$lawyer->lawyer->linkedin}}">
                        <img src="{{asset('assets/site/main/img/p_link.png')}}" alt="Linkedin">
                    </a>
                @endif

            </div>
        </div>
        <div class="profile_1_3">
            <!-- <p class="Message_now"  data-toggle="modal" data-target="#chat">Message Now</p> -->
            <button type="button" name="button" class="Message_now"  data-toggle="modal" data-target="#chat">Message Now</button>
            <div class="profile_1_3_contact">
                <p class="profile_1_3_contact_text"><i class="fas fa-phone profile_1_3_contact_icon"></i></p>
                <p>+123 456 789000000</p>
            </div>
            <div class="profile_1_3_contact">
                <p><i class="fas fa-globe profile_1_3_contact_icon"></i></p>
                <p class="profile_1_3_contact_text">Lorem Ipsum dolor sir</p>
            </div>
            <p class="Book_appointment">Book an appointment</p>
            <div class="profile_1_3_inputs">
                <input type="text" name="" value="" placeholder="Full Name">
                <input type="text" name="" value="" placeholder="Phone">
                <input type="date" name="" value="" placeholder="">
                <input type="time" name="" value="" placeholder="">
                <button type="button" name="button">Book it</button>
            </div>
        </div>
    </section>
    <section class="profile_2">
        <img src="{{asset('assets/site/main/img/prof_bg.png')}}" alt="">
    </section>
    <p class="reviews_for_john">3 reviews for John Doe</p>
    <section class="profile_3">
        <div class="profile_3_box">
            <div class="profile_3_box_top">
                <div class="profile_3_box_top_stars">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                </div>
                <p>on August 5, 2017</p>
            </div>
            <p class="profile_3_box_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi eget
                erat dignissim tempor. Proin maximus blandit consequat. Nullam in lectus sed
                sem ornare elementum. Mauris quis leo sed nunc convallis feugiat. Fusce porttitor</p>
        </div>
        <div class="profile_3_box">
            <div class="profile_3_box_top">
                <div class="profile_3_box_top_stars">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                </div>
                <p>on August 5, 2017</p>
            </div>
            <p class="profile_3_box_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi eget
                erat dignissim tempor. Proin maximus blandit consequat. Nullam in lectus sed
                sem ornare elementum. Mauris quis leo sed nunc convallis feugiat. Fusce porttitor</p>
        </div>
        <div class="profile_3_box">
            <div class="profile_3_box_top">
                <div class="profile_3_box_top_stars">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                </div>
                <p>on August 5, 2017</p>
            </div>
            <p class="profile_3_box_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi eget
                erat dignissim tempor. Proin maximus blandit consequat. Nullam in lectus sed
                sem ornare elementum. Mauris quis leo sed nunc convallis feugiat. Fusce porttitor</p>
        </div>
    </section>
    <section class="profile_4">
        <textarea name="name"  placeholder="Leave John Doe a feedback"></textarea>
        <div class="profile_4_size">
            <div class="profile_4_size_left">
                <div class="profile_4_size_left_inputs">
                    <input type="text" name="" value="" placeholder="First Name">
                    <input type="text" name="" value="" placeholder="Last Name">
                    <input type="text" name="" value="" placeholder="Email">
                </div>
                <div class="profile_4_size_left_stars">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                    <img src="{{asset('assets/site/main/img/star.png')}}" alt="">
                </div>
                <button type="button" name="button">Send review</button>
            </div>
            <div class="profile_4_size_right">
                <p>All contact information is private and will be hidden from the public</p>
            </div>
        </div>
    </section>
    <p class="Publications">Publications</p>
    <section class="profile_5">
        <div class="profile_5_box">
            <img src="{{asset('assets/site/main/img/pdf.png')}}" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
        <div class="profile_5_box">
            <img src="{{asset('assets/site/main/img/pdf.png')}}" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
        <div class="profile_5_box">
            <img src="{{asset('assets/site/main/img/pdf.png')}}" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
        </div>
    </section>

    <section class="lawyers_7">
        <div class="opacity_bg">
            <div class="lawyers_7_size">
                <h3>Join the community </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
                    aliquet metus non lectus porttitor, ac hendrerit odio lacinia. Cras quis
                    libero vel tortor porta suscipit ut in urna. Vestibulum ante ipsum primis
                    in faucibus orci luctus et</p>
                <div class="">
                    <input type="text" name="" value="" placeholder="Enter your email">
                    <button type="button" name="button">Join</button>
                </div>
            </div>
        </div>
    </section>


    <!-- modal -->

    {{--<div id="chat" class="modal fade" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<p>Name</p>--}}
                    {{--<p>Surname</p>--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p class="text_right">lorem ipsum</p>--}}
                    {{--<p class="text_left">lorem ipsum</p>--}}
                    {{--<p class="text_right">lorem ipsum</p>--}}
                    {{--<p class="text_left">lorem ipsum</p>--}}
                    {{--<div class="call_smile">--}}
                        {{--<p><i class="far fa-images"></i></p>--}}
                        {{--<p><i class="far fa-smile"></i></p>--}}
                        {{--<p><i class="fas fa-video"></i></p>--}}
                    {{--</div>--}}
                    {{--<input type="text" name="" value="">--}}
                    {{--<button type="button" name="button">send</button>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
    <div class="container text-center">
        <div class="row">
            <h2>Open in chat (popup-box chat-popup)</h2>
            <h4>Click Here</h4>
            <div class="round hollow text-center">
                <a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Open in chat </a>
            </div>

            <hr>

            MORE :
            <a target="_blank" href="http://bootsnipp.com/snippets/33ejn">Whatsapp Chat Box POPUP</a>,
            <a target="_blank" href="http://bootsnipp.com/snippets/z4P39"> Creative User Profile  </a>

        </div>
    </div>


    <div class="popup-box chat-popup" id="qnimate">
        <div class="popup-head">
            <div class="popup-head-left pull-left"><img src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" alt="iamgurdeeposahan"> Gurdeep Osahan</div>
            <div class="popup-head-right pull-right">
                <div class="btn-group">
                    <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                        <i class="glyphicon glyphicon-cog"></i> </button>
                    <ul role="menu" class="dropdown-menu pull-right">
                        <li><a href="#">Media</a></li>
                        <li><a href="#">Block</a></li>
                        <li><a href="#">Clear Chat</a></li>
                        <li><a href="#">Email Chat</a></li>
                    </ul>
                </div>

                <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
            </div>
        </div>
        <div class="popup-messages">




            <div class="direct-chat-messages">


                <div class="chat-box-single-line">
                    <abbr class="timestamp">October 8th, 2015</abbr>
                </div>


                <!-- Message. Default to the left -->
                <div class="direct-chat-msg doted-border">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img alt="message user image" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                    </div>
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                    </div>
                    <div class="direct-chat-info clearfix">
						<span class="direct-chat-img-reply-small pull-left">

						</span>
                        <span class="direct-chat-reply-name">Singh</span>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->


                <div class="chat-box-single-line">
                    <abbr class="timestamp">October 9th, 2015</abbr>
                </div>



                <!-- Message. Default to the left -->
                <div class="direct-chat-msg doted-border">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                    </div>
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                    </div>
                    <div class="direct-chat-info clearfix">
                        <img alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img big-round">
                        <span class="direct-chat-reply-name">Singh</span>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->






            </div>









        </div>
        <div class="popup-messages-footer">
            <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
            <div class="btn-footer">
                <button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
                <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
                <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button>
            </div>
        </div>
    </div>
@endsection
