<?php

require '../config/classUser.php';
if(isset($_POST['sign_in'])){
    $connect= new User();
    $connect->user_connexion($_POST['login'],$_POST['password']);
    }
    var_dump($_SESSION['user']);
?>

<?php require 'header.php';?>
<h2>Sign in</h2>
    <form  method='post'>
        <input type="text" name="login" required="" placeholder="Username">
        <input type="password" name="password" required="" placeholder="password">
        <button type="submit" name="sign_in" value="sign_in">Valider</button>
    </form>
<?php require 'footer.php';?>