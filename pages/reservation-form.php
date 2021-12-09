<?php
require '../config/classReservation.php';

if(isset($_POST['submit'])){



    $connecter = new Reservation();
    $connecter->getEvent($_POST['titre'], $_POST['description'], $_POST['date'], $_POST['creneaux'], $_SESSION['user']['id']);
    //header("Location:../index.php");


}
?>
<?php
require '../template/header.php';
?>

<article>
    <form method="POST" >
        <input type="text" name="titre" placeholder="Le nom de votre evenement" required='required'></input>
        <input type="date" name="date" placeholder="Choisissez une date" required='required'></input>
        <select name="creneaux" id="creneaux" placeholder="Choisissez un Creaneaux" required='required'>
            <option value="1">8h/9h</option> 
            <option value="2">9h/10h</option> 
            <option value="3">10h/11h</option> 
            <option value="4">11h/12h</option> 
            <option value="5">12h/13h</option> 
            <option value="6">13h/14h</option> 
            <option value="7">14h/15h</option> 
            <option value="8">15h/16h</option>
            <option value="9">16h/17h</option> 
            <option value="10">17h/18h</option>
            <option value="11">18h/19h</option>
        </select>
        <textarea name="description" row="4" cols="50" placeholder="Descrition de votre evenement" style="resize:none" required='required'></textarea>
        <button class="btn btn-success from-group" type="submit" name="submit">Reserver</button>
    </form>
</article>

<?php
require '../template/footer.php';
?>