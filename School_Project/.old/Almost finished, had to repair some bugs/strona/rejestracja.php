<?php
session_start();
$komunikaty = [];
$niezgadzasie = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){

if($_POST["zarejestruj"]){


    $ruzytkownik = [
    "nazwa" => $_POST["rnazwa"],
    "haslo" => $_POST["rhaslo"],
    "wiek" => $_POST["rwiek"],
    "email" => $_POST["remail"],
    ];

    if(!preg_match("/^[a-zA-ZęóąśłżźćńĘÓĄŚŁŻŹĆŃ]+$/",$ruzytkownik["nazwa"]))
    $komunikaty[] = "nazwa moze miec tylko litery, znaki specjalne oraz liczby odpadaja.";
    $niezgadzasie = 1;
    }
    if(strlen($ruzytkownik["haslo"] < 4)){
        $komunikaty[] = "haslo musi miec conajmniej 4 znaki";
        $niezgadzasie = 1;
    }
    if($ruzytkownik["wiek"] < 1 || $ruzytkownik["wiek"] > 100){
        $komunikaty[] = "twoj wiek jest za niski badz za wysoki";
        $niezgadzasie = 1;
    }
    if(!filter_var($ruzytkownik["email"], FILTER_VALIDATE_EMAIL)){
        $komunikaty[] = "twoj emial sie nie zgadza";
        $niezgadzasie = 1;
    }
    }
if($niezgadzasie == 0){
    json_encode($ruzytkownik);
    echo "siema";
    json_decode($ruzytkownik,true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
<label> Rejestracja </label>
<input type="text" name="rnazwa" placeholder="NAZWA">
<input type="text" name="rhaslo" placeholder="HASLO">
<input type="number" name="rwiek" placeholder="WIEK">
<input type="email" name="remail" placeholder="EMRAIL">
<input type="submit" name="zarejestruj">
</form>

<?php foreach($komunikaty as $komunikat){
if($niezgadzasie = 1){
echo "{$komunikat} <br>";   
}}
?>

</body>
</html>