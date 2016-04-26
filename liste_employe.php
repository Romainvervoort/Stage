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
                        <span>Liste des employés</span>
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
                                <span class="caption-subject font-green bold uppercase">Les employés</span>


                            </div>

                        </div>

                        <a href="ajout_employe.php"><input type="submit" value="Ajouter un employé"></a>

                        <div class="portlet-body">

                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th>Nom </th>
                                        <th>Prénom </th>
                                        <th>Pseudo</th>
                                        <th>Administrateur</th>
                                        <th>Employé actif</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <?php
                                        $req= $bdd->prepare("Select * from utilisateur");
                                        $req->execute();
                                        while($donnees= $req->fetch()){
                                            ?>
                                        <th><?php echo $donnees['Nom'];?></th>
                                        <th><?php echo $donnees['Prenom'];?></th>
                                        <th><?php echo $donnees['pseudo'];?></th>
                                        <th>
                                            <?php
                                            $var1 = $donnees['administrateur'];
                                            $var2 = "true";
                                            if(strcmp($var1,$var2)==0)
                                            {
                                                ?>
                                            <form>
                                                <INPUT type="checkbox" name="test" id="test" value="1"checked>

                                            <?php
                                            }
                                            else
                                            {
                                               ?>

                                                <INPUT type="checkbox" name="choix1" value="1">

                                            <?php
                                            }

                                            ?>

                                            </th>
                                        <th>
                                            <?php
                                            $var1 = $donnees['actif'];
                                            $var2 = "true";
                                            if(strcmp($var1,$var2)==0)
                                            {
                                                ?>

                                                    <INPUT type="checkbox" name="choix1" value="1"checked>

                                                <?php
                                            }
                                            else
                                            {
                                                ?>

                                                    <INPUT type="checkbox" name="choix1" value="1">
                                                </form>
                                                <?php
                                            }

                                            ?>
                                        </th>
                                            </tr>
                                        <?php
                                        }
                                        ?>



                                </table>
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
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>


</body>

</html>