<x-frontend.master>
    <x-slot:title>
        Shoping Cart
        </x-slot>
        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img style="width: 80px;" src="{{ asset('product/' . $cart->product->image) }}" alt="{{ $cart->product->name }}">
                                            <h5>{{ $cart->product->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $cart->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="qty" value="{{ $cart->qty }}" min="1">
                                                </div>
                                                <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" name="qty" class="btn btn-sm btn-success">Update</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ $cart->price * $cart->qty }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <a href="{{ route('cart.destroy',$cart->id) }}"><span class="icon_close"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>tk {{ $subtotal }}</span></li>
                                <li>Total <span>tk {{ $subtotal }}</span></li>
                            </ul>
                            <a href="{{ route('checkout.index') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
</x-frontend.master>