<?php

require '../config/classUser.php';

if(isset($_POST['sign_up'])){
$inscription= new User();
$inscription->user_inscription($_POST['login'],$_POST['password'],$_POST['password2']);
}
?>



<?php require 'header.php';?>
<h2>Sign up</h2>
    <form  method='post'>
        <input type="text" name="login" required="" placeholder="Username">
        <input type="password" name="password" required="" placeholder="password">
        <input type="password" name="password2" required="" placeholder="veuillez confirmer votre mot de passe">
        <button type="submit" name="sign_up" value="sign_up">Valider</button>
    </form>
    <?php require 'footer.php';?>

