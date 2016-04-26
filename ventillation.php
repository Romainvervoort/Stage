<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">

<?php
include "connexion.php";
session_start();
$nom = $_POST['Projets'];
$tmp=$_POST['heure'];
$num= $_POST['minute'];
$des=$_POST['description'];
$tache= $_POST['taches'];
echo $tache;
if(isset($_POST['description'])) {
    set_time_limit(4820);
    $req = $bdd->prepare("Select id_Tache from taches where nom2=:nom");
    $req->bindValue(':nom', $_POST['taches'], PDO::PARAM_STR);

    $req->execute();
    while ($donnee = $req->fetch()) {
       echo  $donnee['id_Tache'].' ';
    }
    $req->closeCursor();
}
else
    {
        echo "Problème formulaire";
    }

    ?>
</html>
