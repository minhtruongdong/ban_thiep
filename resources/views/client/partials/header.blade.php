<header class="header-style-2">
    <div class="wide-container-fluid">
        <div class="row">
            <div class="col-xs-2">
                <a class="logo" href="{{route('client.index')}}"><img src="{{asset('administrator/img/logo.png')}}" alt="" /></a>
            </div>
            <div class="col-xs-10 text-right">

                <ul class="header-menu">
                    <li class="active"><a href="{{route('client.index')}}"><span>Home</span></a></li>
                    <li><a href="{{route('client.about')}}"><span>About us</span></a></li>

                    @php
                        $categories = \App\Models\Category::where('parent_id',0)->get();
                    @endphp

                    <li>
                        <a href="#"><span>Category</span></a>
                        <span></span>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{route('client.product.category',['id'=> $category->id])}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li><a href="checkout.html"><span>Checkout</span></a></li>
                    <li><a href="{{route('client.contact')}}"><span>Contact us</span></a></li>
                    @if (Auth::check() && Auth::user()->level == 1 )
                    <li><a href="{{route('admin.dash.index')}}"><span>Manager Page</span></a></li>
                    @endif
                </ul>

                <!-- basket -->
                @php
                    $cartCollection = Cart::getContent();

                @endphp
                
                <div class="basket open-popup" data-rel="1">
                    <div class="img-wrapper">
                        <span>{{$cartCollection->count()}}</span>
                    </div>
                    <br>
                    <p>Total: <span>{{number_format(Cart::getSubTotal(),0,"",".")}}VND</span></p>
                </div>
                <!-- login -->
                <div class="login-wrapper">
                        <div class="login" data-rel="2">
                            @if (Auth::check())
                            <a href="{{route('auth.logout')}}">
                                <span>Log Out </span> 
                            </a>   
                            @else
                            <a href="{{route('auth.login')}}">
                                <span>Log In</span>
                            </a>
                            @endif
                        </div>
                </div>

                <div class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                 <div class="hamburger-icon-2">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
