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


    main{
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

.navbar textarea{
    width: 85%;
	border: none;
	border-radius: 20px;
	outline: none;
	padding: 10px;
	font-family: 'Sniglet', cursive;
	font-size: 1em;
	color: #676767;
	transition: border 0.5s;
	-webkit-transition: border 0.5s;
	-moz-transition: border 0.5s;
	-o-transition: border 0.5s;
	/* border: solid 3px #98d4f3;	 */
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
    box-sizing:border-box;
    height: 50px;	
	resize: none; 
    overflow: auto;
    background: white

}

.navbar button.notify{
    border: none;
    background: blue;
    color: black;
    border-radius: 50%;
    margin-left: 10px;
    width: 30px;
    height: 30px;
}

.title {
  /* color: grey; */
  /* font-size: 18px; */
  margin: 10px 0;
  text-transform: capitalize
}

/* input{
    display: block;
    width:50%;
    margin: 5px 10px;
} */


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


button:hover, a:hover {
  opacity: 0.7;
}

</style>
@endsection


@section('content')
<div class="container">
<header>
   
    @include('layouts.navbar')
</header>
<div class="card">
  <img src="{{asset($user->cover)}}" alt="John" style="width:100%">
  <h3 class="title">{{ $user->name }}</h3>
  <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $user->averageRating }}" data-size="xs" disabled="">
 
  
  <!-- <p><button>Contact</button></p> -->
</div>
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


<script type="text/javascript">
$(document).ready(function(){
    $("#input-id").rating();
});
</script>

@endsection

