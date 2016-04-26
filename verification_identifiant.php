<?php
/**
 * Created by PhpStorm.
 * User: Infog
 * Date: 19/04/2016
 * Time: 15:46
 */
include "connexion.php";
session_start();
if(isset($_POST['password']))
{
    $pwd= $_POST['password'];
    $pseudo=$_POST['Pseudo'];
    $val='Location: ../admin_2/identification.php';
    $req = $bdd->prepare("Select * from utilisateur where pseudo=:pseudo and mdp=:pwd");
    $req->bindValue(':pseudo',$pseudo,PDO::PARAM_INT);
    $req->bindValue(':pwd',$pwd,PDO::PARAM_STR);
    $req->execute();
    while($donne = $req->fetch())
    {
        $val='Location: ../admin_2/home.php';
        $_SESSION['id']= $donne['id_Users'];
        $_SESSION['pseudo']= $donne['pseudo'];
        $_SESSION['nom']=$donne['Nom'];
        $_SESSION['prenom']=$donne['Prenom'];
        $_SESSION['mail']=$donne['mail'];
        $_SESSION['mdp']=$donne['mdp'];
        $req2 = $bdd->prepare("Update utilisateur set sid=:sid where id_Users=:user");
        $req2->bindValue(':sid',MD5($donne['mdp']),PDO::PARAM_STR);
        $req2->bindValue(':user',$donne['id_Users'],PDO::PARAM_INT);
        $req2->execute();

    }
   header($val);
}
else {
    echo 'Probleme formulaire';
}
