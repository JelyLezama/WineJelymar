<?php
include ("funciones.php");
$errores = [];
$nombreOk= "";

if ($_POST){

 $errores = validar ($_POST);
}




 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Login | Wine</title>
</head>
<body id="body-home" class="login">
	<?php
 include ("menu.php");
	?>
	<div class="container">
  		<div class="center">
		    <form action="#" class="border p-3 form" method="post">
				<h1 class="login">Login</h1>
				<hr>
				<div class="form-group text-center">
					<a  class="create" href="registro.php">Crear una Cuenta</a>
				</div>
		        <div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input class="form-control" type="text" name="user" value="" placeholder="example@example.com" value="">
						<?php if(isset($errores["user"])):?>
							<div class="input-group mb-3">
							<span class="small text-danger"><?= $errores["user"] ?></span>
						</div>
					 <?php endif; ?>
					</div>
				</div>
		    	<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="Contraseña" value="">
						<?php if(isset($errores["password"])):?>
							<div class="input-group mb-3">
							<span class="small text-danger"><?= $errores["password"] ?></span>
						</div>
					 <?php endif; ?>
					</div>
      			</div>
				<div class="form-row">
		    		<div class="form-group col-md-6">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
							<label class="form-check-label" for="defaultCheck1">Recordar mis datos</label>
			    		</div>
		  			</div>
			    	<div class="form-group col-md-6">
							<a href="#" class="forgot">Recuperar contraseña</a>
					</div>
			    </div>
			    <div class="form-group">
					<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
					</div>
				</div>
				<div class="form-group text-center">
			      	<button type="submit" class="btn btn-primary">Ingresar</button>
				</div>
		    </form>
		</div>
	</div>
	<footer class="">
		<?php
 	 include ("footer.php");
	  ?>
	  </footer>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
