<?php

  // Incluimos el controlador del registro-login
  // De esta manera tengo el scope a la funciones que necesito
  require_once 'register-login-controller.php';

  // Si está logueda la persona la redirijo al profile
	if ( isLogged() ) {
		header('location: profile.php');
		exit;
	}

  $docTitle = "Wander - Registro";

  require_once("partials/head.php");


  // trae el listado de countries por API
    $countries = file_get_contents('http://country.io/names.json');
    $countries = json_decode($countries);

  // Creamos esta variable con Array vacío para que no de error al entrar por GET
	$errorsInRegister = [];

  // Variables para persitir
	$name = '';
	$nameUser = '';
	$email = '';
	$countryFromPost = '';

  if($_POST && isset($_POST["reg"])) {
    // Las variables de persistencia les asigno el valor que vino de $_POST
		$name = trim($_POST['name']);
		$nameUser = trim($_POST['name_user']);
		$email = trim($_POST['email']);
		$countryFromPost = $_POST['country'];

    // La función registerValidate() nos retorna el array de errores que almacenamos en esta variable
		$errorsInRegister = registerValidate();

    // Si no hay errores en el registro
		// Cuando no hay errores guardo la imagen y los datos
		// if ( count($errorsInRegister) == 0 ) {
    if ( !$errorsInRegister ) {

      // Guardo la imagen y obtengo el nombre aleatorio creado
      $imgName = saveImage();

      // Creo en $_POST una posición "avatar" para guardar el nombre de la imagen
      $_POST["avatar"] = $imgName;

      // Guardo al usuario en el archivo JSON, y me devuelve al usuario que guardó en array
			$theUser = saveUser();

      // Al momento en que se registar vamos a mantener la sesión abierta
			setcookie('userLoged', $theUser['email'], time() + 300);

			// Logueo al usuario
			login($theUser);

    }
  }

  require_once("partials/nav-bar.php");

?>

		<!-- formulario -->
    <div class="register-body">
      <div class="centeredTitle">
        <h1>Registro</h1>
      </div>
      <div class="formulario">
        <form method="post" enctype="multipart/form-data">
          <div class="form-row">
            <!--Nombre completo-->
            <div class="form-group col-md-3">
              <input type="text"
                name="name"
                class="form-control <?= isset($errorsInRegister['name']) ? 'is-invalid' : null ?>"
                placeholder="Nombre y apellido"
                value="<?= isset($_POST["name"]) ? $_POST["name"] : null ?>"
              >
              <div class="invalid-feedback">
                <?= isset($errorsInRegister['name']) ? $errorsInRegister['name'] : null; ?>
              </div>
            </div>
            <!--Nombre usuario-->
            <div class="form-group col-md-3">
              <input type="text"
                name="name_user"
                class="form-control <?= isset($errorsInRegister['name_user']) ? 'is-invalid' : null ?>"
                placeholder="Nombre de usuario"
                value="<?= isset($_POST["name_user"]) ? $_POST["name_user"] : null ?>"
              >
              <div class="invalid-feedback">
                <?= isset($errorsInRegister['name_user']) ? $errorsInRegister['name_user'] : null; ?>
              </div>
            </div>
          </div>
          <div class="form-row">
            <!--Pais de nacimiento-->
            <div class="form-group col-md-3">
              <select
                name="country"
                class="form-control <?= isset($errorsInRegister['country']) ? 'is-invalid' : null; ?>"
                >
                  <option value="">Elegí un país</option>
                  <?php foreach ($countries as $code => $country): ?>
                    <option
                      value="<?= $code ?>"
                      <?= $code == $countryFromPost ? 'selected' : null; ?>
                    >
                      <?= $country ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                <?= isset($errorsInRegister['country']) ? $errorsInRegister['country'] : null; ?>
              </div>
            </div>
            <!--Email-->
            <div class="form-group col-md-3">
              <input type="text"
               name="email"
               class="form-control <?= isset($errorsInRegister['email']) ? 'is-invalid' : null ?>"
               placeholder="E-mail"
               value="<?= $email; ?>"
              >
               <div class="invalid-feedback">
                 <?= isset($errorsInRegister['email']) ? $errorsInRegister['email'] : null; ?>
               </div>
            </div>
          </div>
          <div class="form-row">
            <!--Password-->
            <div class="form-group col-md-3">
              <input
                type="password"
                name="password"
                class="form-control <?= isset($errorsInRegister['password']) ? 'is-invalid' : null ?>"
                placeholder="Contraseña"
                >
              <div class="invalid-feedback">
                <?= isset($errorsInRegister['password']) ? $errorsInRegister['password'] : null; ?>
              </div>
            </div>
            <!--Password-->
            <div class="form-group col-md-3">
              <input
                type="password"
                name="rePassword"
                class="form-control <?= isset($errorsInRegister['rePassword']) ? 'is-invalid' : null; ?>"
                placeholder="Repetir contraseña"
              >
              <div class="invalid-feedback">
                <?= isset($errorsInRegister['rePassword']) ? $errorsInRegister['rePassword'] : null; ?>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <!--Imagen de perfil-->
              <div class="custom-file">
                <input
                  type="file"
                  name="avatar"
                  class="custom-file-input <?= isset($errorsInRegister['avatar']) ? 'is-invalid' : null; ?>"
                >
                <label class="custom-file-label">Subi tu foto de perfil...</label>
                <div class="invalid-feedback">
                  <?= isset($errorsInRegister['avatar']) ? $errorsInRegister['avatar'] : null; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="boton">
            <button type="submit" class="btn-btn-primary" name="reg">Registrarme</button>
          </div>
        </form>
      </div>
    </div>

    <!-- formulario -->

    <!-- main footer -->
    <?php
			require_once("partials/footer.php");
		?>
		<!-- /main footer -->
