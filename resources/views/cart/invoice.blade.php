<div class="col-md-6">
    <div action="#" class="checkout-form">
        <div class="place-order">
            <h4>Your Order</h4>
            <div class="order-total">
            <div style="position: relative">
                <h3 style="display:inline;position: absolute; left:0"">Product</h3> &nbsp;
                 <p style="display:inline;position: absolute; right:20%">Price</p>
                </div>
                @foreach( $data['cart']->items as $product)
                <div style="position: relative">
                <h3 style="display:inline;position: absolute; left:0"">{{ $product['title'] }}</h3> &nbsp;
                 <p style="display:inline;position: absolute; right:20%">{{ $product['price']}}</p>
                </div>
                @endforeach

                <div style="position: relative">
                <h3 style="display:inline;position: absolute; left:0"">Total</h3> &nbsp;
                 <p style="display:inline;position: absolute; right:20%">{{ $data['amount']}} L.E</p>
                </div>
               
                
            </div>
        </div>

    </div>
</div>


</div>
</div>