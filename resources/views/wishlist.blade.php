<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOKIE</title>

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <link rel="stylesheet" type="text/css" href="../fash/vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/fonts/themify/themify-icons.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/fonts/elegant-font/html-css/style.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/vendor/animate/animate.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/vendor/slick/slick.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/vendor/noui/nouislider.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="../fash/css/util.css">
        <link rel="stylesheet" type="text/css" href="../fash/css/main.css">
    <link rel="stylesheet" href="{{asset('fashi/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('fashi/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('book-store/css/styles.css')}}">


</head>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header>
      
        <div class="main-menu">
            <div class="container">
                @include('layouts.navbar')

            </div>
        </div>
    </header>

    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="cart-table">
                    @if($wishlists->count())
                        <table class="table-striped" style="border: none; box-shadow: 4px 4px 8px 4px rgba(0, 0, 0, 0.2)">
                            <thead style="background: #074985">
                                <tr>
                                    <th style="color: white">Image</th>
                                    <th style="color: white" class="p-name">Book Name</th>
                                    <th style="color: white">Price</th>
                                    <th style="color: white">add to cart</th>

                                    <th style="color: white">delete</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach( $wishlists as $product)
                                <tr>
                                    <td class="cart-pic first-row"><img src="{{asset($product->book->cover)}}" alt="{{$product->book->title}}" width="100px" height="100px"></td>
                                    <td class="cart-title first-row">
                                        <h5> {{ $product->book->title }}</h5>
                                    </td>
                                   
                                    <td class="p-price first-row">{{ $product->book->price }} L.E</td>
                                    @if(!empty($product->book->price)) 
                                    <td class="p-price first-row">

                                        <div class="quantity">
                                            <a href="{{route('cart.add',$product->id)}}" style="display: inline" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                      
                                    </td>
                                    @else
                                    <td class="p-price first-row">
                                    <a href="{{'/borrow/'.$product->id.'/'.$product->book->user_id}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 btn">
                                                Borrow
                                            </a>
                                  
                                    </td>
                                    @endif


                                    <td class="close-td first-row">
                                        <form action="{{ route('wishlist.destroy', $product['id'])}}" style="display:inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="p-2" style="vertical-align: middle;border:none; background:#ddd"><i class="ti-close"></i></button>
                                        </form>

                                    </td>
                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
                        @else
                        <p>No items added yet</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </section>

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
                            <form method="POST" action="{{url('/contact_us')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email" name="email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Messege" name="msg"></textarea>
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
       
    </footer>


    <script src="../fashi/js/jquery-3.3.1.min.js"></script>
    <script src="../fashi/js/bootstrap.min.js"></script>
    <script src="../fashi/js/jquery-ui.min.js"></script>
    <script src="../fashi/js/jquery.countdown.min.js"></script>
    <script src="../fashi/js/jquery.nice-select.min.js"></script>
    <script src="../fashi/js/jquery.zoom.min.js"></script>
    <script src="../fashi/js/jquery.dd.min.js"></script>
    <script src="../fashi/js/jquery.slicknav.js"></script>
    <script src="../fashi/js/owl.carousel.min.js"></script>
    <script src="../fashi/js/main.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    @include('sweetalert::alert')

</body>

</html>