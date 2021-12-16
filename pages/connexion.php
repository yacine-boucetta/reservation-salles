<?php

require '../config/classUser.php';
if(isset($_POST['sign_in'])){
    $connect= new User();
    $connect->user_connexion($_POST['login'],$_POST['password']);
    }

?>

<?php require '../template/header.php';?>
<h2>Sign in</h2>
    <form  method='post'>
        <input class="form-control" type="text" name="login" required="" placeholder="Username">
        <input class="form-control" type="password" name="password" required="" placeholder="password">
        <button class="btn btn-success from-group" type="submit" name="sign_in" value="sign_in">Valider</button>
    </form>
<?php require '../template/footer.php';?>