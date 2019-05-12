<?php
  $docTitle = "Wander - Registro";

  require_once("partials/head.php");
 ?>

		<?php
			require_once("partials/nav-bar.php");
		?>

  <?php
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
   ?>

		<!-- formulario -->
    <div class="register-body">
      <div class="titulo">
        <h1>Registro</h1>
      </div>
      <div class="formulario">
        <form>
          <div class="form-row">
            <div class="form-group col-md-3">
            <!--<label >Nombre completo</label>-->
              <input type="text" class="form-control" placeholder="Nombre y apellido">
            </div>
            <div class="form-group col-md-3">
            <!--<label >Nombre usuario</label>-->
              <input type="text" class="form-control" placeholder="Nombre de usuario">
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
              <input type="email" class="form-control" id="inputEmail4" placeholder="E-mail">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
            <!--<label for="inputPassword4">Password</label>-->
            <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
          </div>
            <div class="form-group col-md-3">
            <!--<label for="inputPassword4">Password</label>-->
            <input type="password" class="form-control" id="inputPassword4" placeholder="Confirme contraseña">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3">
              <!--<label>Imagen de perfil</label>-->
              <div class="custom-file">
                <input
                  type="file"
                  name="avatar"
                  class="custom-file-input <?= isset($errorsInRegister['avatar']) ? 'is-invalid' : null; ?>"
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

  </body>
</html>
