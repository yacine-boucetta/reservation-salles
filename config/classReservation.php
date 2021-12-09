<?php

class Reservation{
    public $id;
    public $titre;
    public $descriptions;
    public $debut;
    public $fin;
    public $idUtilisateur;

    public function __construct($titre, $descriptions, $date, $id_utilisateur){
        $this->pdo = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', 'root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

}
//---------------------------------------------------------------------Get event-----------------------------------------------------
    public getEvent(){

        $idUser = $_SESSION['user']['id'];
        $titre = $_POST['titre'];
        $description = $_POST['descriptions'];

        if(isset($_POST['creneaux']) && $_POST['creneaux'] == 1){
            $debut = date('08:00:00');
            $fin = date('09:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 2){
            $debut = date('09:00:00');
            $fin = date('10:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 3){
            $debut = date('10:00:00');
            $fin = date('11:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 4){
            $debut = date('11:00:00');
            $fin = date('12:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 5){
            $debut = date('12:00:00');
            $fin = date('13:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 6){
            $debut = date('13:00:00');
            $fin = date('14:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 7){
            $debut = date('14:00:00');
            $fin = date('15:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 8){
            $debut = date('15:00:00');
            $fin = date('16:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 9){
            $debut = date('16:00:00');
            $fin = date('17:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 10){
            $debut = date('17:00:00');
            $fin = date('18:00:00');
        }
        elseif(isset($_POST['creneaux']) && $_POST['creneaux'] == 11){
            $debut = date('18:00:00');
            $fin = date('18:00:00');
        }
        

        $titre = htmlspecialchars(trim($titre));
        $description = htmlspecialchars(trim($description));

        $insertReservation = $this->pdo->prepare("INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)");
        $insertReservation->bindValue(':titre', $titre, PDO::PARAM_STR);
        $insertReservation->bindValue(':description', $description, PDO::PARAM_STR);
        $insertReservation->bindValue(':debut', $debut, PDO::PARAM_STR);
        $insertReservation->bindValue(':fin', $fin, PDO::PARAM_STR);
        $insertReservation->bindValue(':id_utilisateur', $idUser, PDO::PARAM_STR);
        $insertReservation->execute();
        
        
    } 

}
?>