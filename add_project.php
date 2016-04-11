<?php
include "connexion.php";
if (isset ($_POST['nom']))
{
    $nom=$_POST['nom'];
    $client=$_POST['client'];

    if (isset($_POST['active']))
    {
        $active=1;
    }
    else
    {
        $active=0;
    }
    if(isset($_POST['regis']))
    {
        $regis =1;
    }
    else
    {
        $regis=0;
    }
    $responsable=$_POST['reponsable'];
    $cout= $_POST['cout'];
}
else
{
    echo "Problème formulaire";
}