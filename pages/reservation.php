<?php
require '../config/classReservation.php';
setlocale(LC_TIME, 'fr');
// echo '<pre>';
// var_dump($_SESSION['user']);
// echo '</pre>';

if(isset($_GET['id'])){
    setlocale(LC_TIME, 'fr');
    $event = new Reservation;
    $eventinfo = $event->getEventbyId($_GET['id']);
    // echo '<pre>';
    // var_dump($eventinfo);
    // echo '</pre>';

    $timeStart = $eventinfo[0]['debut'];
    $timeEnd = $eventinfo[0]['fin'];

    $varDebut = ucfirst(strftime('%A, le %d %B à %H h', strtotime($timeStart)));
    $varFin = ucfirst(strftime('%A, le %d %B à %H h', strtotime($timeEnd)));
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
?>
<?php
require '../template/header.php';
?>
    <article>
        <h1>Reservation</h1>
        <?php
        // if(isset($_SESSION['user'])){
        // echo '<p>'. $_SESSION['error'].'</p>';
        // unset($_SESSION['error']);
        // }
        // else{
        ?>
    </article>

    <article>

    <section class="Pbooking">
    <p>Réservation réalisée par:</p> <?php echo $getUser[0]['login']; ?>
    </section>

    <section class="Pbooking">
    <p>titre:</p> <?php echo $eventinfo[0]['titre']; ?>
    </section>

    <section class="Pbooking">
    <p>description:</p><br>
        <?php echo $eventinfo[0]['description']; ?>
    </section>

    <section class="Pbooking">
    <p>Commence le </p> <?php echo ($varDebut); ?>,
    <p> et finit le </p> <?php echo ($varFin); ?>.
    </section>

    </article>
    
    <?php 
    //} 
    ?>

<?php
require '../template/footer.php';
?>