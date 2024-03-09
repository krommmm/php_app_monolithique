<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="./public/assets/css/index.css" />
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
 
    <section class="auth">
    </section>

    <div class="navigation">
        <div class="block">

        </div>
    </div>


<div class="connexion_container">
    <section class="connexion">
        <h1>Connexion</h1>
        <?php
    if (isset($_GET['error']) && !empty($_GET['error'])) {
        echo '<p class="error">' . $_GET['message'] . '</p>';
    }
    if (isset($_GET['success']) && !empty($_GET['success'])) {
        echo '<p class="error">' . $_GET['message'] . '</p>';
    }
    ?>
        <form class="form" method="post" action="auth?action=login">

            <div class="input_container">
                <div class="icon_container">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <input type="email" name="email" placeholder="email" />
            </div>

            <div class="input_container">
                <div class="icon_container">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <input type="text" name="password" placeholder="password" />
            </div>
            <button class="btn_form blue_foncé" type="submit">Envoyer</button>
        </form>
       
        <a href="auth?action=signup">
            <h2>Pas encore inscrit ?</h2>
        </a>
        <a href="auth?action=disconect"><button class="btn blancSurNoir">Deconnexion</button></a>
    </section>
</div>
    <?php
	include("footer.php");
	?>
    <script src="public/js/footer.js"></script>
</body>

</html>