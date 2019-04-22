<?php

function validar ($datos){
/*  $errores = [];
  $trimeados = [];

  foreach ($datos as $key => $valor){
    $trimeados [$key] = trim ($valor);
  }
  if (empty ($trimeados ["nombre"])){
    $errores ["nombre"] = "el campo no puede estar vacío";
  } else if (!strpos ($trimeados["nombre"], " ") ){
    $errores ["nombre"] = "el campo debe tener nombre y apellido";
  // else if ($trimeados ["nombre"] )//SI CONTIENE SOLO CARACTERES ALFABÉTICOS)
  } else {
    $nombreOk = $trimeados ["nombre"];
    return $nombreOk;
  }*/

  $errores = [];
  $datosEnviados = [];
  $patron = '/^[a-zA-Z, ]*$/';

  foreach ($datos as $posicion => $valor) {
    $datosEnviados[$posicion] = trim($valor);
  }

  /*-------------------- VALIDACIONES DE REGISYTRO -----------------------*/
    //Validate Nombre
    if(strlen($datosEnviados["nombre"]) == 0){
      $errores["nombre"]= "El Campo es requerido";
    }else if(!preg_match($patron, $datosEnviados["nombre"])){
      $errores["nombre"]= "El nombre sólo puede contener letras y espacios";
    }

    //Validate date
    $date = explode('/', $datosEnviados["nacimiento"]);
    $dateActual = date("d/m/Y");
    $dateCount = explode('/', $dateActual);
    if(strlen($datosEnviados["nacimiento"]) == 0){
      $errores["nacimiento"]= "El Campo es requerido";
  }else if(!checkdate($date[1], $date[0], $date[2]) || !count($date) == 3
  ||   $datosEnviados["nacimiento"] > $dateActual){
      $errores["nacimiento"]= "Fecha invalida";
  }else if(($dateCount[2]-$date[2])<18 ){
    $errores["nacimiento"]= "Fecha invalida debe ser mayor de edad";
  }

  //Validate email
  if(strlen($datosEnviados["mail"]) == 0){
    $errores["mail"]= "El Campo es requerido";
  }else if(filter_var($datosEnviados["mail"], FILTER_VALIDATE_EMAIL)  == false){
    $errores["mail"]= "Formato de correo invalido";

  }

  //Validate password
  if(strlen($datosEnviados["pass"]) == 0){
    $errores["pass"]= "El Campo es requerido";
  }

  //Validate password confirmation
  if(strlen($datosEnviados["confirmpass"]) == 0){
    $errores["confirmpass"]= "El Campo es requerido";
  }else if($datosEnviados["pass"] !== $datosEnviados["confirmpass"]){
    $errores["confirmpass"]= "Las contraseñas no coinciden";

  }

/*-------------------- VALIDACIONES DE Login -----------------------*/
//Usuario
if(strlen($datosEnviados["user"]) == 0){
  $errores["user"]= "El Campo es requerido";
}else if(filter_var($datosEnviados["user"], FILTER_VALIDATE_EMAIL)  == false){
  $errores["user"]= "Formato de correo invalido";
}
  //Password
if(strlen($datosEnviados["password"]) == 0){
  $errores["password"]= "El Campo es requerido";
}
  return $errores;

}

function nextId(){
  //Que pasa si no existe db.json
  if(!file_exists("db.json")){
    $json = "";
  } else {
    $json= file_get_contents("db.json");
  }

  //Que pasa si devuelve una cadena vacía
  if($json === ""){
    return $lastID = 1;
  }
  $usuariosArray = json_decode($json, true);

  $lastUser = array_pop($usuariosArray["usuarios"]);
  $lastId = $lastUser["id"];
  return $lastId + 1;
}

function armarUsuario(){
  return [
    "id"=>nextId(), //El resultado de la función nextId()
    "nombre"=>trim($_POST["nombre"]),
    "nacimiento"=>trim($_POST["nacimiento"]),
    "mail"=>trim($_POST["mail"]),
    "ofertas"=>trim($_POST["ofertas"]),
    "password"=>password_hash($_POST["pass"], PASSWORD_DEFAULT)
  ];
}

function guardarUsuario($user){
  $json = file_get_contents("db.json");
  $array = json_decode($json, true);

  $array["usuarios"][] = $user;
  $array = json_encode($array, JSON_PRETTY_PRINT);

  file_put_contents("db.json", $array);

}
