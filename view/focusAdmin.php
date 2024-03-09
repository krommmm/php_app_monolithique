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
					<p>Accueil

					</p>

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

	<section class="focus">
		<div class="focus_container admin_focus_container">

			<div class="left admin">
				<div class="top">
					<div class="diapo">
						<div class="slide_container">
							<?php
							for ($i = 0; $i < 6; $i++) {
								if (isset($tableau_img[$i]) && !empty($tableau_img[$i])) {
									echo '
								<div class="slide">
								<img src="public/assets/pictures/lots/' . $tableau_img[$i] . '" alt="" />
								</div>';
								}
							}
							?>
						</div>
						<i class="carret fa-solid fa-angles-left"></i>
						<i class="carret fa-solid fa-angles-right"></i>
					</div>
				</div>

				<div class="bottom">

					<?php echo 
						'
						<form class="form_focus" method="POST" action="focus?action=update" enctype="multipart/form-data">
						<div class="bordure admin_border">
						<input type="hidden" name="id" value="' . $lot['uuid'] . '" />
					 	<p>' . $lot['name'] . '</p> <input type="text" name="name" placeholder="Titre" />
					 	<p class="prix">' . $lot['price'] . ' €</p> <input type="number" name="price" placeholder="Prix" />
					 </div>
					<p class="focus_admin_text">' . $lot['description'] . '</p> <input type="text" name="description" placeholder="Description" />
					<p>Surface : ' . $lot['surface'] . ' m²</p> <input type="number" name="surface" placeholder="Surface en m²" />
					<p>Surface plancher : ' . $lot['surface_plancher'] . ' m²</p> <input type="number" name="surface_plancher" placeholder="Surface plancher en m²" />
					<div class="espace"></div>
					<div class="label_zone">
					<div class="wrap_modif_img"><label for="myImgFocus_1"><img  class="focus_modif_img_our" id="focus_modif_img_1" src="public/assets/pictures/lots/' . $lot['image_1'] . '" alt="" /></label>  <input type="file" id="myImgFocus_1" name="image_1" /></div>
					<div class="wrap_modif_img"><label for="myImgFocus_2"><img  class="focus_modif_img_our" id="focus_modif_img_2" src="public/assets/pictures/lots/' . $lot['image_2'] . '" alt="" /></label>  <input type="file" id="myImgFocus_2" name="image_2" /></div>
					<div class="wrap_modif_img"><label for="myImgFocus_3"><img  class="focus_modif_img_our" id="focus_modif_img_3" src="public/assets/pictures/lots/' . $lot['image_3'] . '" alt="" /></label>  <input type="file" id="myImgFocus_3" name="image_3" /></div>
					<div class="wrap_modif_img"><label for="myImgFocus_4"><img  class="focus_modif_img_our" id="focus_modif_img_4" src="public/assets/pictures/lots/' . $lot['image_4'] . '" alt="" /></label>  <input type="file" id="myImgFocus_4" name="image_4" /></div>
					<div class="wrap_modif_img"><label for="myImgFocus_5"><img  class="focus_modif_img_our" id="focus_modif_img_5" src="public/assets/pictures/lots/' . $lot['image_5'] . '" alt="" /></label>  <input type="file" id="myImgFocus_5" name="image_5" /></div>
					<div class="wrap_modif_img"><label for="myImgFocus_6"><img  class="focus_modif_img_our" id="focus_modif_img_6" src="public/assets/pictures/lots/' . $lot['image_6'] . '" alt="" /></label>  <input type="file" id="myImgFocus_6" name="image_6" /></div>
							</div>
					
					
					
					
					
					<button type="submit" class="btn blue margin20">Modifier</button>
					</form> 
					';
					?>
				</div>
			</div>



		</div>
		</div>

	</section>
	<?php
	include("footer.php");
	?>
	<script src="public/js/focus.js"></script>
	<script src="public/js/footer.js"></script>
</body>

</html>