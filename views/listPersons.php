

<?php $title = 'Liste personnes'; ?>

<?php ob_start(); ?>
<h1 style="margin-top: 30px;">Liste des personnes</h1>

<div class="table">
    <div class="table-header">
        <div class="header__item"><a id="wins" class="filter__link filter__link--number" href="#">Prénom</a></div>
        <div class="header__item"><a id="draws" class="filter__link filter__link--number" href="#">Nom</a></div>
        <div class="header__item"><a id="losses" class="filter__link filter__link--number" href="#">Pays</a></div>
        <div class="header__item"><a id="total" class="filter__link filter__link--number" href="#">Action</a></div>
    </div>
    <div class="table-content">
        <?php foreach ($persons as $person) : ?>
        <div class="table-row">
            <div class="table-data"><?= $person->getFirstName() ?></div>
            <div class="table-data"><?= $person->getLastName() ?></div>
            <div class="table-data"><?= $person->getCountry()->getName() ?></div>
            <div class="table-data">
                <a href="?action=edit_person_form&uid=<?= $person->getUid() ?>&token=<?= $_GET['token']?>">Modifier</a>
                <a href="?action=delete_person&uid=<?= $person->getUid() ?>&token=<?= $_GET['token']?>"
                   onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cette personne ?!`)">Supprimer
                </a>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
