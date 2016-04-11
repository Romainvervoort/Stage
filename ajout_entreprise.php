<?php
/**
 * Created by PhpStorm.
 * User: Infog
 * Date: 11/04/2016
 * Time: 12:09
 */
include "connexion.php";
session_start();
if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $cdp = $_POST['cdp'];
    $num = $_POST['num'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $fax = $_POST['fax'];
    $mail = $_POST['mail'];

    $insert = $bdd-> prepare("Insert into Entreprise(nom,adresse,cdp,ville,numero_telephone,mail,fax) values (:nom,:adresse,:cdp,:ville,:num,:mail,:fax)");
     $insert->bindValue(':nom',$nom,PDO::PARAM_STR);
     $insert->bindValue(':adresse',$adresse,PDO::PARAM_STR);
     $insert->bindValue(':ville',$ville,PDO::PARAM_STR);
     $insert->bindValue(':mail',$nom,PDO::PARAM_STR);
     $insert->bindValue(':fax',$fax,PDO::PARAM_STR);
     $insert->bindValue(':num',$num,PDO::PARAM_STR);
     $insert->bindValue(':cdp',$cdp,PDO::PARAM_int);
    $insert->execute();
}
else
{
    echo "Formulaire fail";
}
