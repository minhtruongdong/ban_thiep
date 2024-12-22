<div class="overlay-wrapper">
    <div class="overlay-animation"></div>
    <div class="flex">
    <div class="flex-in">
    <div class="overlay-menu">
        <div class="container">
            <div class="row">
                <div class="btn-close"><span></span><span></span></div>
                <div class="col-md-2 col-md-offset-5">
                    <!-- login -->
                    <div class="login-wrapper">
                        <div class="login open-popup" data-rel="2">Log in &#47; Sing up</div>
                    </div>
                    <!-- basket -->

                    @php
                    $cartCollection = Cart::getContent();
                    @endphp
                    <div class="basket open-popup" data-rel="1">
                        <div class="img-wrapper">
                            <img src="{{asset('administrator/img/shop/basket-2.png')}}" alt="">
                            <span>{{$cartCollection->count()}}</span>
                        </div>
                        <br>
                        <p>Total: <span>{{number_format(Cart::getSubTotal(),0,"",".")}}VND</span></p>
                    </div>
                    <ul>
                        <li class="active"><a href="{{route('client.index')}}">Home</a></li>
                        <li><a href="{{route('client.about')}}">About us</a></li>



                        @php
                        $categories = \App\Models\Category::where('parent_id',8)->get();
                        @endphp

                        <li class="dropdown-plus">
                            <a href="#">Products</a>
                            <span></span>
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{route('client.product.category',['id'=> $category->id])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="{{route('client.contact')}}">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
