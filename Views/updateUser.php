<?php
require_once ROOT . '/Views/header.php';
require_once ROOT . '/Views/nav.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <form name="form" method="POST" action="updateUser.php?id=<?= $user->id ?>" enctype="multipart/form-data">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Mail</th>
                            <th>Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                     <tr>
                                <td><?= $user->id ?></td>
                                <td><input type="text" class="form-control" title="<?= $user->lastname ?>" value="<?= $user->lastname ?>" name="lastname" placeholder="<?= $user->lastname ?>"/>
                                    <?= showError('lastname') ?></td>
                                <td><input type="text" class="form-control" title="<?= $user->firstname ?>" value="<?= $user->firstname ?>" name="firstname" placeholder="<?= $user->firstname ?>"/>
                                    <?= showError('firstname') ?></td>
                                <td><input type="email" class="form-control" title="<?= $user->email ?>" value="<?= $user->email ?>" name="email" placeholder="<?= $user->email ?>"/>
                                    <?= showError('email') ?></td>
                                <td><button type="submit" class="btn btn-primary" value="valider" name="submit">Valider</button></td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<?php require_once ROOT . '/Views/footer.php'; ?>
