<?php
  $docTitle = "Wander - Registro";

  require_once("partials/head.php");
 ?>

  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
  </head>
	<body>
		<!-- main-header -->
		<?php
			require_once("partials/nav-bar.php");
		?>
		<!-- /main-header -->

		<!-- formulario -->
    <div class="register-body">
      <div class="titulo">
        <h1>Registro</h1>
      </div>
      <div class="formulario">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
            <!--<label >Nombre</label>-->
              <input type="text" class="form-control" placeholder="Nombre y apellido">
            </div>
            <div class="form-group col-md-6">
            <!--<label for="inputEmail4">Email</label>-->
              <input type="email" class="form-control" id="inputEmail4" placeholder="E-mail">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
            <!--<label for="inputPassword4">Password</label>-->
            <input type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
          </div>
            <div class="form-group col-md-6">
            <!--<label for="inputPassword4">Password</label>-->
            <input type="password" class="form-control" id="inputPassword4" placeholder="Confirme contraseña">
            </div>
          </div>
          <div class="final-form">
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                Recordarme
              </label>
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
