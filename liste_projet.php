<?php
/**
 * Created by PhpStorm.
 * User: Infog
 * Date: 03/05/2016
 * Time: 15:49
 */

include "connexion.php";
session_start();
$req= $bdd->prepare("Select * from projet where date_fin='' and temps_total >0");
$req->execute();
$message="";
while($donne=$req->fetch())
{
    $tempstt= $donne['temps_total'];
    $temps=$donne['temps'];
    $temps=(int)($temps/60);
    $pourcent=($temps*100)/$tempstt;
    if($pourcent>79)
    {
        $message= "  ".$message."   Le projet ".$donne['nom']." est à ".$pourcent."%";
    }

}
//mail('romain.vervoort@sfr.fr',"Rt si t'es triste",$message );
$today=date('Y-m-d');
echo $today;
$req=$bdd->prepare("Select * from projet where production_frequence='true' and date_prochaine_frequence=:today");
$req->bindValue(':today',$today,PDO::PARAM_STR);
$req->execute();
while($don=$req->fetch())
{
   $tt= $don['valeur_frequence'];
    $t= $don['temps'];
    $dif= $tt-$t;
    $req2=$bdd->prepare("Insert into rapport_contractualise (id_projets,cout_projet,difference,date) values (:id,:cout,:dif,:dat)");
    $req2->bindValue(':id',$don['id_Projets'],PDO::PARAM_INT);
    $req2->bindValue(':cout',$don['valeur_frequence'],PDO::PARAM_INT);
    $req2->bindValue(':dif',$dif,PDO::PARAM_INT);
    $req2->bindValue(':dat',$today,PDO::PARAM_STR);
    $req2->execute();
    $date = new DateTime($today);
    $dif=$dif+$don['valeur_frequence'];
    if(strcmp($don['frequence'],'Mensuel')==0)
    {
        $interval = new DateInterval('P1M');
        $date->add($interval);
    }
    elseif(strcmp($don['frequence'],'Semestriel')==0)
    {

        $interval = new DateInterval('P6M');
        $date->add($interval);
    }
    elseif(strcmp($don['frequence'],'Trimestriel')==0)
    {
        $interval = new DateInterval('P4M');
        $date->add($interval);
    }
    elseif(strcmp($don['frequence'],'Annuel')==0)
    {
        $interval = new DateInterval('P12M');
        $date->add($interval);
    }
    $req3=$bdd->prepare("Update projet set temps=0,temps_total=:tptt,date_prochaine_frequence=:dates where id_Projets=:projet");
    $req3->bindValue(':tptt',$dif,PDO::PARAM_INT);
    $req3->bindValue(':dates',$date->format('Y-m-d'),PDO::PARAM_STR);
    $req3->bindValue(':projet',$don['id_Projets'],PDO::PARAM_INT);
    $req3->execute();
}
$req->closeCursor();