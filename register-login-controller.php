<?php

// Definimos las constantes que necesitamos en nuestro proyecto, de esta manera puedo usar las mismas dentro de las funciones sin tener que usar una variable global o pasarla por parámetro
define('ALLOWED_IMAGE_FORMATS', ['jpg', 'jpeg', 'png', 'gif']);
define('IMAGE_PATH', dirname(__FILE__) . '/data/avatars/');
define('USERS_JSON_PATH', dirname(__FILE__) . '/data/users.json');


// Función para validar el Registro
/*
  No le pasamos parámetros pues usamos las variables super globales $_POST y $FILES
*/
function registerValidate(){
  // Defino el array local de errores que voy a retornar
  $errors = [];

  // Definimos las variables locales que almacenan lo que nos llegó por $_POST y $_FILES
  $name = trim($_POST['name']);
  $nameUser = trim($_POST['name-user']);
  $country = $_POST['country'];
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $rePassword = trim($_POST['rePassword']);
  $avatar = $_FILES['avatar'];

  // Si está vació el campo: $name
  if ( empty($name) ) {
    $errors['name'] = 'El nombre y apellido es obligatorio';
  }

  // Si está vació el campo: $nameUser
  if ( empty($nameUser) ) {
    $errors['name-user'] = 'El nombre de usuario es obligatorio';
  }

  // Si está vació el campo: $country
  if ( empty($country) ) {
    $errors['country'] = 'Elegí un país';
  }

  // Si está vació el campo: $email
  if ( empty($email) ) {
    $errors['email'] = 'El e-mail es obligatorio';
  } elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) { // Si el campo $email NO es un formato de email válido
    $errors['email'] = 'Introducí un formato de e-mail válido';
  }// elseif ( emailExist($email) ) { // Si el email ya existe, es porque alguien ya se registró con el mismo
  //  $errors['email'] = 'Ese correo ya está registrado';
//  }

  // Si está vació el campo: $password
  if ( empty($password) ) {
    $errors['password'] = 'La contraseña es obligatoria';
  }

  // Si está vació el campo: $rePassword
  if ( empty($rePassword) ) {
    $errors['rePassword'] = 'Repetir contraseña es obligatorio';
  } elseif ($password != $rePassword) { // Si el valor de los campos $password y $rePassword son distintos
    $errors['password'] = 'Las contraseñas no coinciden';
    $errors['rePassword'] = 'Las contraseñas no coinciden';
  }

  // Si no cargaron ningún archivo
  if ( $avatar['error'] != UPLOAD_ERR_OK ) {
    $errors['avatar'] = 'Subí una imagen';
  } else {
    // Si cargaron algún archivo, obtengo su extensión
    $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);

    // Si la extesión del archivo que cargaron NO está en mi array de formatos permitidos
    if ( !in_array($ext, ALLOWED_IMAGE_FORMATS) ) {
      $errors['avatar'] = 'Los formatos permitidos son JPG, PNG y GIF';
    }
  }

  // Finalmente retornamos el array de errores
  return $errors;
}
// Función para guardar la imagen
/*
  No le pasamos parámetros, pues $_FILES es una variable global
*/
function saveImage() {
  // Obtengo la extensión del archivo
  $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

  // Obtengo el archivo temporal
  $tempFile = $_FILES['avatar']['tmp_name'];

  // Armo el nombre de la imagen
  $finalName = uniqid('img_') . '.' . $ext;

  // Destino final (NO OLVIDAR DAR LOS PERMISOS A LA CARPETA EN NUESTRO D.D.)
  $finalPath = IMAGE_PATH . $finalName;

  // Guardamos la imagen en nuestra carpeta
  move_uploaded_file($tempFile, $finalPath);

  // Retorno el nombre de la imagen para poder guardar el mismo en el JSON
  return $finalName;
}

// Función para hacer debug
/*
  Esta función es solamente para debugear nuestro código cada vez que lo necesitemos
  Recibe como parámetro el dato que quiero debugear y lo muestra de manera legible gracias a la etiqueta <pre>
  Finaliza con un exit para que no se siga ejecutando el código

function debug($dato) {
  echo "<pre>";
  var_dump($dato);
  echo "</pre>";
  exit;
}*/


 ?>
