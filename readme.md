# Application monolithique php MVC

## Site de location de terrains

 <img style="width: 100px;" src="public/assets/pictures/ex/home.png" alt="home">  <img style="width: 100px;" src="public/assets/pictures/ex/focus.png" alt="home">   <img style="width: 100px;" src="public/assets/pictures/ex/signup.png" alt="home">    <img style="width: 100px;" src="public/assets/pictures/ex/contact.png" alt="home">     <img style="width: 100px;" src="public/assets/pictures/ex/homeAdmin.png" alt="home">      <img style="width: 100px;" src="public/assets/pictures/ex/focusAdmin.png" alt="home">




## Technos :

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

## Description:

Application php monolithique en MVC

### Modifications:
Changer l'email dans controllers/focus( La logique server n'a pas été configuré pour l'utilisation en localhost)<br/>
Changer le code sercret dans controllers/auth<br/>
Changer les identifiants dans models/utils<br/>
Créer un dossier vendor à la racine<br/>
Créer un dossier lots dans public/assets/pictures<br/>

### configuration de la BDD
type: innoDB<br/><br/>

Table lot:<br/>
uuid varchar(250) primary key<br/>
name varchar(250)<br/>
description text<br/>
price int<br/>
surface int<br/>
surface_plancher int<br/>
image_1 à image_6 varchar(250)<br/><br/>

Table user:<br/>
uuid varchar(250) primary key<br/>
name varchar(250)<br/>
email varchar(250)<br/>
password text<br/>


### Installer php et composer 

### Installer les dépendances avec composer
`composer install`
