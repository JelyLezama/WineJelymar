<?php
include ("funciones.php");

$errores = [];
$nameOk = "";
$nacimientoOk="";
$passOK="";
$ofertasOk="";
$emailOk = "";

if ($_POST){
 $errores = validar ($_POST);

 $nameOk = trim($_POST["name"]);
 $nacimientoOk = trim($_POST["nacimiento"]);
 $passOK = trim($_POST["pass"]);
 $ofertasOk = trim($_POST["ofertas"]);
 $emailOk = trim($_POST["email"]);

 if(empty($errores)){
  //Si no hay $errores
    // Crear usaurio
    if(!existeElUsuario($_POST["email"])){ //Esta validación se puede pasar tambien en los errores. En ese caso hay que chequear previamente que el archivo .json exista.
    $usuario = armarUsuario();
    guardarUsuario($usuario);

  }
}
}




 ?>

<!DOCTYPE html>

<html>
<head>
	<title>Register | Wine</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body id="body-home" class="login">
  <?php
  include ("menu.php");
  ?>
	<div class="registros">
	<section class="container">
			<div class="center">
				<form action="registro.php" class="border p-3 form" method="post">
					<h1 class="login">Registro</h1>
					<div class="form-group text-center">
					<hr>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label  class="form-check-label" for="nombre">Nombre y Apellido:</label>
										<input class="form-control" id="nombre" type="text" name="nombre" value="">
                    <?php if(isset($errores["nombre"])):?>
                      <span class="small text-danger"><?= $errores["nombre"] ?></span>
                   <?php endif; ?>
                  </div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="nacimiento">Fecha de nacimiento:</label>
										<input class="form-control" type="date" name="nacimiento" placeholder="DD/MM/AAAA" value="">
                    <?php if(isset($errores["nacimiento"])):?>
                      <span class="small text-danger"><?= $errores["nacimiento"] ?></span>
                   <?php endif; ?>
                	</div >
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
						 	    <div class="input-group mb-3">
						 	    	<div class="input-group-prepend">
						 	    		<label class="form-check-label" for="pais">País:</label>
										<select class="form-control" id="pais" class="" name="pais">
											<option value="arg">Argentina</option>
											<option value="uru">Uruguay</option>
											<option value="bra">Brasil</option>
											<option value="chi">Chile</option>
											<option value="col">Colombia</option>
											<option value="ven">Venezuela</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="mail">e-mail:</label>
										<input class="form-control" id="mail" type="text" name="mail" value="">
                    <?php if(isset($errores["mail"])):?>
                      <span class="small text-danger"><?= $errores["mail"] ?></span>
                   <?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="pass">Contraseña:</label>
										<input class="form-control" id="pass" type="password" name="pass" value="">
                    <?php if(isset($errores["pass"])):?>
                      <span class="small text-danger"><?= $errores["pass"] ?></span>
                   <?php endif; ?>
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<label class="form-check-label" for="confirmpass">Confirmar contraseña:</label>
										<input class="form-control" id="confirmpass" type="password" name="confirmpass" value="" >
                    <?php if(isset($errores["confirmpass"])):?>
                      <span class="small text-danger"><?= $errores["confirmpass"] ?></span>
                   <?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
								<label class="form-check-label" for="info">¿Desea recibir nuestras ofertas mensuales?</label>
							<br>
							<div class="form-row">
								<div class="form-group col-md-6">
										<input class="form-check-input" id="" type="radio" name="ofertas" value="si" checked><label class="form-check-label"> Sí</label>
								</div>
								<div class="form-group col-md-6">
										<input class="form-check-input" id="" type="radio" name="ofertas" value="no"><label class="form-check-label"> No</label>
								</div>
							</div>
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW">
								</div>
							</div>
							<div class="form-group text-center">
								<button class="btn btn-primary" type="reset" name="limpia">limpiar</button>
								<button class="btn btn-primary" type="submit" name="crea">crear usuario</button>
							</div>
					</div>
					</div>
				</form>
			</div>
		</section>
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
