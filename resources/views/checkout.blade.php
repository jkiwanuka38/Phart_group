@extends('layout')
@section('title', 'Checkout your order')
@section('css')
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
@endsection

@section('content')
{{--  <!-- Banner area -->  --}}
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Checkout</h2>
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('shop.index')}}">shop</a></li>
        <li><a class="active">Checkout</a></li>
    </ol>
</section>
{{--  <!-- End Banner area -->  --}}

<section id="productSection">
    <div class="container">

        <div class="row">

            <div class="col-md-9 clearfix" id="checkout">

                <div class="box">
                    <form method="POST" action="{{route('checkout.store')}}">
                        {{ csrf_field() }}
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                            </li>
                        </ul>

                        <div class="content">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" name="fname" class="form-control" id="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" name="lname" class="form-control" id="lastname">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" id="city">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" name="phone" class="form-control" id="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="email">
                                    </div>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="{{route('shop.index')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-template-main">Place Order <i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col-md-9 -->

            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order summary</h3>
                    </div>
                    <p class="text-muted">All items are subject to VAT of 18%</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                 <tr>
                                     <td>Order subtotal</td>
                                     <th>{{presentPrice(Cart::subtotal())}}</th>
                                 </tr>
                                 @if (session()->has('coupon'))
                                    <tr>
                                       <td>
                                          Discount({{ session()->get('coupon')['name'] }})
                                          <form action="{{ route('coupon.destroy') }}" method="POST" style="display:block">
                                             {{ csrf_field() }}
                                             {{ method_field('delete') }}
                                             <button type="submit" style="font-size:14px;">Remove</button>
                                         </form>
                                       </td>
                                       <th>{{ presentPrice($discount) }}</th>
                                    </tr>
                                    <tr>
                                       <td>New Subtotal</td>
                                       <th>{{presentPrice($newSubtotal)}}</th>
                                    </tr>
                                 @endif
                                 <tr>
                                     <td>Tax (18%)</td>
                                     <th>{{presentPrice($newTax)}}</th>
                                 </tr>
                                 <tr class="total">
                                     <td>Total</td>
                                     <th>{{presentPrice($newTotal)}}</th>
                                 </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @if (! session()->has('coupon'))
                   <div class="box">
                      <div class="box-header">
                         <h4>Coupon code</h4>
                      </div>
                      <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                      <form action="{{route('coupon.store')}}" method="post">
                         {{ csrf_field() }}
                         <div class="input-group">
                           <input type="text" class="form-control"  name="coupon_code" id="coupon_code">
                           <span class="input-group-btn">
                              <button class="btn btn-template-main" type="submit"><i class="fa fa-gift"></i></button>
             					</span>
                        </div>
                        <!-- /input-group -->
                     </form>
                  </div>
               @endif
            </div>
            <!-- /.col-md-3 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</section>
@endsection
