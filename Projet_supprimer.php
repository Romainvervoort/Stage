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
                        <span>Administration</span>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Les projets supprimé </span>
                    </li>
                    </li>
                </ul>
            </div>

            <div class="row">

                <div class="col-md-12">

                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">

                                <i class="icon-user font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Les projets supprimés</span>


                            </div>

                        </div>

                        <div class="portlet-body">

                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th> Nom du projet</th>
                                    <th>Nom du client </th>
                                    <th>Etat</th>
                                    <th>Régis</th>
                                    <th>Heure prévu</th>
                                    <th>Heure effectué</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $req= $bdd->prepare("Select projet_supp.id_projet, projet_supp.nom,entreprise.nom as nom2, projet_supp.etat, projet_supp.production_regis,projet_supp.temps, projet_supp.temps_total from projet_supp,entreprise where entreprise.id_Entreprise= projet_supp.id_Entreprise");
                                    $req->execute();
                                    while($donne = $req->fetch())
                                    {
                                    ?>
                                <tr>
                                    <th></th>
                                    <th><?php echo $donne['nom']; ?></th>
                                    <th><?php echo $donne['nom2']; ?></th>
                                    <th><?php echo $donne['etat']; ?></th>
                                    <th><?php echo $donne['production_regis']; ?></th>
                                    <th><?php echo $donne['temps']; ?></th>
                                    <th><?php echo $donne['temps_total']; ?></th>
                                    <form action="" method="post">
                                        <input class="form-control" name="id" id="id" type="hidden" value="<?php echo $donne['id_projet']?>" />
                                        <th><button id="Maj" name="Maj" class="btn green-sharp btn-large" data-toggle="confirmation" data-placement="top" data-btn-ok-label="Oui" data-btn-ok-icon="icon-like" data-btn-ok-class="btn-success" data-btn-cancel-label="Non!"
                                                    data-btn-cancel-icon="icon-close" data-btn-cancel-class="btn-danger">Mettre à jour</button>
                                        </th>
                                      </form>
                                </tr>
                                <?php
                                }


                                ?>
                                </tbody>




                            </table>
                            <?php
                            if(isset($_POST['id'])) {
                                if (isset($_POST['Maj'])) {
                                    $req=$bdd->prepare("Select * from projet_supp where id_projet=:projet");
                                    $req->bindValue(':projet',$_POST['id'],PDO::PARAM_INT);
                                    $req->execute();
                                    while($don=$req->fetch())
                                    {
                                        $req2=$bdd->prepare("Insert into projet( id_Projets,id_Entreprise,id_Contact,id_Users,date_creation,date_fin,etat,nom,production_active,production_regis,temps,temps_total) values (:projet,:entreprise,:contact,:users,:crea,:fin,:etat,:nom,:active,:regis,:temps,:tempstt)");
                                        $req2->bindValue(':projet',$don['id_projet'],PDO::PARAM_INT);
                                        $req2->bindValue(':entreprise',$don['id_entreprise'],PDO::PARAM_INT);
                                        $req2->bindValue(':contact',$don['id_Contact'],PDO::PARAM_INT);
                                        $req2->bindValue(':users',$don['id_Users'],PDO::PARAM_INT);
                                        $req2->bindValue(':crea',$don['date_creation'],PDO::PARAM_STR);
                                        $req2->bindValue(':fin',$don['date_fin'],PDO::PARAM_STR);
                                        $req2->bindValue(':etat',$don['etat'],PDO::PARAM_STR);
                                        $req2->bindValue(':nom',$don['nom'],PDO::PARAM_STR);
                                        $req2->bindValue(':active',$don['production_active'],PDO::PARAM_STR);
                                        $req2->bindValue(':regis',$don['production_regis'],PDO::PARAM_STR);
                                        $req2->bindValue(':temps',$don['temps'],PDO::PARAM_INT);
                                        $req2->bindValue(':tempstt',$don['temps_total'],PDO::PARAM_INT);
                                        $req2->execute();


                                    }
                                    $req->closeCursor();
                                    // $req= $bdd->prepare("Delete from projet where id_Projets=:projet");
                                    //    $req->bindValue(':projet',$_POST['id'],PDO::PARAM_INT);
                                    //header('Location: ../admin_2/Administration_projet.php');
                                }
                            }
                            ?>
                        </div>

                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>

            <!--Mes tâches -->


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
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

</body>

</html>