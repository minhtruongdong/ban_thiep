<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.partials.head')
    
</head>
<body>
    <div class="is-mobile"></div>
    <!-- LOADER -->
        <div id="loader-wrapper">
            <div class="loader"></div>
        </div>
    <!--end LOADER -->

     <!-- HEADER -->
        @include('client.partials.header')
    <!-- HEADER -->

    <!-- OVERLAY-MENU MOBILES -->
        @include('client.partials.menu')
    <!-- end OVERLAY-MENU -->

    <!-- content -->
    @yield('content')
    <!-- content -->

    <!-- CART -->
        @include('client.partials.popup')

    
    <!-- footer -->
    @include('client.partials.foot')
    <!-- footer -->
        

    @include('client.partials.footer')

</body>
</html>