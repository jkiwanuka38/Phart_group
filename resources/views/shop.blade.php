@extends('layout')
@section('title', 'Our Product Range')
@section('css')
  @endsection

@section('content')
{{--  <!-- Banner area -->  --}}
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Our Product Range</h2>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a class="active">Shop</a></li>
    </ol>
</section>
{{--  <!-- End Banner area -->  --}}

<section id="productSection">
    <div class="container">
        <div class="row">

            {{--  <!-- *** LEFT COLUMN *** -->  --}}

            <div class="col-sm-3">

                {{--  <!-- *** MENUS AND FILTERS *** -->  --}}
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

                {{--  <!-- *** MENUS AND FILTERS END *** -->  --}}

            </div>
            {{--  <!-- /.col-md-3 -->  --}}

            {{--  <!-- *** LEFT COLUMN END *** -->  --}}

             {{-- <!-- *** RIGHT COLUMN *** -->  --}}

            <div class="col-sm-9">

                <div class="row products">
                  <div class="clearfix">
                      <h1 class="pull-left">{{ $categoryName }}</h1>
                      <div class="pull-right">
                          <strong>Price: </strong>
                          <a class="lowHigh" href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
                          <a class="lowHigh" href="{{ route('shop.index', ['category'=> request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                      </div>
                  </div>

                    @forelse ($products as $product)
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="image">
                                    <a href="{{route('shop.show',$product->slug)}}">
                                        <img src="{{ productImage($product->image) }}" alt="$product->slug" class="img-responsive image1">
                                    </a>
                                </div>
                                {{--  <!-- /.image -->  --}}
                                <div class="text">
                                    <h3><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></h3>
                                    <p class="price">{{$product->presentPrice()}}</p>
                                </div>
                                {{--  <!-- /.text -->  --}}

                                @if ($product->new == true)
                                    <div class="ribbon new">
                                        <div class="theribbon">NEW</div>
                                        <div class="ribbon-background"></div>
                                    </div>
                                @endif
                                {{--  <!-- /.ribbon -->  --}}
                            </div>
                            {{--  <!-- /.product -->  --}}
                        </div>
                    @empty
                        <h3 style="padding-top: 20px;">No Items Found</h3>
                    @endforelse
                    {{--  <!-- /.col-md-4 -->  --}}
                </div>
                {{--  <!-- /.products -->  --}}

                <div class="pages">
                    {{ $products->appends(request()->input())->links() }}
                </div>

            </div>
            {{--  <!-- /.col-md-9 -->  --}}

            {{--  <!-- *** RIGHT COLUMN END *** -->  --}}

        </div>

    </div>
    {{--  <!-- /.container -->  --}}
</section>
{{--  <!-- /#content
{{--  <!-- /#content -->  --}}
@endsection
