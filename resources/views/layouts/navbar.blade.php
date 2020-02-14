<nav class="navbar navbar-expand-lg navbar-light px-3 py-sm-2" style="border: none; box-shadow: 2px 2px 5px 4px rgba(0, 0, 0, 0.2);">

    <a class="navbar-brand ml-md-2 mt-2" href="index.html" style="font-size: 30px;font-weight:bold ; color:#074985"> <img src="{{asset('images/student.png')}}" style="vertical-align: middle;width: 40px; height: 40px; display:inline-block" class="mb-3" alt="" srcset=""> BOOKIE</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <li class="navbar-item">
                <a href="{{ url('/home') }}" class="nav-link">{{__('Home')}}</a>
            </li>
            <li class="navbar-item">
                <a href="{{ route('borrow.index') }}" class="nav-link">{{__('Borrow')}}</a>
            </li>

            <li class="navbar-item">
                <a href="faq.html" class="nav-link">{{__('FAQ')}}</a>
            </li>
            @guest
            <li class="navbar-item">
                <a class="nav-link" href="{{ route('login') }}">{{__('Login')}}</a>
            </li>
            @if (Route::has('register'))
            <li class="navbar-item">
                <a class="nav-link" href="{{ route('register') }}">{{__('Register')}}</a>
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
            <li class="nav-item navbar-item dropdown" id="markAsRead" onclick="markNotificationAsRead()">
                <a id="navbarDropdown" class="nav-link my-2 my-lg-0 cart" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <span><i class="fa fa-bell ml-1" style=" font-size:17px;" aria-hidden="true"></i></span>
                    <span class="quntity">{{count(auth::user()->unreadNotifications)}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right pl-3" style="width:400px; background:#efefef;border:none; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" aria-labelledby="navbarDropdown">
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
                <a id="navbarDropdown" class="nav-link " style="text-transform: capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('books')}}"> {{__('My Book')}} </a>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#shareBook">{{__('Share Book')}}</a>
                    <a class="dropdown-item" href="{{route('changePassword')}}" data-toggle="modal" data-target="#changePas">{{__('Change password')}}</a>
                    <a class="dropdown-item" href="{{route('profileAvatar')}}" data-toggle="modal" data-target="#changePic">{{__('Upload Profile Picture')}}</a></a>
                    <a href="{{ route('order.index') }}" class="dropdown-item">{{__('Orders')}} <i class="fas fa-grip-horizontal ml-2"></i></a>
                  
                    <a class="dropdown-item" href="{{route('sharedBook')}}">{{__('Shared book')}}</a>
                    <a class="dropdown-item" href="{{'/showRate/'.auth::user()->id}}">{{__('my Rate')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <a href="{{ route('cart.show')}}" class="cart my-2 my-lg-0" style="color: black">

            <span>
                <i class="fa fa-shopping-cart" style="color: #666 ;font-size:17px;" aria-hidden="true"></i>
            </span>
            <span class="quntity"> {{ session()->has('cart') ? session()->get('cart')->totalQty : '0' }}</span>
        </a>

        <a href="{{ route('wishlist.index')}}" class="cart my-2 my-lg-0" style="color: black">

            <span>
                <i class="fa fa-heart" style="color: #666 ;font-size:17px;" aria-hidden="true"></i>
            </span>
            <span class="quntity"> {{DB::table('wishlists')
                    ->where('user_id',Auth::user()->id)
                    ->count()}}</span>
        </a>

        <form class="form-inline mx-auto my-lg-0">
            <input class="form-control" type="search" placeholder="{{__('Search here...')}}" aria-label="Search">
            <span class="fa fa-search"></span>
        </form>
    </div>
</nav>

 <!-- modals -->
 @include('layouts.share')
    @include('layouts.changePic')
    @include('layouts.changePas')