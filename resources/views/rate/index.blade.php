@extends('layouts.app')
@section('styles')

<style>
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    input {
        font-family: 'Raleway', sans-serif;
        outline: 0;
    }

    input::placeholder {
        color: #aab7c4
    }


    main {
        background: white
    }

    .navbar {
        padding: 0;
        /* background: #eee;; */
    }

    header .navbar-brand {
        padding: 0;
        margin-top: -10px;
    }

    header .navbar-light .navbar-nav .navbar-item {
        padding: 0 15px;
        position: relative;
    }

    header .navbar-light .navbar-nav .navbar-item:after {
        content: '';
        width: 1px;
        height: 18px;
        float: right;
        background: #a3a3a3;
        position: absolute;
        right: 0;
        top: 2px;
    }

    header .navbar-light .navbar-nav .navbar-item:last-child:after {
        display: none;
    }

    header .navbar-light .navbar-nav .navbar-item.active {
        color: #000;
    }

    header .navbar-light .navbar-nav .navbar-item.active:after {
        background: #000;
    }

    header .navbar-light .navbar-nav .nav-link {
        padding: 0;
        font-weight: 300;
    }

    header .form-inline {
        border: 1px solid #e7e7e7;
        padding-right: 10px;
    }

    header .form-inline input {
        border: 0;
        font-size: 12px;
        height: 32px;
        outline: 0;
    }

    header .form-inline input:focus {
        outline: 0;
        box-shadow: none;
    }

    header .form-inline .fa {
        color: #e7e7e7;
        font-size: 12px;
    }

    header .cart {
        padding: 0 10px;
        margin-right: 10px;
        position: relative;
        margin-top: 2px !important;
    }

    header .cart .quntity {
        font-size: 9px;
        position: absolute;
        top: -3px;
        right: 0;
        background: #074985;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        text-align: center;
        color: #fff;
        padding: 1px 0;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        margin: 50px auto;
    }

    .title {
        margin: 10px 0;
        text-transform: capitalize
    }

    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
</style>
@endsection


@section('content')
<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand ml-md-2 mt-2 col-sm-3" href="index.html" style="font-size: 30px;font-weight:bold ; color:#074985"> <img src="{{asset('images/student.png')}}" style="vertical-align: middle;width: 40px; height: 40px; display:inline-block" class="mb-2" alt="" srcset=""> BOOKIE</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="navbar-item">
                        <a href="{{ url('/home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{ url('/home') }}" class="nav-link">Shop</a>
                    </li>

                    <li class="navbar-item">
                        <a href="faq.html" class="nav-link">FAQ</a>
                    </li>
                    @guest
                    <li class="navbar-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="navbar-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @else
                    <li class="navbar-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="text-transform: capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('books')}}"> My Book </a>
                            <a class="dropdown-item" href="{{route('addBook')}}">Share Book</a>
                            <a class="dropdown-item" href="{{route('changePassword')}}">Change password</a>
                            <a class="dropdown-item" href="{{route('profileAvatar')}}">Upload Profile Picture</a></a>


                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>




                </ul>
                <div class="avatar">
                    <img src="{{asset(auth()->user()->cover)}}" style="vertical-align: middle;width: 40px; height: 40px;border-radius: 50%;" alt="avatar" srcset="">
                </div>
                @endguest

                <a href="{{ route('cart.show')}}" class="cart my-2 my-lg-0" style="color: black">

                    <span>
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </span>
                    <span class="quntity"> {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</span>
                </a>

                <a href="{{ route('wishlist.index')}}" class="cart my-2 my-lg-0" style="color: black">

                    <span>
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </span>
                    <!-- <span class="quntity"> {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</span> -->
                </a>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search here..." aria-label="Search">
                    <span class="fa fa-search"></span>
                </form>
            </div>
        </nav>
    </header>
    <form action="{{route('rateShow',$user->id)}}" method="POST">
        @csrf
        <div class="card">
            <img src="{{asset($user->cover)}}" alt="John" style="width:100%">
            <h3 class="title">{{ $user->name }}</h3>
            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $user->userAverageRating }}" data-size="xs">
            <input type="hidden" name="id" required="" value="{{ $user->id }}">
            <button type="submit" class="">Submit Review</button>
            <!-- <p><button>Contact</button></p> -->
        </div>
    </form>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="address">
                    <h4>Our Address</h4>
                    <h6>The BookStore Theme, 4th Store
                        Beside that building, USA</h6>
                    <h6>Call : 800 1234 5678</h6>
                    <h6>Email : info@bookstore.com</h6>
                </div>
                <div class="timing">
                    <h4>Timing</h4>
                    <h6>Mon - Fri: 7am - 10pm</h6>
                    <h6>​​Saturday: 8am - 10pm</h6>
                    <h6>​Sunday: 8am - 11pm</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="navigation">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-conditions.html">Terms</a></li>
                        <li><a href="products.html">Products</a></li>
                    </ul>
                </div>
                <div class="navigation">
                    <h4>Help</h4>
                    <ul>
                        <li><a href="#">Shipping & Returns</a></li>
                        <li><a href="privacy-policy.html">Privacy</a></li>
                        <li><a href="#">FAQ’s</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form">
                    <h3>Quick Contact us</h3>
                    <h6>We are now offering some good discount
                        on selected books go and shop them</h6>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <textarea placeholder="Messege"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn black">Alright, Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>(C) 2017. All Rights Reserved. BookStore Wordpress Theme</h5>
                </div>
                <div class="col-md-6">
                    <div class="share align-middle">
                        <span class="fb"><i class="fa fa-facebook-official"></i></span>
                        <span class="instagram"><i class="fa fa-instagram"></i></span>
                        <span class="twitter"><i class="fa fa-twitter"></i></span>
                        <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                        <span class="google"><i class="fa fa-google-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="application/javascript">
    $("#input-id").rating();
</script>

@endsection