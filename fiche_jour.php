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
                        <span>Les fiches jours</span>
                    </li>
                    </li>
                </ul>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light form-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Fiche jour</span>
                            </div>

                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="fiche_jour_affichage.php" method="post" class="form-horizontal form-bordered">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Employé </label>
                                        <div class="col-md-4">
                                            <input type=text list=employe name="employe" >
                                            <datalist id=employe >
                                                <?php
                                                $rep = $bdd-> query("Select * from utilisateur");
                                                while($donnees=$rep->fetch())
                                                {
                                                ?>
                                                <option>
                                                    <?php echo $donnees['pseudo'];
                                                    }
                                                    $rep->closeCursor()
                                                    ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mois à éditer</label>
                                        <div class="col-md-4">
                                            <input type=text list=mois name="mois" >
                                            <datalist name="mois"id=mois >
                                                <option> 01</option>
                                                <option> 02</option>
                                                <option> 03</option>
                                                <option> 04</option>
                                                <option> 05</option>
                                                <option> 06</option>
                                                <option> 07</option>
                                                <option> 08</option>
                                                <option> 09</option>
                                                <option> 10</option>
                                                <option> 11</option>
                                                <option> 12</option>
                                                </datalist>
                                    </div>
                                        </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Année à éditer</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="annee" name="annee" type="text" />
                                            </div>
                                    </div>

                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn blue">
                                                <i class="fa fa-check"></i> Chercher</button>
                                            <button type="button" class="btn default">Retour</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
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

</body>

</html>