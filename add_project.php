<?php
include "connexion.php";
if (isset ($_POST['nom']))
{
    $nom=$_POST['nom'];
    $client=$_POST['client'];

    if (isset($_POST['active']))
    {
        $active="true";
    }
    else
    {
        $active="false";
    }
    if(isset($_POST['regis']))
    {
        $regis ="true";
    }
    else
    {
        $regis="false";
    }
    $responsable=$_POST['responsable'];
    $cout= $_POST['cout'];
    $rep = $bdd-> prepare("select * from utilisateur where pseudo=:responsable");
    $rep->bindValue(":responsable",$responsable,PDO::PARAM_STR);
    $rep->execute();
    while($donnees=$rep->fetch())
    {
        $id_Users = $donnees['id_Users'];

    }
    /* Récupération de l'id  utilisateur (responsable)*/
    $rep = $bdd-> prepare("select * from entreprise where nom=:client");
    $rep->bindValue(":client",$client,PDO::PARAM_STR);
    $rep->execute();
    while($donnees=$rep->fetch())
    {
        $id_Entreprise = $donnees['id_Entreprise'];

    }
    /* Récupération de l'id  entreprise (responsable)*/
    $insert=$bdd-> prepare("Insert into projet(nom,temps_total,id_Users,id_Entreprise,production_active,production_regis)values(:nom,:cout,:id_Users,:id_Entreprise,:active,:regis)");
    $insert->bindValue(":nom",$nom,PDO::PARAM_STR);
    $insert->bindValue(":cout",$cout,PDO::PARAM_INT);
    $insert->bindValue(":id_Users",$id_Users,PDO::PARAM_INT);
    $insert-> bindValue(":id_Entreprise",$id_Entreprise,PDO::PARAM_INT);
    $insert-> bindValue(":active",$active,PDO::PARAM_STR);
    $insert-> bindValue(":regis",$regis,PDO::PARAM_STR);
    $insert->execute();
}
else
{
    echo "Problème formulaire";
}