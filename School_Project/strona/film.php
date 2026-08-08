<?php
$films = json_decode(file_get_contents(__DIR__ . "/../data/filmy.json"), true);

$id = $_GET['id'] ?? null;

$film = null;

foreach($films as $f){
    if ($f['id'] == $id) {
        $film = $f;
        break;
    }
}

if(!$film) {
    die("film nie istnieje");
}

$recommended = array_filter($films, function($f) use ($id) {
    return $f['id'] != $id;
});
?>
<div class="film-layout">

<div class="film-main">
<video width="100%" controls>
    <source src="/assets/videos/<?= $film['video'] ?>"  type="video/mp4">
</video>
<h2><?= $film['title'] ?></h2>
<p><?= $film['desc'] ?></p>
<p class="film-author">
    Author: <?= $film['author'] ?? 'Nieznany' ?>
</p>
</div>

<div class="film-sidebar">
    <h3>Polecane</h3>

    <?php foreach($recommended as $r): ?>
        <a class="rec-film" href="?strona=film&id=<?= $r['id'] ?>">
            <img src="/assets/thumb/<?= $r['thumb'] ?>">
            <div>
                <b><?= $r['title'] ?></b>
    </div>
    </a>
    <?php endforeach; ?>
</div>
</div>
