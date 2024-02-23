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
				<p>Contact</p>
			</div>
		</div>
	</header>
	<section class="banner">
		<img class="banner_img" src="./public/assets/pictures/modif_i.webp" alt="photo large saint benoit" />
		<h1>LES HAUTS DE SAINT-BENOIT</h1>
	</section>
	<?php echo '<h2 class="welcome">Bienvenue ' . $_SESSION['user_name'] . '</h2>' ?>
	<form class="form_home" method="post" action="home?action=insert" enctype="multipart/form-data">
		<h2>Créer un lot</h2>
		<input type="text" name="name" placeholder="Nom" />
		<input type="number" name="price" placeholder="Prix" />
		<textArea name="description" placeholder="Description"></textArea>
		<input type="number" name="surface" placeholder="Surface en m²" />
		<input type="number" name="surface_plancher" placeholder="Surface plancher en m²" />
		<div class="label_zone">
		<label for="myImg_1"><img src="public/assets/pictures/img2.png" id="myImgOrigin_1" class="myImgOrigin" /></label><input type="file" id="myImg_1" name="image_1" />
		<label for="myImg_2"><img src="public/assets/pictures/img2.png" id="myImgOrigin_2" class="myImgOrigin" /></label><input type="file" id="myImg_2" name="image_2" />
		<label for="myImg_3"><img src="public/assets/pictures/img2.png" id="myImgOrigin_3" class="myImgOrigin" /></label><input type="file" id="myImg_3" name="image_3" />
		<label for="myImg_4"><img src="public/assets/pictures/img2.png" id="myImgOrigin_4" class="myImgOrigin" /></label><input type="file" id="myImg_4" name="image_4" />
		<label for="myImg_5"><img src="public/assets/pictures/img2.png" id="myImgOrigin_5" class="myImgOrigin" /></label><input type="file" id="myImg_5" name="image_5" />
		<label for="myImg_6"><img src="public/assets/pictures/img2.png" id="myImgOrigin_6" class="myImgOrigin" /></label><input type="file" id="myImg_6" name="image_6" />
        </div>

        
		<button class="btn blue" type="submit">Créer</button>
	</form>
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
			<p class="prix">' . $lots[$i]['price'] . ' €</p>
			<a href="focus?action=visit&id=' . $lots[$i]['uuid'] . '"><button class="btn blue">Explorer</button></a>
			<a href="home?action=delete&id=' . $lots[$i]['uuid'] . '"><button class="btn red">Supprimer</button></a>
			</div>
	</div>
		';
		}
		?>

	</section>
	<?php
	include("footer.php");
	?>
	<script src="./js/index.js"></script>
	<script src="public/js/home.js" ></script>
	<script src="public/js/footer.js"></script>
</body>

</html>