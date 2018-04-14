<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #f8f8f8;
                color: #636b6f;
                font-weight: 100;
                margin: 30px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

    
            .m-b-md {
                margin-bottom: 30px;
            }
	    
	    img {
		display: block;
	        margin-left: auto;
	        margin-right: auto;
		margin-top:1%;
	        width: 30%;
	    }
	    .logo {
	    background-image: url('public/uploads/pictures/aqua_logo.png');
	    background-position: center center;
	    background-repeat: no-repeat;
	    background-position: fixed;
	    background-size: contain;
	    }
	    
	    .text {
		font-size:30px;
		margin-top:1%;
		font-weight: bold;
	    }
	    .myButton {
	    color:white;
	    font-size:20px;
	    font-weight:bold;
	    }
	    
	    .login{
	    display:inline-block;
	    }

	    input {
	    border-radius:10px;
	     -moz-border-radius:10px;
	    -webkit-border-radius:10px;
	    width:25%;
	    background-color:white;
	    }
	
	    .submit {
	    display:inline-block;
	    }
	    
	    
        </style>
    </head>
    <body>
        <div class="content">
                <div class="logo">
		<img src="public/uploads/pictures/aqua_logo.png">
		</div>
	        <div class="button">
            @if (Route::has('login'))
                    @auth
		    <div class="text">
		    Welcome {{Auth::user()->name}}
		    </div>
                    <button type="button" class="btn btn-primary"><a class="myButton" href="{{ url('/home') }}">Start Working</a></button>
                    @else
		    	<div class="text">
			Welcome. Please Log In.
			</div>
            		  <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="">E-Mail Address</label>

                            <div class="">
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="">Password</label>

                            <div class="">
                                <input id="password" type="password" class="" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
			
		    	<div class="submit">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        <button type="submit" class="btn btn-primary">Login</button>
                	</div>
                    </form>
		    @endauth
            @endif
    
                </div>
            </div>
        </div>
    </body>
</html>
