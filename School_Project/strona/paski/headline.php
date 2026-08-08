<header class='pasek'>
    <a href="index.php?strona=home">
    <img src="assets/zakop.png" alt="ZAKOP.PL" class="himg">
    </a>
    |
    <a href="index.php?strona=home">HOME</a>
    |
    <a href="index.php?strona=wsparcie">WESPRZYJ NAS</a>
    |
    <a href="index.php?strona=kontakt">KONTAKT</a>
    |
<?php if(isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
    <div class="przycisk">
    <a href="index.php?strona=wyloguj">wyloguj sie</a>
    </div>
<?php else: ?>
    <div class="przycisk">
    <a href="index.php?strona=logowanie">zaloguj sie</a>
    <a href="index.php?strona=rejestracja">zarejestruj sie</a>
</div> 
<?php endif; ?>
</header>
