<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bookie</title>

    <!-- Main CSS-->
    <link href="{{ asset('css/bookshop.bundle.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css " rel="stylesheet">

    @yield('styles')

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Bookie</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

        <ul class="app-nav">
            <li class="app-search">

                <form method="POST" action="{{route('order')}}">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="search" class="form-control" placeholder="Search Orders" value="{{ old('search') }}">
                        </div>
                        <div class="col-md-6">
                            @csrf

                            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </li>
            <!--Notification Menu-->

            <li class="mt-2">
                <a href="{{url('admin/chat')}}" class="nav-link cart  my-2 my-lg-0 text-light " role="button">
                    <span><i class="fa fa-envelope" style=" font-size:17px;" aria-hidden="true"></i></span>
                    <span class="quntity">
                        {{DB::table('messages')
                    ->where('read',0)
                    ->where('to',Auth::user()->id)
                    ->count()}}
                    </span>
                </a>
            </li>
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="fa fa-user fa-lg"></i>
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="page-user.html">
                            <i class="fa fa-cog fa-lg"></i> Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('profile',auth()->user()->id)}}">
                            <i class="fa fa-user fa-lg"></i> Profile
                        </a>
                    </li>
                    <li>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </li>
        </ul>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <div class="app-sidebar">

        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="{{route('admin.index')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-book"></i>
                    <span class="app-menu__label">Books</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('book.index') }}">
                            <i class="icon fa fa-angle-right"></i> All Books
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('book.create') }}">
                            <i class="icon fa fa-angle-right"></i> Add Book
                        </a>
                    </li>

                </ul>
            </li>





            <li>
                <a class="app-menu__item" href="{{ route('category.index') }}">
                    <i class="app-menu__icon fa fa-list-alt"></i>
                    <span class="app-menu__label">Categories</span>
                </a>
            </li>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Sliders</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('slider.index') }}">
                            <i class="icon fa fa-angle-right"></i> All Sliders
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('slider.create') }}">
                            <i class="icon fa fa-angle-right"></i> Add Slider
                        </a>
                    </li>
                </ul>
            </li>



            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Users</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('users-control') }}">
                            <i class="icon fa fa-angle-right"></i> All Users
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('users.create') }}">
                            <i class="icon fa fa-angle-right"></i> Create Book Store
                        </a>
                    </li>
                </ul>
            </li>



            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Borrowers</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{url('/admin/borrowers')}}">
                            <i class="icon fa fa-angle-right"></i> Borrowers
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-sliders"></i>
                    <span class="app-menu__label">Orders</span>
                    <i class="treeview-indicator fa fa-plus"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{url('admin/order')}}">
                            <i class="icon fa fa-angle-right"></i> Orders
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="app-menu__item" href="{{url('admin/contact')}}">
                    <i class="app-menu__icon fa fa-address-card"></i>
                    <span class="app-menu__label">Contact us</span>
                </a>
            </li>





        </ul>
    </div>

    <div class="app-content">

        @yield('content')

    </div>

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/bookshop.bundle.js') }}"></script>

    <script>
        (function() {
            "use strict";

            var treeviewMenu = $('.app-menu');

            // Toggle Sidebar
            $('[data-toggle="sidebar"]').click(function(event) {
                event.preventDefault();
                $('.app').toggleClass('sidenav-toggled');
            });

            // Activate sidebar treeview toggle
            $("[data-toggle='treeview']").click(function(event) {
                event.preventDefault();
                if (!$(this).parent().hasClass('is-expanded')) {
                    treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
                    treeviewMenu.find("[data-toggle='treeview']").children('.treeview-indicator').removeClass('fa-minus').addClass('fa-plus');
                }
                $(this).parent().toggleClass('is-expanded');
                $(this).children('.treeview-indicator').toggleClass('fa-plus fa-minus');
            });

            // Set initial active toggle
            $("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

            //Activate bootstrip tooltips
            $("[data-toggle='tooltip']").tooltip();
        })();
    </script>

    @yield('scripts')

</body>

</html>