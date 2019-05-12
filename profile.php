<?php
	$docTitle = "Wander - Mi perfil";
	
	require_once("partials/head.php");
?>
	<body>
		<!-- main-header -->
		<?php
			require_once("partials/nav-bar.php");
		?>
		<!-- /main-header -->

		<!-- Perfil Usuario -->
		<div class="container-fluid">
			<div class="row">
				<!--columna 1-->
				<div class="col-12 col-md-8">
					<div class="profile">
						<div class="cover">
							<img src="images/coverImage.jpg" class="coverImage">
						</div>
						<div class="user">
							<div class="avatar">
								<img src="images/blank-profile-picture.png" alt="foto de Perfil" class="profilePic">
							</div>
							<div class="info">
								<h2> Pussy Cat </h2>
								<p><i class="fa fa-map-marker" aria-hidden="true"></i> ¿Dónde estás ahora? -   <i class="fa fa-globe"></i> País de Residencia</p>
								<p><i class="fa fa-flag" aria-hidden="true"></i> País de Origen  - <i class="fa fa-bolt" aria-hidden="true"></i>      Idiomas</p>
								<a href="#Editar" class="modal-link"> Editar Perfil </a>
							</div>
						</div>
					</div>
				</div>
				<!--/columna 1-->

				<!--columna 2-->

				<!--Perfil Viajero-->
				<div class="col-12 col-md-4">
					<h1 class="tituloEventos"> Perfil de Viajero</h1>
					<div class="container actividades">
						<div class="row">
							<div class="col-3 column">
								<img src="images/cities.jpg" alt="ciudades" >
								<span class= "label"> 24 <br> CIUDADES </span>
							</div>
							<div class="col-3 column">
								<img src="images/calendar.png" alt="eventos" >
								<span class= "label"> 14 <br> EVENTOS</span>
							</div>
							<div class="col-3 column">
								<img src="images/conexiones.png" alt="conexiones">
								<span class= "label"> 120 CONEXIONES</span>
							</div>
						</div>
					</div>
					<!--Intereses-->
					<div class="Interests">
						<h2> Intereses </h2>
						<a class="interest" href="#DeportesExtremos">Deportes Extremos</a>
						<a class="interest" href="#ComidaAsiatica">Comida Asiática</a>
						<a class="interest" href="#Naturaleza">Naturaleza</a>
					</div>
					<div class="rating">
						<h2> Rating</h2>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star checked fa-2x"></span>
						<span class="fa fa-star fa-2x"></span>
					</div>
				</div>
				<!--/columna 2-->	
			</div>
			<br>
			<br>
			<hr class="special-hr">
		</div>
		<!-- /Perfil Usuario -->

		<!-- Eventos -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-8">
					<h1 class="tituloEventos">Eventos</h1>
					<ul class="timeline">
					<h2>2019</h2>
						<li>
							<div class="item">
								<span> Abr </span>
								<div class="content">
									<h3>Coachella</h3>
									<p>lorem</p>
								</div>
							</div>
						</li>
						<li>
							<div class="item">
								<span> Mar </span>
								<div class="content">
									<h3>Lorem</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
								</div>
							</div>
						</li>
						<li>
							<div class="item">
								<span> Feb </span>
								<div class="content">
									<h3>Lorem</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<!--/Eventos-->
			
				<!-- Grupos-->

				<div class="col-12 col-md-4">
					<h1 class="tituloEventos"> Grupos </h1>
					<div class="row">
						<div class="col-12">
							<img class="groups-image" src="images/asian-food.jpg" alt="asian food">
							<span class="tile-label">COMIDA ASIÁTICA</span>
						</div>

						<div class="col-12">
							<img class="groups-image" src="images/parachute.jpg" alt="paracaidas">
							<span class="tile-label">Bautismo Paracaidas 2019</span>
						</div>
					</div>
				</div>
				<!--/Grupos-->

			</div>
		</div>
		
		<!-- main footer -->
		<?php
		require_once("partials/footer.php");
		?>
		<!-- /main footer -->
	</body>
</html>
