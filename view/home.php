<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="./public/assets/css/index.css" />
	<title>Document</title>
	<script src="https://kit.fontawesome.com/65211b898e.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
</head>

<body>
	<header>
		<div class="header">

			<div class="center">
				<a href="home">
					<p>Accueil</p>
				</a>
				<a href="auth?action=login">
					<p>Connexion</p>
				</a>
				<a href="contact?action=visit">
					<p>Contact</p>
				</a>
			</div>
		</div>
	</header>
	<section class="banner">
		<img class="banner_img" src="./public/assets/pictures/mountain.jpg"  srcset="./public/assets/pictures/mountain.jpg  200h" alt="photo large gratuite" />
		
		<h1>App crud php</h1>
	</section>
	<section class="transition"></section>
	<section class="terrains">
	
		<?php
		for ($i = 0; $i < count($lots); $i++) {
			echo '
		<div class="terrain">
		<div class="top">
			<img class="terrain_img" src="public/assets/pictures/lots/' . $lots[$i]['image_1'] . '" alt="photo lot" />
		</div>
		<div class="bottom">
			<p class="titre">' . $lots[$i]['name'] . '</p>
			<p class="description">' . $lots[$i]['description'] . '</p>
			<p class="prix">' . $lots[$i]['price'] . ' <span class="euro">€</span></p>
			<a href="focus?action=visit&id=' . $lots[$i]['uuid'] . '"><button class="btn noirSurBlanc">Explorer</button></a>
		</div>
	</div>
		';
		}
		?>



	</section>
	<?php
	include("footer.php");
	?>
	<script src="public/js/footer.js"></script>
	<script src="public/js/animation.js"></script>


</body>

</html>