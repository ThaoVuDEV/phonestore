<div class="sidebar-menu-wrapper">
    <div class="cart_sidebar">
        <button type="button" class="close_btn"><i class="fal fa-times"></i></button>

        <ul class="cart_items_list ul_li_block mb_30 clearfix">
            @if (empty($cartItems) || (is_array($cartItems) && count($cartItems) === 0))
                <p>Giỏ hàng của bạn đang trống.</p>
            @else
                @foreach ($cartItems as $item)
                    <li>
                        <div class="item_image">
                            <img src="{{ asset('storage/publics/' . basename($item->variant->image)) }}"
                                alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h4 class="item_title">{{ $item->variant->product->name }}</h4>
                            <span class="item_price">${{ number_format($item->price) }}</span>
                            <span class="item_quantity">x{{ $item->quantity }}</span>
                        </div>
                        <button type="button" class="remove_btn"><i class="fal fa-trash-alt"></i></button>
                    </li>
                @endforeach
        
        </ul>

        <ul class="total_price ul_li_block mb_30 clearfix">
            <li>
                <span>Subtotal:</span>
                
            </li>
            <li>
                <span>Vat 5%:</span>
              
            <li>
                <span>Discount 20%:</span>
               
            </li>
            <li>
                <span>Total:</span>
             
            </li>
        </ul>
        
        <ul class="btns_group ul_li_block clearfix">
            <li><a href="{{ route('cart') }}">View Cart</a></li>
        </ul>
        @endif
    </div>

    <div class="overlay"></div>
</div>
