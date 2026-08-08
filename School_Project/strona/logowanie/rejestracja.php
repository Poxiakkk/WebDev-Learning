<?php
$komunikaty = $_GET['error'] ?? null;
?>
<div class="box">
<div class="main-modal"> <div class="modern-form-wrapper">
    <h2>Zarejestruj sie</h2>
<form method="POST" action="/strona/logowanie/rejestracja_action.php">
    <input type="text" name="rnazwa" placeholder="NAZWA" required>
    <input type="password" name="rhaslo" placeholder="HASLO" required>
    <input type="number" name="rwiek" placeholder="WIEK" required>
    <input type="email" name="remail" placeholder="EMAIL" required>
    <input type="submit" value="Zarejestruj">
</form>
</div>
<?php if($komunikaty): ?>
    <p style="color:red"><?= $komunikaty ?></p>
<?php endif; ?>
</div>
<div style="text-align: center; margin-top: 20px;">
Masz konto? <a href="index.php?strona=logowanie">Zaloguj sie</a>
</div>
</div>