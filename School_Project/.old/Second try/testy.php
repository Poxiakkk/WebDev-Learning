<html>
<head>
<meta name="copyright" content="&copy;Poxiakkk">
<title>STRONA WSZYSTKICH</title>
</style>
</head>
<form method="post">
<h1>REJESTRACJA</h1>
Zarejestruj Imie  <input type="text" name="imie"> 
Zarejestruj Hasło <input type="text" name="password">
Zarejestruj Wiek <input type="text" name="Wiek">
Zarejestruj Email <input type="text" name="email">
<hr>
<h1>LOGOWANIE</h1>
Sprawdz Imie  <input type="text" name="Simie"> 
Sprawdz Hasło <input type="text" name="spassword">
Sprwadz Wiek <input type="text" name="SWiek">
Sprawdz Email <input type="text" name="Semail">

<br><input type="submit" value="Zaloguj">
<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f4;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

label {
    font-size: 18px;
    margin-bottom: 10px;
    display: block;
}
</style>
</form>
</html>
<?php
// STRONY UZYWANE: php.net | w3schools.com | stackoverflow.com
// ustawiam wszystkie zmienne ktore w pozniejszym etapie beda informowac ktora informacja jest bledna
$czyhaslo = $czynazwa = $czyemail = $czywiek = "";
$czynazwa = 1; $czyemail = 1; $czywiek = 1;
/*
password_hash = szyfrowanie hasla
password_verify = weryfikacja hasla (poprzez porownywanie zmiennej do hasha)
Funkcja potrafi:
- szyfrowac dane
- sprawdzac haslo
- porownywac input
isset = sprawdza czy dana funkcja nie posiada np pustych pol, jesli wykryje null to da odpowiedz false przez co if nie zadziala
*/ 
function haslo(&$czyhaslo){
if(empty($_POST['password']) && empty($_POST['spassword'])){
    $HASLOZASZYFROWANE = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if(password_verify($_POST['spassword'], $HASLOZASZYFROWANE)){
    echo "<script>alert('zalogowales sie!')</script>";
    $czyhaslo = 1;
   }else $czyhaslo = 0;
}}
/*
function Imie($czyimie){
}
function Email($czyemail){
}
function ($czyimie){
}
*/

haslo($czyhaslo);

if($czyhaslo == 0 || $czynazwa == 0 || $czyemail == 0 || $czywiek == 0){
if($czyhaslo == 0){
    print '<p text-align: center . style="font-size:' . htmlspecialchars('18px') . '; color: ' . htmlspecialchars('red') . ';">Haslo niepoprawne</p>';
}
if($czynazwa == 0){
    echo "nazwa jest nie poprawna";
}
if($czyemail == 0){
    echo "email jest niepoprawny";
}
if($czywiek == 0){
    echo "wiek jest niepoprawne";
}}

if($_POST['imie']== 'Krystian' && $_POST['password']=='Czajkowski'){
echo '<html>
</div>
<div class="center">
<img src="https://tinyurl.com/czjkmwpzd11">
<div>
</html>';
}
?>