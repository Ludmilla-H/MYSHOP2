@extends('layouts.myshop')
@section('main')

<div role="main" class="main shop pb-4">

    <div class="container">

        <div class="row">
            <div class="col">
                <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                    <li class="text-transform-none me-2">
                        <a href="shop-cart.html" class="text-decoration-none text-color-primary">Shopping Cart</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="row pb-4 mb-5">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <form method="post" action="}">
                    <div class="table-responsive">
                        <table class="shop_table cart">
                            <thead>
                                <tr class="text-color-dark">
                                    <th class="product-thumbnail" width="15%">
                                        &nbsp;
                                    </th>
                                    <th class="product-name text-uppercase" width="30%">
                                        Product
                                    </th>
                                    <th class="product-price text-uppercase" width="15%">
                                        Product ID
                                    </th>
                                    <th class="product-quantity text-uppercase" width="20%">
                                        Quantity
                                    </th>
                                    <th class="product-subtotal text-uppercase text-end" width="20%">
                                        Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cart as $carts)


                                <tr class="cart_table_item">
                                    <td class="product-thumbnail">
                                        <div class="product-thumbnail-wrapper">
                                            <a href="{{route('delete' , $carts->id)}}" class="product-thumbnail-remove" title="Remove Product">
                                                <i class="fas fa-times"></i>
                                            </a>
                                            <a href="shop-product-sidebar-right.html" class="product-thumbnail-image" title="Photo Camera">
                                                <img width="90" height="90" alt="" class="img-fluid" src="{{Storage::url($carts->produit->image)}}">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a href="shop-product-sidebar-right.html" class="font-weight-semi-bold text-color-dark text-color-hover-primary text-decoration-none">{{$carts->produit->name}}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount font-weight-medium text-color-grey">{{$carts->price}}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity float-none m-0">
                                            <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                            <input type="text" class="input-text qty text" title="Qty" id="{{$carts->produit_id}}" value="{{$carts->quantite}}" name="quantity" min="1" step="1">
                                            <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" data-id="{{$carts->produit_id}}" value="+">
                                        </div>
                                    </td>
                                    <td class="product-subtotal text-end">
                                        <span class="amount text-color-dark font-weight-bold text-4">{{$carts->quantite * $carts->price}}€</span>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 position-relative">
                <div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
                    <div class="card-body">
                        <h4 class="font-weight-bold text-uppercase text-4 mb-3">Cart Totals</h4>
                        <table class="shop_table cart-totals mb-4">
                            <tbody>
                                
                                <tr class="shipping">
                                    <td colspan="2">
                                        <strong class="d-block text-color-dark mb-2">Shipping</strong>

                                        <div class="d-flex flex-column">
                                            <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method1">
                                                <input id="shipping_method1" type="radio" class="me-2" name="shipping_method" value="free" checked />
                                                Free Shipping
                                            </label>
                                            <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method2">
                                                <input id="shipping_method2" type="radio" class="me-2" name="shipping_method" value="local-pickup" />
                                                Local Pickup
                                            </label>
                                            <label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method3">
                                                <input id="shipping_method3" type="radio" class="me-2" name="shipping_method" value="flat-rate" />
                                                Flat Rate: $5.00
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="total">
                                    <td>
                                        <strong class="text-color-dark text-3-5">Total</strong>
                                    </td>
                                    <td class="text-end">
                                        <strong class="text-color-dark"><span class="amount text-color-dark text-5">{{$somme}}€</span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{route('checkout')}}" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">Proceed to Checkout <i class="fas fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4 class="font-weight-semibold text-4 mb-3">PEOPLE ALSO BOUGHT</h4>
                <hr class="mt-0">
    
            </div>
        </div>
    </div>

</div>

@endsection
