@extends('main')

@section('title', 'Reach Legal - ' . $user->full_name)

@section('styles')
    <link rel="stylesheet" href="{{asset('css/simplePagination.css')}}">
@endsection

@section('content')

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>

    <section class="profile_1">
        <div class="profile_1_1">
            @if($user->image)
                <img src="{{asset('assets/images/profile/' . $user->image)}}" alt="Person" class="find_2_face">
            @else
                <img src="{{asset('assets/images/general/blank-profile-picture.png')}}" alt="Person" class="find_2_face">
            @endif
            <div class="profile_1_stars">
                @for ($i = 0; $i < $user->lawyer->rating; $i++)
                    <img src="{{asset('assets/images/general/star.png')}}" alt="Star">
                @endfor
            </div>
            <p class="profile_reviews">{{$reviewsNumber}} reviews</p>

            <a href="#reviews-list">
                <button type="button">Add review</button>
            </a>

            <div class="profile_1_1_bottom">
                <img src="{{asset('assets/images/general/p_icon.png')}}" alt="" class="p_icon">
                <p>Lorem Ipsum</p>
            </div>
            <div class="profile_1_1_bottom">
                <img src="{{asset('assets/images/general/p_icon2.png')}}" alt="" class="p_icon2">
                <p>Lorem Ipsum</p>
            </div>
            <div class="profile_1_1_bottom">
                <img src="{{asset('assets/images/general/p_icon_3.png')}}" alt="" class="p_icon_3">
                <p>Lorem Ipsum</p>
            </div>
        </div>
        <div class="profile_1_2">
            <p class="profile_1_2_name">{{$user->full_name}}</p>
            <p class="profile_1_2_fname">{{$user->lawyer->company}}</p>

            <div class="loc_and_text">
                <img src="{{asset('assets/images/general/loc.png')}}" alt="Location sign">
                <p>
                    {{ $user->lawyer->state ? $user->lawyer->state . ', '  : ''}}
                    {{ $user->lawyer->city ? $user->lawyer->city . ', ' : ''}}
                    {{ $user->lawyer->address ? $user->lawyer->address : ''}}
                </p>
            </div>

            <div class="profile_1_2_block">
                <div class="">
                    <img src="{{asset('assets/images/general/find_2_1.png')}}" alt="">
                    <p>{{$category ? $category->name : ''}}</p>
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
            <p class="profile_1_2_text">{{$user->lawyer->background}}</p>
            <div class="profile_1_2_soc">

                <!-- Facebook share button  -->
                <div data-href="{{route('lawyers.show', $user->id)}}">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flawyer.loc%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                        <img src="{{asset('assets/images/general/p_facebook.png')}}" alt="Facebook">
                    </a>
                </div>
{{--                @if($user->lawyer->facebook)--}}
{{--                    <a href="{{$user->lawyer->facebook}}">--}}
{{--                        <img src="{{asset('assets/images/general/p_facebook.png')}}" alt="Facebook">--}}
{{--                    </a>--}}
{{--                @endif--}}

                <!-- Twitter share button  -->
                <div>
{{--                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-url="{{route('lawyers.show', $user->id)}}" data-show-count="false">--}}
{{--                        <img src="{{asset('assets/images/general/p_twit.png')}}" alt="Twitter">--}}
{{--                    </a>--}}

