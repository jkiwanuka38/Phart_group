@extends('layout')

@section('css')
    <link href="{{asset('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">
@endsection

@section('content')
{{--  <!-- Banner area -->  --}}
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>{{$product->name}}</h2>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('shop.index')}}">Shop</a></li>
        <li><a class="active">{{$product->name}}</a></li>
    </ol>
</section>
{{--  <!-- End Banner area -->  --}}

<section id="productSection">
    <div class="container">

        <div class="row">

            {{-- <!-- *** LEFT COLUMN *** --> --}}

            <div class="col-md-9">
                <form method="POST" action="{{route('cart.store')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="{{ productImage($product->image) }}" alt="$product->slug" class="img-responsive active" id="currentImage">
                            </div>

                            @if ($product->new == true)
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            @endif
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <div class="sizes">
                                    <h3>Specifications</h3>
                                    <p class="description">{!!$product->specifications!!}</p>
                                    <p class="price">{{$product->presentPrice()}}</p>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <i class="fa fa-shopping-cart"></i> Add to cart
                                    </button>
                                </div>
                            </div>

                            <div class="row" id="thumbs">
                               <div class="col-xs-4 thumb selected">
                                   <img src="{{ productImage($product->image) }}" alt="$product->slug" class="img-responsive">
                               </div>
                               @if ($product->images)
                                    @foreach (json_decode($product->images, true) as $image)
                                        <div class="col-xs-4 thumb">
                                            <img src="{{ productImage($image) }}" alt="$product->slug" class="img-responsive">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                </form>


                <div class="box" id="details">
                    <h4>Product details</h4>
                    <p class="description">
                        <blockquote>
                            <p>
                                <em>
                                    {!!$product->details!!}
                                </em>
                            </p>
                        </blockquote>
                    </p>
                </div>

                @include('partials._mightLike')

            </div>
            {{-- <!-- /.col-md-9 --> --}}


            {{-- <!-- *** LEFT COLUMN END *** --> --}}

            {{-- <!-- *** RIGHT COLUMN *** --> --}}

            <div class="col-sm-3">

                {{-- <!-- *** MENUS AND FILTERS *** --> --}}
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                           @foreach ($categories as $category)
                              <li class="{{ setActiveCategory($category->slug) }}">
                                   <a href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                       {{ $category->name }}
                                       <span class="badge pull-right">{{$category->products()->count()}}</span>
                                   </a>
                              </li>
                           @endforeach
                        </ul>
                    </div>
                </div>

                {{-- <!-- *** MENUS AND FILTERS END *** --> --}}
            </div>
            {{-- <!-- /.col-md-3 --> --}}

            {{-- <!-- *** RIGHT COLUMN END *** --> --}}

        </div>
        {{-- <!-- /.row --> --}}

    </div>
    {{-- <!-- /.container --> --}}

</section>
@endsection

@section('js')
   <script>
        (function(){
            const currentImage = document.querySelector('#currentImage');
            const images = document.querySelectorAll('.thumb');

            images.forEach((element) => element.addEventListener('click', thumbnailClick));

            function thumbnailClick(e) {
                currentImage.classList.remove('active');

                currentImage.addEventListener('transitionend', () => {
                    currentImage.src = this.querySelector('img').src;
                    currentImage.classList.add('active');
                })

                images.forEach((element) => element.classList.remove('selected'));
                this.classList.add('selected');
            }

        })();
    </script>
@endsection
