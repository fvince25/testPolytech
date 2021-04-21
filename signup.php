<?php

// Controle champs alimentés :

use \Firebase\JWT\JWT;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php';

if (isset($_POST['password']))
    $password = $_POST['password'];
else
    $password = '';

if (isset($_POST['lastName']))
    $lastName = $_POST['lastName'];
else
    $lastName = '';

if (isset($_POST['firstName']))
    $firstName = $_POST['firstName'];
else
    $firstName = '';

if (isset($_POST['email']))
    $email = $_POST['email'];
else
    $email = '';

$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['firstName']) || !$_POST['firstName']) {

        $error = true;
        $error_type = "nofirstName";
        $firstName = $_POST['firstName'];

    } elseif (!isset($_POST['lastName']) || !$_POST['lastName']) {

        $error = true;
        $error_type = "nolastName";
        $lastName = $_POST['lastName'];

    } elseif (!isset($_POST['password']) || !$_POST['password']) {

        $error = true;
        $error_type = "nopassword";
        $password = $_POST['password'];

    } elseif (!isset($_POST['email']) || !$_POST['email']) {

        $error = true;
        $email = $_POST['email'];
        $error_type = "noemail";

    } else {

        $userController = new \App\Controller\UserController();
        $userController->add();
        header('Location: login.php?email='.$_POST['email']);

    }

}

?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="Vincent">
    <link rel="stylesheet" href="assets/styles.css">
</head>

<body>

    <div id="centerSection">
        <div style="display: flex;justify-content: space-between;align-items: center;"><h2>Inscription</h2>
            <a href="login.php">Connexion</a>
        </div>


        <form method="post">
            <div>
                <label for="firstName">Prénom</label>
                <input id="firstName" name="firstName" type="text" value="<?= $firstName ?>">
            </div>
            <div>
                <label for="firstName">Nom</label>
                <input id="lastName" name="lastName" type="text" value="<?= $lastName ?>">
            </div>
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
                            case "nofirstName" : echo "Le champs Prénom est absent"; break;
                            case "nolastName" : echo "Le champs Nom est absent"; break;
                            case "noemail" : echo "Le champs Email est absent"; break;
                            case "nopassword" : echo "Le Mot de passe est absent"; break;
                        }
                        ?>
                    </span>
                <?php } ?>

                <input value="valider" type="submit">
            </div>
        </form>
    </div>
