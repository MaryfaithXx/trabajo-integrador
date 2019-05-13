<?php
  // Incluimos el controlador del registro-login
  // De esta manera tengo el scope a la funciones que necesito
  require_once 'register-login-controller.php';

  $docTitle = "Wander - Registro";

  require_once("partials/head.php");

	require_once("partials/nav-bar.php");

  // Creamos esta variable con Array vacío para que no de error al entrar por GET
	$errorsInRegister = [];
  $errorsInRegister = registerValidate();
	?>

		<!-- formulario -->
    <div class="register-body">
      <div class="titulo">
        <h1>Registro</h1>
      </div>
      <div class="formulario">
        <form method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-3">
            <!--<label >Nombre completo</label>-->
              <input type="text" name="name" class="form-control" placeholder="Nombre y apellido">
            </div>
            <div class="form-group col-md-3">
            <!--<label >Nombre usuario</label>-->
              <input type="text" name="name-user" class="form-control" placeholder="Nombre de usuario">
              <div class="invalid-feedback">
                <?= isset($errorsInRegister['name']) ? $errorsInRegister['name'] : null; ?>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <select name="country" class="form-control">
                <option value="">Elegí un país</option>
                <option value="">Argentina</option>
                <option value="">Bolivia</option>
                <option value="">Brasil</option>
                <option value="">Colombia</option>
                <option value="">Chile</option>
                <option value="">Ecuador</option>
                <option value="">Perú</option>
                <option value="">Uruguay</option>
                <option value="">Paraguay</option>
                <option value="">Venezuela</option>
              </select>
            </div>
            <div class="form-group col-md-3">
            <!--<label for="inputEmail4">Email</label>-->
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="E-mail">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
            <!--<label for="inputPassword4">Password</label>-->
            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
          </div>
            <div class="form-group col-md-3">
            <!--<label for="inputPassword4">Password</label>-->
            <input type="password" name="rePassword" class="form-control" id="inputPassword4" placeholder="Confirme contraseña">
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
