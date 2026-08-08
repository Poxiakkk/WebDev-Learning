<?php
session_start();

$json = file_get_contents(__DIR__ . "/../../data/users.json");

if($json === false){
    header("Location: ../../index.php?strona=logowanie&error=1");
    exit;
}

$users = json_decode($json, true);

foreach($users as $user){

    if(
        $_POST["lnazwa"] == $user["nazwa"] &&
        password_verify($_POST["lhaslo"], $user["haslo"])
    ){
        $_SESSION["login"] = true;
        $_SESSION["nazwa"] = $user["nazwa"];

        header("Location: ../../index.php?strona=home");
        exit;
    }
}

// jesli ni ma usera
header("Location: ../../index.php?strona=logowanie&error=1");
exit;