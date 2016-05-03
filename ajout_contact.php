<?php
include "connexion.php";
session_start();
if(isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $num = $_POST['num'];
    $fax = $_POST['fax'];
    $mail = $_POST['mail'];
    $pro = $_POST['entreprise'];
    if(strcmp($pro,'')==0)
    {
        $insert = $bdd->prepare("Insert into contact(nom,prenom,mail,fax,numero)values(:nom,:prenom,:mail,:fax,:num)");
        $insert->bindValue(':nom', $nom, PDO::PARAM_STR);
        $insert->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $insert->bindValue(':mail', $mail, PDO::PARAM_STR);
        $insert->bindValue(':fax', $fax, PDO::PARAM_STR);
        $insert->bindValue(':num', $num, PDO::PARAM_STR);
       $insert->execute();
        header('Location: ../admin_2/formulaire_client.php');
    }
    else
    {


    $rep = $bdd->prepare("Select * from entreprise where nom=:pro");
    $rep->bindValue(':pro', $pro, PDO::PARAM_STR);
    $rep->execute();
    while ($donnees = $rep->fetch()) {
        $id = $donnees['id_Entreprise'];
        $insert = $bdd->prepare("Insert into contact(id_Entreprise,nom,prenom,mail,fax,numero)values(:id,:nom,:prenom,:mail,:fax,:num)");
        $insert->bindValue(':id', $id, PDO::PARAM_INT);
        $insert->bindValue(':nom', $nom, PDO::PARAM_STR);
        $insert->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $insert->bindValue(':mail', $mail, PDO::PARAM_STR);
        $insert->bindValue(':fax', $fax, PDO::PARAM_STR);
        $insert->bindValue(':num', $num, PDO::PARAM_STR);
        $insert->execute();

    }
    $rep->closeCursor();
    }
  header('Location: ../admin_2/formulaire_client.php');
}
else
{
    echo"Problème formulaire";
}