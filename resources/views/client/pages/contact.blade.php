@extends('client.master')
@section('content')

    <!-- content -->
    <div id="content">

        <div class="baner-bg">
            <div id="map-canvas" class="map-item" data-lat="40.712332" data-lng="-74.009596" data-zoom="10" data-style="style-1" data-marker="img/marker.png"></div> 
            <div class="addresses-block">
                <a data-lat="40.712332" data-lng="-74.009596" data-string="1. Here is some address or email or phone or something else..."></a>
            </div>  
        </div>

        <section class="section">  
            <div class="empty-space h30-xs h100-md"></div>
            <div class="empty-space h30-xs"></div> 
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                         <h2 class="h2">Contact us<span></span></h2>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                        <div class="text-center grey-dark">
                            <div class="empty-space h25-xs"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras elementum id metus ac tempus. Praesent ut mauris eget velit volutpat posuere</p>
                        </div>
                    </div>
                </div>
                <div class="empty-space h35-xs h50-md"></div>
                <div class="row">
                   <div class="col-md-3 col-sm-6 col-xs-12">
                       <div class="contact-item">
                           <h4 class="h5">Address</h4>
                           <div class="empty-space h25-xs"></div>
                           <div class="simple-text">
                               <p>New York, 345</p>
                               <p>Park Ave NY 10154, USA</p>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3 col-sm-6 col-xs-12">
                       <div class="contact-item">
                           <h4 class="h5">Phone</h4>
                           <div class="empty-space h25-xs"></div>
                           <div class="simple-text">
                               <a href="tel:+380 00 876 35 44">+380 00 876 35 44</a>
                               <a href="tel:+380 00 876 66 55">+380 00 876 66 55</a>
                           </div>
                       </div>
                   </div>
                   <div class="clearfix visible-sm"></div>
                   <div class="col-md-3 col-sm-6 col-xs-12">
                       <div class="contact-item">
                           <h4 class="h5">Email</h4>
                           <div class="empty-space h25-xs"></div>
                           <div class="simple-text">
                               <a href="mailto:myfrilanceremail@email.com">myfrilanceremail@email.com</a>
                               <a href="mailto:mysecondemail@email.com">mysecondemail@email.com</a>
                           </div>
                       </div>
                   </div>
                   
                   <div class="col-md-3 col-sm-6 col-xs-12">
                       <div class="contact-item">
                           <h4 class="h5">Follow us</h4>
                           <div class="empty-space h25-xs"></div>
                            <div class="follow">
                                <a class="item" href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a class="item" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a class="item" href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                                <a class="item" href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a class="item" href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
                            </div> 
                       </div>
                   </div>
                </div>
                <div class="empty-space h20-xs h20-md"></div>
                <div class="row">
                   <div class="col-md-10 col-md-offset-1">
                      <div class="testimonial-form-wrapper">
                        <h4 class="h4 text-center">Have a question?</h4>
                        <div class="empty-space h30-xs"></div>
                        <form class="shop">
                            <div class="input-wrapper">
                                <div class="input-style">
                                    <input id="inputName" name="name" type="text" class="input" required>
                                    <label for="inputName">Name</label>
                                </div>
                                <div class="input-style">
                                    <input id="inputEmail" name="email" type="text" class="input" required>
                                    <label for="inputEmail">E-mail</label>
                                </div>
                                <div class="input-style full-w">
                                    <input id="inputSubject" name="subject" type="name" class="input">
                                    <label for="inputSubject">Subject</label>
                                </div>
                                <div class="input-style textarea">
                                    <textarea id="inputMessage" name="message" class="input" required=""></textarea>
                                    <label for="inputMessage">Review</label>
                                </div>
                                <div class="center-wrap"><div class="btn-2"><input type="submit" value=""><span>Send message</span></div></div>
                            </div>
                        </form>
                      </div> 
                   </div> 
                </div>
                
            </div>
            <div class="empty-space h30-xs h70-md"></div>
            <div class="empty-space h30-xs"></div> 
        </section>

    </div>
    <!-- content -->

@endsection