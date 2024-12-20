@extends('client.master')
{{-- @section('title',$category->name) --}}

@push('js')
@endpush
@section('content')

    <!-- content -->
    <div id="content">

        <div class="shop">
            <!-- products -->
            <div class="container"> 
                <div class="empty-space h90-xs h100-md"></div>
               <div class="empty-space h0-xs h80-md"></div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
                        <article class="text-center grey-dark">
                            <h1 class="h2"> {{$category->name}}<span></span></h1>
                            <div class="empty-space h30-xs"></div>
                            <p>Curabitur ultricies semper eleifend. Pellentesque molestie purus non something else not tempus bibendum mattis making something</p>
                        </article>
                    </div>
                </div>

                <div class="empty-space h30-xs h65-md"></div>

                <form class="shop-form">
                    <div class="row">
                        <div class="col-sm-12 col-md-5 col-lg-5">
                            <div class="search">
                            <div class="input-wrapper search">
                                <div class="input-style">
                                    <input id="inputSearch" name="name" type="text" class="input" required>
                                    <label for="inputSearch">Search</label>
                                    <div class="input-icon">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <input type="submit" id="searchsubmit" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="found">
                                <p>found <span>127</span> items</p>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 col-lg-7">
                            <div class="inline-wrapper">    
                                <select name="sortby" class="select-box">
                                    <option disabled selected>Sort by</option>
                                    <option value="sort1">Sort1</option>
                                    <option value="sort2">Sort2</option>
                                    <option value="sort3">Sort3</option>
                                    <option value="sort4">Sort4</option>
                                </select>
                                <span class="input-txt-left">Show</span>
                                <select name="show" class="select-box">
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                </select>

                                <div class="view-btn view-btn-1 active"></div>
                                <div class="view-btn view-btn-2"></div>
                            </div>
                        </div>
                    </div>
                </form>



                <div class="row">
                    <div class="col-md-9 col-sm-9 pull-right nopadding">
                        <div class="prod-item-wrapper">

                            @foreach($products as $product)
                            <div class="shop-prod-item">
                                <a href="shopdetail.html" class="img-hover-1">
                                    <img src="{{ asset('images/'.$product->image )}}" alt="" >
                                    <span class="shop-prod-item-hover">
                                        <span class="btn-2 open-popup" data-rel="4"><span>Quick view</span></span>
                                        <span class="btn-2"><span>add to cart</span></span>
                                        <i class="fa fa-heart-o fa-lg" aria-hidden="true"></i>
                                    </span>
                                </a>
                                <div class="description">
                                    <article>
                                        <a href="{{route('client.product.productdetail',['id'=>$product->id])}}"><h6 class="h6 hover-4">{{$product->name}}</h6></a>
                                        <div class="empty-space h5-xs"></div>
                                        <a href="{{route('client.product.category',['id'=>$product->category->id])}}">{{$product-> category -> name}}</a>
                                        <div class="empty-space h5-xs"></div>
                                        <p>{{$product->description}}</p>
                                    </article>
                                </div>
                                <span class="price"> {{number_format($product->price,0,"",'')}} VND</span>
                            </div>

                            @endforeach

                        </div>
                        {!! $products->links('client.partials.paginate')  !!}
                    <div class="col-md-3 col-sm-3">
                        <form class="shop-form-2">

                            <div class="empty-space h55-xs h20-sm"></div>

                            <h6 class="h6">FOR WHO</h6>
                            <div class="empty-space h10-xs"></div>
                            <label class="checkbox-entry">
                                <input type="checkbox" /><span>For women</span>
                            </label>
                            <label class="checkbox-entry">
                                <input type="checkbox" /><span>For men</span>
                            </label>
                            <label class="checkbox-entry">
                                <input type="checkbox" /><span>For kids</span>
                            </label>

                            <div class="empty-space h30-xs h45-md"></div>

                            <h6 class="h6">CATEGORY</h6>
                            <div class="empty-space h10-xs"></div>
                            <label class="checkbox-entry">
                                <input type="checkbox" /><span>All</span>
                            </label>

                            @foreach($category_list as $category)
                            <label class="checkbox">
                                <a href="{{route('client.product.category',['id'=> $category->id])}}">{{ $category->name}}<span> {{count($category->product)}}</span></a> 
                            </label>
                            @endforeach

                            <div class="empty-space h30-xs h45-md"></div>

                            <h6 class="h6">PRICE</h6>
                            <div class="empty-space h30-xs"></div>
                            <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 59.1837%;"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 59.1837%;"></span>
                            </div>
                            <div class="empty-space h20-xs"></div>
                            <p>
                              <label for="amount">price:</label>
                              <input type="text" id="amount" readonly>
                            </p>

                            <div class="empty-space h20-xs h35-md"></div>

                            <h6 class="h6">BRANDS</h6>
                            <div class="empty-space h10-xs"></div>
                            @for($i =1 ; $i <= 7; $i++)
                            <label class="checkbox-entry">
                                <input type="checkbox" /><span>Black&White</span>
                            </label>
                            @endfor

                            <div class="empty-space h50-xs"></div>
                            <div class="btn-wrap"><a href="#" class="btn-2"><span>clear all filters</span></a></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space h55-xs h100-md"></div>
        <div class="empty-space h0-xs h30-md"></div>

    </div>
    <!-- content -->

@endsection
