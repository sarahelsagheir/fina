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



    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

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

    <!-- Css Styles -->



    <link rel="stylesheet" href="{{asset('book-store/css/styles.css')}}">

    <style>
        .aside-link {

            display: block;

            padding: 10px 15px;

            /* border: 1px solid ; */

            color: grey;

            text-align: left
        }



        .aside-link:hover {

            background: #074985;

            color: white
        }
    </style>

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





    <section class="bgwhite">

        <div class="container">

            <div class="row">

                @if($products->count() != 0)

                @foreach($products as $product)

                @if(empty($product->price)&&($product->status==0))

                <div class="col-sm-6 col-md-3 p-b-50">

                    <div class="block2">

                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">

                            <img src="{{$product->cover}}" alt="IMG-PRODUCT" style="border: none; box-shadow: 2px 4px 8px 4px rgba(0, 0, 0, 0.2); width:200px; height:250px">



                            <div class="block2-overlay trans-0-4" style="overflow: auto ; width:200px;">

                                <div class="block2-btn-addcart w-size1 trans-0-4">

                                    <a href="{{'/sharedBook/recieved/'.$product->id}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">recieved</a>

                                    <div class="dropdown">

                                        <button type="button" class="dropdown-toggle mt-2 flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            Not recieved

                                        </button>

                                        <div class="dropdown-menu" style="width: 200px; z-index:999;background:black">

                                            <form action="{{'/conversation/send/1'}}" class="ml-3" method="post">

                                                @csrf

                                                <textarea @keydown.enter="send" style="z-index:9999;background:white ; width:90%; margin:auto" placeholder="Message..." name="text" id="text"></textarea>

                                                <button class="m-1 text-light" type="submit">send</button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="block2-txt px-2 py-2 " style="border: none; box-shadow: 2px 4px 8px 4px rgba(0, 0, 0, 0.2); width:200px;">

                            <a href="{{route('book.view',['id' => $product['id'] ])}}" class="block2-name dis-block s-text3 p-b-5">

                                {{$product->title}}

                            </a>

                        </div>

                    </div>

                </div>

                @endif

                @endforeach

                @else

                <p>no shared book found</p>

                @endif

            </div>

        </div>

        </div>

    </section>



    <footer>

        <div class="container">

            <div class="row">

                <div class="col-md-4" style="font-size: 16px">

                    <div class="address">

                        <h4>Our Address</h4>

                        <h6 style="font-size: 16px">The BookStore Theme, 4th Store

                            Beside that building, USA</h6>

                        <h6 style="font-size: 16px">Call : 800 1234 5678</h6>

                        <h6 style="font-size: 16px">Email : info@bookstore.com</h6>

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

                            <li><a href="index.html" style="font-size: 16px">Home</a></li>

                            <li><a href="#about" style="font-size: 16px">About Us</a></li>

                            <li><a href="products.html" style="font-size: 16px">Products</a></li>

                        </ul>

                    </div>

                    <div class="navigation">

                        <h4>Help</h4>

                        <ul>

                            <li><a href="#" style="font-size: 16px">Shipping & Returns</a></li>

                            <li><a href="privacy-policy.html" style="font-size: 16px">Privacy</a></li>

                            <li><a href="#" style="font-size: 16px">FAQ’s</a></li>

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



    <script src="{{ asset('js/app.js') }}" defer></script>







    <!-- <script type="text/javascript" src="{{asset('book-store/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('book-store/js/custom.js')}}"></script>

<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script> -->

    <!--===============================================================================================-->

    <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>

    <!--===============================================================================================-->

    <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>

    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!--===============================================================================================-->

    <script type="text/javascript" src="vendor/select2/select2.min.js"></script>

    <script type="text/javascript">
        $(".selection-1").select2({

            minimumResultsForSearch: 20,

            dropdownParent: $('#dropDownSelect1')

        });



        $(".selection-2").select2({

            minimumResultsForSearch: 20,

            dropdownParent: $('#dropDownSelect2')

        });
    </script>

    <!--===============================================================================================-->

    <script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>

    <script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>

    <!--===============================================================================================-->

    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>

    <script type="text/javascript" src="js/slick-custom.js"></script>

    <!--===============================================================================================-->

    <script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>

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



    <!--===============================================================================================-->

    <script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>

    <script type="text/javascript">
        /*[ No ui ]

===========================================================*/

        var filterBar = document.getElementById('filter-bar');



        noUiSlider.create(filterBar, {

            start: [50, 200],

            connect: true,

            range: {

                'min': 50,

                'max': 200

            }

        });



        var skipValues = [

            document.getElementById('value-lower'),

            document.getElementById('value-upper')

        ];



        filterBar.noUiSlider.on('update', function(values, handle) {

            skipValues[handle].innerHTML = Math.round(values[handle]);

        });
    </script>

    <!--===============================================================================================-->

    <script src="js/main.js"></script>



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