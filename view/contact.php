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
   

    <!-- <section class="banner">
		<img class="banner_img" src="./public/assets/pictures/modif_i.webp" alt="photo large saint benoit" />
		<h1>LES HAUTS DE SAINT-BENOIT</h1>
	</section> -->
	<section class="transition"></section>
    <section class="contact">
        <div class="contact_container">
    
        <div class="contact_left">
             <iframe class="googleMap" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2744.031349688513!2d0.34184197677431866!3d46.547066660539954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fdbfb054f8b9c7%3A0x8ffe1e83cd62cdf!2s2%20Rue%20des%20Bergeottes%2C%2086280%20Saint-Beno%C3%AEt!5e0!3m2!1sfr!2sfr!4v1708982539745!5m2!1sfr!2sfr"
                width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
            <div class="contact_right">
				<div class="contact_top">
					<h2>Contactez moi </h2>
					<p class="numberPhone">06-30-53-06-27</p>
				</div>
				<div class="contact_bottom"> 

					<form class="contact_form_mail" method="get" action="focus?action=email">
						<label>Nom:</label>
						<input type="text" name="name" placeholder="Ex: Dupont" />
						<label>Prénom:</label>
						<input type="text" name="prenom" placeholder="Ex: Martin" />
						<label>Email:</label>
						<input type="text" name="email" placeholder="Ex: martinD@gmail.fr" />
						<label>Message:</label>
						<textarea name="message" placeholder="Bonjour, je suis intéressé ..."></textarea>
						<button class="btn blue_foncé margin20" type="submit">Envoyer</button>
					</form>
					<?php
					if (isset($_GET['error']) && !empty($_GET['error'])) {
						echo '<p class="error">' . $_GET['message'] . '</p>';
					}
					if (isset($_GET['success']) && !empty($_GET['success'])) {
						echo '<p class="success">' . $_GET['message'] . '</p>';
					}
					?>

				</div>
			</div>
		</div>
		</div>
                </div>
    </section>

    <?php
    include("footer.php");
    ?>
    <script src="public/js/footer.js"></script>


</body>

</html>