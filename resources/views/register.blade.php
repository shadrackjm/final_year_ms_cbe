<!doctype html>
<html lang="en">
<head>
  <title>Login_page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('login_asset/css/style.css') }}">

</head>
<body>
  <section class="ftco-section">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-7">
          <div class="login-wrap p-3 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
              <img src="{{ asset('images/cbe.jpg') }}" alt="" height="50px" width="50px">
              <!-- <span class="fa fa-user-o"></span> -->
            </div>
            <h3 class="text-center mb-4">Register Admins</h3>
            <form action="{{route('RegisterCoord')}}" class="login-form" method="POST">
              @csrf
              <div class="form-group">
                <label for="">first name</label>
                <input type="text" name="fname" id="" class="form-control rounded-left" value="{{old('fname')}}">
                <span class="text-danger">@error('fname'){{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="">Middle Name</label>
                <input type="text" name="Mname" id="" class="form-control rounded-left" value="{{old('Mname')}}">
                <span class="text-danger">@error('Mname'){{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="lname" id="" class="form-control rounded-left" value="{{old('lname')}}">
                <span class="text-danger">@error('lname'){{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="">email</label>
                <input type="text" name="email" id="" class="form-control rounded-left" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="">phone</label>
                <input type="text" name="phone" id="" class="form-control rounded-left" value="{{old('phone')}}">
                <span class="text-danger">@error('phone'){{$message}} @enderror</span>
              </div>

              @if(Session::has('success'))
              <div class="alert alert-success p-2">{{Session::get('success')}}</div>
              @endif
              @if(Session::has('fail'))
              <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
              @endif
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
              </div>
              <div class="form-group d-md-flex">
                <div class="w-50">

                </div>
                <div class="w-50 text-md-right">
                  <a href="/login">Login</a>
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
