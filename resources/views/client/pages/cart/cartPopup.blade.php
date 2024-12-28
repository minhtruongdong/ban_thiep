@extends('client.master')

@push('css')
<style>
    .cart_container {
        margin-top: 100px;
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background: white;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .cart_container h1 { text-align: center; margin: 30px 0; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; border: 1px solid #ddd; vertical-align: middle; }
    th { background: #f5f5f5; }
    .quantity-control {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .quantity-btn {
        padding: 5px 10px;
        background: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    .quantity-input {
        width: 50px;
        text-align: center;
        margin: 0 5px;
    }
    .remove-btn {
        background: #f44336;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        border-radius: 3px;
    }
    .checkout-buttons {
        text-align: right;
        margin-top: 20px;
    }
    .checkout-btn {
        display: inline-block;
        padding: 10px 20px;
        background: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 3px;
        margin-left: 10px;
    }
</style>
@endpush

@section('content')
<div class="cart_container">
    <h1>Giỏ Hàng</h1>
    
    @if($cartItems->count() > 0)
        <table id="cartTable">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Email người nhận</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            @if($item->image_custom)
                                <img src="{{ asset('storage/custom_images/' . $item->image_custom) }}" 
                                     width="70" 
                                     alt="{{ $item->name }}">
                            @endif
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->cartDetail ? $item->cartDetail->recipient_email : 'N/A' }}</td>
                        <td>{{ $item->cartDetail ? number_format($item->cartDetail->money, 0, "", ".") : 0 }}đ</td>
                        <td>
                            <div class="quantity-control">
                                <button class="quantity-btn">-</button>
                                <input type="number" class="quantity-input" min="1" 
                                       value="{{ $item->cartDetail ? $item->cartDetail->quantity : 1 }}" 
                                       data-productid="{{ $item->id }}">
                                <button class="quantity-btn">+</button>
                            </div>
                        </td>
                        <td>{{ $item->cartDetail ? number_format($item->cartDetail->money * $item->cartDetail->quantity, 0, "", ".") : 0 }}đ</td>
                        <td>
                            <button class="remove-btn" data-id="{{ $item->id }}">Xóa</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div id="total">
            Tổng cộng: {{ number_format($cartItems->sum(function($item) {
                return $item->cartDetail->money * $item->cartDetail->quantity;
            }), 0, "", ".") }}đ
        </div>
        
        <div class="checkout-buttons">
            <a href="{{ route('client.checkout') }}" class="checkout-btn">Thanh Toán</a>
            <form action="{{ route('client.checkoutvnpay_payment') }}" method="POST" style="display: inline">
                @csrf
                <button class="checkout-btn" name="redirect">VNPAY</button>
            </form>
        </div>
    @else
        <p>Giỏ hàng trống</p>
    @endif
</div>
@endsection

@push('js')
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    // Cập nhật số lượng
    $('.quantity-input').change(function(){
        const quantity = $(this).val();
        const productId = $(this).data('productid');
        
        $.post('{{ route('client.cartUpdate') }}', {
            id: productId, 
            quantity: quantity
        }).done(function(response) {
            if(response.status == 200) {
                updateTotal();
            }
        });
    });

    // Xóa sản phẩm
    $('.remove-btn').click(function(){
        const row = $(this).closest('tr');
        const productId = $(this).data('id');
        
        $.get("{{ route('client.cartDelete', ':id') }}".replace(':id', productId))
            .done(function(response) {
                if(response.status == 200) {
                    row.fadeOut(400, function(){
                        row.remove();
                        updateTotal();
                    });
                }
            });
    });

    // Nút tăng giảm số lượng
    $('.quantity-btn').click(function(){
        const input = $(this).siblings('.quantity-input');
        let value = parseInt(input.val());
        
        if($(this).text() === '-' && value > 1) value--;
        if($(this).text() === '+') value++;
        
        input.val(value).trigger('change');
    });

    // Cập nhật tổng tiền
    function updateTotal() {
        $.get("{{ route('client.getCartTotal') }}")
            .done(function(response) {
                $('#total').text('Tổng cộng: ' + response.total + 'đ');
            });
    }
});
</script>
@endpush
