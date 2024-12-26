@extends('client.master')

@push('js')

<script type="text/javascript">

    // Lấy tất cả nút giảm số lượng
    const minusButtons = document.querySelectorAll('.quantity-btn-minus');
    // Lấy tất cả nút tăng số lượng
    const plusButtons = document.querySelectorAll('.quantity-btn-plus');


    // Hàm xử lý sự kiện tăng số lượng
   
    minusButtons.forEach(button => {
        button.addEventListener('click', function() {
            const input = this.nextElementSibling; // Lấy input kế tiếp sau nút "-"
            let currentValue = parseInt(input.value);
            console.log(currentValue);               // Lấy giá trị hiện tại của input 2 
            if (currentValue > 0) { // Kiểm tra nếu giá trị lớn hơn 0 mới giảm
                input.value = currentValue - 1; // Giảm giá trị đi 1  5 - 1 = 4
            }
        });
    });

    plusButtons.forEach(button=>{
        button.addEventListener('click',function(){
            let plus = this.previousElementSibling; // Lấy input phia truoc sau nút "+"
            let currentValue = parseInt(plus.value); // // giá trị hiện tại của input
            plus.value = currentValue + 1 ; // current(1) + 1 = 2              
        })
    })



    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('input[name="quantity-cart-product"]').change(function(){
            var quantity = $(this).val();
            var productId = $(this).data('productid');
            // alert(quantity + "-" + productId);
            $.ajax({
            type: "POST",
            url:'{{route('client.cartUpdate')}}',
            data:{'id': productId, 'quantity': quantity},
            dataType:"json",
            success: function (response) {
               if(response.status == 200){
                window.location.reload();
               }
            }   
        });
        })


    })
</script>



@endpush

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
}
</style>


@endpush

@section('content')

<div class="container cart_container">
    <h1>Giỏ Hàng</h1>
    <table id="cartTable">
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
            @foreach ($cartCollection as $item)
                
            
            <tr>
                <td><img src="{{(asset('images/'.$item->attributes->image))}}" alt="" height="70px" ></td>
                <td>{{$item -> name}} </td>
                <td>{{number_format($item ->price,0,"",".")}}VND</td>
                <td>
                    <div class="quantity-control">
                        <button class="quantity-btn-minus">-</button>
                        <input type="number" class="quantity-input" min="0" value="{{$item->quantity}}" data-productid="{{$item->id}}" name="quantity-cart-product">
                        <button class="quantity-btn-plus">+</button>
                    </div>
                </td>
                <td>{{number_format($item->price * $item->quantity,0,"",".")}}VND</td>
                <td><a href="{{route('client.cartDelete',['id'=>$item->id])}}" class="remove-btn">Xóa</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="total">Tổng cộng: {{number_format(Cart::getSubTotal(),0,"",".")}}VND</div>
    <div class="empty-space h25-xs h30-md"></div>
    <button> <a href="{{route('client.checkout')}}" class="checkout_payment">Thanh Toan</a> </button>
    <form action="{{route('client.checkoutvnpay_payment')}}" method="POST">
        @csrf
   <button class="checkout_payment" name="redirect"> Thanh Toan VNPAY </button>
    </form>
</div>


@endsection
