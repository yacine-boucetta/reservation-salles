<?php
function connect() {
$dbase = new PDO('mysql:host=localhost;dbname=reservationsalles;charset=utf8','root','');
[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];
return $dbase;
}


?>