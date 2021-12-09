<?php
require 'db.php';
class User{
public $login;
public $password;
public $password2;
public $db;

function __construct(){
$this->db=connect();
}


//----------------------------------incription--------------------------
public function user_inscription($login,$password,$password2) {

    $password=htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1"); 
    $password2=htmlentities($_POST['password2'], ENT_QUOTES, "ISO-8859-1"); 
    $login=htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1"); 
    
    $inscription=$this->db->prepare("SELECT login FROM utilisateurs WHERE login = :login ");
    $inscription->bindValue(':login',$login);
    $inscription->execute();

    $userExists = $inscription->rowcount();
    $connexionfetch=$inscription->fetchAll(PDO::FETCH_ASSOC);

    var_dump($connexionfetch);
    if($userExists==1){
        $message="ce nom d'utilisateur existe déjà";
    }
    
    elseif(strlen($_POST['password'])>=6){
        if($password==$password2){
            $password=password_hash($password,PASSWORD_DEFAULT);
            $sqlinsert="INSERT INTO utilisateurs(login,password) VALUES(:login,:password)";
            $connexioninsert=$this->db->prepare($sqlinsert);
            $connexioninsert->execute(array(
                ':login' =>$login,
                ':password'=>$password
            ));
            header("Location: connexion.php");
        }
        else $message="Les mots de passe ne sont pas identiques";
    }
    else $message= "Le mot de passe est trop court !";       

}

//----------------------------------connexion--------------------------
public function user_connexion() {

    if(isset($_POST['sign_in'])){
        $login = htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1"); 
        $password = htmlentities(password_hash($_POST['password'],PASSWORD_DEFAULT));
        $connexion = $this->db->prepare("SELECT * FROM utilisateurs WHERE login = :login ");
        $connexion->execute(array(':login' => $login));
        $userExists = $connexion->rowcount();
        $cofetch = $connexion->fetch(PDO::FETCH_ASSOC);
    
    
    if(password_verify($_POST['password'],$cofetch['password'])) {
        if($userExists==1 ) {
        $_SESSION['user'] = $cofetch;
        header("Location: profil.php");
        }   
    }

    else{
        $message='le login ou le mot de passe est incorrect';  
    }
    
    } 

}

//----------------------------------profil--------------------------
public function user_profil($login,$password,$password2){

    if(isset($_SESSION['user'])){
        $oldlogin=$_SESSION['user'];
        $connexion=$this->db->prepare("SELECT * FROM `utilisateurs` WHERE `login`= :login ");
        $connexion->bindValue(':login',$oldlogin);
        $connexion->execute();
        $connexionfetch1=$connexion->fetchall(PDO::FETCH_ASSOC);
    
        if(isset($_POST['valider'])){
        if(empty($_POST['login'])){
        $_POST['login']=$oldlogin;
        }

        $password2 = $_POST['password2'];
        $password = $_POST['password'];
        $login1 = $_POST['login'];
        
        $connexion=$this->db->prepare("SELECT login FROM `utilisateurs`WHERE `login`= :login ");
        $connexion->execute(array(':login' => $login1));
        $userExists = $connexion->rowcount();
        $connexionfetch=$connexion->fetchall(PDO::FETCH_ASSOC);
        var_dump($connexionfetch);
        var_dump($userExists);
    
        if($userExists>0){
    $message="ce pseudo existe déjà";
        }
    
        else{
        $connexion=$this->db->prepare("UPDATE `utilisateurs` SET `login`=:login1 WHERE `login`= :login");
        $connexion->bindValue(':login',$oldlogin ,PDO::PARAM_STR);
        $connexion->bindValue(':login1',$login1 ,PDO::PARAM_STR);
        $connexion->execute();
        $_SESSION['user']=$login1;
    
        if(strlen($_POST['password'])>=6){
        if($password1==$password2){
        $password1=password_hash($password1,PASSWORD_DEFAULT);
        $sqlinsert="INSERT INTO utilisateurs(password) VALUES(:password)";
        $connexioninsert=$this->db->prepare($sqlinsert);
        $connexioninsert->execute(array(
        ':password'=>$password1));
        }
    }    
    }
    }
    // public function logout() {
    //     session_start();
    //     session_destroy();
    //     header("Location: index.php");
        
    //     }
    }
}
}






