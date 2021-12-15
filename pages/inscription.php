<?php

require '../config/classUser.php';

if(isset($_POST['sign_up'])){
$inscription= new User();
$inscription->user_inscription($_POST['login'],$_POST['password'],$_POST['password2']);
}
?>



<?php require '../template/header.php';?>
<h2>Sign up</h2>
    <form  method='post'>
        <input class="form-control" type="text" name="login" required="" placeholder="Username">
        <input class="form-control" type="password" name="password" required="" placeholder="password">
        <input class="form-control" type="password" name="password2" required="" placeholder="veuillez confirmer votre mot de passe">
        <button class="btn btn-success from-group" type="submit" name="sign_up" value="sign_up">Valider</button>
    </form>
    <?php require '../template/footer.php';?>