{{--                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}

                        <a target="_blank" href="https://twitter.com/intent/tweet?url={{route('lawyers.show', $user->id)}}">
                            <img src="{{asset('assets/images/general/p_twit.png')}}" alt="Twitter">
                        </a>
                </div>

{{--                @if($user->lawyer->twitter)--}}
{{--                    <a href="{{$user->lawyer->twitter}}">--}}
{{--                        <img src="{{asset('assets/images/general/p_twit.png')}}" alt="Twitter">--}}
{{--                    </a>--}}
{{--                @endif--}}


                @if($user->lawyer->instagram)
                    <a href="{{$user->lawyer->instagram}}" target="_blank">
                        <img src="{{asset('assets/images/general/p_insta.png')}}" alt="Instagram">
                    </a>
                @endif

                <!-- Linkedin share button  -->
                <div>
{{--                    <div class="a2a_kit">--}}
{{--                        <a class="a2a_button_linkedin_share" data-url="{{route('lawyers.show', $user->id)}}">--}}
{{--                            <img src="{{asset('assets/images/general/p_link.png')}}" alt="Linkedin">--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <script async src="https://static.addtoany.com/menu/page.js"></script>--}}
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{route('lawyers.show', $user->id)}}">
                        <img src="{{asset('assets/images/general/p_link.png')}}" alt="Linkedin">
                    </a>
                </div>
{{--                @if($user->lawyer->linkedin)--}}
{{--                    <a href="{{$user->lawyer->linkedin}}">--}}
{{--                        <img src="{{asset('assets/images/general/p_link.png')}}" alt="Linkedin">--}}
{{--                    </a>--}}
{{--                @endif--}}

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
{{--        <img src="{{asset('assets/images/general/prof_bg.png')}}" alt="">--}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3156706536!2d-74.26055748786443!3d40.69714774429399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2s!4v1560156911050!5m2!1sen!2s" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

    </section>
    <p class="reviews_for_john" id="reviews-list"><span id="reviews-quantity">{{$reviewsNumber}}</span> reviews for {{$user->full_name}}</p>
    <section class="profile_3" id="reviews-wrapper">
        @if(count($reviews))
        <div id="review-wrapper">
                @foreach($reviews as $review)
                    <div class="profile_3_box">
                        <div class="profile_3_box_top">
                            <div class="profile_3_box_top_stars">

                                @for ($i = 0; $i < $review->grade; $i++)
                                    <img src="{{asset('assets/images/general/star.png')}}" alt="Star">
                                @endfor

                            </div>
                            <p>in {{\Carbon\Carbon::parse($review->created_at)->format('F, Y')}}</p>
                        </div>
                        <p class="profile_3_box_text">{{$review->body}}</p>
                    </div>
                @endforeach

        </div>

        <div id="reviews-pages" data-lawyerid="{{$user->id}}" data-reviews="{{$reviewsNumber}}"></div>

        @else
            <div class="profile_3_box text-center">No reviews.</div>
        @endif
        @guest
            <div class="comment">Login as client to leave a comment</div>
        @endguest

    </section>

    @if(Auth::check() && Auth::user()->role_id == 3)

        <section class="profile_4">
           <form id="review-form">
               {{--action="{{route('reviews.store', $user->id)}}" method="POST"--}}
               {{--@csrf--}}
               <input type="hidden" id="lawyer-id" value="{{$user->id}}">
               <textarea name="body"  placeholder="Leave {{$user->full_name}} a feedback" required></textarea>
               @error('body')
               <span class="input-error">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
               <div class="profile_4_size">
                   <div class="profile_4_size_left">
                       {{--<div class="profile_4_size_left_inputs">--}}
                       {{--<input type="text" name="" value="" placeholder="First Name">--}}
                       {{--<input type="text" name="" value="" placeholder="Last Name">--}}
                       {{--<input type="text" name="" value="" placeholder="Email">--}}
                       {{--</div>--}}
                       <div class="profile_4_size_left_stars">
                           {{--<img src="{{asset('assets/images/general/star.png')}}" alt="">--}}
                           {{--<img src="{{asset('assets/images/general/star.png')}}" alt="">--}}
                           {{--<img src="{{asset('assets/images/general/star.png')}}" alt="">--}}
                           {{--<img src="{{asset('assets/images/general/star.png')}}" alt="">--}}
                           {{--<img src="{{asset('assets/images/general/star.png')}}" alt="">--}}


                           {{--<input type="radio" value="1" name="grade">--}}
                           {{--<input type="radio" value="2" name="grade">--}}
                           {{--<input type="radio" value="3" name="grade">--}}
                           {{--<input type="radio" value="4" name="grade">--}}
                           {{--<input type="radio" value="5" name="grade">--}}

                           <div class="rating">
                               <input type="radio" id="star5" name="grade" value="5" /><label for="star5">5 star</label>
                               <input type="radio" id="star4" name="grade" value="4" /><label for="star4">4 stars</label>
                               <input type="radio" id="star3" name="grade" value="3" /><label for="star3">3 stars</label>
                               <input type="radio" id="star2" name="grade" value="2" /><label for="star2">2 stars</label>
                               <input type="radio" id="star1" name="grade" value="1" /><label for="star1">1 stars</label>
                           </div>

                           @error('grade')
                            <span class="input-error">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                       </div>
                       <button type="submit">Send review</button>
                   </div>
                   <div class="profile_4_size_right">
                       <p>All contact information is private and will be hidden from the public</p>
                   </div>
               </div>
           </form>
       </section>
   @endif

    <p class="Publications">Publications</p>
        <section class="profile_5">
            @if(count($publications))
                @foreach($publications as $publication)
                   <div>
                       <div class="profile_5_box">
                           <a href="{{route('publications.show', $publication->id)}}" target="_blank">
                               <img src="{{asset('assets/images/general/pdf.png')}}" alt="Pdf">
                           </a>
                           <p>{{$publication->title}}</p>
                       </div>
                   </div>
                @endforeach
            @else
                <section>No publication.</section>
            @endif
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
    {{--<div class="container text-center">--}}
        {{--<div class="row">--}}
            {{--<h2>Open in chat (popup-box chat-popup)</h2>--}}
            {{--<h4>Click Here</h4>--}}
            {{--<div class="round hollow text-center">--}}
                {{--<a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Open in chat </a>--}}
            {{--</div>--}}

            {{--<hr>--}}

            {{--MORE :--}}
            {{--<a target="_blank" href="http://bootsnipp.com/snippets/33ejn">Whatsapp Chat Box POPUP</a>,--}}
            {{--<a target="_blank" href="http://bootsnipp.com/snippets/z4P39"> Creative User Profile  </a>--}}

        {{--</div>--}}
    {{--</div>--}}


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

@section('scripts')
    <script src="{{asset('js/jquery.simplePagination.js')}}"></script>

    <script>
        $(function() {
            $('#reviews-pages').pagination({
                items: @json($reviewsNumber),
                itemsOnPage: 4,
                cssStyle: 'light-theme'
            });

        });
    </script>
@endsection