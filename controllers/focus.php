<?php
require_once 'models/lots.php';

function focus()
{
   if (isset($_GET['action'])) {
      switch ($_GET['action']) {
         case 'visit':
            if (isset($_GET['id']) && !empty($_GET['id'])) {
               session_start();
               if (isset($_SESSION['user_uuid'])) {
                  $id = htmlspecialchars($_GET['id']);
                  $lot = getLotById($id);

                  for ($i = 0; $i < 6; $i++) {
                     $tableau_img[$i] = $lot['image_' . $i+1 . ''];
                  }


                  require_once './view/focusAdmin.php';
               } else {
                  $id = htmlspecialchars($_GET['id']);
                  $lot = getLotById($id);
                  $tableau_img[0] = $lot['image_1'];


                  if (isset($lot['image_2']) && !empty($lot['image_2'])) {
                     $tableau_img[1] = $lot['image_2'];
                  }
                  if (isset($lot['image_3']) && !empty($lot['image_3'])) {
                     $tableau_img[2] = $lot['image_3'];
                  }
                  if (isset($lot['image_4']) && !empty($lot['image_4'])) {
                     $tableau_img[3] = $lot['image_4'];
                  }
                  if (isset($lot['image_5']) && !empty($lot['image_5'])) {
                     $tableau_img[4] = $lot['image_5'];
                  }
                  if (isset($lot['image_6']) && !empty($lot['image_6'])) {
                     $tableau_img[5] = $lot['image_6'];
                  }
                  require_once './view/focus.php';
               }

            }
            break;
         case 'update':
            session_start();
            if (isset($_SESSION['user_uuid'])) {
               $id = htmlspecialchars($_POST['id']);
               $lot = getLotById($id);
               $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
               $price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : null;
               $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null;
               $surface = isset($_POST['surface']) ? htmlspecialchars($_POST['surface']) : null;
               $surface_plancher = isset($_POST['surface_plancher']) ? htmlspecialchars($_POST['surface_plancher']) : null;

               if(empty($_POST['name']) && empty($_POST['price']) && empty($_POST['description']) && empty($_POST['surface']) && empty($_POST['surface_plancher'])
                && empty($_FILES['image_1']['tmp_name']) 
                && empty($_FILES['image_2']['tmp_name'])
                && empty($_FILES['image_3']['tmp_name'])
                && empty($_FILES['image_4']['tmp_name'])
                && empty($_FILES['image_5']['tmp_name'])
                && empty($_FILES['image_6']['tmp_name'])
               
                ){
                  header("location: focus?action=visit&id=" . $id . "&error=1&message=Aucun élément à modifier");
                  exit();
               }
           

               $setValues = "";
               $params = array("uuid" => $id);

               if (isset($name) && !empty($name)) {
                  $setValues .= "name = :name,";
                  $params['name'] = $name;
               }
               if (isset($price) && !empty($price)) {
                  $setValues .= "price = :price,";
                  $params['price'] = $price;
               }
               if (isset($description) && !empty($description)) {
                  $setValues .= "description = :description,";
                  $params['description'] = $description;
               }
               if (isset($surface) && !empty($surface)) {
                  $setValues .= "surface = :surface,";
                  $params['surface'] = $surface;
               }
               if (isset($surface_plancher) && !empty($surface_plancher)) {
                  $setValues .= "surface_plancher = :surface_plancher,";
                  $params['surface_plancher'] = $surface_plancher;
               }


               if (isset($_FILES)) {
                  if (isset($_FILES['image_1']) && !empty($_FILES['image_1']['tmp_name'])) {
                     $nouveauNomImage = saveImageFile($_FILES['image_1']);
                     $setValues .= "image_1 = :image_1,";
                     $params['image_1'] = $nouveauNomImage;
                  }
               }
               if (isset($_FILES['image_2']) && !empty($_FILES['image_2']['tmp_name'])) {
                  $nouveauNomImage2 = saveImageFile($_FILES['image_2']);
                  $setValues .= "image_2 = :image_2,";
                  $params['image_2'] = $nouveauNomImage2;
               }
               if (isset($_FILES['image_3']) && !empty($_FILES['image_3']['tmp_name'])) {
                  $nouveauNomImage3 = saveImageFile($_FILES['image_3']);
                  $setValues .= "image_3 = :image_3,";
                  $params['image_3'] = $nouveauNomImage3;
               }
               if (isset($_FILES['image_4']) && !empty($_FILES['image_4']['tmp_name'])) {
                  $nouveauNomImage4 = saveImageFile($_FILES['image_4']);
                  $setValues .= "image_4 = :image_4,";
                  $params['image_4'] = $nouveauNomImage4;
               }
               if (isset($_FILES['image_5']) && !empty($_FILES['image_5']['tmp_name'])) {
                  $nouveauNomImage5 = saveImageFile($_FILES['image_5']);
                  $setValues .= "image_5 = :image_5,";
                  $params['image_5'] = $nouveauNomImage5;
               }
               if (isset($_FILES['image_6']) && !empty($_FILES['image_6']['tmp_name'])) {
                  $nouveauNomImage6 = saveImageFile($_FILES['image_6']);
                  $setValues .= "image_6 = :image_6,";
                  $params['image_6'] = $nouveauNomImage6;
               }




               $setValues = rtrim($setValues, ',');

               try {
                  updateLot($setValues, $params);
               } catch (Exception $e) {
                  throw new Exception('problème avec l\'updateLot');
               }
               header('location: focus?action=visit&id=' . $id . '');
               exit();


            } else {
               header("location: index.php");

            }
            break;


         case 'email':
            if (
               isset($_GET['id']) && !empty($_GET['id']) &&
               isset($_GET['name']) && !empty($_GET['name']) &&
               isset($_GET['prenom']) && !empty($_GET['prenom']) &&
               isset($_GET['email']) && !empty($_GET['email']) &&
               isset($_GET['message']) && !empty($_GET['message'])
            ) {

               $id = htmlspecialchars($_GET['id']);
               $lot = getLotById($id);
               $nom = htmlspecialchars($_GET['name']);
               $prenom = htmlspecialchars($_GET['prenom']);
               $email = htmlspecialchars($_GET['email']);
               $message = htmlspecialchars($_GET['message']);

               $destinataire = "monEmail@gmail.fr";
               $sujet = "Terrain des hauts de saint benoit";
               $headers = "From: monEmail@gmail.fr";
               mail($destinataire, $sujet, $message, $headers);

               header("location: focus?action=visit&id=" . $id . "&success=1&message=Email envoyé");


            } else {
               $id = htmlspecialchars($_GET['id']);
               header("location: focus?action=visit&id=" . $id . "&error=1&message=Problème lors de l'envoie de l'email");

            }
            break;

      }
   }


}