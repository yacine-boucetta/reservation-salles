<?php
require '../config/db.php';
class Reservation{
    public $id;
    public $titre;
    public $descriptions;
    public $debut;
    public $fin;
    public $idUtilisateur;

    function __construct(){
        $this->db=connect();
        }
//---------------------------------------------------------------------Get event-----------------------------------------------------
    public function getEvent($titre, $description, $debut, $fin, $idUser){

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
            $fin = date('19:00:00');
        }

        $idUser = $_SESSION['user']['id'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $debut_d = $_POST['date'].' '.$debut;
        $fin_d =  $_POST['date'].' '.$fin;   
        
        var_dump($_POST['creneaux']).'<br>';
        var_dump($debut_d).'<br>';
        var_dump($fin_d).'<br>';


        $titre = htmlspecialchars(trim($titre));
        $description = htmlspecialchars(trim($description));

        $insertReservation = $this->db->prepare("INSERT INTO reservations(titre, description, debut, fin, id_utilisateur) VALUES (:titre, :description, :debut, :fin, :id_utilisateur)");
        $insertReservation->bindValue(':titre', $titre, PDO::PARAM_STR);
        $insertReservation->bindValue(':description', $description, PDO::PARAM_STR);
        $insertReservation->bindValue(':debut', $debut_d, PDO::PARAM_STR);
        $insertReservation->bindValue(':fin', $fin_d, PDO::PARAM_STR);
        $insertReservation->bindValue(':id_utilisateur', $idUser, PDO::PARAM_STR);
        $insertReservation->execute();
        
        
    } 

    public function getEventbyId(){

        $idUser = $_SESSION['user']['id'];

        $getReservation = $this->db->prepare("SELECT reservations.id, reservations.titre, reservations.description, 
        reservations.debut, reservations.fin, reservations.id_utilisateur
        FROM reservations INNER JOIN utilisateurs
        WHERE reservations.id = :id
        AND utilisateurs.id = reservations.id_utilisateur");
        $getReservation->bindValue(':id', $idUser, PDO::PARAM_STR);
        $getReservation->execute();
        $result = $getReservation->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function getPlanning(){
        $planning=$this->db->prepare("SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur");
        $planning->execute();
        $resulta = $planning->fetchAll(PDO::FETCH_ASSOC);
        return $resulta;
    }

    public function getUserLog($id){

        $getLog=$this->db->prepare("SELECT login FROM utilisateurs WHERE id = :id");
        $getLog->bindValue(':id', $id, PDO::PARAM_STR);
        $getLog->execute();
        $resultas = $getLog->fetchAll(PDO::FETCH_ASSOC);
        return $resultas;
        
    }

}
?>