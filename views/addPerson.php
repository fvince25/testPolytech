

<?php $title = 'Inscription personne'; ?>

<?php ob_start(); ?>

<div class="main-block">
    <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Inscription personne</h1>

    </div>
    <form action="?action=add_person_submit&token=<?= $_GET['token']?>" method="post">
        <div class="title">
            <h2>Inscription</h2>
        </div>
        <div class="info">
            <input class="fname" type="text" name="firstName" placeholder="Prénom"  required>
            <input class="fname" type="text" name="lastName" placeholder="Nom" required>

            <select name="country_id" required>
                <option value="">selectionner un pays *</option>
                <?php foreach ($countries as $country): ?>
                <option value="<?= $country->getId() ?>"><?= $country->getName() ?></option>
               <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
