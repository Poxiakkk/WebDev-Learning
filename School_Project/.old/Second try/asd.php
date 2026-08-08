<?php
// ===== ZMIENNE =====
$czyhaslo = 1;
$czynazwa = 1;
$czyemail = 1;
$czywiek = 1;

$komunikaty = [];

// ===== TABLICA (symulacja bazy) =====
$uzytkownik = [];

// ===== OBSŁUGA FORMULARZA =====
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // REJESTRACJA
    $imie = $_POST['imie'] ?? '';
    $password = $_POST['password'] ?? '';
    $wiek = $_POST['wiek'] ?? '';
    $email = $_POST['email'] ?? '';

    // LOGOWANIE
    $Simie = $_POST['Simie'] ?? '';
    $spassword = $_POST['spassword'] ?? '';

    // ===== WALIDACJA =====

    // IMIE (tylko litery)
    if(!preg_match("/[^][a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+$/", $imie)){
        $czynazwa = 0;
        $komunikaty[] = "Imię może zawierać tylko litery";
    } else {
        $komunikaty[] = "Imię poprawne";
    }

    // HASLO
    if(strlen($password) < 4){
        $czyhaslo = 0;
        $komunikaty[] = "Hasło musi mieć min 4 znaki";
    } else {
        $komunikaty[] = "Hasło poprawne";
    }

    // EMAIL
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $czyemail = 0;
        $komunikaty[] = "Email niepoprawny";
    } else {
        $komunikaty[] = "Email poprawny";
    }

    // WIEK
    if($wiek < 1 || $wiek > 120){
        $czywiek = 0;
        $komunikaty[] = "Wiek niepoprawny";
    } else {
        $komunikaty[] = "Wiek poprawny";
    }

    // ===== JESLI OK =====
    if($czyhaslo && $czynazwa && $czyemail && $czywiek){

        $uzytkownik = [
            "imie" => $imie,
            "password" => $password,
            "wiek" => $wiek,
            "email" => $email
        ];

        $komunikaty[] = "✔️ Rejestracja zakończona sukcesem";

        // LOGOWANIE
        if($Simie == $uzytkownik['imie'] &&
           $spassword == $uzytkownik['password']){

            $komunikaty[] = "Zalogowano poprawnie!";
        } elseif($Shaslo != $uzytkownik['password'] && $Simie != $uzytkownik['imie']) {
            $komunikaty[] = "Haslo i Imie sa niepoprawne";
        }elseif($Shaslo != $uzytkownik['password']){
            $komunikaty[] = "Haslo sie nie zgadza!";
        }elseif($Simie != $uzytkownik['imie']) {
            $kouminkaty[] = "nazwa sie nie zgadza!"
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Walidator</title>

<style>
body {
    font-family: Arial;
    background: #0f0f0f;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* kontener */
.box {
    background: #1e1e1e;
    padding: 30px;
    border-radius: 15px;
    width: 300px;
}

/* przyciski */
.switch {
    display: flex;
}

.switch button {
    flex: 1;
    padding: 10px;
    cursor: pointer;
    border: none;
}

/* inputy */
input {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
}

/* ukrywanie */
.hidden {
    display: none;
}

/* animacja */
.fade {
    animation: fadeIn 0.3s;
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>

<script>
function pokazRejestracje(){
    document.getElementById("rej").classList.remove("hidden");
    document.getElementById("log").classList.add("hidden");
}

function pokazLogowanie(){
    document.getElementById("log").classList.remove("hidden");
    document.getElementById("rej").classList.add("hidden");
}
</script>

</head>

<body>

<div class="box">

<div class="switch">
<button onclick="pokazRejestracje()">Rejestracja</button>
<button onclick="pokazLogowanie()">Logowanie</button>
</div>

<form method="post" id="rej" class="fade">
<h2>Rejestracja</h2>
<input type="text" name="imie" placeholder="Imię">
<input type="password" name="password" placeholder="Hasło">
<input type="number" name="wiek" placeholder="Wiek">
<input type="text" name="email" placeholder="Email">
<input type="submit" value="Zarejestruj">
</form>

<form method="post" id="log" class="hidden fade">
<h2>Logowanie</h2>
<input type="text" name="Simie" placeholder="Imię">
<input type="password" name="spassword" placeholder="Hasło">
<input type="submit" value="Zaloguj">
</form>

<div>
<?php
// WYŚWIETLANIE KOMUNIKATÓW
foreach($komunikaty as $k){
    echo "<p>$k</p>";
}
?>
</div>

</div>

</body>
</html>