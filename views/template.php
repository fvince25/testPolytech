<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700");

        *, *:before, *:after {
            box-sizing: border-box;
        }

        body {
            padding: 24px;
            font-family: "Source Sans Pro", sans-serif;
            margin: 0;
        }

        h1, h2, h3, h4, h5, h6 {
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin-right: auto;
            margin-left: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .table {
            width: 100%;
            border: 1px solid #EEEEEE;
        }

        .table-header {
            display: flex;
            width: 100%;
            background: #000;
            padding: 18px 0;
        }

        .table-row {
            display: flex;
            width: 100%;
            padding: 18px 0;
        }

        .table-row:nth-of-type(odd) {
            background: #EEEEEE;
        }

        .table-data, .header__item {
            flex: 1 1 20%;
            text-align: center;
        }

        .header__item {
            text-transform: uppercase;
        }

        .filter__link {
            color: white;
            text-decoration: none;
            position: relative;
            display: inline-block;
            padding-left: 24px;
            padding-right: 24px;
        }

        .filter__link::after {
            content: "";
            position: absolute;
            right: -18px;
            color: white;
            font-size: 12px;
            top: 50%;
            transform: translateY(-50%);
        }

        .filter__link.desc::after {
            content: "(desc)";
        }

        .filter__link.asc::after {
            content: "(asc)";
        }

        html, body {
            min-height: 100%;
        }

        body, div, form, input, select, p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
        }

        h1, h2 {
            text-transform: uppercase;
            font-weight: 400;
        }

        h2 {
            margin: 0 0 0 8px;
        }

        .main-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 25px;
            background: rgba(0, 0, 0, 0.5);
        }

        .left-part, form {
            padding: 25px;
        }

        .left-part {
            text-align: center;
        }

        .fa-graduation-cap {
            font-size: 72px;
        }

        form {
            background: #fff
        }

        .title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info {
            display: flex;
            flex-direction: column;
        }

        input, select {
            padding: 5px;
            margin-bottom: 30px;
            background: transparent;
            border: none;
            border-bottom: 1px solid #eee;
        }

        input::placeholder {
            color: gray;
        }

        option:focus {
            border: none;
        }

        .checkbox input {
            margin: 0 10px 0 0;
            vertical-align: middle;
        }

        .checkbox a {
            color: #26a9e0;
        }

        .checkbox a:hover {
            color: #85d6de;
        }

        .btn-item, button {
            padding: 10px 5px;
            margin-top: 20px;
            border-radius: 5px;
            border: none;
            background: #26a9e0;
            text-decoration: none;
            font-size: 15px;
            font-weight: 400;
            color: #fff;
        }

        .btn-item {
            display: inline-block;
            margin: 20px 5px 0;
        }

        button {
            width: 100%;
        }

        button:hover, .btn-item:hover {
            background: #85d6de;
        }

        @media (min-width: 568px) {
            html, body {
                height: 100%;
            }

            .main-block {
                flex-direction: row;
                height: calc(100% - 50px);
            }

            .left-part, form {
                flex: 1;
                height: auto;
            }
        }
    </style>
</head>

<body>

    <?php global $decoded; ?>

    <header>
        <div>
            <a href="?token=<?= $_GET['token'] ?>"
               style="    display: block;    text-transform: uppercase;    float: left;    margin: 13px;">Liste
                personnes
            </a>
            <a href="?action=add_person_form&token=<?= $_GET['token'] ?>"
               style="    display: block;    text-transform: uppercase;    float: left;    margin: 13px;">Inscription
                personne
            </a>
            <a href="?action=add_country_form&token=<?= $_GET['token'] ?>"
               style="    display: block;    text-transform: uppercase;    float: left;    margin: 13px;">Ajout de pays
            </a>

        </div>
        <div style="display: flex;align-items: center">
            <span><?= $decoded->firstName . ' ' . $decoded->lastName ?></span>
            <a href="login.php?email=<?= $decoded->email ?>"
               style="    display: block;    text-transform: uppercase;    float: left;    margin: 13px;">Déconnexion
            </a>
        </div>
    </header>

    <?= $content ?>
</body>
</html>

