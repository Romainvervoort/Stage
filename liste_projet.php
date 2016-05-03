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
mail('romain.vervoort@sfr.fr',"Rt si t'es triste",$message );