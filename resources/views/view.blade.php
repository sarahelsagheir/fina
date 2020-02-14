<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Book</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../fashi/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../fashi/css/style.css" type="text/css">
    <link rel="stylesheet" href="{{asset('book-store/css/styles.css')}}">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a href="#" class="web-url">www.bookstore.com</a></div>
                    <div class="col-md-6">
                        <h5>Free Shipping Over $99 + 3 Free Samples With Every Order</h5>
                    </div>
                    <div class="col-md-3">
                        <span class="ph-number">Call : 800 1234 5678</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                @include('layouts.navbar')

            </div>
        </div>
    </header>

    <!-- Header Section Begin -->

    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->

    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            @if( session()->has('success') )
            <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <div class="row"  style="border: none; box-shadow: 2px 4px 8px 4px rgba(0, 0, 0, 0.2);">

                <div class="col-lg-9">
                    <div class="row p-3" >

                        <div class="col-lg-4">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{asset('../'.$book->cover)}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="product-details"  >
                                <div class="pd-title">
                                    <span>{{$book->category}}</span>
                                    <h3>{{$book->title}}</h3>
                                    <form action="{{route('wishlist.store')}}" class="heart-icon" id="contact_form" method="post">
                                        {{csrf_field()}}
                                        <input name="user_id" type="text" value="{{Auth::user()->id}}" hidden />
                                        <input name="product_id" type="text" value="{{$book->id}}" hidden />
                                        <button type="submit" style="background: transparent; border:none" class=""><i class="icon_heart_alt"></i></button>
                                    </form>
                                   
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor
                                        sit amet, consectetur adipisicing elit, sed do mod tempor</p>
                                    <h4 style="color: #074985">{{$book->price}} L.E</h4>
                                </div>


                                <div class="quantity">
                                    <a href="{{route('cart.add',$book->id)}}" class="btn pd-cart">Add To Cart</a>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>AUTHOR</span>: {{$book->author}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-3 my-4">
                            <h5 style=" border-bottom:1px solid #ccc; padding-bottom:10px ; margin-bottom:20px">Comments <i class="fa fa-commenting" style="color: grey" aria-hidden="true"></i></h5>
                            @comments(['model' => $book])
                        </div>
                    </div>
                    </div>




                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->

    <!-- Related Products Section End -->

    <!-- Partner Logo Section Begin -->

    <!-- Partner Logo Section End -->


    <!-- Footer Section End -->
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
                            <li><a href="">Shipping & Returns</a></li>
                            <li><a href="privacy-policy.html">Privacy</a></li>
                            <li><a href="faq.html">FAQ’s</a></li>
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
    <!-- Js Plugins -->
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
    @include('sweetalert::alert')

</body>

</html>