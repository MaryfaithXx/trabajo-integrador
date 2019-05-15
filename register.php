<?php
  // Incluimos el controlador del registro-login
  // De esta manera tengo el scope a la funciones que necesito
  require_once 'register-login-controller.php';

  $docTitle = "Wander - Registro";

  require_once("partials/head.php");

  $countries = [
		'ar' => 'Argentina',
		'bo' => 'Bolivia',
		'br' => 'Brasil',
		'co' => 'Colombia',
		'cl' => 'Chile',
		'ec' => 'Ecuador',
		'pa' => 'Paraguay',
		'pe' => 'Perú',
		'uy' => 'Uruguay',
		've' => 'Venezuela',
	];

  // Creamos esta variable con Array vacío para que no de error al entrar por GET
	$errorsInRegister = [];

  // Variables para persitir
	$name = '';
  $nameUser = '';
	$email = '';
	$countryFromPost = '';

  if($_POST) {
    // Las variables de persistencia les asigno el valor que vino de $_POST
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$countryFromPost = $_POST['country'];

    // La función registerValidate() nos retorna el array de errores que almacenamos en esta variable
		$errorsInRegister = registerValidate();
    }

  //var_dump($_POST);
  // $errorsInRegister = registerValidate();

  require_once("partials/nav-bar.php");

?>

		<!-- formulario -->
    <div class="register-body">
      <div class="titulo">
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
                name="name-user"
                class="form-control <?= isset($errorsInRegister['name-user']) ? 'is-invalid' : null ?>"
                placeholder="Nombre de usuario"
                value="<?= isset($_POST["name-user"]) ? $_POST["name-user"] : null ?>"
              >
              <div class="invalid-feedback">
                <?= isset($errorsInRegister['name-user']) ? $errorsInRegister['name-user'] : null; ?>
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
                <!--<option value="ar">Argentina</option>
                <option value="bo">Bolivia</option>
                <option value="br">Brasil</option>
                <option value="co">Colombia</option>
                <option value="ch">Chile</option>
                <option value="ec">Ecuador</option>
                <option value="pe">Perú</option>
                <option value="ur">Uruguay</option>
                <option value="pa">Paraguay</option>
                <option value="ve">Venezuela</option>-->

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
              <!--<label>Imagen de perfil</label>-->
              <div class="custom-file">
                <input
                  type="file"
                  name="avatar"
                  class="custom-file-input"
                >
                <label class="custom-file-label">Subi tu foto de perfil...</label>
              </div>
            </div>
          </div>
          <div class="boton">
            <button type="submit" class="btn-btn-primary">Registrarme</button>
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
