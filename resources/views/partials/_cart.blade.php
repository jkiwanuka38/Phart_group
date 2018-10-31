<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">CART</h4>
            </div>
            <div class="modal-body" id="basket">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th colspan="2">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('shop.show', $item->model->slug) }}">
                                            <img src="{{ productImage($item->model->image) }}" alt="">
                                        </a>
                                    </td>
                                    <td><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                    </td>
                                    <td>
                                        <select class="form-control quantity" data-id="{{ $item->rowId }}">
                                            @for ($i = 1; $i < 10 + 1 ; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>{{ $item->model->presentPrice() }}</td>
                                    <td>{{ presentPrice($item->subtotal) }}</td>
                                    <td>
                                        <form action="{{route('cart.destroy', $item->rowId)}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Total</th>
                                <th colspan="2">{{ presentPrice(Cart::total()) }}</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.table-responsive -->
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <a href="{{route('shop.index')}}" class="btn btn-default">
                        <i class="fa fa-chevron-left"></i>
                        Continue shopping
                    </a>
                </div>
                <div class="pull-right">
                    <a href="{{route('checkout.index')}}" class="btn btn-template-main">
                        Proceed to checkout
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
