@extends('client.master')
@section('content')

    <!-- content -->
    <div id="content">

        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="empty-space h90-xs h100-md"></div>
                    <div class="empty-space h0-xs h80-md"></div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                            <article class="text-center grey-dark">
                                <h1 class="h2">Checkout<span></span></h1>
                                <div class="empty-space h30-xs"></div>
                                <p>Curabitur ultricies semper eleifend. Pellentesque molestie purus non something else not tempus bibendum mattis making something</p>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="empty-space h25-xs h55-md"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tabs-block">
                            <div class="tab-menu active">Delivery Information</div>

                            <div class="empty-space 15-xs h35-md"></div>
                            <div class="tab-entry" style="display: block;">
                                <form>
                                    <h4 class="h4">Shipping info</h4>
                                    <div class="empty-space h25-xs h30-md"></div>
                                    <div class="input-wrapper">
                                        <div class="input-style half">
                                            <input id="inputFirstName" name="fullname" type="text" class="input" >
                                            <label for="inputFirstName">FullName</label>
                                        </div>

                                        <div class="input-style half">
                                            <input id="inputEmail" name="email" type="text" class="input" >
                                            <label for="inputEmail">E-mail</label>
                                        </div>
                                        <div class="input-style half center">
                                            <input id="inputPhoneNumber" name="phonenumber" type="text" class="input" required>
                                            <label for="inputPhoneNumber">Phone Number</label>
                                        </div>
                                        <div class="input-style">
                                            <input id="inputAddress" name="address" type="text" class="input" required>
                                            <label for="inputAddress">Address</label>
                                        </div>

                                    </div>
                                    <div class="empty-space h15-xs h30-md"></div>
                                    <h4 class="h4">Shipping Method</h4>
                                    <div class="empty-space h15-xs h15-md"></div>
                                    <div class="radio-item">
                                        <label class="radio">
                                            <input type="radio" name="1" checked/><span class="text">Standart<span>( Free )</span></span>
                                        </label>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tem por incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <div class="radio-item right">
                                        <label class="radio">
                                            <input type="radio" name="1"/><span class="text">Product Dolor<span>( 20&#36; )</span></span>
                                        </label>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tem por incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <div class="empty-space h5-xs h35-md fl"></div>
                                    <div class="text-center btn-inline">
                                        <div class="btn-wrap"><a href="#" class="btn-1 border"><span>back to cart</span></a></div>
                                        <div class="btn-wrap"><a href="#" class="btn-2"><span>pay <span class="price">&#36;690<sup>00</sup></span></span></a></div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>    <!-- shop -->

        <div class="empty-space h65-xs h100-md"></div>
        <div class="empty-space h0-xs h30-md"></div>

        <!-- footer -->

        <!-- footer -->

    </div>
    <!-- content -->

@endsection