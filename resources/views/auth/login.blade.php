<!DOCTYPE html>
<html>
  <head>
    <title>HAU | Event Organizer</title>
  </head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  
  <body>
    <style type="text/css">
    body{
    background-color: #2A3F54;
    }
    p{
      font-family: 'Lato', sans-serif;
    }
    .loginform{
    background-color: white;
    }
    .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
    }
    .form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 25px 45px 45px 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
    }
    .form button {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #4CAF50;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
    background: #43A047;
    }
    .user{
    height: 100px;
    margin-bottom: 20px;
    align-content: center;
    }
    </style>
    <div class="login-page animated fadeInDown">
      <div class="form">
        <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
          <img src="{{ asset('images/user.png') }}" class="user">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-6">
              <input id="email" type="email" placeholder="E-Mail Address" name="email" value="{{ old('email') }}">
              @if ($errors->has('email'))
              <span class="help-block">
                <p style="color:red; margin-top:-10px;">{{ $errors->first('email') }}</p>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="col-md-6">
              <input id="password" type="password" placeholder="password" name="password">
              @if ($errors->has('password'))
                <p style="color:red; margin-top:-10px;">{{ $errors->first('password') }}</p>
              @endif
            </div>
          </div>
          
          
          <button type="submit">login</button>
        </form>
      </div>
    </div>
    <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>