@extends('client.master')
@section('title',$products->name)
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
                        <h1 class="h2">{{$products->name}}<span></span></h1>
                        <div class="empty-space h30-xs"></div>

                    </article>
                </div>
            </div>

            <div class="empty-space h30-xs h60-md"></div>

            <div class="row">
                <div class="col-md-10 col-sm-10 pull-right">
                    <div class="detail-item">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-main" src="{{asset('images/'.$products->image)}}" alt="" height="500px">
                                <div class="img-preview">
                                    @foreach($products->product_image as $pi)
                                    <img class="img-detail-preview" src="{{asset('images/'. $pi->image)}}"
                                        data-image="{{asset('images/'. $pi->image)}}" alt="">
                                    @endforeach
                                </div>
                                <div class="clear"></div>
                            </div>

                            <script>
                            const mainImage = document.querySelector(".img-main");
                            const thumbnails = document.querySelectorAll(".img-detail-preview");

                            // Hàm để thay đổi hình ảnh chính
                            function changeMainImage(thumbnail) {
                                const newImageSrc = thumbnail.getAttribute("data-image");
                                const oldImageSrc = mainImage.src;
                                const popupImage = document.getElementById('popupImage');
                                // Cập nhật hình ảnh chính
                                mainImage.src = newImageSrc;
                                // Cập nhật ảnh trong pop-up
                                popupImage.src = mainImage.src;
                                // Cập nhật ảnh nhỏ hiện tại
                                thumbnail.src = oldImageSrc; // Thay thế ảnh nhỏ hiện tại bằng ảnh lớn cũ

                                // Cập nhật lại thuộc tính data-image cho ảnh nhỏ
                                thumbnail.setAttribute("data-image", oldImageSrc);
                            }

                            // Thêm sự kiện click cho các hình ảnh thu nhỏ ban đầu
                            thumbnails.forEach(thumbnail => {
                                thumbnail.addEventListener("click", () => changeMainImage(thumbnail));
                            });
                            </script>
                            <div class="col-md-6">
                                <article class="description">
                                    <h3 class="h3">{{ $products->name}}</h3>
                                    <div class="product-detail-choose">
                                        <ul>
                                            <li>
                                                <span>price:</span>
                                                <span
                                                    class="price">{{(number_format($products->price,0,"","."))}}VND</span>
                                            </li>
                                            <li>
                                                <span>Reviews:</span>
                                                <span class="info">26</span>
                                                <span class="star"><i class="fa fa-star" aria-hidden="true"></i><i
                                                        class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star-o"
                                                        aria-hidden="true"></i></span>
                                            </li>
                                            <li>
                                                <span>Available:</span>
                                                <span class="info">yes</span>
                                            </li>
                                            <li>
                                                <span>color:</span>
                                                <span class="color">
                                                    <span class="active"
                                                        style="background-color: #28252c; outline-color: #28252c;"></span>
                                                    <span
                                                        style="background-color: #d2cbc6; outline-color: #d2cbc6;"></span>
                                                    <span
                                                        style="background-color: #4e77ab; outline-color: #4e77ab;"></span>
                                                    <span
                                                        style="background-color: #c48d8d; outline-color: #c48d8d;"></span>
                                                </span>
                                            </li>
                                            <li>
                                                <a class="btn-2 btn-custom-product" id="customProductBtn"><span>Custom
                                                        Product</span></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Form tùy chỉnh sản phẩm -->
                                    <div id="customProductForm"
                                        style="display: none; margin-top: 20px; border: 1px solid #ccc; padding: 20px; border-radius: 8px;">
                                        <h4>Customize Your Product</h4>
                                        <form>
                                            @csrf
                                            <!-- Hiển thị sản phẩm -->
                                            <div id="productDisplay" style="position: relative; margin-top: 20px;">
                                                <img id="popupImage" alt="Product Image"
                                                    style="width: 100%; height: auto;">
                                                <div id="customTextDisplay"
                                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; font-weight: bold; color: #fff; text-align: center; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);">
                                                    <p class="recipient-name" style="margin: 0;"></p>
                                                    <p class="custom-message" style="margin: 0;"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipientName">Tên người nhận:</label>
                                                <input type="text" id="recipientName" name="recipient_name"
                                                    class="form-control" placeholder="Nhập tên người nhận">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipientEmail">Email người nhận:</label>
                                                <input type="text" id="recipientEmail" name="recipient_email"
                                                    class="form-control" placeholder="Nhập email người nhận">
                                            </div>
                                            <div class="form-group">
                                                <label for="customMessage">Lời chúc:</label>
                                                <textarea id="customMessage" name="custom_message" class="form-control"
                                                    rows="4" placeholder="Nhập lời chúc"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipientPrice"><span>Trị Giá :</span></label>
                                                <select class="form-control" name="recipientPrice" id="recipientPrice">
                                                    <option value="100000">100.000</option>
                                                    <option value="200000">200.000</option>
                                                    <option value="300000">300.000</option>
                                                    <option value="400000">400.000</option>
                                                    <option value="500000">500.000</option>
                                                </select>
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="button" id="generateImage" class="btn btn-success"
                                                    data-product-id="{{ $products->id }}"
                                                    {{-- data-cart-id = {{$cart_id->id}} --}}
                                                    data-save-url="{{ route('client.product.uploadImage', ['id' => $products->id])}}"
                                                    data-csrf="{{ csrf_token() }}">
                                                    Xác nhận
                                                </button>
                                                <button type="button" id="cancelCustomForm"
                                                    class="btn btn-secondary">Hủy</button>
                                            </div>
                                        </form>

                                    </div>


                                    <p>{{$products->description}}</p>
                                </article>

                                <div class="quantity-wrapper">
                                    <span>quantity:</span>
                                    <div class="quantity">
                                        <input type="number" id="product-quantity" value="1" min="1">
                                        <i class="fa fa-caret-left" aria-hidden="true"></i>
                                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                </div>


                                <div class="btn-wrap">
                                    <a href="#" class="btn-2" id="add-to-cart-btn"><span>add to cart</span></a>
                                </div>



                                <div class="btn-wrap"><a href="#" class="btn-1 border"><span>add to
                                            favourites</span></a></div>
                                <div class="follow-category">
                                    <span>Category:</span>
                                    <a href="{{route('client.product.category',['id'=>$products->category->id])}}"
                                        class="category">
                                        {{$products->category->name}}
                                    </a>
                                </div>
                                <div class="follow-tag">
                                    <span>Tag:</span>
                                    <div class="tag">
                                        <span>Relax</span>
                                        <span>Revolution</span>
                                    </div>
                                </div>
                                <div class="follow-wrapper">
                                    <span>share:</span>
                                    <div class="follow">
                                        <a class="item" href="https://www.instagram.com/" target="_blank"><i
                                                class="fa fa-instagram"></i></a>
                                        <a class="item" href="https://www.facebook.com/" target="_blank"><i
                                                class="fa fa-facebook"></i></a>
                                        <a class="item" href="https://www.pinterest.com/" target="_blank"><i
                                                class="fa fa-pinterest-p"></i></a>
                                        <a class="item" href="https://twitter.com/" target="_blank"><i
                                                class="fa fa-twitter"></i></a>
                                        <a class="item" href="https://plus.google.com/" target="_blank"><i
                                                class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space h60-xs"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tabs-block">
                                <div class="tab-menu active">description</div>
                                <div class="tab-menu">Testimonials</div>
                                <div class="tab-entry" style="display: block;">
                                    <div class="article">
                                        <p>{!!$products->content ?? 'Lorem Ipsum Icarus'!!}</p>

                                    </div>
                                </div>
                                <div class="tab-entry">
                                    <div class="testimonial">
                                        <img src="{{asset('administrator/img/shop/testimonial-1.jpg')}}" alt="">
                                        <div class="article">
                                            <div class="author">
                                                <span class="h6">GIGI HADID</span>
                                                <span>12&#47;09&#47;2016</span>
                                                <span class="star"><i class="fa fa-star" aria-hidden="true"></i><i
                                                        class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <p>Ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                in voluptate velit esse</p>
                                        </div>
                                    </div>
                                    <div class="testimonial">
                                        <img src="{{asset('administrator/img/shop/testimonial-2.jpg')}}" alt="">
                                        <div class="article">
                                            <div class="author">
                                                <span class="h6">JACK KUDROW</span>
                                                <span>12&#47;09&#47;2016</span>
                                                <span class="star"><i class="fa fa-star" aria-hidden="true"></i><i
                                                        class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <p>Ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                                in voluptate velit esse</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-form-wrapper">
                                        <div class="empty-space h20-xs"></div>
                                        <h4 class="h4 text-center">Add your review</h4>
                                        <div class="empty-space h30-xs"></div>
                                        <form>
                                            <div class="input-wrapper">
                                                <div class="input-style">
                                                    <input id="inputName" name="name" type="text" class="input"
                                                        required>
                                                    <label for="inputName">Name</label>
                                                </div>
                                                <div class="input-style">
                                                    <input id="inputEmail" name="email" type="text" class="input"
                                                        required>
                                                    <label for="inputEmail">E-mail</label>
                                                </div>
                                                <div class="input-style textarea">
                                                    <textarea id="inputMessage" name="message" class="input"
                                                        required></textarea>
                                                    <label for="inputMessage">Review</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="y-rating">
                                                <span>YOUR RATING:</span>
                                                <span class="star"><i class="fa fa-star" aria-hidden="true"></i><i
                                                        class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star"
                                                        aria-hidden="true"></i><i class="fa fa-star-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <div class="btn-wrap"><a href="#" class="btn-2"><span>Add your
                                                        review</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space h50-xs h100-md"></div>
                    <div class="empty-space h0-xs h10-md"></div>
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <h2 class="h2">You may also like<span></span></h2>
                            <div class="empty-space h30-xs"></div>
                        </div>
                        @foreach($products_related as $item)
                        <div class="col-md-3 col-sm-6">
                            <a href="{{route('client.product.productdetail',['id'=>$item->id])}}"
                                class="img-hover-2"><img src="{{asset('images/'.$item->image)}}" alt="" class="img"></a>
                            <article>
                                <div class="empty-space h10-xs"></div>
                                <a href="{{route('client.product.productdetail',['id'=>$item->id])}}">
                                    <h6 class="h8 hover-4">{{$item->name}}</h6>
                                </a>
                                <div class="empty-space h5-xs"></div>
                                <span class="price price-sm">{{ number_format($item->price,0,"",".") }}VND</span>
                                <div class="empty-space h30-xs h0-sm"></div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>



                <div class="col-md-2 col-sm-2">
                    <div class="shop-form-2">

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
                        </div>

                        <div class="empty-space h35-xs"></div>

                        {{-- <h6 class="h6">FOR WHO</h6>
                    <div class="empty-space h10-xs"></div>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>For women</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>For men</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>For kids</span>
                    </label> --}}

                        <div class="empty-space h30-xs h45-md"></div>

                        <h6 class="h6">CATEGORY</h6>
                        <div class="empty-space h10-xs"></div>

                        @foreach($category_list as $category)
                        <label class="checkbox">
                            <a href="{{route('client.product.category',['id'=> $category->id])}}">{{ $category->name}}<span>
                                    {{count($category->product)}}</span></a>
                        </label>
                        @endforeach

                        <div class="empty-space h30-xs h45-md"></div>

                        <h6 class="h6">PRICE</h6>
                        <div class="empty-space h30-xs"></div>
                        <div id="slider-range"
                            class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                            <div class="ui-slider-range ui-corner-all ui-widget-header"
                                style="left: 0%; width: 59.1837%;">
                            </div>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                style="left: 0%;"></span>
                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                style="left: 59.1837%;"></span>
                        </div>
                        <div class="empty-space h20-xs"></div>
                        <p>
                            <label for="amount">price:</label>
                            <input type="text" id="amount" readonly>
                        </p>

                        <div class="empty-space h20-xs h35-md"></div>

                        {{-- <h6 class="h6">BRANDS</h6>
                    <div class="empty-space h10-xs"></div>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>Black&White</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>Zebrano</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>Delux</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>Restoration Hardware</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>Roche Bobois</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>Edra</span>
                    </label>
                    <label class="checkbox-entry">
                        <input type="checkbox" /><span>Poliform</span>
                    </label> --}}

                        <div class="empty-space h50-xs"></div>
                        <div class="btn-wrap"><a href="#" class="btn-2"><span>clear all filters</span></a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="empty-space h65-xs h100-md"></div>
    <div class="empty-space h0-xs h30-md"></div>


</div>
<!-- content -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('product-quantity');
    const addToCartBtn = document.getElementById('add-to-cart-btn');

    // Xử lý nút tăng/giảm số lượng
    document.querySelector('.fa-caret-right').addEventListener('click', function() {
        quantityInput.value = parseInt(quantityInput.value) + 1;
        updateAddToCartUrl();
    });

    document.querySelector('.fa-caret-left').addEventListener('click', function() {
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            updateAddToCartUrl();
        }
    });

    // Cập nhật href của nút "add to cart" khi số lượng thay đổi
    function updateAddToCartUrl() {
        const quantity = quantityInput.value;
        // Sử dụng route với cả id và quantity
        const url = "{{ route('client.addToCart', ['id' => $products->id, 'quantity' => ':quantity']) }}"
            .replace(':quantity', quantity);
        addToCartBtn.href = url;
    }

    // Cập nhật URL khi số lượng thay đổi
    quantityInput.addEventListener('change', updateAddToCartUrl);
    quantityInput.addEventListener('input', updateAddToCartUrl);

    // Khởi tạo URL ban đầu
    updateAddToCartUrl();
});
</script>
@endsection