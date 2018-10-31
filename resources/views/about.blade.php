@extends('layout')
@section('title', 'About Us')
@section('content')
{{--  <!-- Banner area -->  --}}
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>About Us</h2>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="#" class="active">About Us</a></li>
    </ol>
</section>
{{--  <!-- End Banner area -->  --}}

{{--  <!-- About Us Area -->  --}}
<section class="about_us_area row">
    <div class="container">
        <div class="tittle wow fadeInUp">
            <h2>ABOUT US</h2>
            <h4>A team of passionate contractors ready to make your dreams come true.</h4>
        </div>
        <div class="row about_row">
            <div class="who_we_area col-md-7 col-sm-6">
                <div class="subtittle">
                    <h2>WHO WE ARE</h2>
                </div>
                <p>
                    PHART GROUP LIMITED is a fully licensed limited company incorporated in Uganda East Africa.
                    Our core business being supplies. We sorce supplies for multi disciplinary companies ranging from:
                    <ul>
                        <li>Electrical and mechanical hardware and software.</li>
                        <li>Security surveillance and tracking.</li>
                        <li>Information systems and IT solutions.</li>
                        <li>Construction supplies and property management.</li>
                        <li>Imports and exports</li>
                        <li>Furniture and stationery</li>
                    </ul>
                </p>
            </div>
            <div class="col-md-5 col-sm-6 about_client">
                <img src="images/about_client.jpg" alt="">
            </div>
        </div>
    </div>
</section>
{{--  <!-- End About Us Area -->  --}}

{{--  <!-- Our Vision -->  --}}
<section class="our_achievments_area" data-stellar-background-ratio="0.3">
    <div class="container">
        <div class="tittle wow fadeInUp">
            <h2>Our Vision</h2>
        </div>
        <div class="achievments_row row">
            <p>
                Become a force for business solutions on the African continent
            </p>
        </div>

        <div class="tittle wow fadeInUp">
            <h2>Our Mission</h2>
        </div>
        <div class="achievments_row row">
            <p>
                Provide professional services for the development of society with integrity.
            </p>
        </div>

        <div class="tittle wow fadeInUp">
            <h2>Our core values</h2>
        </div>
        <div class="achievments_row row">
            <p>
                We derive our capabilities from strategic partnerships with industry leaders across the globe.
                Our vast experience gives us sustainable resources to provide products for all major industries in the region.
            </p>
        </div>
    </div>
</section>
    {{--  <!-- End Our vision -->  --}}


@endsection
