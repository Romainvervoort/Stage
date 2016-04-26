<?php
include "connexion.php";
session_start();
echo $_SESSION['id_projet'];
if(isset($_POST['Modifier'])) {
    $req = $bdd->prepare("Update entreprise set nom=:nom, adresse=:adresse,Ville=:ville,mail=:mail,numero_telephone=:num where id_Entreprise=:id");
    $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $req->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $req->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
    $req->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
    $req->bindValue(':num', $_POST['num'], PDO::PARAM_STR);
    $req->bindValue(':id', $_SESSION['id_entreprise'], PDO::PARAM_INT);
   $req->execute();
}
else
{
    if (isset($_POST['Modifier2']))
    {
        $req = $bdd->prepare("Update contact set nom=:nom, prenom=:prenom,mail=:mail,numero=:num where id_Contact=:id");
        $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $req->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $req->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
        $req->bindValue(':num', $_POST['num'], PDO::PARAM_STR);
        $req->bindValue(':id', $_SESSION['id_entreprise'], PDO::PARAM_INT);
       $req->execute();
    }
    else
    {
        if(isset ($_POST['Modifier3']))
        {
            $req = $bdd->prepare("Update projet set nom=:nom,production_regis=:regis,production_active=:active,date_creation=:crea,date_fin=:fin,temps_total=:tps where id_Projets=:id ");
            $req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
            $req->bindValue(':regis',$_POST['production_regis'],PDO::PARAM_STR);
            $req->bindValue(':active',$_POST['production_active'],PDO::PARAM_STR);
            $req->bindValue(':crea',$_POST['date_crea'],PDO::PARAM_STR);
            $req->bindValue(':fin',$_POST['date_fin'],PDO::PARAM_STR);
            $req->bindValue(':tps',$_POST['tempstt'],PDO::PARAM_STR);
            $req->bindValue(':id',$_SESSION['id_projet'],PDO::PARAM_INT);
            $req->execute();
        }
        else
        {
            if(isset($_POST['Modifier4']))
            {
                $tps=$_POST['heure']*60+$_POST['minute'];
                $req=$bdd->prepare("Update taches set nom=:nom,description=:des,temps=:tps,heure=:heure,minute=:minu where id_Tache=:id");
                $req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
                $req->bindValue(':des',$_POST['description'],PDO::PARAM_STR);
                $req->bindValue(':tps',$tps,PDO::PARAM_INT);
                $req->bindValue(':heure',$_POST['heure'],PDO::PARAM_INT);
                $req->bindValue(':minu',$_POST['minute'],PDO::PARAM_INT);
                $req->bindValue(':id',$_SESSION['id_tache'],PDO::PARAM_INT);
                $req->execute();
            }
        }
    }
}
header('Location: ../admin_2/client.php');
