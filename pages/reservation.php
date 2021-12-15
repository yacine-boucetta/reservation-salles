<?php
require '../config/classReservation.php';
setlocale(LC_TIME, 'fr');

// echo '<pre>';
// var_dump($_SESSION['user']);
// echo '</pre>';

if(isset($_GET['id'])){
    $event = new Reservation;
    $eventinfo = $event->getEventbyId($_GET['id']);
    echo '<pre>';
    var_dump($_GET['id']);
    echo '</pre>';

    echo '<pre>';
    var_dump($eventinfo);
    echo '</pre>';

    $timeStart = $eventinfo[0]['debut'];
    $timeEnd = $eventinfo[0]['fin'];

    $varDebut = ucfirst(strftime('le %A %d %B à %H h', strtotime($timeStart)));
    $varFin = ucfirst(strftime('le %A %d %B à %H h', strtotime($timeEnd)));
    // echo '<pre>';
    // var_dump($timeStart);
    // echo '</pre>';

    // echo '<pre>';
    // var_dump($timeEnd);
    // echo '</pre>';

    //$formated = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::MEDIUM);
    // $timeStart2 = $formated->format($timeStart);
    // $timeEnd2 = $formated->format($timeEnd);


    // echo '<pre>';
    // var_dump($timeStart2);
    // echo '</pre>';

    // echo '<pre>';
    // var_dump($timeEnd2);
    // echo '</pre>';

    $getUser = $event->getUserLog($eventinfo[0]["id_utilisateur"]);
    // echo '<pre>';
    // var_dump($getUser);
    // echo '</pre>';

}
// else{
//     $_SESSION['error'] = "Vous devez acceder a cette pas depuis la planning.";
// }
<<<<<<< HEAD

require '../template/header.php';
=======
?>
<?php
require '../template/headerResa.php';
>>>>>>> 5b3ab4b9fa514458e1a6bfab1f1338bb4f847707
?>
    <article>
        <h1>Reservation</h1>
    
    </article>

    <article>

    <section class="Pbooking">
    <p>Réservation réalisée par: <?php echo $getUser[0]['login']; ?></p>
    </section>

    <section class="Pbooking">
    <p>titre: <?php echo $eventinfo[0]['titre']; ?></p>
    </section>

    <section class="Pbooking">
    <p>description:<br>
        <?php echo $eventinfo[0]['description']; ?></p>
    </section>

    <section class="Pbooking">
    <p>Commence <?php echo ($varDebut); ?>,
    et finit <?php echo ($varFin); ?>.</p>
    </section>

    </article>
    
<<<<<<< HEAD
    
=======
    <?php 
    
    ?>
>>>>>>> 5b3ab4b9fa514458e1a6bfab1f1338bb4f847707

<?php
require '../template/footer.php';
?>