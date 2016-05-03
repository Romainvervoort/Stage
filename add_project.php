<?php
include "connexion.php";
if (isset ($_POST['nom']))
{
    $nom=$_POST['nom'];
    $client=$_POST['client'];
    $responsable=$_POST['responsable'];
    $cout= $_POST['cout'];
    $date_deb= $_POST['dates'];
    $date_crea=$_POST['dates'];
    $freq= $_POST['frequence'];
    $dure= $_POST['dure'];
    $min= $_POST['minute'];
    $rep = $bdd-> prepare("select * from utilisateur where pseudo=:responsable");
    $rep->bindValue(":responsable",$responsable,PDO::PARAM_STR);
    $rep->execute();
    if($rep->rowCount()==0)
    {
        $id_Users=11234;
    }
    else {
        while ($donnees = $rep->fetch()) {
            $id_Users = $donnees['id_Users'];

        }
    }
    /* Récupération de l'id  utilisateur (responsable)*/
    $rep = $bdd-> prepare("select * from entreprise where nom=:client");
    $rep->bindValue(":client",$client,PDO::PARAM_STR);
    $rep->execute();
    while($donnees=$rep->fetch())
    {
        $id_Entreprise = $donnees['id_Entreprise'];

    }

    if(strcmp($_POST['Production'],'Production Régis')==0)
    {
        $req= $bdd->prepare("Insert into projet(nom,id_Entreprise,id_Users,production_frequence,production_Indicatif,production_regis)VALUES (:nom,:ent,:users,'false','false','true')");
        $req->bindValue(':nom',$nom,PDO::PARAM_INT);
        $req->bindValue(':ent',$id_Entreprise,PDO::PARAM_INT);
        $req->bindValue(':users',$id_Users,PDO::PARAM_INT);
        $req->execute();
        header('Location: ../admin_2/Ajouter_projet.php');
    }
    elseif(strcmp($_POST['Production'],'Contractualisé avec Report')==0)
    {
        $date_deb=explode('-',$date_deb);

        if(strcmp($_POST['frequence'],'Mensuel')==0)
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P1M');

            $date->add($interval);
        }
        elseif(strcmp($_POST['frequence'],'Semestriel')==0)
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P2M');
            $date->add($interval);
        }
            elseif((strcmp($_POST['frequence'],'Trimestriel')==0))
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P3M');
            $date->add($interval);
        }
        elseif((strcmp($_POST['frequence'],'Annuel')==0))
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P12M');
            $date->add($interval);
        }


        $req = $bdd->prepare("Insert into projet (nom,temps_total,valeur_frequence,id_Users,id_Entreprise,production_Indicatif,production_regis,production_frequence,date_creation,date_prochaine_frequence,frequence)values(:nom,:tpstt,:freq,:id_user,:id_ent,'false','false','true',:deb,:fin,:frequence)");
        $req->bindValue(':nom',$nom,PDO::PARAM_INT);
        $req->bindValue(':tpstt',$cout,PDO::PARAM_INT);
        $req->bindValue(':freq',$cout,PDO::PARAM_INT);
        $req->bindValue(':id_user',$id_Users,PDO::PARAM_INT);
        $req->bindValue(':id_ent',$id_Entreprise,PDO::PARAM_INT);
        $req->bindValue(':deb',$date_crea,PDO::PARAM_STR);
        $req->bindValue(':fin',$date->format('Y-m-d'),PDO::PARAM_STR);
        $req->bindValue(':frequence',$freq,PDO::PARAM_INT);
        $req->execute();
        header('Location: ../admin_2/Ajouter_projet.php');
    }
    elseif(strcmp($_POST['Production'],'Contractualisé indépendante')==0)
    {
        $min= $min/60;
        $cout=$cout+$min;
        $date_deb=explode('-',$date_deb);
        if(strcmp($_POST['frequence'],'Mensuel')==0)
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P1M');

            $date->add($interval);
        }
        elseif(strcmp($_POST['frequence'],'Semestriel')==0)
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P2M');
            $date->add($interval);
        }
        elseif((strcmp($_POST['frequence'],'Trimestriel')==0))
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P3M');
            $date->add($interval);
        }
        elseif((strcmp($_POST['frequence'],'Annuel')==0))
        {
            $date = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
            $interval = new DateInterval('P12M');
            $date->add($interval);
        }
        $dates = new DateTime($date_deb[0].'-'.$date_deb[1].'-'.$date_deb[2]);
        $interval = new DateInterval('P'.$dure.'M');
        $dates->add($interval);
        echo $dates->format('Y-m-d');

        $req = $bdd->prepare("Insert into projet (nom,temps_total,valeur_frequence,id_Users,id_Entreprise,production_Indicatif,production_regis,production_frequence,date_creation,date_prochaine_frequence,frequence)values(:nom,:tpstt,:freq,:id_user,:id_ent,'true','false','false',:deb,:fin,:frequence)");
        $req->bindValue(':nom',$nom,PDO::PARAM_INT);
        $req->bindValue(':tpstt',$cout,PDO::PARAM_INT);
        $req->bindValue(':freq',$cout,PDO::PARAM_INT);
        $req->bindValue(':id_user',$id_Users,PDO::PARAM_INT);
        $req->bindValue(':id_ent',$id_Entreprise,PDO::PARAM_INT);
        $req->bindValue(':deb',$date_crea,PDO::PARAM_STR);
        $req->bindValue(':fin',$dates->format('Y-m-d'),PDO::PARAM_STR);
        $req->bindValue(':frequence',$freq,PDO::PARAM_INT);
        $req->execute();
        header('Location: ../admin_2/Ajouter_projet.php');
    }
    else
    {

    }

}
else
{
    echo "Problème formulaire";
}





