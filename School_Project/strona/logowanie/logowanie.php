<?php
$error = $_GET['error'] ?? null;
?>

<div class="box">
<div class="main-modal">  <div class="modern-form-wrapper">
    <h2>Zaloguj sie</h2>
<form method="POST" action="strona/logowanie/login_action.php">
    <input type="text" name="lnazwa" placeholder="NAZWA" required>
    <input type="password" name="lhaslo" placeholder="HASLO" required>
    <input type="submit" value="Zaloguj się">
</form>
</div>
<?php if($error): ?>
    <p style="color:red; text-align: center;">Niepoprawne dane logowania</p>
<?php endif; ?>
</div>
<div style="text-align: center; margin-top: 20px;">
    Nie masz konta? <a href="index.php?strona=rejestracja">Zarejestruj sie</a>
</div>
</div>