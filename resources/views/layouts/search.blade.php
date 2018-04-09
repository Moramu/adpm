<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>AquaDesignManagment</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset ('css/default.css')}}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{asset ('js/default.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
	<header>
	    <a href="/"><img class="top_logo" src="{{asset('aqua_logo.png')}}" alt="logo"></a>
	    <div class="dropdown">
    	    <button class="btn btn-primary-my dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->name }}
    		<span class="caret"></span></button>
    		    <ul class="dropdown-menu">
    			<li><a href="#">Profile</a></li>
    			<li>
			<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
			</li>
    		    </ul>
	    </div>
	    <img class="avatar" src="{{asset('no_ava.jpg')}}">	
	</header>
	<nav>
	    <ul class="top-menu">
		
		<li id="home"><a href="{{route('sadmin')}}">Home</li>
		<li id="products"><a href="{{route('products')}}">Products</li>
		<li id="services"><a href="{{route('services')}}">Services</a></li>
		<li id="settings"><a href="{{route('settings')}}">Settings</a></li>
		<li>
		
		    <form name="search" action="{{route('search')}}" method="POST" role="search">
		    {{ csrf_field() }}
		    <input class="search_field" type="text" name="search" placeholder="Search"><button class='searchButton' type="submit">GO</button>
		    </form>

		</li>
	    </ul>
	</nav>
	
	<div class="search">
	@yield('content')
	</div>
	</div>
    <footer>
    <div id="footer">
	</div>
    </footer>
    
</body>
</html>