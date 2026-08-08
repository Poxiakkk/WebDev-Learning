Imię: <input type="text" name="name">
E-mail: <input type="text" name="email">
<?php




// PODAJ INFORMACJE:
$RejestracjaHasla = "";

// SPRAWDZ INFORMACJE:
$SprawdzHaslo = "";

// STRONY UZYWANE: php.net | w3schools.com | stackoverflow.com



/*
password_hash szyfrowanie hasla
password_verify weryfikacja hasla (poprzez porownywanie hasha)
Funkcja potrafi:
- szyfrowac dane
- sprawdzac haslo
- porownywac input
*/
function haslo($shaslo,$podanehaslo)
{
    $hash = password_hash($podanehaslo, PASSWORD_DEFAULT);
    if(password_verify($shaslo, $hash))
{
    echo "\nHasło jest poprawne\n";
}
else
{
    echo "\nHasło niepoprawne\n";
}
}
haslo($SprawdzHaslo,$RejestracjaHasla);

?>