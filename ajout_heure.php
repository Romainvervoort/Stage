<?php
session_start();
 $id= $_GET['id'];
include "connexion.php";
    $req= $bdd->prepare("Select heure_prevu from groupe_projet where id_Users=:users and id_projet=:id");
    $req->bindValue(':users',$id,PDO::PARAM_INT);
    $req->bindValue(':id',$_SESSION['id_Projets'],PDO::PARAM_INT);
    $req->execute();
    while ($donne= $req->fetch())
    {
        $time= $donne['heure_prevu'];
    }
    $req->closeCursor();
    ?>
<form action="" method="post">
    <input type="text"id="temps" name="temps" value="<?php echo $time?>">
    <input type="submit" name="Envoyer" value="Envoyer">
</form>
<?php
if(isset($_POST['temps']))
{
    echo $time. $_SESSION['id_Projets'].$id;
    $req=$bdd->prepare("Update  groupe_projet set heure_prevu=:temps where id_Users=:users and id_projet=:id");
    $req->bindValue(':temps',$_POST['temps'],PDO::PARAM_INT);
    $req->bindValue(':users',$id,PDO::PARAM_INT);
    $req->bindValue(':id',$_SESSION['id_Projets'],PDO::PARAM_INT);
    $req->execute();?>
    <script>
        javascript:parent.opener.location.reload();
        window.close();
    </script>
<?php

}

?>
