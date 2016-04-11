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
<?php include "head.html"?>
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
                        <span>Administration</span>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="liste_employe.php">Liste des employés</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Ajouter un employé</span>
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
                                <span class="caption-subject font-green bold uppercase">Ajouter un employé</span>
                            </div>

                        </div>
                        <div class="portlet-body form">
                            <!-- Début du Formulaire-->


                            <form action="#" class="form-horizontal form-bordered">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nom </label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="mask_date" type="text" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Prénom</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="mask_date1" type="text" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Pseudo</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="mask_date1" type="text" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Mot de passe</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="mask_date1" type="password" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Coût à l'heure</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="mask_date1" type="text" />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Administrateur</label>
                                        <div class="col-md-4">
                                            <form>

                                                <INPUT type="checkbox" name="choix1" value="2">
                                            </form>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fixe intérim</label>
                                        <div class="col-md-4">
                                            <form>
                                                <INPUT type="checkbox" name="choix1" value="1">(Fixe)
                                                <INPUT type="checkbox" name="choix1" value="3">(Intérim)
                                            </form>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3">Employé actif</label>
                                        <div class="col-md-4">
                                            <form>

                                                <INPUT type="checkbox" name="choix1" value="5">
                                            </form>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn blue">
                                                <i class="fa fa-check"></i> Enregistrer</button>
                                            <button type="button" class="btn default">Annuler</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <!-- FIn du formulaire-->
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
</html>