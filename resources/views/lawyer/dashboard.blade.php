@extends('lawyer.layouts.app')

@section('content')

<div class="nav-btn pull-left">
    <span></span>
    <span></span>
    <span></span>
</div>
<!-- <div class="dashboard_content">


    <h3 class="dashboard_subtitle">Thank you for registering</h3>
    <div class="container-fluid">
      <div class="dashboard_box">
            <label>Account Information</label>
          <div class="d-box__bg">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-box">
                       <div class="d-box_title">
                            <h2>Contact Information</h2>
                           <a href=""><img src="images/edit.png"></a>
                           <a href=""><img src="images/shuffle.png"></a>
                       </div>
                        <p>Lorem Ipsum</p>
                        <p>Lorem.Ipsum@gmail.com</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="d-box">
                        <div class="d-box_title">
                            <h2>Newsletters</h2>
                            <a href=""><img src="images/edit.png"></a>
                        </div>
                        <p>You aren’t subscribed to our newsletter</p>
                    </div>
                </div>
            </div>
          </div>
      </div>

    <div class="dashboard_box">
            <label>Address Book</label>
        <div class="d-box__bg">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-box">
                        <div class="d-box_title">
                            <h2>default billing address</h2>
                            <a href=""><img src="images/edit.png"></a>
                        </div>
                        <p>You aren’t subscribed to our newsletter</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</div> -->
<div class="clear"></div>
<div class="faq-section">
    <input type="checkbox" class="faq-input" id="q1">
    <label for="q1"><img src="{{asset('assets/site/main/img/dbd_1.png')}}" alt="" class="dbd_img"> Add profile photo</label>
    <div class="text_align">
        <img src="{{asset('assets/site/main/img/add.png')}}" alt="" class="dash_img_add">
    </div>
</div>
<div class="faq-section">
    <input type="checkbox" class="faq-input" id="q2">
    <label for="q2"><img src="{{asset('assets/site/main/img/dbd_2.png')}}" alt="" class="dbd_img">Introduce yourself </label>
    <div class="text_align">
        <textarea name="name" placeholder="Introduce yourself" class="dash_textarea"></textarea>
    </div>
</div>

<div class="faq-section">
    <input type="checkbox" class="faq-input" id="q3">
    <label for="q3"> <img src="{{asset('assets/site/main/img/dbd_3.png')}}" alt="" class="dbd_img"> Add your lorem</label>
    <!-- <div class="dis_block"> -->

    <div class="dash_3_blocks">
        <div class="dash_3_blocks_flex">
            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_1.png')}}" alt="">
                </div>
                <p>Business <br> Lawyers</p>
            </div>

            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_2.png')}}" alt="">
                </div>
                <p>Civil <br> Lawyers</p>
            </div>
            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_3.png')}}" alt="">
                </div>
                <p>Criminal</p>
            </div>
            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_4.png')}}" alt="">
                </div>
                <p>Employment <br> Lawyers</p>
            </div>
            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_5.png')}}" alt="">
                </div>
                <p>Estate <br> Lawyers</p>
            </div>
            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_6.png')}}" alt="">
                </div>
                <p>Family <br> Lawyers</p>
            </div>
            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_7.png')}}" alt="">
                </div>
                <p>Family <br>Lawyers</p>
            </div>
            <div class="dash_3_blocks_size">
                <div class="dash_3_blocks_box">
                    <img src="{{asset('assets/site/main/img/db_8.png')}}" alt="">
                </div>
                <p> Immigration <br>Lawyers </p>
            </div>



        </div>
    </div>

</div>
<div class="dash_btn_bottom">
    <button type="button" name="button">User Name</button>
</div>
@endsection
