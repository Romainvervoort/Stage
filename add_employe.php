<?php
include "connexion.php";
session_start();
if (isset ($_POST['nom']))
{
    echo ($_POST['nom']);
  /* Verification de la case coché */
    if(isset($_POST['actif']))
    {
       $res_actif = "true";

    }
    else
    {
        $res_actif="false";
    }
    if(isset($_POST['fixe']))
    {
        $res_fixe = "true";



    }
    else
    {
        $res_fixe=false;
    }
    if(isset($_POST['interim']))
    {
        $res_interim = "true";

    }
    else
    {
        $res_interim="false";
    }
    if(isset($_POST['administrateur']) )
    {
        $res_administrateur = "true";

    }
    else
    {
        $res_administrateur="false";
    }
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $pseudo=$_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $cout=$_POST['cout'];
    $num=$_POST['num'];
    $mail=$_POST['mail'];
    /* Fin de la vérification checbox */
    $insert = $bdd-> prepare("Insert into utilisateur(Nom,Prenom,mail,telephone,mdp,administrateur,interim,fixe,cout_heure,actif,pseudo)values(:nom,:prenom,:mail,:num,:mdp,:res_administrateur,:res_interim,:res_fixe,:cout,:res_actif,:pseudo)");
    $insert ->bindValue(':nom',$nom,PDO::PARAM_STR);
    $insert ->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $insert->bindValue(':mail',$mail,PDO::PARAM_STR);
    $insert->bindValue(':num',$num,PDO::PARAM_STR);
    $insert-> bindValue(':mdp',$mdp,PDO::PARAM_STR);
    $insert-> bindValue(':res_administrateur',$res_administrateur,PDO::PARAM_STR);
    $insert-> bindValue(':res_interim',$res_interim,PDO::PARAM_STR);
    $insert-> bindValue(':res_fixe',$res_fixe,PDO::PARAM_STR);
    $insert->bindValue(':cout',$cout,PDO::PARAM_STR);
    $insert->bindValue(':res_actif',$res_actif,PDO::PARAM_STR);
    $insert->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
    $insert->execute();
     header('Location: ../admin_2/ajout_employe.php');

}
else
{
    ?>
Probleme formulaire
<?php
}