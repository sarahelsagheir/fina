@extends('layouts.backend')

@section('content')


<div class="app-title">
    <div>
        <h1><i class="fa fa-book"></i> Order</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    @if($carts)
                    @foreach($carts as $cart)
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="delete/book" method="POST">
                                @csrf
                                <div class="btn-group">
                                    <div class="animated-checkbox">
                                        <label>
                                            <input type="checkbox" id="check-all"><span class="label-text btn btn-dark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            {{ Form::button('<i class="fa fa-trash"></i>', ['type'=> 'submit', 'class'=>'btn btn-danger ml-2']) }}
                                        </label>
                                    </div>
                                </div>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Number</th>

                                            <th class="p-name">Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart->items as $item)
                                        <tr>
                                        <td class="cart-title first-row">
                                                <h5 class="pl-1"> {{$item['id'] }}</h5>
                                            </td>
                                            <td class="cart-title first-row">
                                                <h5 class="pl-1"> {{$item['title'] }}</h5>
                                            </td>
                                            <td class="p-price first-row">{{$item['price'] }} L.E</td>

                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    {{$item['qty'] }}
                                                </div>
                                            </td>
                                            @endforeach

                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <ul>
                        <li class="cart-total">Total Price :<span>{{$cart->totalPrice}}L.E</span></li>
                    </ul>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection