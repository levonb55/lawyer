@extends('site.layouts.app')

@section('content')
    <section class="profile_1">
        <div class="profile_1_1">
            <img src="{{asset('assets/site/main/')}}img/find_2_face.png" alt="" class="find_2_face">
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
            <p class="profile_1_2_name">John Doe</p>
            <p class="profile_1_2_fname">Lawyer Firm Name</p>
            <div class="loc_and_text">
                <img src="{{asset('assets/site/main/')}}img/loc.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>
            </div>
            <div class="profile_1_2_block">
                <div class="">
                    <img src="{{asset('assets/site/main/img/find_2_1.png')}}" alt="">
                    <p> Civil</p>
                </div>
                <div class="">
                    <img src="{{asset('assets/site/main/img/find_2_2.png')}}" alt="">
                    <p>Immigration</p>
                </div>
                <div class="">
                    <img src="{{asset('assets/site/main/')}}img/find_2_3.png" alt="">
                    <p>Criminal</p>
                </div>
            </div>
            <p class="profile_1_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis mi
                eget erat dignissim tempor. Proin maximus blandit consequat. Nullam in lectus sed sem </p>
            <div class="profile_1_2_soc">
                <img src="{{asset('assets/site/main/img/p_facebook.png')}}" alt="">
                <img src="{{asset('assets/site/main/img/p_twit.png')}}" alt="">
                <img src="{{asset('assets/site/main/img/p_insta.png')}}" alt="">
                <img src="{{asset('assets/site/main/img/p_link.png')}}" alt="">
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

    <div id="chat" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <p>Name</p>
                    <p>Surname</p>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="text_right">lorem ipsum</p>
                    <p class="text_left">lorem ipsum</p>
                    <p class="text_right">lorem ipsum</p>
                    <p class="text_left">lorem ipsum</p>
                    <div class="call_smile">
                        <p><i class="far fa-images"></i></p>
                        <p><i class="far fa-smile"></i></p>
                        <p><i class="fas fa-video"></i></p>
                    </div>
                    <input type="text" name="" value="">
                    <button type="button" name="button">send</button>
                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>
@endsection
