<?php
require_once ROOT . '/Views/header.php';
require_once ROOT . '/Views/nav.php';
?>
<div class="row justify-content-center">
    <div class="col-4 scroll">
        <div class="card">
            <img class="card-img-top" src="assets/images/amiens2.jpg" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Les cours</p>
                <div id="accordion" role="tablist">
                    <?php foreach ($courselist as $courseInfo) { ?>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne<?= $courseInfo->id ?>">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne<?= $courseInfo->id ?>" aria-expanded="true" aria-controls="collapseOne<?= $courseInfo->id ?>">
                                        <?= $courseInfo->nameCours . '-' . $courseInfo->slots ?>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne<?= $courseInfo->id ?>" class="collapse show" role="tabpanel" aria-labelledby="headingOne<?= $courseInfo->id ?>">
                                <div class="card-body">
                                    <a class="btn btn-dark" type="submit" name="submit" href="?reservation=<?= $courseInfo->id ?>">reserver</a> 
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 scroll">
        <div class="card">
            <img class="card-img-top" src="assets/images/amiens3.jpg" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">Mes reservations</p>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Cours</th>
                            <th>date et heure</th>
                            <th>supprimer le cours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($viewsCourseUser as $viewsCourseInfo) { ?>
                                <th scope="row">1</th>
                                <td><?= $viewsCourseInfo->nameCours ?></td>
                                <td><?= $viewsCourseInfo->slots ?></td>
                                <td><a href ="cours.php?id="">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>
</div>
<?php
require_once ROOT . '/Views/footer.php';
