<!Doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{setting('site.description')}}">

        <title>{{setting('site.title')}} | @yield('title', '')</title>

        <!-- favicon -->
        <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!--Theme Styles CSS-->
	    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" media="all" />

        <!-- Animate CSS -->
        <link href="{{asset('vendors/animate/animate.css')}}" rel="stylesheet">

        <!-- Icon CSS-->
        <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}">

        <!-- Camera Slider -->
        <link rel="stylesheet" href="{{asset('vendors/camera-slider/camera.css')}}">

        <!-- Owlcarousel CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('vendors/owl_carousel/owl.carousel.css')}}" media="all">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <link href="{{asset('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

        @yield('css')
    </head>
    <body>
        {{-- Preloader  --}}
        <div class="preloader"></div>

        {{-- Top Header_Area --}}
        <section class="top_header_area">
            <div class="container">
                <ul class="nav navbar-nav top_nav">
                    <li><a href="#"><i class="fa fa-phone"></i>+256 (751) 088880, +256 (776) 088880</a></li>
                    <li><a href="mailto:phartgroup5@gmail.com"><i class="fa fa-envelope-o"></i>phartgroup5@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-clock-o"></i>Mon - Fri 09.00 - 17.00</a></li>
                </ul>
                {{menu('topBar','partials.menus._topBarSocial')}}
            </div>
        </section>
        {{-- End Top Header_Area  --}}

        @include('partials._nav')

        @yield('content')

        @include('partials._cart')

        {{--  <!-- Footer Area -->  --}}
        @include('partials._footer')
        {{--  <!-- End Footer Area -->  --}}

        {{--  Javascript  --}}
        <script src="{{asset('js/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

        @yield('js')

        <!-- Animate JS -->
        <script src="{{asset('vendors/animate/wow.min.js')}}"></script>
        <!-- Camera Slider -->
        <script src="{{asset('vendors/camera-slider/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('vendors/camera-slider/camera.min.js')}}"></script>
        <!-- Isotope JS -->
        <script src="{{asset('vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('vendors/isotope/isotope.pkgd.min.js')}}"></script>
        <!-- Progress JS -->
        <script src="{{asset('vendors/Counter-Up/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('vendors/Counter-Up/waypoints.min.js')}}"></script>
        <!-- Owlcarousel JS -->
        <script src="{{asset('vendors/owl_carousel/owl.carousel.min.js')}}"></script>
        <!-- Stellar JS -->
        <script src="{{asset('vendors/stellar/jquery.stellar.js')}}"></script>
        <script src="{{asset('js/theme.js')}}"></script>
        <script>
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        </script>
        <script>
            (function(){
                const classname = document.querySelectorAll('.quantity')

                Array.from(classname).forEach(function(element) {
                    element.addEventListener('change', function() {
                        const id = element.getAttribute('data-id')
                        axios.patch(`/cart/${id}`, {
                            quantity: this.value
                        })
                        .then(function (response) {
                            //console.log(response);
                            window.location.href = '{{ route('shop.index') }}'
                        })
                        .catch(function (error) {
                            //console.log(error);
                            window.location.href = '{{ route('shop.index') }}'
                        });
                    })
                })
            })();
        </script>
        {{ TawkTo::widgetCode() }}
    </body>
</html>
