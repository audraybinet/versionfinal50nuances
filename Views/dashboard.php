<?php
require_once ROOT . '/Views/header.php';
require_once ROOT . '/Views/nav.php';
?>
<div class ="row justify-content-center">
<div class ="col-4">
<div class="card">
    <h5 class="card-header">MON PROFIL</h5>
    <div class="card-body">
        <p>Nom : <?= $user->lastname ?></p>
        <p>Prénoms : <?= $user->firstname ?></p>
        <p>Mail : <?= $user->email ?></p>
        <p><a href="updateUser.php?id=<?= $user->id ?>">Modifier</a></p>
        <p><a href="delete.php?id=<?= $user->id ?>">Désactiver</a></p>
        <a class="btn btn-dark" href="cours.php" role="button">Accéder au cours</a>
    </div>
    </div>
</div>
</div>
<?php
require_once ROOT . '/Views/footer.php';
