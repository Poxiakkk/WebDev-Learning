<?php 
session_start();


if(!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}

$strona = $_GET['strona'] ?? 'home';

if($strona === 'wyloguj') {

    $_SESSION = [];
    session_destroy();

    header("Location: index.php?strona=home");
    exit;
}

$pages = [
    'home' => 'strona/home.php',
    'wsparcie' => 'strona/wsparcie.php',
    'kontakt' => 'strona/kontakt.php',
    'film' => 'strona/film.php',
    'logowanie' => 'strona/logowanie/logowanie.php',
    'rejestracja' => 'strona/logowanie/rejestracja.php',
    '404' => 'strona/404.php',
];

$chronione = ['film'];

if($_SESSION['login'] !== true && in_array($strona, $chronione)) {
    header("Location: ?strona=logowanie");
    exit;
}

$file = $pages[$strona] ?? $pages['404'];

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <title>Strona Główna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'strona/paski/headline.php'; ?>

<main>
<div class="strona">

<?php include $file; ?>

</div>
</main>

<?php include 'strona/paski/footer.php'; ?>

</body>
</html>
