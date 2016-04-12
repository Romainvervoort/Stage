<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<?php include "head.html";
include "connexion.php";
session_start(); ?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<!-- La nav bar -->
<?php include "nav_bar.html"?>

<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- Menu -->
    <?php include "menu.html"?>

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">


            <!-- END PAGE HEADER-->

            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="Home.php">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="Mes_projets.php">Mes projets</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="extraction.php">Extraction des données</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Résultat de l'extraction</span>
                    </li>
                </ul>
            </div>
            <!-- Chemin -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <span class="caption-subject bold uppercase"> Nom du projet nom du client</span>
                            </div>
                        </div>
                        <!-- EN tête-->
                        <!--Début tableau -->
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                    <thead>
                                    <tr>
                                    <th> Utilisateur </th>
                                    <th> Nom projet </th>
                                    <th> Tâche </th>
                                    <th> date </th>
                                    <th> Heure passé </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <!-- Récupération des informations -->
                                    <?php
                                    if(isset ($_POST['date_dep'])) {
                                        /* Récupération des check boxe checked */
                                        $Projets = $_POST['Projets'];
                                        $date_dep = $_POST['date_dep'];
                                        $date_fin = $_POST['date_fin'];
                                        /*       $Clients = $_POST['Clients'];*/
                                        $req = $bdd->query("Select * from utilisateur where actif='true'");
                                        while ($donnees = $req->fetch()) {
                                            $pseudo = $donnees['pseudo'];

                                            if (isset($_POST['' . $pseudo])) {
                                                $id_Users = $donnees['id_Users'];
                                                if (empty($_POST['Client']) == 1 && empty($_POST['Projets'])==1 && empty($_POST['date_dep'])==1)
                                                {
                                                    /* Récupération de la ventillation  pour l'utilisateur X */
                                                    $req2 = $bdd->prepare("Select * from ventillation where id_Users=:id_Users ORDER BY id_Projets");
                                                    $req2->bindValue(':id_Users', $id_Users, PDO::PARAM_INT);
                                                    $req2->execute();
                                                    while ($don = $req2->fetch()) {
                                                        $id_projets = $don['id_Projets'];
                                                        $id_tache = $don['id_tache'];
                                                        ?>
                                                        <td><?php echo $pseudo ?> </td>
                                                        <td><?php
                                                            $req3 = $bdd->prepare("Select * from projet where id_Projets=:id_projets");
                                                            $req3->bindValue(':id_projets', $id_projets, PDO::PARAM_INT);
                                                            $req3->execute();
                                                            while ($donprojet = $req3->fetch()) {
                                                                echo $donprojet['nom'];
                                                            }
                                                            $req3->closeCursor();
                                                            ?></td>
                                                        <td><?php
                                                            $req3 = $bdd->prepare("Select * from taches where id_tache=:id_tache");
                                                            $req3->bindValue(':id_tache', $id_tache, PDO::PARAM_INT);
                                                            $req3->execute();
                                                            while ($dontache = $req3->fetch()) {
                                                                echo $dontache['nom'];
                                                            }
                                                            $req3->closeCursor();
                                                            ?></td>
                                                        <td> <?php echo $don['date']; ?></td>
                                                        <td> <?php echo $don['temps'] ?></td>
                                                        </tr>
                                                        <?php

                                                    }
                                                }
                                                else
                                                {
                                                    /*Utilisateur + projet*/
                                                    if(isset($_POST['Projets']) && empty($_POST['date_dep'])==1)
                                                    {
                                                        $projet1 = $bdd-> prepare("Select * from projet where nom=:Projets");
                                                        $projet1 ->bindValue(':Projets',$Projets,PDO::PARAM_STR);
                                                        $projet1 -> execute();
                                                        while($donprojet1=$projet1->fetch())
                                                        {
                                                            $id_projets= $donprojet1['id_Projets'];
                                                        }
                                                        $projet1->closeCursor();
                                                        $projets2 = $bdd-> prepare("Select * from ventillation where id_Projets=:id_projets and id_Users=:id_Users");
                                                        $projets2 -> bindValue(':id_projets',$id_projets,PDO::PARAM_INT);
                                                        $projets2->bindValue(':id_Users',$id_Users,PDO::PARAM_INT);
                                                        $projets2->execute();
                                                        while($donprojets=$projets2->fetch())
                                                        {
                                                            $id_tache = $donprojets['id_tache'];
                                                            $date= $donprojets['date'];
                                                            $temps= $donprojets['temps'];
                                                            ?>
                                                            <td><?php echo $pseudo ?></td>
                                                            <td><?php echo $Projets?></td>
                                                            <td> <?php $req3 = $bdd->prepare("Select * from taches where id_tache=:id_tache");
                                                                $req3->bindValue(':id_tache', $id_tache, PDO::PARAM_INT);
                                                                $req3->execute();
                                                                while ($donprojets = $req3->fetch()) {
                                                                    echo $donprojets['nom'];
                                                                }
                                                                $req3->closeCursor();
                                                                ?>
                                                                </td>
                                                            <td> <?php echo $date;?></td>
                                                            <td> <?php echo $temps;?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        /* Utilisateur + projet +date*/
                                                        if(isset($_POST['Projets']) && empty($_POST['date_dep'])!=1)
                                                        {
                                                        $today = date("Y-m-d");
                                                        $projet1 = $bdd-> prepare("Select * from projet where nom=:Projets");
                                                        $projet1 ->bindValue(':Projets',$Projets,PDO::PARAM_STR);
                                                        $projet1 -> execute();
                                                        while($donprojet1=$projet1->fetch())
                                                        {
                                                            $id_projets= $donprojet1['id_Projets'];
                                                        }
                                                        $projet1->closeCursor();
                                                        $projets2 = $bdd-> prepare("Select * from ventillation where id_Projets=:id_projets and id_Users=:id_Users and date BETWEEN :date_dep and :today");
                                                        $projets2 -> bindValue(':id_projets',$id_projets,PDO::PARAM_INT);
                                                        $projets2->bindValue(':id_Users',$id_Users,PDO::PARAM_INT);
                                                        $projets2->bindValue(':date_dep',$date_dep,PDO::PARAM_STR);
                                                        $projets2->bindValue(':today',$today,PDO::PARAM_STR);
                                                        $projets2->execute();
                                                        while($donprojet2=$projets2->fetch())
                                                        {

                                                            $id_tache = $donprojet2['id_tache'];
                                                             $date= $donprojet2['date'];
                                                            $temps= $donprojet2['temps'];
                                                            ?>
                                                            <td><?php echo $pseudo ?></td>
                                                            <td><?php echo $Projets?></td>
                                                            <td> <?php $req3 = $bdd->prepare("Select * from taches where id_tache=:id_tache");
                                                                $req3->bindValue(':id_tache', $id_tache, PDO::PARAM_INT);
                                                                $req3->execute();
                                                                while ($donprojet2 = $req3->fetch()) {
                                                                    echo $donprojet2['nom'];
                                                                }
                                                                $req3->closeCursor();
                                                                ?></td>
                                                            <td> <?php echo $date?></td>
                                                            <td> <?php echo $temps?></td>
                                                            </tr>

                                                            <?php
                                                        }

                                                        }
                                                        else
                                                        {
                                                            /*Utilisateur + client*/
                                                            if(empty($_POST['Clients'])!=1 && empty($_POST['date_dep'])==1)
                                                            {

                                                            }
                                                            else
                                                            {
                                                                /* Utilisateur + client + date */
                                                                if(empty($_POST['Clients'])!=1 && empty($_POST['date_dep'])!=1){

                                                                }
                                                                else
                                                                {
                                                                    /* Utilisateur + date*/
                                                                    if(empty($_POST['Clients'])==1 && empty($_POST['date_dep'])!=1&& empty($_POST['Projets'])==1)
                                                                    {

                                                                    }
                                                                    else
                                                                    {


                                                                    }

                                                                }


                                                            }
                                                        }
                                                    }

                                                }
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "Information manquante";
                                    }

                                    ?>
                                </tbody>
                        </div>



                        </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div class="row">
                <?php
                if(isset ($_POST['date_dep'])) {
                    /* Récupération des check boxe checked */
                    $Projets = $_POST['Projets'];
                    $date_dep = $_POST['date_dep'];
                    $date_fin = $_POST['date_fin'];
             /*       $Clients = $_POST['Clients'];*/
                    $req = $bdd->query("Select * from utilisateur where actif='true'");
                    while ($donnees = $req->fetch()) {
                        $pseudo = $donnees['pseudo'];

                        if (isset($_POST['' . $pseudo])) {
                            $id_Users = $donnees['id_Users'];
                            if (empty($_POST['Client']) == 1 && empty($_POST['Projets'])==1 && empty($_POST['date_dep'])==1)
                            {
                                /* Récupération de la ventillation  pour l'utilisateur X */
                                $req2 = $bdd->prepare("Select * from ventillation where id_Users=:id_Users ORDER BY id_Projets");
                                $req2->bindValue(':id_Users', $id_Users, PDO::PARAM_INT);
                                $req2->execute();
                                while ($don = $req2->fetch()) {
                                    $id_projets = $don['id_Projets'];
                                    $id_tache = $don['id_tache'];
                                    ?>
                                    <td><?php echo $pseudo ?> </td>
                                    <td><?php
                                        $req3 = $bdd->prepare("Select * from projet where id_Projets=:id_projets");
                                        $req3->bindValue(':id_projets', $id_projets, PDO::PARAM_INT);
                                        $req3->execute();
                                        while ($donprojet = $req3->fetch()) {
                                            echo $donprojet['nom'];
                                        }
                                        $req3->closeCursor();
                                        ?></td>
                                    <td><?php
                                        $req3 = $bdd->prepare("Select * from taches where id_tache=:id_tache");
                                        $req3->bindValue(':id_tache', $id_tache, PDO::PARAM_INT);
                                        $req3->execute();
                                        while ($dontache = $req3->fetch()) {
                                            echo $dontache['nom'];
                                        }
                                        $req3->closeCursor();
                                        ?></td>
                                    <td> <?php echo $don['date']; ?></td>
                                    <td> <?php echo $don['temps'] ?></td>
                                    <?php

                                }
                            }
                            else
                            {
                                /*Utilisateur + projet*/
                                if(isset($_POST['Projets']) && empty($_POST['date_dep'])==1)
                                {
                                    $projet1 = $bdd-> prepare("Select * from projet where nom=:Projets");
                                    $projet1 ->bindValue(':Projets',$Projets,PDO::PARAM_STR);
                                    $projet1 -> execute();
                                    while($donprojet1=$projet1->fetch())
                                    {
                                        $id_projets= $donprojet1['id_Projets'];
                                    }
                                    $projet1->closeCursor();
                                    $projets2 = $bdd-> prepare("Select * from ventillation where id_Projets=:id_projets and id_Users=:id_Users");
                                    $projets2 -> bindValue(':id_projets',$id_projets,PDO::PARAM_INT);
                                    $projets2->bindValue(':id_Users',$id_Users,PDO::PARAM_INT);
                                    $projets2->execute();
                                    while($donprojet2=$projets2->fetch())
                                    {
                                        $id_tache = $donprojet2['id_tache'];
                                        ?>
                                        <td><?php echo $pseudo ?></td>
                                        <td><?php echo $Projets?></td>
                                        <td> <?php $req3 = $bdd->prepare("Select * from taches where id_tache=:id_tache");
                                            $req3->bindValue(':id_tache', $id_tache, PDO::PARAM_INT);
                                            $req3->execute();
                                            while ($donprojet2 = $req3->fetch()) {
                                                echo $donprojet2['nom'];
                                            }
                                            $req3->closeCursor();
                                            ?></td>
                                        <td> <?php echo $donprojet2['date']?></td>
                                        <td> <?php echo $donprojet2['temps']?></td>

                <?php
                                    }
                                }
                                else
                                {
                                    /* Utilisateur + projet +date*/
                                    if(empty($_POST['Projets'])!=1 && empty($_POST['date_dep'])!=1)
                                    {
                                        $today = date("Y-m-d");
                                        $projet1 = $bdd-> prepare("Select * from projet where nom=:Projets");
                                        $projet1 ->bindValue(':Projets',$Projets,PDO::PARAM_STR);
                                        $projet1 -> execute();
                                        while($donprojet1=$projet1->fetch())
                                        {
                                            $id_projets= $donprojet1['id_Projets'];
                                        }
                                        $projet1->closeCursor();
                                        $projets2 = $bdd-> prepare("Select * from ventillation where id_Projets=:id_projets and id_Users=:id_Users and date BETWEEN :date_dep and :today");
                                        $projets2 -> bindValue(':id_projets',$id_projets,PDO::PARAM_INT);
                                        $projets2->bindValue(':id_Users',$id_Users,PDO::PARAM_INT);
                                        $projets2->bindValue(':date_dep',$date_dep,PDO::PARAM_STR);
                                        $projets2->bindValue(':today',$today,PDO::PARAM_STR);
                                        $projets2->execute();
                                        while($donprojet2=$projets2->fetch())
                                        {
                                            $id_tache = $donprojet2['id_tache'];
                                            ?>
                                            <td><?php echo $pseudo ?></td>
                                            <td><?php echo $Projets?></td>
                                            <td> <?php $req3 = $bdd->prepare("Select * from taches where id_tache=:id_tache");
                                                $req3->bindValue(':id_tache', $id_tache, PDO::PARAM_INT);
                                                $req3->execute();
                                                while ($donprojet2 = $req3->fetch()) {
                                                    echo $donprojet2['nom'];
                                                }
                                                $req3->closeCursor();
                                                ?></td>
                                            <td> <?php echo $donprojet2['date']?></td>
                                            <td> <?php echo $donprojet2['temps']?></td>

                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        /*Utilisateur + client*/
                                        if(empty($_POST['Clients'])!=1 && empty($_POST['date_dep'])==1)
                                        {

                                        }
                                        else
                                        {
                                            /* Utilisateur + client + date */
                                            if(empty($_POST['Clients'])!=1 && empty($_POST['date_dep'])!=1){

                                            }
                                            else
                                            {
                                                /* Utilisateur + date*/
                                                if(empty($_POST['Clients'])==1 && empty($_POST['date_dep'])!=1&& empty($_POST['Projets'])==1)
                                                {

                                                }
                                                else
                                                {


                                                }

                                            }


                                        }
                                    }
                                }

                            }
                        }
                    }
                }
                else
                {
                    echo "Information manquante";
                }

                ?>
            </div>
<?php


?>
    </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>

    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- Etape 3 : le containter -->
<!-- Etape 4 : le footer -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2015 &copy; Metronic by keenthemes.
        <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->

</body>

</html>