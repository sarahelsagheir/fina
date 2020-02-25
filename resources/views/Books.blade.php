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
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">


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
    <link rel="stylesheet" type="text/css" href="../fash/css/util.css">
    <link rel="stylesheet" type="text/css" href="../fash/css/main.css">
    <!-- Css Styles -->

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


    <section class="bgwhite pt-5">
        <div class="container">
            <div class="row">
                @if($books->count())
                @foreach($books as $book)
                <div class="col-sm-6 col-md-3 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
                            <img src="{{$book->cover}}" alt="IMG-PRODUCT" style="border: none; box-shadow: 2px 4px 8px 4px rgba(0, 0, 0, 0.2);  width:200px; height:250px">

                            <div class="block2-overlay trans-0-4" style=" width:200px">



                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!-- Button -->
                                    <form method="post" action="{{route('deleteBook',$book->id)}}">
                                        @csrf
                                        @method('delete')

                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="return confirm('are you sure?')" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt px-2 py-2 " style="border: none; box-shadow: 2px 4px 8px 4px rgba(0, 0, 0, 0.2);  width:200px">
                            <a href="{{route('book.view',['id' => $book['id'] ])}}" class="block2-name dis-block s-text3 p-b-5">
                                {{$book->title}}
                            </a>


                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>There is no books shared yet</p>
                @endif

            </div>
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
        @include('sweetalert::alert')
</body>

</html>