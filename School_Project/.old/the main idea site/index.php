<?php 
session_start();
if (!empty($_SESSION["login"]) === true) {
    header("Location: stronaglowna.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function pokazhaslo(){
            var x = document.getElementById("password");
            if(x.type === "password"){
                x.type = "text";
            }else{
                x.type = "password";
            }
}
    </script>
</head>
<body>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" ><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <input type="button" value="👁️" onclick="pokazhaslo()"> <br><br>
        <input type="submit" value="Login">
    </form>
</body>
<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
$_SESSION["login"] = true;

}

?>
</html>