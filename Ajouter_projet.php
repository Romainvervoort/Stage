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
                        <a href="liste_employe.php">Ajouter un projet</a>

                    </li>

                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light form-fit ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-doc font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Ajouter un projet</span>
                            </div>

                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="add_project.php" method="post" class="form-horizontal form-bordered">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Nom du projet</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="nom" name="nom" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Client</label>
                                        <div class="col-md-4">
                                            <input type=text list=client name="client"required >
                                            <datalist id=client >
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
                                            <a href="formulaire_client.php"><img alt="" class="img-circle" src="../assets/layouts/layout2/img/plus.png" />(Ajouter une entreprise)</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Type de production</label>
                                        <div class="col-md-4">
                                                <select id="Production" name="Production">
                                                    <option>Choissisez le type de production</option>
                                                        <option>Contractualisé avec Report</option>
                                                    <option>Production Régis</option>
                                                    <option>Contractualisé indépendante</option>
                                                </select>


                                        </div>
                                    </div>
                                    <div></div>
                                    <div class="form-group" id="CR" style="display:none">
                                        <label class="control-label col-md-3">Début du projet</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="dates" name="dates" type="date"/>
                                        </div>
                                    </div>
                                    <div class="form-group" id="CR" style="display:none">
                                        <label class="control-label col-md-3">Type de fréquence</label>
                                        <div class="col-md-4">
                                            <select id="Frequence" name="frequence">
                                                <option>Choissisez la Fréquence</option>
                                                <option>Mensuel</option>
                                                <option>Semestriel</option>
                                                <option>Trimestriel</option>
                                                <option>Annuel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="CI" style="display:none">
                                        <label class="control-label col-md-3">Durée du contrat</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="dure" name="dure" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group" id="CR" style="display: none">
                                        <label class="control-label col-md-3">Coût en heure</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="cout" name="cout" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group" id="CI" style="display: none">
                                        <label class="control-label col-md-3">Coût en minute</label>
                                        <div class="col-md-4">
                                            <input class="form-control" id="minute" name="minute" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Responsable du projet</label>
                                        <div class="col-md-4">
                                            <input type=text list=responsable name="responsable" required >
                                            <datalist id=responsable >
                                                <?php
                                                $rep = $bdd-> query("Select * from utilisateur where actif='true'");
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




                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn purple">
                                                <i class="fa fa-check"></i> Submit</button>
                                           <a href="Administration_projet.php"> <button type="button" class="btn default">Annuler</button></a>
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
<script src="../admin_2/assets/js/popup.js" type="text/javascript"></script>


<script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
<script>
    var list = document.getElementById('Production');

    list.addEventListener('change', function() {
        if(list.options[list.selectedIndex].innerHTML == 'Contractualisé avec Report') {
            $("div#CR").show();
            $("div#CI").hide();
        }
        else
        {
            if(list.options[list.selectedIndex].innerHTML == 'Production Régis')
            {
                $("div#CR").hide();
                $("div#CI").hide();
            }
            else
            {
                if(list.options[list.selectedIndex].innerHTML == 'Contractualisé indépendante')
                {
                    $("div#CR").show();
                    $("div#CI").show();
                }
                else
                {
                    $("div#CR").hide();
                    $("div#CI").hide();
                }
            }

        }


    });
</script>

</body>

</html>