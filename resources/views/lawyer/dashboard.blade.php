@extends('lawyer.layouts.app')

@section('content')

<div class="nav-btn pull-left">
    <span></span>
    <span></span>
    <span></span>
</div>
@include('partials._messages')
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
<form method="POST" enctype="multipart/form-data"}}" action="{{route('lawyer.update', $lawyer->id)}}">

    @csrf
    @method('PUT')
    {{--<input type="file" name="image">--}}
    <div class="faq-section">
        <input type="checkbox" class="faq-input" id="q1">

        <label for="q1"><img src="{{asset('assets/site/main/img/dbd_1.png')}}" alt="" class="dbd_img">
            Add profile photo
        </label>
        <div class="text_align">
            <label for="file-input" id="upload_file">
                <img src="{{asset('assets/site/main/img/add.png')}}" alt="" class="dash_img_add">
            </label>
                <input type="file" id="file-input" name="image">
        </div>
    </div>
    <div class="faq-section">
        <input type="checkbox" class="faq-input" id="q2">
        <label for="q2">
            <img src="{{asset('assets/site/main/img/dbd_2.png')}}" alt="Person" class="dbd_img">
            Introduce yourself
        </label>
        <div class="text_align">
            <textarea name="background" placeholder="Introduce yourself" class="dash_textarea"></textarea>
        </div>
    </div>

    {{--<div class="faq-section">--}}
        {{--<input type="checkbox" class="faq-input" id="q3">--}}
        {{--<label for="q3"> <img src="{{asset('assets/site/main/img/dbd_3.png')}}" alt="" class="dbd_img">Your Area of Law</label>--}}
        {{--<!-- <div class="dis_block"> -->--}}

        {{--<div class="dash_3_blocks">--}}
            {{--<div class="dash_3_blocks_flex">--}}
                {{--@foreach($categories as $category)--}}
                    {{--<div class="dash_3_blocks_size">--}}
                        {{--<div class="dash_3_blocks_box">--}}
                            {{--<img src="{{asset('assets/site/main/img/db_1.png')}}" alt="Law">--}}
                        {{--</div>--}}
                        {{--<input type="radio" name="category_id" value={{$category->id}}> {{$category->name}}<br>--}}
{{--                        <p>{{$category->name}} <br> Lawyers</p>--}}
                    {{--</div>--}}
                {{--@endforeach--}}

                {{--<div class="dash_3_blocks_size">--}}
                    {{--<div class="dash_3_blocks_box">--}}
                        {{--<img src="{{asset('assets/site/main/img/db_2.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<p>Civil <br> Lawyers</p>--}}
                {{--</div>--}}
                {{--<div class="dash_3_blocks_size">--}}
                    {{--<div class="dash_3_blocks_box">--}}
                        {{--<img src="{{asset('assets/site/main/img/db_3.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<p>Criminal</p>--}}
                {{--</div>--}}
                {{--<div class="dash_3_blocks_size">--}}
                    {{--<div class="dash_3_blocks_box">--}}
                        {{--<img src="{{asset('assets/site/main/img/db_4.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<p>Employment <br> Lawyers</p>--}}
                {{--</div>--}}
                {{--<div class="dash_3_blocks_size">--}}
                    {{--<div class="dash_3_blocks_box">--}}
                        {{--<img src="{{asset('assets/site/main/img/db_5.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<p>Estate <br> Lawyers</p>--}}
                {{--</div>--}}
                {{--<div class="dash_3_blocks_size">--}}
                    {{--<div class="dash_3_blocks_box">--}}
                        {{--<img src="{{asset('assets/site/main/img/db_6.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<p>Family <br> Lawyers</p>--}}
                {{--</div>--}}
                {{--<div class="dash_3_blocks_size">--}}
                    {{--<div class="dash_3_blocks_box">--}}
                        {{--<img src="{{asset('assets/site/main/img/db_7.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<p>Family <br>Lawyers</p>--}}
                {{--</div>--}}
                {{--<div class="dash_3_blocks_size">--}}
                    {{--<div class="dash_3_blocks_box">--}}
                        {{--<img src="{{asset('assets/site/main/img/db_8.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<p> Immigration <br>Lawyers </p>--}}
                {{--</div>--}}



            {{--</div>--}}
        {{--</div>--}}

<div class="faq-section">
    <input type="checkbox" class="faq-input" id="q3">
    <label for="q3"> <img src="{{asset('assets/site/main/img/dbd_3.png')}}" alt="" class="dbd_img">Your Area of Law</label>
    <!-- <div class="dis_block"> -->

    <div class="dash_3_blocks">
        <div class="dash_3_blocks_flex">
            @foreach($categories as $category)
                <div class="dash_3_blocks_size">
                    <label class="dash_3_blocks_box" for="{{$category->id}}">
                        <div>
                            <img src="{{asset('assets/site/main/img/db_1.png')}}" alt="Law">
                        </div></label>
                    <input type="radio" id="{{$category->id}}" name="category_id" value="{{$category->id}}"> {{$category->name}}<br>
                    {{--                        <p>{{$category->name}} <br> Lawyers</p>--}}
                </div>
            @endforeach
            @error('category_id')
                <span class="input-error">
                    <strong>This field is required</strong>
                </span>
            @enderror
        </div>
    </div>
</div>


    {{--</div>--}}
    <div class="dash_btn_bottom">
        <button type="submit">Submit</button>
    </div>
</form>
@endsection
