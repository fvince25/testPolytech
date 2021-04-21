

<?php $title = 'Modification personne';
?>

<?php ob_start(); ?>

<div class="main-block">
    <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Modification</h1>

    </div>
    <form action="?action=edit_person_submit&token=<?= $_GET['token'] ?>" method="post">
        <div class="title">
            <h2>Modification</h2>
        </div>
        <div class="info">
            <input type="hidden" name="uid" value="<?= $person->getUid() ?>" />
            <input class="fname" type="text" name="firstName" placeholder="Prénom" value="<?= $person->getFirstName() ?>" required>
            <input class="fname" type="text" name="lastName" placeholder="Nom" value="<?= $person->getLastName() ?>" required>

            <select name="country_id" required>
                <option value="">selectionner un pays *</option>
                <?php foreach ($countries as $country): ?>
                <option value="<?= $country->getId() ?>" <?php if($country->getId()==$person->getCountryId()): ?>selected<?php endif; ?>
                ><?= $country->getName() ?></option>
               <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Enregistrer</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
