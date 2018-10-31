@extends('layout')
@section('title', 'Contact Us')
@section('content')
{{--  <!-- Banner area -->  --}}
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Contact Us</h2>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="#" class="active">Contact Us</a></li>
    </ol>
</section>
{{--  <!-- End Banner area -->  --}}

{{-- Map --}}
<div class="contact_map">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.757112338963!2d32.60032071475319!3d0.3173698997684518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbc7579ef8a19%3A0xecbed4ab4d7a12!2sSixth+St%2C+Kampala!5e0!3m2!1sen!2sug!4v1539779430615" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
{{--  End Map  --}}

{{-- All contact Info  --}}
<section class="all_contact_info">
    <div class="container">
        <div class="row contact_row">
            <div class="col-sm-6 contact_info">
                <h2>Contact Info</h2>
                <div class="location">
                    <div class="location_laft">
                        <a class="f_location" href="#">location</a>
                        <a href="#">phones</a>
                        <a href="#">email</a>
                    </div>
                    <div class="address">
                        <a href="#">Plot 86 Acacia Avenue</a>
                        <a href="#">+256 (751) 088880,</a>
                        <a href="#">+256 (776) 088880</a>
                        <a href="mailto:phartgroup5@gmail.com">phartgroup5@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 contact_info send_message">
                <h2>Send Us a Message</h2>
                <form method="POST" action="{{route('contactMessage')}}" class="form-inline contact_box">
                     {{ csrf_field() }}
                    <input type="text" name="fullnames" class="form-control input_box" placeholder="Full Names *">
                    <input type="text" name="email" class="form-control input_box" placeholder="Your Email *">
                    <textarea name="message" class="form-control input_box" placeholder="Message"></textarea>
                    <button type="submit" class="btn btn-default">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
{{--  <!-- End All contact Info -->  --}}
@endsection
