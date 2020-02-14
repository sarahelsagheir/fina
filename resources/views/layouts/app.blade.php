<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="{{asset('(book-store/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="book-store/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('book-store/css/styles.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- Fonts -->
   
<!-- Css Styles -->


    @yield('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{ asset('css/preview.css') }}" rel="stylesheet">
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('book-store/css/styles.css')}}">

   

    <!-- <style>
        	body,html{
			height: 100%;
			margin: 0;
			background: #7F7FD5;
	       background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
	        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
		}

    </style> -->
</head>


<body>
    <div id="app">
       
        <main>
            @yield('content')
        </main>
    </div>
    <script src="../fashi/js/jquery-3.3.1.min.js"></script>
    @yield('scripts')

    <script type="text/javascript" src="{{asset('book-store/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('book-store/js/custom.js')}}"></script>
   

</body>

</html>