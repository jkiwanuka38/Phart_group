@extends('layout')

@section('title', 'Search Results')

@section('content')
   {{--  <!-- Banner area -->  --}}
   <section class="banner_area" data-stellar-background-ratio="0.5">
       <h1>Search Results</h1>
       <h4>{{$products->total()}} result(s) for '{{ request()->input('query') }}'</h4>
       <ol class="breadcrumb">
           <li><a href="/">Home</a></li>
           <li><a class="active">Search Results</a></li>
       </ol>
   </section>
   {{--  <!-- End Banner area -->  --}}

   <section id="productSection">
      <div class="container">
         <table class="table table-responsive table-striped">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Product Name</th>
                  <th>Product Specs</th>
                  <th>Product Details</th>
                  <th>Product Price</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($products as $product)
                  <tr>
                     <td>
                        <form method="POST" action="{{route('cart.store')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">

                            <button type="submit" class="btn btn-template-main btn-sm">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <i class="fa fa-shopping-cart"></i> Add to cart
                            </button>
                        </form>
                     </td>
                     <td>
                        <a href="{{ route('shop.show', $product->slug) }}">
                           {{$product->name}}
                        </a>
                     </td>
                     <td>{{$product->specifications}}</td>
                     <td>{{ str_limit($product->details, 80) }}</td>
                     <td>{{ $product->presentPrice() }}</td>
                  </tr>
               @endforeach
            </tbody>
         </table>
         {{ $products->appends(request()->input())->links() }}
      </div>
   </section>
@endsection
