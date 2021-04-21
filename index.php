

    <?php
    use \Firebase\JWT\JWT;

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require 'vendor/autoload.php';
    require('src/Controller/PersonController.php');

    $personController = new \App\Controller\PersonController();
    $countryController = new \App\Controller\CountryController();

    global $decoded;


    // Sécurité : Controle préalable du JWT Token

    try {
        if (isset($_GET['token'])) {

            $JWT = $_GET['token'];
            $publicKey = file_get_contents('rsa/key.pub');
            $decoded = JWT::decode($JWT, $publicKey, array('RS256'));

        }
        else {
            header('Location: login.php?message=tokenExpired');
        }

    } catch (Exception $e)  {
        header('Location: login.php?message=tokenExpired');
    }



    try {
        if (isset($_GET['action'])) {

            switch ($_GET['action']) {

                // Afficher la liste des personnes
                case 'list_person' : $personController->getList(); break;

                // Afficher le formulaire d'ajout d'une personne
                case 'add_person_form' : $personController->formAddPerson(); break;

                // Afficher le formulaire d'ajout d'un pays
                case 'add_country_form' : $countryController->formAddCountry(); break;

                // Afficher le formulaire d'édition de personne
                case 'edit_person_form' : $personController->formEditPerson(); break;

                // Valider l'ajout d'une personne
                case 'add_person_submit' : $personController->add(); break;

                // Valider la modification d'une personne
                case 'edit_person_submit' : $personController->update(); break;

                // Valider la suppression d'une personne
                case 'delete_person' : $personController->delete(); break;

                // Valider l'ajout d'un pays
                case 'add_country_submit' : $countryController->add(); break;

            }

        } else {
            $personController->getList();
        }
    } catch (Exception $e) { // S'il y a eu une erreur, alors...
        echo 'Erreur : ' . $e->getMessage();
    }

    ?>

