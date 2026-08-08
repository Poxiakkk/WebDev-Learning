<?php
session_start();
if(!isset($_SESSION["login"])){
    $_SESSION["login"] = false;
}
if(!isset($_SESSION["intro"])) $_SESSION["intro"] = 0;
if(isset($_POST["ZALOGUJ"])){
$plik = "user.json";

if(!file_exists($plik)){
    file_put_content($plik, json_encode([]));
}

$dane = json_decode(file_get_contents($plik), true);

$wczytaj = [
    "nazwa" => $_POST["nazwa"],
    "haslo" => $_POST["haslo"],
    "kod" => $_POST["kod"],
]; 

$znaleziono = false;

foreach($dane as $user){
    if($user["login"])
}

if($wczytaj["nazwa"] === $NAZWA && $wczytaj["haslo"] == $HASLO && $wczytaj["kod"] == $KOD){
    $_SESSION["login"] = true;
    $_SESSION["user"] = $wczytaj["nazwa"];

}else{
    $_SESSION["login"] = false;
}
}
if(isset($_POST["wejdz"])) $_SESSION["intro"] = 1;
if(isset($_POST["POWROT"])) $_SESSION["intro"] = 0;

if(isset($_POST["wyloguj"])) $_SESSION["login"] = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
.przyciskon{
    background-color: green;
    cursor: pointer;
}
.przyciskoff{
    background-color: gray;
    cursor: pointer;
}

.dlaobrazow{
    background-color: brown;
    border: 5px;
    border-color: aqua;
    }
.box{
    background: #1e1e1e;
    padding: 30px;
    border-radius: 15px;
    width: 300px;
    }
.h1{
    color: white;
}
</style>
</head>
<body>
<script>
function pokazhaslo(){
var x = document.getElementById("haslo");
var z = document.getElementById("przycisk");
if(x.type === "password"){
    x.type = "text";
    z.classList.remove("przyciskoff");
    z.classList.add("przyciskon");
}else{
    x.type = "password";
    z.classList.remove("przyciskon");
    z.classList.add("przyciskoff");
}
}
</script>
<?php if($_SESSION["intro"] == 0):?>
    <div class="box">
    <h1 class="h1">WITAJ NA STRONIE INTERNETOWEJ MOJEJ!</h1>
    <img class="dlaobrazow" src="obras.gif" alt="Tu ma byc obraz bartosza lewandowskiego" width="200">
    <form method="post">
    <button type="submit" name="wejdz">Wejdz na strone</button>
    <button type="submit" name="wyloguj">Wyloguj sie</button>
</form>
    </div>
<?php endif; ?>
<?php if($_SESSION["login"] == false && $_SESSION["intro"] == 1): ?>
<h1>LOGOWANIE</h1>
<form method="post">
<input type="text" name="nazwa" placeholder="nazwa">
<input id = "haslo" type="password" name="haslo" placeholder="haslo">
<button class="przyciskoff" id ="przycisk" type="button" onclick="pokazhaslo()"> 👁️ </button>
<input type="number" name="kod" placeholder="kod 4 cyfrowy"> <br>
<input type="submit" name="ZALOGUJ" value="ZALOGUJ">
</form>
<?php elseif($_SESSION["login"] == true && $_SESSION["intro"] == 1):?>
<h1><?php echo "Witaj {$_SESSION["user"]}"?></h1>
<form method="post"> <br>
<input type="submit" name="POWROT" value="POWROT">
</form>
<?php endif; ?>
</body>
</html>