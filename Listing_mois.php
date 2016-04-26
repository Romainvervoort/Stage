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
                        <a href="fiche_jour.php">Les fiches jour</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Listing des horaires mois</span>
                    </li>
                </ul>
            </div>
            <!-- Chemin -->
            <div class="row">
                <?php
                $cpt =0;
                $date = '2016' . '-' . '04' . '-01';

                $req = $bdd->prepare("Select * from utilisateur");
                $req->execute();
                while ($donnees = $req->fetch()) {
                    $id_Users = $donnees['id_Users'];
                }
                $req->closeCursor();
                $nbrjour = cal_days_in_month(CAL_GREGORIAN, '04', '2016');
                for ($i = 1; $i <= $nbrjour; $i++) {
                    $date = '2016' . '-' . '04' . '-' . $i;
?>
                    <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <span> <?php echo date('l j F Y', mktime(0, 0, 0, 04, $i, 2016));?></span></br>
                            </div>
                        </div>
                        <!-- EN tête-->
                        <!--Début tableau -->
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th> Pseudo </th>
                                    <th> Arrivé </th>
                                    <th> Départ midi </th>
                                    <th> Retour midi </th>
                                    <th> Départ  </th>
                                    <th> Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php
                                $req =$bdd->prepare("Select * from horaire where Jours=:dates and id_Users<>0");
                                $req->bindValue(':dates',$date,PDO::PARAM_STR);
                                $req->execute();
                                while($donnees= $req->fetch())
                                {
                                $req2=$bdd->prepare("Select * from utilisateur where id_Users=:id_user");
                                    $req2->bindValue(':id_user',$donnees['id_Users']);
                                    $req2->execute();
                                    while($donpseudo = $req2->fetch())
                                    {
                                        ?>
                                <td><?php echo $donpseudo['pseudo']; ?></td>
                                <?php
                                    }
                                    $req2->closeCursor();
                                    ?>
                                <td><?php echo $donnees['Arrive'];?></td>
                                <td> <?php echo $donnees['Depart_midi'];?></td>
                                <td><?php echo $donnees['Retour_midi']?></td>
                                <td><?php echo $donnees['Depart'];?></td>
                                <td> <?php
                                    $arrive = explode(':',$donnees['Arrive']);
                                    $depmidi =explode(':',$donnees['Depart_midi']);
                                    $retourmidi = explode(':',$donnees['Retour_midi']);
                                    $depart = explode(':',$donnees['Depart']);
                                    $totalmatin= ((($depmidi[0]-$arrive[0])*60))+($depmidi[0]-$arrive[0]);

                                 //   echo ((int)($totalmatin/60)).'Heures'.($totalmatin-(((int)$totalmatin/60)*60)).'Minutes';
                                    $h1=strtotime($donnees['Arrive']);
                                    $h2=strtotime($donnees['Depart_midi']);
                                    $h3=strtotime($donnees['Retour_midi']);
                                    $h4=strtotime($donnees['Depart']);
                                    $res1=gmdate('H:i',($h2-$h1)+($h4-$h3));
                                  echo $res1;
                                    ?> </td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        </td>
                        </tr>

                        </tbody>
                        </table>
                    </div>
                </div>
                <?php
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