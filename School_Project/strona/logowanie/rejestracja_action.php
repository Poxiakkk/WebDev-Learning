<?php
session_start();

$komunikaty = [];
$ok = true;

$user = [
    "nazwa" => $_POST["rnazwa"],
    "haslo" => $_POST["rhaslo"],
    "wiek" => $_POST["rwiek"],
    "email" => $_POST["remail"],
];

// SPRAWDZA
if(!preg_match("/^[a-zA-ZęóąśłżźćńĘÓĄŚŁŻŹĆŃ]+$/", $user["nazwa"])){
    $ok = false;
    $komunikaty[] = "Błędna nazwa";
}

if(strlen($user["haslo"]) < 4){
    $ok = false;
    $komunikaty[] = "Hasło za krótkie";
}

if($user["wiek"] < 1 || $user["wiek"] > 100){
    $ok = false;
    $komunikaty[] = "Zły wiek";
}

if(!filter_var($user["email"], FILTER_VALIDATE_EMAIL)){
    $ok = false;
    $komunikaty[] = "Zły email";
}

if(!$ok){
    header("Location: ../../index.php?strona=rejestracja&error=" . urlencode(implode(", ", $komunikaty)));
    exit;
}

// ZAPISUJE
$file = __DIR__ . "/../../data/users.json";

$data = file_exists($file)
    ? json_decode(file_get_contents($file), true)
    : [];

$user["haslo"] = password_hash($user["haslo"], PASSWORD_DEFAULT);

$data[] = $user;

file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header("Location: ../../index.php?strona=logowanie");
exit;