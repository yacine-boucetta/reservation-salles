<?php
$_GET='';
require '../config/classUser.php';
if (isset($_POST['valider'])){
$profile = new User;
$profile->user_profil($_POST['login'],$_POST['password'],$_POST['password2']);

}
?>


<?php require '../template/header.php';?>
<h2>mon profil</h2>

<p><?php if(isset($message)){ echo $message; }?></p>
<form  method='post'>
    <img src="../ressources/zem.jpg">
    <label for=""><p style="color:rgb(3, 134, 128);font-family:'upheavtt';"><?php echo $_SESSION['user']['login'];?></p></label>
    <input class="form-control" type="text" name="login"  placeholder="nouveau login" >
    <br />
    <label for=""><p style="color:rgb(3, 134, 128);font-family:'upheavtt';">Password:</p></label>
    <input class="form-control" type="password" name="password"  placeholder="le nouveau mdp doit avoir 6 charactere minimum";?>
    <br />
    <label for=""><p style="color:rgb(3, 134, 128);font-family:'upheavtt';">confirmation mdp </p></label>
    <input class="form-control" type="password" name="password2"  placeholder="veuillez confirmer votre mot de passe">
    <button class="btn btn-success from-group" type="submit" name="valider" value="valider">valider</button>
<?php require '../template/footer.php';?>