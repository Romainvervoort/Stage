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
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<?php include "head.html" ;
include "connexion.php"?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<!-- La nav bar -->
<?php include "nav_bar.php"?>

<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- Menu -->
    <?php include "menu.php"?>

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
                        <a href="fiche_jour.php">Les fiches jour</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Résultat de l'extraction</span>
                    </li>
                </ul>
            </div>
            <!-- Chemin -->
            <div class="row">
                <?php
                if(isset($_POST['employe'])) {
                    $cpt =0;
                    $employe = $_POST['employe'];
                    $date = $_POST['annee'] . '-' . $_POST['mois'] . '-01';

                    $req = $bdd->prepare("Select * from utilisateur where pseudo=:pseudo");
                    $req->bindValue(':pseudo', $employe, PDO::PARAM_STR);
                    $req->execute();
                    while ($donnees = $req->fetch()) {
                        $id_Users = $donnees['id_Users'];
                    }
                    $req->closeCursor();
                    $nbrjour = cal_days_in_month(CAL_GREGORIAN, $_POST['mois'], $_POST['annee']);
                    for ($i = 1; $i <= $nbrjour; $i++) {
                        $date = $_POST['annee'] . '-' . $_POST['mois'] . '-'.$i;
                        ?>
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <span
                                        class="caption-subject bold uppercase"> <?php echo $employe . ' / ' . date('l j F Y', mktime(0, 0, 0, $_POST['mois'], $i, $_POST['annee'])) . '   ' . 'Semaine :' . date('W', mktime(0, 0, 0, $_POST['mois'], $i, $_POST['annee'])) ?></span>
                                </div>
                            </div>
                            <!-- EN tête-->
                            <!--Début tableau -->

                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                    id="sample_1">
                                    <thead>
                                    <tr><th></th>
                                        <th> Projet</th>
                                        <th> Client</th>
                                        <th> Tâche</th>
                                        <th> Description</th>
                                        <th> heure</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $req2= $bdd->prepare("Select taches.nom2,projet.nom,entreprise.nom as nomcli, taches.description, taches.temps from taches,projet,entreprise where taches.id_Projet=projet.id_Projets and entreprise.id_Entreprise=projet.id_Entreprise and taches.id_Users=:id_Users and date_taches=:dates");
                                        $req2->bindValue(':id_Users',$id_Users,PDO::PARAM_INT);
                                        $req2->bindValue(':dates',$date,PDO::PARAM_STR);
                                        $req2->execute();
                                        if($req2->rowCount()==0)
                                        {
                                            ?>
                                            <tr class="odd gradeX">
                                            <td>Pas de donnée   </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                            else
                                            {
                                                while($don=$req2->fetch())
                                                {

                                                ?>
                                                    <tr class="odd gradeX">
                                                        <td></td>
                                                        <th><?php echo $don['nom']; ?></th>
                                                        <th><?php echo $don['nomcli']?></th>
                                                        <td><?php echo $don['nom2'];?></td>
                                                        <td><?php echo $don['description'];?></td>
                                                        <td> <?php $temps= $don['temps'];
                                                            echo (int)($temps/60).' H '.($temps-((int)($temps/60))*60).' min ';
                                                        $cpt=$cpt+$don['temps'];?></td>
                                                    </tr>

                                                    <?php
                                                }

                                            }
                                        ?>


                                    </tbody>
                                </table>
                        <?php
                        $var =date('l', mktime(0, 0, 0, $_POST['mois'], $i, $_POST['annee']));
                        $var2 = "Sunday";

                        if(strcmp($var,$var2)==0)
                        {
                        ?>
                        <h1><center><?php echo (int)($cpt/60).' H '.($cpt-((int)($cpt/60)*60)).' min ';?> Semaine : <?php echo date('W', mktime(0, 0, 0, $_POST['mois'], $i, $_POST['annee']))?></center></h1>
                        <?php
                        $cpt=0;
                    }
                    ?>
                            </div>
                            </td>
                            </tr>

                            </tbody>
                            </table>
                        </div>
                        <?php
                    }
                }
                else
                {

                }
                ?>



                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>


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