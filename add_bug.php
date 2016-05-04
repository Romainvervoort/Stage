<?php
include "connexion.php";
session_start();
if(isset ($_POST['nom']))
{
    $nom=$_POST['nom'];
    $des=$_POST['description'];
    $pseudo=$_POST['responsable'];
    $req=$bdd->prepare("Select id_Users from utilisateur where pseudo=:pseu");
    $req->bindValue(':pseu',$pseudo,PDO::PARAM_STR);
    $req->execute();
    while ($donne=$req->fetch())
    {
        $id=$donne['id_Users'];
    }
    $req->closeCursor();
    $req=$bdd->prepare("Insert into taches (id_Users,nom,description,id_Projet,nom2,Type)values (:id,:nom,:des,:pro,:nom2,:typ)");
    $req->bindValue(':id',$id,PDO::PARAM_INT);
    $req->bindValue(':nom',$nom,PDO::PARAM_STR);
    $req->bindValue(':des',$des,PDO::PARAM_STR);
    $req->bindValue(':pro',$_SESSION['id_Projets'],PDO::PARAM_INT);
    $req->bindValue(':nom2',$nom,PDO::PARAM_STR);
    $req->bindValue(':typ','Bug',PDO::PARAM_STR);
    $req->execute();
    header('Location: ../admin_2/les_taches.php');
}
else
{
    echo "Problème formulaire";
}