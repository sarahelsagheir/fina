<nav class="navbar navbar-expand-lg navbar-light px-3 py-sm-2" style="border: none; box-shadow: 2px 2px 5px 4px rgba(0, 0, 0, 0.2);">

<a class="navbar-brand ml-md-2 mt-2" href="index.html" style="font-size: 30px;font-weight:bold ; color:#074985 ;   font-family: 'Sofia';"> <img src="{{asset('images/student.png')}}" style="vertical-align: middle;width: 40px; height: 40px; display:inline-block" class="mb-3" alt="" srcset=""> BOOKIE</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form method="GET" action="{{ url('search') }}" class="form-inline mx-auto my-lg-!important!important0" style="border: none">


  <input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}" autocomplete="false">

  </form>
    <ul class="navbar-nav ml-auto">

        <li class="navbar-item">
            <a href="{{ url('/home') }}" style="font-size:16px" class="nav-link">Home</a>
        </li>
        @if(!auth()->user()->hasRole('book-store'))
        <li class="navbar-item">
            <a href="{{ route('borrow.index') }}"  style="font-size:16px" class="nav-link">Borrow</a>
        </li>
         @endif

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
        <li class="navbar-item">
            <a href="{{route('chat')}}" class="nav-link cart  my-2 my-lg-0" role="button">
                <span><i class="fa fa-envelope" style=" font-size:17px;" aria-hidden="true"></i></span>
                <span class="quntity">
                    {{DB::table('messages')
              ->where('read',0)
              ->where('to',Auth::user()->id)
              ->count()}}
                </span>
            </a>
        </li>

        <li class="navbar-item">

            <a href="{{ route('cart.show')}}" class=" nav-link cart my-2 my-lg-0" style="color: black">

                <span>
                    <i class="fa fa-shopping-cart" style="color: #666 ;font-size:17px;" aria-hidden="true"></i>
                </span>
                <span class="quntity"> {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</span>
            </a>
        </li>
        <li class="navbar-item">

            <a href="{{ route('wishlist.index')}}" class="nav-link cart my-2 my-lg-0" style="color: black">

                <span>
                    <i class="fa fa-heart" style="color: #666 ;font-size:17px;" aria-hidden="true"></i>
                </span>
                <span class="quntity"> {{DB::table('wishlists')
                  ->where('user_id',Auth::user()->id)
                  ->count()}}</span>
                <!-- <span class="quntity"> {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</span> -->
            </a>
        </li>



        <li class="nav-item navbar-item dropdown" id="markAsRead" onclick="markNotificationAsRead()">
            <a id="navbarDropdown" class="nav-link my-2 my-lg-0 cart" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <span><i class="fa fa-bell ml-1" style=" font-size:17px;" aria-hidden="true"></i></span>
                <span class="quntity">{{count(auth::user()->unreadNotifications)}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pl-3" style="width:400px; background:#efefef;border:none; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); overflow:auto" aria-labelledby="navbarDropdown">
                <ul class="list-unstyled">
                    <li>
                        @foreach(auth()->user()->unreadNotifications as $notification)
                        @include('notification.'.Str::snake(class_basename($notification->type)))
                        @endforeach
                    </li>
                </ul>
            </div>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <li>
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    @include('notification.'.Str::snake(class_basename($notification->type)))
                    @endforeach
                </li>
            </ul>

        </li>
        <li class="navbar-item dropdown">
            <a id="navbarDropdown" class="nav-link " style="text-transform: capitalize; font-size:16px" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  style="font-size:16px" href="{{route('books')}}"> My Book </a>
                <a class="dropdown-item"  style="font-size:16px" href="{{route('addBook')}}">Share Book</a>
                <a class="dropdown-item"  style="font-size:16px" href="{{route('changePassword')}}">Change password</a>
                <a class="dropdown-item"  style="font-size:16px" href="{{route('profileAvatar')}}">Upload Profile Picture</a></a>
                <a href="{{ route('order.index') }}"  style="font-size:16px" class="dropdown-item">Orders <i class="fas fa-grip-horizontal ml-2"></i></a>
                <a class="dropdown-item"  style="font-size:16px" href="{{route('sharedBook')}}">Shared book</a>
                <a class="dropdown-item" href="{{route('user.rate.index',auth()->user()->id)}}">{{__('my Rate')}}</a>
                <a class="dropdown-item"  style="font-size:16px" href="{{ route('logout') }}" onclick="event.preventDefault();
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




</div>
</nav>

<!-- modals -->
@include('layouts.share')
@include('layouts.changePic')
@include('layouts.changePas')
