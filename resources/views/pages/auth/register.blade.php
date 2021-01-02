@extends('layouts.auth')
@push('style')
<style>
    body {
	font-family: 'Montserrat', sans-serif;
	text-rendering : optimizeLegibility;
	-webkit-font-smoothing : antialiased;
}


#login-bg.container-fluid {
	padding: 0;
	height: 100%;
	position: absolute;
}

/* Background image an color divs*/

.bg-img , .bg-color {
	min-width: 50%;
	vertical-align: top;
	padding: 0;
	margin-left: 0;
	height: 100%;
	background-color: #F4E195;
	display: inline-block;
	overflow: hidden;
}

.bg-color {
	margin-left: -5px;
}

.bg-img {
	background-image: url({{asset('assets/images/bg-image.jpeg')}});
	background-size: cover;
}

#login{
	padding-top: 10%;
	text-align: center;
	text-transform: uppercase;
}


.login {
	width: 100%;
	height: 500px;
	background-color: rgba(255,255,255,.8);
	padding: 15px;
	padding-top: 30px;
}

.login h1 {
	margin-top: 30px;
	font-weight: bold;
	font-size: 50px;
	letter-spacing: 3px;
}

.login form {
	max-width: 420px;
	margin: 30px auto;
}

.login .btn {
	color: #fff;
	border-radius: 50px;
	text-transform: uppercase;
	font-weight: bold;
	letter-spacing: 2px;
	font-size: 20px;
	padding: 14px;
	/* opacity:.6; */
	background-color: #2E0E09;
}

.form-group input {
	font-size: 20px;
	font-weight: lighter;
	border: none;
	background-color: #F0F0F0;
	color: #465347!important;
	padding: 26px 30px;
	border-radius: 50px;
	transition : 0.2s;
}




/* Form check styles*/

.form-check {
	padding: 0;
	text-align: left;
}

.form-check label {
	vertical-align: top;
	padding-top: 5px;
	padding-left: 5px;
	font-size: 15px;
	color: #606060;
	font-size: 14px;
}

.loginLink {
	text-align: right;
	float: right;
	font-weight: bold;
}

.loginLink a {
	color: #2E0E09;
	opacity: 0.6;
}

.loginLink a:hover {
	opacity: 1;
}


/* Switch styles */

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 30px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #F0F0F0;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 30px;
}

.slider:before {
  position: absolute;
  content: "";
  height: 22px;
  width: 22px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #F4E195;
}

input:focus + .slider {
  box-shadow: 0 0 1px #F4E195;
}

input:checked + .slider:before {
  -webkit-transform: translateX(30px);
  -ms-transform: translateX(30px);
  transform: translateX(30px);
}


.btn:hover {
	color: #fff;
	background-color: #856114 !important;
	border-color: #856114 !important;
}

.btn:active {
	color: #fff;
	background-color: #9C7111 !important;
	border-color: #9C7111 !important;
	transform: translateY(4px);
}

/* Media queries */

@media(max-width: 500px) {
	.bg-img , .bg-color {
	min-width: 100%;
	height: 50%;
	margin: 0;
	}

	.loginLink {
	text-align: right;
	float: left;
	padding: 20px 0;
	}


	#login {
		padding-top: 50px;
	}

}

</style>
@endpush


@section('content')

    <!-- Backgrounds -->

    <div id="login-bg" class="container-fluid">

        <div class="bg-img"></div>
        <div class="bg-color"></div>
      </div>
  
      <!-- End Backgrounds -->
  
      <div class="container" id="login">
          <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="login">
  
              <h1 style="color: #2E0E09;">Register</h1>
              
              <!-- Loging form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="form-group">
                        <input required autofocus type="text" class="form-control" id="name" name="name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <input required type="tel" class="form-control" id="phone" placeholder="Phone Number">
                      </div>
                      <button type="submit" class="btn btn-lg btn-block ">Sign up</button>
                      <br>
  
                        <div class="form-check">
  
                        <!-- <label class="switch">
                        <input type="checkbox"> -->
                        <!-- <span class="slider round"></span> -->
                      </label>
                        
                        <label class="loginLink"><a href="{{url('login')}}">Login<a></label>
  
                      </div>
                    
                    </form>
               <!-- End Loging form -->
  
            </div>
          </div>
          </div>
      </div>
@endsection



@push('script')
    
@endpush