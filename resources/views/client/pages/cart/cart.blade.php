@extends('client.master')
@push('css')
<style>
    .container{

        max-width: 800px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .container.cart_container{
        margin-top:100px;
    }
    .cart_container h1 {
        font-size:36px;
        text-align: center;
        color: #333;
        margin: 50px 0px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .cart_container table th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
        width: 50px;
        vertical-align: none !important;
    }
    th {
        background-color: #f2f2f2;
    }
    .quantity-control {
        display: flex;
        align-items: center;
    }
    .quantity-btn {
        width: 30px;
        height: 30px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .quantity-btn:hover {
        background-color: #45a049;
    }
    .quantity-input {
        width: 40px;
        height: 30px;
        text-align: center;
        margin: 0 5px;
        border: 1px solid #ddd;
    }
    .remove-btn {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
    }
    .remove-btn:hover {
        background-color: #da190b;
    }
    #addProduct {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        font-size: 16px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 3px;
    }
    #addProduct:hover {
        background-color: #45a049;
    }
    #total {
        text-align: right;
        font-weight: bold;
        font-size: 18px;
        margin-top: 20px;
    }

    .checkout_payment{
        float: right;
        padding: 10px 20px;
        background-color: #45a049;
        color: #f2f2f2;
    }

    </style>


@endpush


@section('content')

<div class="container cart_container">
    <h1>Giỏ Hàng</h1>
    {{-- <table id="cartTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Sản phẩm</th>
                <th>Giá</th>

                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($cart as $item)
                    <td><img src="{{asset('custom_images/' . $item->image_custom)}}" alt="" width="100px"></td>
                    <td>{{$item->cart_total}}</td>
                    <td>{{$item->cart_date}}</td>
                    <td>{{$item->create_at}}</td>
                @endforeach
            </tr>
        </tbody>
    </table> --}}

    <table id="cartTable">


            <thead>
                <tr>
                    <th>Hình Ảnh</th>
                    <th>ID Sản Phẩm</th>
                    <th>Tổng Giá</th>
                    <th>Email Người Nhận</th>
                    <th>Số lượng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>

                    <td><img src="{{ asset('custom_images/' . $item['image_custom']) }}" alt="Product Image" width="200px" height="250px"></td>
                    <td></td>
                    <td>{{$item['cart_total']}}</td>
                    <td>{{$item['recipient_email']}}</td>

                </tr>
                @endforeach
            </tbody>

        {{-- @else
            <td><p>Giỏ hàng của bạn đang trống.</p></td>
        @endif --}}
    </table>
    <div id="total">Tổng cộng: {{number_format($item['cart_total'],0,"",".")}}VND</div>

    <div class="empty-space h25-xs h30-md"></div>
    <button> <a href="{{route('client.checkout')}}" class="checkout_payment">Thanh Toan</a> </button>
    <form action="{{route('client.checkoutvnpay_payment')}}" method="POST">
        @csrf
        <button class="checkout_payment" name="redirect"> Thanh Toan VNPAY </button>
   </form>
</div>


@endsection
