<?php
	// Incluimos el controlador del registro-login
	// De esta manera tengo el scope a la funciones que necesito
	require_once 'register-login-controller.php';

	// PREGUNTAR POR QUE GENERA LOOP
	// // Si está logueda la persona la redirijo al profile
	// if ( isLogged() ) {
	// 	header('location: profile.php');
	// 	exit;
	// }


	// Generamos nuestro array de errores interno
	$errorsInLogin = [];

	// Persistimos el email
	$email = '';
	$nameUser = '';

	if ($_POST) {
		// Persistimos el email con lo vino por $_POST
		$email = trim($_POST['email']);
		$nameUser = trim($_POST['name-user']);

		// La función loginValidate() nos retorna el array de errores que almacenamos en esta variable
		$errorsInLogin = loginValidate();

		if ( !$errorsInLogin ) {
			// Traemos al usuario que vamos a loguear
			$userToLogin = getUserByEmail($email);

			// Preguntamos si quiere ser recordado
			if ( isset($_POST['rememberUser']) ) {
				setcookie('userLoged', $email, time() + 3000);
			}

			// Logeamos al usuario
			login($userToLogin);
		}
	}

?>



<!-- The Modal -->
<div id="myModal" class="modal">
	<div class="modal-content">
		<span class="close">&times;</span>
<!-- formulario-->
		<div class="titulo">
		<h1>Iniciar sesion</h1>
		</div>
		<div class="titulo">
			<form class="" method="post">
			<!--Email: -->
				<div class="form-group">
					<input
						type="text"
						name="email"
						class="<?= isset($errorsInLogin['email']) ? 'form-control is-invalid' : null ?>"
						value="<?= $email; ?>"
						placeholder="Ingrese su email"
					>
					<div class="invalid-feedback">
						<?= isset($errorsInLogin['email']) ? $errorsInLogin['email'] : null; ?>
					</div>
				</div>
				<!--Usuario-->
				<div class="form-group">
					<input
					 type="text"
					 name="name-user"
					 class="<?= isset($errorsInLogin['name-user']) ? 'form-control is-invalid' : null ?>"
					 value="<?= $nameUser; ?>"
					 placeholder="Ingrese su usuario"
					>
					<div class="invalid-feedback">
						<?= isset($errorsInLogin['name-user']) ? $errorsInLogin['name-user'] : null; ?>
					</div>
				</div>
				<div>
					<!--Contraseña-->
					<input
					 	type="password"
						name="password"
						class="<?= isset($errorsInLogin['password']) ? 'form-control is-invalid' : null ?>"
						placeholder="Ingrese su contraseña"
					>
					<div class="invalid-feedback">
						<?= isset($errorsInLogin['password']) ? $errorsInLogin['password'] : null; ?>
					</div>

				</div>
				<p>
					<label for="recordarme"></label>
					<input type="checkbox" name="rememberUser">
					Recordarme
				</p>
				<p>
					<input class="submit-button" type="submit" name="" value="Ingresar">
				</p>
				<p>
					<a class="modal-link" href="#">Olvide mi usuario</a>
					<br>
					<a class="modal-link" href="#">Olvide mi contraseña</a>
					</p>
			</form>
		</div>
	</div>
</div>
<!-- formulario -->

<!-- The Modal -->

<!-- JS del modal-->
<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("login-button");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal
btn.onclick = function() {
modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>
<!-- JS del modal -->
