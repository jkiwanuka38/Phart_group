@extends('layout')

@section('title','Home')

@section('content')
{{-- Slider area  --}}
<section class="slider_area row m0">
    <div class="slider_inner">
        @foreach ($slides as $slide)
           @foreach (json_decode($slide->images, true) as $image)
               <div data-thumb="{{slides($image)}}" data-src="{{slides($image)}}"></div>
            @endforeach
        @endforeach
    </div>
</section>
{{-- End Slider area  --}}

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
                <a href="/about" class="button_all">More About Us</a>
            </div>
            <div class="col-md-5 col-sm-6 about_client">
                <img src="images/about_client.jpg" alt="">
            </div>
        </div>
    </div>
</section>
{{--  <!-- End About Us Area -->  --}}

{{--  <!-- Products Area -->  --}}
<section class="our_services_area">
    <div class="container">
        <div class="tittle wow fadeInUp">
            <a href="{{route('shop.index')}}"><h2>Our Product Range</h2></a>
            <h4>Choose from our wide range of products to make your home even smarter</h4>
        </div>
        <div class="portfolio_inner_area">
            <div class="portfolio_item">
                <div class="grid-sizer"></div>
                @foreach ($products as $product)
                    <div class="single_facilities col-xs-4 p0">
                        <div class="single_facilities_inner">
                            <img src="{{ productImage($product->image) }}" alt="$product->slug">
                            <div class="gallery_hover">
                                <h4>{{$product->name}}</h4>
                                <p>{{$product->specifications}}</p>
                                <p>{{$product->presentPrice()}}</p>
                                <ul>
                                    <li><a href="{{route('shop.show',$product->slug)}}"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            @if ($product->new == true)
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{--  <!-- End Our Services Area -->  --}}

{{--  <!-- Our Partners Area -->  --}}
<section class="our_partners_area">
    <div class="container">
        <div class="tittle wow fadeInUp">
            <h2>Our Partners</h2>
            <h4>To deliver the best we deal with only the best</h4>
        </div>
        <div class="partners">
           @foreach ($categories as $category)
             @if ($category->image)
                <div class="item">
                   <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                      <img src="{{categoryImage($category->image)}}" alt="">
                   </a>
                </div>
             @endif
           @endforeach
        </div>
    </div>
    <div class="book_now_aera">
        <div class="container">
            <div class="row book_now">
                <div class="col-md-10 booking_text">
                    <h2>Get in touch and let us make your dream a reality.</h2>
                </div>
                <div class="col-md-2 p0 book_bottun">
                    <a href="{{route('contact')}}" class="button_all">book now</a>
                </div>
            </div>
        </div>
    </div>
</section>
{{--  <!-- End Our Partners Area -->  --}}
@endsection
