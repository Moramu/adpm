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
	    <a href="https://aquadesignpro.com"><img class="top_logo" src="{{asset('public/uploads/pictures/aqua_logo.png')}}" alt="logo"></a>
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
	    <img class="avatar" src="{{asset('public/uploads/pictures/no_ava.jpg')}}">	
	</header>
	<nav>
	    <ul class="top-menu">
		
		<li id="home"><a href="{{route('home')}}">Home</li>
		<li id="products"><a href="{{route('products')}}">Products</li>
		<li id="services"><a href="{{route('services')}}">Services</a></li>
	@if (auth()->check())
        @if (auth()->user()->isAdmin())
		<li id="settings"><a href="{{route('settings')}}">Settings</a></li>
	@endif
	@endif
		<li>
		
		    <form name="search" action="{{route('search')}}" method="POST" role="search">
		    {{ csrf_field() }}
		    <input class="search_field" type="text" name="search" placeholder="Search"><button class='searchButton' type="submit">GO</button>
		    </form>

		</li>
	    </ul>
	</nav>
	@if (Request::is('sadmin')) 
	    <script>
	    var d = document.getElementById("home");
	    d.className += " active";
	    </script>
    	@endif
	
	@if (Request::is('products')||Request::is('products/*')||Request::is('corals')||Request::is('fish')||Request::is('corals/*')||Request::is('fish/*')
		||Request::is('aquariums')||Request::is('aquariums/*')||Request::is('chillers')||Request::is('chillers/*')
		||Request::is('filters')||Request::is('filters/*')||Request::is('food')||Request::is('food/*')||Request::is('heaters')
		||Request::is('heaters/*')||Request::is('sterilizers')||Request::is('sterilizers/*')
		||Request::is('additives')||Request::is('additives/*')||Request::is('lightings')||Request::is('lightings/*')
		) 
	    @include ('includes.productsSidebar')
	    <script>
	    var p = document.getElementById("products");
	    p.className += " active";
	    </script>
    	@endif
	@if (Request::is('services')||Request::is('services/*')||Request::is('waterparam')||Request::is('waterparam/*')||Request::is('project')||Request::is('project/*')
		||Request::is('reef')||Request::is('reef/*'))
	    @include ('includes.servicesSidebar')
	    <script>
	    var d = document.getElementById("services");
	    d.className += " active";
	    </script>
	@endif
	@if (Request::is('sadmin/settings')||Request::is('sadmin/settings/*'))
	    @include ('includes.settingsSidebar')
	    <script>
	    var d = document.getElementById("settings");
	    d.className += " active";
	    </script>
	@endif
	    <section>
	    @yield('content')
	    </section>
	</div>
    <footer>
    <div id="footer">
	</div>
    </footer>
    
</body>
</html>