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

	if ($_POST) {
		// Persistimos el email con lo vino por $_POST
		$email = trim($_POST['email']);

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
				<p>
					<!--<label for="email">Email:</label> -->
					<input id="email" type="email" name="email" value="" placeholder="Ingrese su email">
				</p>
				<p>
					<!--<label for="usuario">Usuario:</label> -->
					<input id="usuario" type="text" name="Usuario" value="" placeholder="Ingrese su usuario">
				</p>
				<p>
					<!--<label for="pass">Contraseña:</label> -->
					<input id="password" type="password" name="password" value=""placeholder="Ingrese su contraseña">
				</p>
				<p>
					<label for="recordarme"></label>
					<input type="checkbox" name="recordarme" value="s" checked > Recordarme
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
