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

    <div class="register-login-section spad">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>SUCESS &nbsp;</strong> {{session()->get('success')}}
                        </div>
                        @endif

                        <form action="{{route('changePassword')}}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="current_password"><strong>Current Password:</strong></label>
                                <input type="password" class="form-control" id="current_password" name="current_password">

                            </div>
                            <div class="group-input">
                                <label for="new_password"><strong>New Password:</strong></label>
                                <input type="password" class="form-control" id="new_password" name="new_password">
                            </div>
                            <div class="group-input">
                                <label for="confirm_password"><strong>Confirm New Password:</strong></label>
                                <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
                            </div>
                            <button type="submit" class="btn register-btn">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


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