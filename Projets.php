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


?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<!-- La nav bar -->
<?php include "nav_bar.php";
if(isset($_GET['id']))
{
    $id_Projets=$_GET['id'];
    $_SESSION['id_Projets']=$id_Projets;
};?>

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

            <!-- Dans une class row il y a 2 div -->

            <div class="row">

                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                     <span class="caption-subject font-green bold uppercase"><center>  <?php $req= $bdd->prepare("Select * from projet where id_Projets=:id ");
                          $req->bindValue(':id',$_SESSION['id_Projets'],PDO::PARAM_INT);
                          $req->execute();
                          while($donne=$req->fetch())
                          {
                              echo $donne['nom'];
                              $id= $donne['id_Entreprise'];
                              $temps=(int)($donne['temps']/60);
                              if($donne['temps_total']>0) {
                                  $temps = $donne['temps'];
                                  $tempstt = $donne['temps_total'];
                                  $temps = (int)($temps / 60);
                                  $avancement = ($temps * 100) / $tempstt;
                              }
                              else
                              {
                                  $avancement= 50;
                              }


                          }
                          $req->closeCursor();?></center></span>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="container">
                       <center> <h2>Avancement du projet <?php echo $avancement?>%</h2></center>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="80" aria-valuemax="100" style="width:<?php echo $avancement?>%">
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <p> Client : <?php
                            $req = $bdd->prepare("Select nom from entreprise where id_Entreprise=:entreprise");
                            $req->bindValue(':entreprise',$id,PDO::PARAM_INT);
                            $req->execute();
                            while($do=$req->fetch())
                            {
                                echo $do['nom'];
                            }
                            $req->closeCursor();
                            ?> </p>
                        <p> Temps passé sur le projet : <?php echo $temps ?> heures </p>
                        <p> Nombre de Tâches : <?php
                            $req = $bdd->prepare("Select count(id_Tache)As nbr from taches where id_Projet=:projet");
                            $req->bindValue(':projet',$_SESSION['id_Projets'],PDO::PARAM_INT);
                            $req->execute();
                            while($do = $req->fetch())
                            {
                                echo $do['nbr'];
                                $nbr=$do['nbr'];
                            }
                            $req->closeCursor();
                            ?></p>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!--Mes tâches -->
            <div class="row">

                <div class="col-md-6">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-cursor font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Avancement des tâches</span>
                            </div>
                        </div>
                        <?php
                        $req=$bdd->prepare("Select count(*)AS nbr2 from taches where id_Projet:projet and etat<>'fini';");
                            $req->bindValue(':projet',$_SESSION['id_Projets'],PDO::PARAM_INT);
                        $req->execute();
                        $val=$req->rowCount();
                        if($val==0)
                        {
                            $nbr2=0;
                        }
                        else {
                            while ($don = $req->fetch()) {
                                $nbrfini = $don['nbr2'];
                            }
                            $req->closeCursor();
                        }
                        $pour = ($nbr2*100)/$nbr;
                        ?>
                        <p> Pourcentage déjà effectué</p>
                        <div class="portlet-body">
                            <div class="easy-pie-chart">
                                <div class="number visits" data-percent="
                                  <?php echo $pour; ?>"> <span><?php  echo $pour;  ?>%</span>
                                </div>
                        </div>

                        <div class="margin-bottom-10 visible-sm"></div>

                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
                    </div>

                <div class="col-md-6">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <p> Les tâches : </p>
                        <p><?php
                        $req=$bdd->prepare("Select nom from taches where id_Projet=:projet and nom<>''");
                            $req->bindValue(':projet',$_SESSION['id_Projets'],PDO::PARAM_INT);
                            $req->execute();
                            while ($do= $req->fetch())
                            {
                                echo $do['nom'];
                                ?>
                            </br>
                            <?php
                            }
                            $req->closeCursor();
                            ?></p>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
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
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>