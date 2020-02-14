<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Open Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="book-store/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="book-store/css/owl.carousel.min.css">
    <link rel="stylesheet" href="book-store/css/styles.css">
    <link rel="stylesheet" type="text/css" href="fash/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/fonts/themify/themify-icons.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/fonts/elegant-font/html-css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/vendor/lightbox2/css/lightbox.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fash/css/util.css">
    <link rel="stylesheet" type="text/css" href="fash/css/main.css">
    <link rel="stylesheet" type="text/css" href="book-store/css/owl.carousel.min.css">



</head>

<body>
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
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html" style="font-size: 30px;font-weight:bold ; color:#074985">OPEN BOOKS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            @if (Route::has('login'))
                            @auth
                            <li class="navbar-item active">

                                <a href="{{ url('/home') }}" class="nav-link">Home</a>
                            </li>
                            @else
                            <li class="navbar-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="navbar-item">

                                <a href="{{ route('register') }}" class="nav-link">Register</a>

                            </li>
                            @endif
                            @endauth
                            @endif



                            <li class="navbar-item">
                                <a href="{{ url('/home') }}" class="nav-link">Shop</a>
                            </li>
                            <li class="navbar-item">
                                <a href="about.html" class="nav-link">About</a>
                            </li>
                            <li class="navbar-item">
                                <a href="faq.html" class="nav-link">FAQ</a>
                            </li>

                        </ul>

                        <a href="{{ route('cart.show')}}" class="cart my-2 my-lg-0" style="color: black">
                            <span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </span>
                            <span class="quntity"> {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</span>
                        </a>

                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search here..." aria-label="Search">
                            <span class="fa fa-search"></span>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(fash/images/s.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                            Women Collection 2018
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-image: url(fash/images/s2.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
                            Women Collection 2018
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-image: url(fash/images/s4.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                            Women Collection 2018
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <!-- Button -->
                            <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="recomended-sec banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="title">
                <h2>highly recommendes books</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="book-store/images/img1.jpg" alt="img">
                        <h3>how to be a bwase</h3>
                        <h6><span class="price">$49</span> / <a href="#">Buy Now</a></h6>
                        <div class="hover">
                            <a href="product-single.html">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="book-store/images/img2.jpg" alt="img">
                        <h3>How to write a book...</h3>
                        <h6><span class="price">$19</span> / <a href="#">Buy Now</a></h6>
                        <span class="sale">Sale !</span>
                        <div class="hover">
                            <a href="product-single.html">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="book-store/images/img3.jpg" alt="img">
                        <h3>7-day self publish...</h3>
                        <h6><span class="price">$49</span> / <a href="#">Buy Now</a></h6>
                        <div class="hover">
                            <a href="product-single.html">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="book-store/images/img4.jpg" alt="img">
                        <h3>wendy doniger</h3>
                        <h6><span class="price">$49</span> / <a href="#">Buy Now</a></h6>
                        <div class="hover">
                            <a href="product-single.html">
                                <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>highly recommendes books</h2>
                <hr>
            </div>
            <div class="row">
                @foreach($books as $book)
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <img src="{{asset($book->cover)}}" alt="img">
                        <h3><a href="#">{{$book->author}}</a></h3>
                        <h6><span class="price">{{$book->price}}</h6>
                        <h6></span><a href="#">Buy Now</a></h6>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="btn-sec">
                <a href="#" class="btn gray-btn">view all books</a>
            </div>
        </div>
    </section> -->

    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                Highly Recommendes Books
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    @foreach($books as $book)

                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{asset($book->cover)}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="block2-txt p-t-20">
                                <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
								{{$book->author}}
                                </a>

                                <span class="block2-price m-text6 p-r-5">
								{{$book->price}}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>


    <section class="features-sec">
        <div class="container">
            <ul>
                <li>
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <h3>SAFE SHOPPING</h3>
                    <h5>Safe Shopping Guarantee</h5>
                    <h6>Every online transaction you make is 100% safe. Under the Fair Credit Billing Act, your bank cannot hold you liable for more than $50 of fraudulent charges.</h6>
                </li>
                <li>
                    <span class="icon return"><i class="fa fa-reply-all" aria-hidden="true"></i></span>
                    <h3>30- DAY RETURN</h3>
                    <h5>Moneyback guarantee</h5>
                    <h6>A money back guarantee within 30 days from the date of purchase. We are confident in the quality of our service, and you can be confident in us.</h6>
                </li>
                <li>
                    <span class="icon chat"><i class="fa fa-comments" aria-hidden="true"></i></span>
                    <h3>24/7 SUPPORT</h3>
                    <h5>online Consultations</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
            </ul>
        </div>
    </section>

    <section class="testimonial-sec">
        <div class="container">
            <div id="testimonal" class="owl-carousel owl-theme">
                <div class="item">
                    <h3>I have a passion for teaching kids to become readers, to become comfortable with a book, not daunted. Books shouldn’t be daunting, they should be funny, exciting and wonderful; and learning to be a reader gives a terrific advantage.</h3>
                    <div class="box-user">
                        <h4 class="author">Roald Dahl</h4>
                        <span class="country">Norway</span>
                    </div>
                </div>
                <div class="item">
                    <h3>It’s not that I don’t like people. It’s just that when I’m in the company of others – even my nearest and dearest – there always comes a moment when I’d rather be reading a book.</h3>
                    <div class="box-user">
                        <h4 class="author"> Maureen Corrigan</h4>
                        <span class="country"> New York</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Somebody who only reads newspapers and at best books of contemporary authors looks to me like an extremely near-sighted person who scorns eyeglasses. He is completely dependent on the prejudices and fashions of his times, since he never gets to see or hear anything else.</h3>
                    <div class="box-user">
                        <h4 class="author">Albert Einstein</h4>
                        <span class="country">Germany</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Of course anyone who truly loves books buys more of them than he or she can hope to read in one fleeting lifetime. A good book, resting unopened in its slot on a shelf, full of majestic potentiality, is the most comforting sort of intellectual wallpaper</h3>
                    <div class="box-user">
                        <h4 class="author">David Quammen</h4>
                        <span class="country">United States</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-quote">
            <img src="book-store/images/left-quote.png" alt="quote">
        </div>
        <div class="right-quote">
            <img src="book-store/images/right-quote.png" alt="quote">
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
    <script src="book-store/js/jquery.min.js"></script>
    <script src="book-store/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="book-store/js/owl.carousel.min.js"></script>
    <script src="book-store/js/custom.js"></script>
    <script type="text/javascript" src="fash/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="fash/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="fash/vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="fash/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="fash/vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="fash/vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="fash/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="fash/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="fash/vendor/lightbox2/js/lightbox.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="fash/vendor/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.block2-btn-addcart').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });

        $('.block2-btn-addwishlist').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");
            });
        });
    </script>

    <script src="fash/js/main.js"></script>
</body>





</html>