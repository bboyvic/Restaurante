<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro Arboleda</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<style>
		form{
			height:  750px;
			width: 900px;
		}
	</style>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
	<a class="navbar-brand" href="{{url('/')}}">Regresar</a>
</div>
</nav>
	<div class="container-login100" style="background-image: url('login/images/sx.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30" >
			<form class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Crea tu cuenta
				</span>

				<div class="wrap-input100 validate-input m-b-20" >
					<input class="input100" type="text" name="username" placeholder="Nombre">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" >
					<input class="input100" type="text" name="app" placeholder="Apellido paterno">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" >
					<input class="input100" type="text" name="apm" placeholder="Apellido Materno">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" >
					<input class="input100" type="email" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" >
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" >
					<input class="input100" type="password" name="conpassword" placeholder="Confirma password">
					<span class="focus-input100"></span>
				</div>



				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Registrarse
					</button>
				</div>
				<br><br>
				<div class="text-center">
					<a href="{{url('/logueo')}}" class="txt2 hov1">
						Inciar Sesión
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>