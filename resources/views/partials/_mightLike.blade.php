<div class="row">
    <div class="col-md-3 col-sm-6">
        <div class="box text-uppercase">
            <h3>You may also like these products</h3>
        </div>
    </div>
    @foreach ($mightAlsoLike as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product">
                <div class="image">
                    <a href="{{route('shop.show',$product->slug)}}">
                        <img src="{{ productImage($product->image) }}" alt="$product->slug" class="img-responsive image1">
                    </a>
                </div>
                <div class="text">
                    <h3>{{$product->name}}</h3>
                </div>
            </div>
            <!-- /.product -->
        </div>
    @endforeach
</div>
