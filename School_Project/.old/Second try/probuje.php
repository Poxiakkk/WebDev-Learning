<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

$rej = $_POST["zarejestruj"];
$log = $_POST["zaloguj"];
$uzytkownik = [];
$komunikaty = [];

// sprawdzanie danych
$czygit = [
    "nazwa" => true,
    "email" => true,
    "haslo" => true,
    "wiek" => true,
];

// rejestacja
$imie = $_POST["imie"]; $mail = $_POST["email"]; $haslo = $_POST["haslo"]; $wiek = $_POST["wiek"];

// logowanie
$login = $_POST["slogin"]; $shaslo = $_POST["shaslo"];

// rejestrowanie
if($_POST["zarejestruj"]){

if(!preg_match("/^[a-zA-ZęóąśżźćńĘÓĄŚŻŹĆŃ]+$/", $imie)){
    $czygit["nazwa"] = false; 
    $komunikaty[] = "Imie nie poprawne, moze zawierac tylko litery";
}
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
$czygit["email"] = false;
$komunikaty[] = "mail nie poprawny";
}
if($haslo < 8){
    $czygit["haslo"] = false;
    $komunikaty[]= "Haslo musi miec conajmniej 8 znakow";
}
if($wiek < 0 && $wiek > 100){
    $czygit["wiek"] = false;
    $komunikaty[] = "Wiek nie moze byc ujemny, za wysoki oraz nie moze zawierac liter.";
}

if($czygit["nazwa"] && $czygit["email"] && $czygit["haslo"] && $czygit["wiek"]){
    $uzytkownik = [
        "login" => $mail,
        "login2" => $imie,
        "password" => $haslo,
    ];
    $komunikaty[] = "ZAREJESTROWANO POMYSLNIE";
}else{
    $komunikaty[] = "Rejestrowanie nie powiodlo sie";
}
}

// logowanie

if($_POST["zaloguj"]){

if(($uzytkownik["login"] == $login || $uzytkownik["login2"] == $login ) && $uzytkownik["password"] == $shaslo){
    $komunikaty[] = "ZALOGOWANO POMYSLNIE";
}else{
    $komunikaty[] = "Login lub Haslo nie poprawne";
}
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        display: flex;
        justify-content : center;
        background-color:#1F1D1D;
    }
    .klocek{
        color:white; 
        background-color:green;
    }
    </style>
</head>
<body>
<form method="post" id="signin" class="klocek">
    <input type="text" name="imie" placeholder="imie"><br>
    <input type="password" name="haslo" placeholder="haslo"><br>
    <input type="number" name="wiek" placeholder="wiek"><br>
    <input type="text" name="email" placeholder="emial"><br>
    <input type="submit" name="zarejestruj" value="sign in"><br>
</form>
<>
<form method="post" id="login" style="color:white;">
    <input type="text" name="slogin" placeholder="login/mail">
    <input type="password" name="shaslo" placeholder="haslo">
    <input type="submit" name="zaloguj" value="login">
</form>
<?php
foreach($komunikaty as $k){
    echo "<p>$k</p>";
}
?>
</html>