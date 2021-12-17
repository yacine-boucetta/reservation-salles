<?php

require '../config/classUser.php';

if(isset($_POST['sign_up'])){
$inscription= new User();
$inscription->user_inscription($_POST['login'],$_POST['password'],$_POST['password2']);
}
?>



<?php require '../template/header.php';?>

<div class="testbox">
    <form class="sign" method="post" >
<h2>Inscription</h2>
    <div class="banner">
        <h1>Venez rigoler et appelez vous Corine</h1>
    </div>
    <p>information ? bin voyons</p>

    <div class="item">
        <label for="name">Login<span>*</span></label>
        <input id="name" type="text" name="login" required/>
    </div>
    
    <div class="item">
        <label for="password">Password:6 caractère minimum<span>*</span></label>
        <input id="password" type="password" name="password" required/>
    </div>

    <div class="item">
        <label for="name">Confirmation password<span>*</span></label>
        <input id="name" type="password" name="password2" required/> 
        
    <div class="btn-block">
        <button type="submit" href="/">HIN !</button>
    </div>
</div>
</div>
</form>
</div>
<?php require '../template/footer.php';?>

