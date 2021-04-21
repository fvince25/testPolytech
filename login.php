<?php

// Controle champs alimentés :

//use \Firebase\JWT\JWT;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php';

$error = true;
$error_type = '';

if (isset($_GET['message']) && $_GET['message'] === "tokenExpired") {
    $error_type = "tokenExpired";
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!isset($_POST['password']) || !$_POST['password']) {


        $error_type = "nopassword";

    } elseif (!isset($_POST['email']) || !$_POST['email']) {

        $error_type = "noemail";

    } else {

        $userController = new \App\Controller\UserController();

        $result = $userController->verifyCredentials();

        switch ($result) {

            case 'noMatchingEmail':
                $error_type = "wrongemail";
                break;
            case 'wrongPassword':
                $error_type = "wrongpassword";
                break;
            default:
                $error = false;
                $JWT = new \App\JWT\JWToken($result);
                header('Location: index.php?token=' . $JWT->getToken());
                exit;
        }
    }

} else {
    if(isset($_GET['email'])) {
        $email = $_GET['email'];
    } else {
        $email = '';
    }
    $password = '';
}

?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Connexion aux souscripteurs</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="Vincent">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>

    <div id="centerSection">
        <div style="display: flex;justify-content: space-between;align-items: center">
            <h2>Connexion</h2>
            <a href="signup.php">Inscription</a>
        </div>

        <form method="post">
            <div>
                <label for="firstName">Email</label>
                <input id="email" name="email" type="email" value="<?= $email ?>">
            </div>
            <div>
                <label for="firstName">Mot de passe</label>
                <input id="password" name="password" type="password" value="<?= $password ?>">
            </div>
            <hr>
            <div style="justify-content: flex-end;margin-top: 20px;">

                <?php if ($error) { ?>
                    <span id="error">
                        <?php switch ($error_type) {
                            case "noemail" :
                                echo "Le champs Email est absent";
                                break;
                            case "wrongemail" :
                                echo "Aucune adresse trouvée";
                                break;
                            case "nopassword" :
                                echo "Le Mot de passe est absent";
                                break;
                            case "wrongpassword" :
                                echo "Le Mot de passe est incorrect";
                                break;
                            case "tokenExpired" :
                                echo "La session a exipré";
                                break;
                        }
                        ?>
                    </span>
                <?php } ?>

                <input value="valider" type="submit">
            </div>
        </form>
    </div>

