<?php
$_GET='';
require '../config/classUser.php';
if (isset($_POST['valider'])){
$profile = new User;
$profile->user_profil($_POST['login'],$_POST['password'],$_POST['password2']);

}
?>


<?php require '../template/header.php';?>

<div class='testbox'>
 
<p><?php if(isset($message)){ echo $message; }?></p>
<form  class='sign' method='post'>  
     <h2>Mon profil</h2>
<div class="banner2">
        <h1>Ceci n'est pas Mr Burns</h1>
    </div>
    <p>information ? bin voyons</p>
    <div class="item">
    <label for=""><p><?php echo $_SESSION['user']['login'];?></p></label>
    <input class="form-control" type="text" name="login"  placeholder="nouveau login" >
</div>
    <div class="item">
    <label for=""><p>Password:</p></label>
    <input class="form-control" type="password" name="password"  placeholder="le nouveau mdp doit avoir 6 charactere minimum";?>
</div>
    <div class="item">
    <label for=""><p>confirmation mdp </p></label>
    <input class="form-control" type="password" name="password2"  placeholder="veuillez confirmer votre mot de passe">
</div>
<div class="btn-block">
    <button  type="submit" name="valider" value="valider">valider</button>
</div>
</form>
</div>
<?php require '../template/footer.php';?>