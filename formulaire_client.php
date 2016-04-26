<!DOCTYPE html>
<?php include "connexion.php" ?>

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
                        <a href="client.php">Clients</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span> Ajouter un client</span>
                    </li>


                </ul>
            </div>

            <div class="row">
                <!-- Ajout entreprise -->
                <div class="col-md-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light form-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Fiche entreprise</span>
                            </div>

                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="ajout_entreprise.php" method="post" class="form-horizontal form-bordered">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nom de l'entreprise</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="nom" name="nom" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Adresse de l'entreprise</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="adresse" name="adresse" type="text" />
                                            <span class="help-block"> Numéro et rue </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Ville</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="ville" id="ville" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Code Postal</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="cdp"id="cdp" type="text" />
                                            <span class="help-block"> (59120)</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Numéro de téléphone</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="num" id="num" type="text" />
                                            <span class="help-block"> 0300000000 </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Adresse mail</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="mail" id="mail" type="text" />
                                            <span class="help-block"> test@test.com </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fax</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="fax" id="fax" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" name="envoyer" id="envoyer" class="btn purple">
                                                <i class="fa fa-check"></i> Submit</button>
                                          <a href="client.php"><button type="button" name="cancel" class="btn default">Cancel</button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
                <!-- Fiche contact -->
                <div class="col-md-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light form-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Fiche contact</span>
                            </div>

                        </div>
                        <!------------------------------------------------------------------------------------------->
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="ajout_contact.php" method="post" class="form-horizontal form-bordered">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nom </label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="nom" name="nom" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Prénom </label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="prenom" name="prenom" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Adresse mail</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="mail" name="mail" type="text" />
                                            <span class="help-block"> aaa@aaa.com </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nom de l'entreprise</label>
                                        <div class="col-md-4">
                                            <input type=text list=Projets name="Projets" >
                                            <datalist id=Projets >
                                                <?php
                                                $rep = $bdd-> query("Select * from entreprise");
                                                while($donnees=$rep->fetch())
                                                {
                                                ?>
                                                <option>
                                                    <?php echo $donnees['nom'];
                                                    }
                                                    $rep->closeCursor()
                                                    ?>
                                            </datalist>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Numéro de téléphone</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="num" name="num" type="text" />
                                            <span class="help-block"> 0300000000 </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fax</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="fax" name="fax" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn purple">
                                                <i class="fa fa-check"></i> Submit</button>
                                           <a href="client.php"> <button type="button" class="btn default">Cancel</button></a>
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