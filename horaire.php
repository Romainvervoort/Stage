<!DOCTYPE html>
<?php include "connexion.php";
session_start();
if(isset($_POST['Arrive'])) {
    $arrive= $_POST['Arrive'];
    $dep_midi = $_POST['Depart_midi'];
    $ret_midi = $_POST['Retour_midi'];
    $depart= $_POST['Depart'];
    if (isset($_POST['Maj'])) {
        if(strcmp($arrive,$dep_midi)==0) {
            $req = $bdd->prepare("Update horaire set Arrive=:arrive, Depart_midi=:dep_midi,Retour_midi=:ret_midi,Depart=:depart where id_Users=:user and Jours=:dates");
            $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
            $req->bindValue(':dep_midi', '00:00:00', PDO::PARAM_STR);
            $req->bindValue(':ret_midi', '00:00:00', PDO::PARAM_STR);
            $req->bindValue(':depart', '00:00:00', PDO::PARAM_STR);
            $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
            $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
            $req->execute();
            header('Location: ../admin_2/home.php');
        }
        else {

            if (strcmp($dep_midi, $ret_midi) == 0) {
                $req = $bdd->prepare("Update horaire set Arrive=:arrive, Depart_midi=:dep_midi,Retour_midi=:ret_midi,Depart=:depart where id_Users=:user and Jours=:dates");
                $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
                $req->bindValue(':dep_midi', $dep_midi, PDO::PARAM_STR);
                $req->bindValue(':ret_midi', '00:00:00', PDO::PARAM_STR);
                $req->bindValue(':depart', '00:00:00', PDO::PARAM_STR);
                $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
                $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
                $req->execute();
                header('Location: ../admin_2/home.php');
            } else {
                if (strcmp($ret_midi, $depart)==0) {
                    $req = $bdd->prepare("Update horaire set Arrive=:arrive, Depart_midi=:dep_midi,Retour_midi=:ret_midi,Depart=:depart where id_Users=:user and Jours=:dates");
                    $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
                    $req->bindValue(':dep_midi', $dep_midi, PDO::PARAM_STR);
                    $req->bindValue(':ret_midi', $ret_midi, PDO::PARAM_STR);
                    $req->bindValue(':depart', '00:00:00', PDO::PARAM_STR);
                    $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
                    $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
                    $req->execute();
                    header('Location: ../admin_2/home.php');
                } else {
                    $req = $bdd->prepare("Update horaire set Arrive=:arrive, Depart_midi=:dep_midi,Retour_midi=:ret_midi,Depart=:depart where id_Users=:user and Jours=:dates");
                    $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
                    $req->bindValue(':dep_midi', $dep_midi, PDO::PARAM_STR);
                    $req->bindValue(':ret_midi', $ret_midi, PDO::PARAM_STR);
                    $req->bindValue(':depart', $depart, PDO::PARAM_STR);
                    $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
                    $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
                    $req->execute();
                    header('Location: ../admin_2/home.php');
                }
            }
        }

            } else {
        if (isset($_POST['Enregistrer'])) {
            $arrive = $_POST['Arrive'];
            $dep_midi = $_POST['Depart_midi'];
            $ret_midi = $_POST['Retour_midi'];
            $depart = $_POST['Depart'];

            if(strcmp ($arrive, $dep_midi)==0)
            {
                $req = $bdd->prepare("Insert into horaire (Arrive,Depart_midi,Retour_midi,Depart,Jours,id_Users)VALUES (:arrive,:dep_midi,:ret_midi,:depart,:dates,:user)");
                $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
                $req->bindValue(':dep_midi', '00:00:00', PDO::PARAM_STR);
                $req->bindValue(':ret_midi', '00:00:00', PDO::PARAM_STR);
                $req->bindValue(':depart', '00:00:00', PDO::PARAM_STR);
                $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
                $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
                $req->execute();
                 header('Location: ../admin_2/home.php');
            }
            else {
                if (strcmp($dep_midi, $ret_midi) == 0) {
                    $req = $bdd->prepare("Insert into horaire (Arrive,Depart_midi,Retour_midi,Depart,Jours,id_Users)VALUES (:arrive,:dep_midi,:ret_midi,:depart,:dates,:user)");
                    $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
                    $req->bindValue(':dep_midi', $dep_midi, PDO::PARAM_STR);
                    $req->bindValue(':ret_midi', '00:00:00', PDO::PARAM_STR);
                    $req->bindValue(':depart', '00:00:00', PDO::PARAM_STR);
                    $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
                    $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
                    $req->execute();
                      header('Location: ../admin_2/home.php');
                } else {
                    if (strcmp($ret_midi, $depart) == 0) {
                        $req = $bdd->prepare("Insert into horaire (Arrive,Depart_midi,Retour_midi,Depart,Jours,id_Users)VALUES (:arrive,:dep_midi,:ret_midi,:depart,:dates,:user)");
                        $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
                        $req->bindValue(':dep_midi', $dep_midi, PDO::PARAM_STR);
                        $req->bindValue(':ret_midi', $ret_midi, PDO::PARAM_STR);
                        $req->bindValue(':depart', '00:00:00', PDO::PARAM_STR);
                        $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
                        $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
                        $req->execute();
                       header('Location: ../admin_2/home.php');
                    }
                    else
                    {
                        $req = $bdd->prepare("Insert into horaire (Arrive,Depart_midi,Retour_midi,Depart,Jours,id_Users)VALUES (:arrive,:dep_midi,:ret_midi,:depart,:dates,:user)");
                        $req->bindValue(':arrive', $arrive, PDO::PARAM_STR);
                        $req->bindValue(':dep_midi', $dep_midi, PDO::PARAM_STR);
                        $req->bindValue(':ret_midi', $ret_midi, PDO::PARAM_STR);
                        $req->bindValue(':depart', $depart, PDO::PARAM_STR);
                        $req->bindValue(':user', $_SESSION['id'], PDO::PARAM_INT);
                        $req->bindValue(':dates', $_SESSION['dates'], PDO::PARAM_STR);
                        $req->execute();
                        header('Location: ../admin_2/home.php');
                    }
                }
            }

        }

    }
}


else
{
    echo "Echec formulaire";
}
