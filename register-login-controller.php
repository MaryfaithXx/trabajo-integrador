<?php

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

  // Finalmente retornamos el array de errores
  return $errors;
}




 ?>
