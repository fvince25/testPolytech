

<?php $title = 'Ajout pays'; ?>

<?php ob_start(); ?>

<div class="main-block">
    <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Ajout de pays</h1>

    </div>
    <form action="?action=add_country_submit&token=<?= $_GET['token']?>" method="post">
        <div class="title">
            <h2>Nouveau Pays</h2>
        </div>
        <div class="info">
            <input class="fname" type="text" name="name" placeholder="Country"  required>
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
