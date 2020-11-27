@extends('frontend.layouts.master')
@section('content')
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="color: white!important;">
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng cộng</th>
                                    <th>Xóa sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)

                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="/storage/{{$item->options->image}}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									{{$item->name}}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p style="color: black; font-weight: bold;" class="money">{{$item->price}}</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="{{$item->qty}}" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                        <p style="color: black; font-weight: bold;" class="money">{{$item->price*$item->qty}}</p>
                                    </td>
                                    <td class="remove-pr center">
                                        <a href="{{route('frontend.cart.remove',$item->rowId)}}" style="color: red!important;">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex gr-total">
                <h5 style="font-size: 20px!important;">Tổng Cộng:</h5>
                <div class="ml-auto h5" style="color: red; margin: 0!important;margin-left: 10px!important;">{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</div>
            </div>
            <div class="shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover" style="color:yellow!important;">Checkout</a> </div>


        </div>
    </div>
    <!-- End Cart -->
@endsection

