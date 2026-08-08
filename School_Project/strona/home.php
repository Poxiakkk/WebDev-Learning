<?php
$films = json_decode(file_get_contents(__DIR__ . "/../data/filmy.json"), true);
$logged = isset($_SESSION['login']) && $_SESSION['login'] === true;
?>
<h2 style="text-align: center;"> FILMY NA CZASIE </h2>

<div class="filmy">
<?php foreach($films as $f): ?>
    <a href="?strona=film&id=<?= $f['id'] ?>" class="film">
        <img src="/assets/thumb/<?= $f['thumb'] ?>" alt="">

        <div class="film-content">
            <h3><?= $f["title"] ?></h3>
            <p><?= $f["desc"] ?></p>
        </div>

        <div class="film-author">
            Author: <?= $f["author"] ?>
        </div>
        <?php if(!$logged): ?>
            <div class="lock-overlay">
                Zaloguj sie, aby obejrzeć
            </div>
        <?php endif; ?>
    </a>
<?php endforeach; ?>
</div>