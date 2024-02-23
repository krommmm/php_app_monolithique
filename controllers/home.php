<?php
require_once 'models/lots.php';
require_once 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;

function home()
{
    session_start();
    if (isset($_GET['action'])) {

        if ($_GET['action'] === "insert") {

            if (isset($_SESSION['user_uuid'])) {

                $uuid = Uuid::uuid4();
                $uuidString = $uuid->toString();

                $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
                $price = isset($_POST['price']) ? htmlspecialchars($_POST['price']) : null;
                $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : null;
                $surface = isset($_POST['surface']) ? htmlspecialchars($_POST['surface']) : null;
                $surface_plancher = isset($_POST['surface_plancher']) ? htmlspecialchars($_POST['surface_plancher']) : null;

                $setKeys = "uuid,";
                $setValues = ":uuid,";
                $params = array("uuid" => $uuidString);

                if (isset($_FILES['image_1']) && !empty($_FILES['image_1'])) {
                    $nouveauNomImage = saveImageFile($_FILES['image_1']);
                    $setKeys .= "image_1,";
                    $setValues .= ":image_1,";
                    $params['image_1'] = $nouveauNomImage;
                } else {
                    header("location: home");
                    exit();
                }

                if (isset($_FILES['image_2']) && $_FILES['image_2']['size'] > 0) {
                    $nouveauNomImage2 = saveImageFile($_FILES['image_2']);
                    $setKeys .= "image_2,";
                    $setValues .= ":image_2,";
                    $params['image_2'] = $nouveauNomImage2;
                }
                if (isset($_FILES['image_3']) && $_FILES['image_3']['size'] > 0) {
                    $nouveauNomImage3 = saveImageFile($_FILES['image_3']);
                    $setKeys .= "image_3,";
                    $setValues .= ":image_3,";
                    $params['image_3'] = $nouveauNomImage3;
                }
                if (isset($_FILES['image_4']) && $_FILES['image_4']['size'] > 0) {
                    $nouveauNomImage4 = saveImageFile($_FILES['image_4']);
                    $setKeys .= "image_4,";
                    $setValues .= ":image_4,";
                    $params['image_4'] = $nouveauNomImage4;
                }

                if (isset($_FILES['image_5']) && $_FILES['image_5']['size'] > 0) {
                    $nouveauNomImage5 = saveImageFile($_FILES['image_5']);
                    $setKeys .= "image_5,";
                    $setValues .= ":image_5,";
                    $params['image_5'] = $nouveauNomImage5;
                }
                if (isset($_FILES['image_6']) && $_FILES['image_6']['size'] > 0) {
                    $nouveauNomImage6 = saveImageFile($_FILES['image_6']);
                    $setKeys .= "image_6,";
                    $setValues .= ":image_6,";
                    $params['image_6'] = $nouveauNomImage6;
                }


                if (isset($name) && !empty($name)) {
                    $setKeys .= "name,";
                    $setValues .= ":name,";
                    $params['name'] = $name;
                }
                if (isset($price) && !empty($price)) {
                    $setKeys .= "price,";
                    $setValues .= ":price,";
                    $params['price'] = $price;
                }
                if (isset($description) && !empty($description)) {
                    $setKeys .= "description,";
                    $setValues .= ":description,";
                    $params['description'] = $description;
                }
                if (isset($surface) && !empty($surface)) {
                    $setKeys .= "surface,";
                    $setValues .= ":surface,";
                    $params['surface'] = $surface;
                }
                if (isset($surface_plancher) && !empty($surface_plancher)) {
                    $setKeys .= "surface_plancher,";
                    $setValues .= ":surface_plancher,";
                    $params['surface_plancher'] = $surface_plancher;
                }

                $setKeys = rtrim($setKeys, ',');
                $setValues = rtrim($setValues, ',');

                insertLot($setKeys, $setValues, $params);

            } else {
                header("location: home");
            }
        } else if ($_GET['action'] === "delete") {

            if (isset($_SESSION['user_uuid'])) {
                $id = htmlspecialchars($_GET['id']);
                $lot = getLotById($id);
                if (file_exists('./public/assets/pictures/lots/' . $lot['image_1']) && is_file('./public/assets/pictures/lots/' . $lot['image_1'])) {
                    unlink('./public/assets/pictures/lots/' . $lot['image_1']);
                }
                if (file_exists('./public/assets/pictures/lots/' . $lot['image_2']) && is_file('./public/assets/pictures/lots/' . $lot['image_2'])) {
                    unlink('./public/assets/pictures/lots/' . $lot['image_2']);
                }
                if (file_exists('./public/assets/pictures/lots/' . $lot['image_3']) && is_file('./public/assets/pictures/lots/' . $lot['image_3'])) {
                    unlink('./public/assets/pictures/lots/' . $lot['image_3']);
                }
                if (file_exists('./public/assets/pictures/lots/' . $lot['image_4']) && is_file('./public/assets/pictures/lots/' . $lot['image_4'])) {
                    unlink('./public/assets/pictures/lots/' . $lot['image_4']);
                }
                if (file_exists('./public/assets/pictures/lots/' . $lot['image_5']) && is_file('./public/assets/pictures/lots/' . $lot['image_5'])) {
                    unlink('./public/assets/pictures/lots/' . $lot['image_5']);
                }
                if (file_exists('./public/assets/pictures/lots/' . $lot['image_6']) && is_file('./public/assets/pictures/lots/' . $lot['image_6'])) {
                    unlink('./public/assets/pictures/lots/' . $lot['image_6']);
                }
        
                deleteLot($id);
                header("location: home");
            } else {
                header("location: home");
            }
        }
    }




    if (isset($_SESSION['user_uuid'])) {
        $name = $_SESSION['user_name'];
        $lots = getLots();
        require_once './view/homeAdmin.php'; // ici mettre admin
    } else {
        $lots = getLots();
        require_once './view/home.php';
    }

}