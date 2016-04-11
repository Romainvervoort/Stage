<?php
include "connexion.php";
session_start();
if (isset ($_POST['nom']))
{
  /* Verification de la case coché */
    if(isset($_POST['actif']))
    {
       $res_actif = 1;
       echo "actif oui";
       ?>
       </br>
       <?php
    }
    else
    {
        $res_actif=0;
    }
    if(isset($_POST['fixe']))
    {
        $res_fixes = 1;
        echo "fixe oui";
        ?>
        </br>
        <?php
    }
    else
    {
        $res_fixe=0;
    }
    if(isset($_POST['interim']))
    {
        $res_interim = 1;
        echo "Interim Oui";
        ?>
        </br>
        <?php
    }
    else
    {
        $res_interim=0;
    }
    if(isset($_POST['administrateur']) )
    {
        $res_administrateur = 1;
        echo "Admin oui";
    }
    else
    {
        $res_administrateur=0;
    }
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $pseudo=$_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $cout=$_POST['cout'];
    $num=$_POST['num'];
    $mail=$_POST['mail'];
    /* Fin de la vérification checbox */
    $insert = $bdd-> prepare("Insert into utilisateur(Nom,Prenom,mail,telephone,mdp,administrateur,interim,fixe,cout_heure,actif)values(':nom,:prenom,:mail,;num,:mdp,:res_administrateur,:tes_interim,:tes_fixe,:cout,:res_actif')");
    $insert ->bindValue(':nom',$nom,PDO::PARAM_STR);
    $insert ->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $insert->bindValue(':mail',$mail,PDO::PARAM_STR);
    $insert->bindValue(':num',$num,PDO::PARAM_STR);
    $insert-> bindValue(':mdp',$mdp,PDO::PARAM_STR);
    $insert-> bindValue(':res_administrateur',$res_administrateur,PDO::PARAM_INT);
    $insert-> bindValue(':res_interim',$res_interim,PDO::PARAM_INT);
    $insert-> bindValue(':res_fixe',$res_fixe,PDO::PARAM_INT);
    $insert->bindValue(':cout',$cout,PDO::PARAM_STR);
}
else
{
    ?>
Probleme formulaire
<?php
}