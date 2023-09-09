    <!doctype html>
    <html lang="en">
  <head>
  	<title>Login_page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet"> -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('login_asset/css/style.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-3 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
              <img src="{{ asset('images/cbe.jpg') }}" alt="" height="50px" width="50px">
		      		<!-- <span class="fa fa-user-o"></span> -->
		      	</div>
		      	<h3 class="text-center mb-4">Password Recovery</h3>
						<form action="{{ route('forgot-password')}}" class="login-form" method="POST">
              @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Enter Your Email Address" name="email" value="{{ old('email')}}">
                <span class="text-danger">@error('username'){{$message}} @enderror</span>
		      		</div>
					         @if(Session::has('success'))
                    <div class="alert alert-success p-2">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
                    @endif
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">send email</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
                        <!--  -->
								</div>
								<div class="w-50 text-md-right">
									<a href="/login">login</a>
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('login_asset/js/jquery.min.js') }}"></script>
  <script src="{{ asset('login_asset/js/popper.js') }}"></script>
  <script src="{{ asset('login_asset/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('login_asset/js/main.js') }}"></script>

	</body>
</html>
