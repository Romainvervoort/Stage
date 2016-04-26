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
                        <span>Mes projets</span>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span> Liste des membres</span>
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
                                <span class="caption-subject font-green bold uppercase">Les membres</span>


                            </div>

                        </div>
                        <form>
                            <?php $req= $bdd->prepare("Select utilisateur.pseudo, utilisateur.actif from utilisateur full JOIN groupe_projet on utilisateur.id_Users=groupe_projet.id_Users where utilisateur.actif='true'  and groupe_projet.id_projet=:projet") ;
                            $req->bindValue(':projet',$_SESSION['id_Projets'],PDO::PARAM_INT);
                            $req->execute();
                            while($donne=$req->fetch())
                            {
                                ?>
                            <INPUT type="button" name="<?php echo $donne['pseudo']?> " value= "<?php echo $donne['pseudo']?>">
                            <?php
                            }
                            $req->closeCursor()
?>


                        </form>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Utilisateur</th>
                                        <th>Adresse mail </th>
                                        <th>Heure sur le projet</th>
                                        <th>Les tâches</th>
                                    </tr>
                                    </thead>
                                    <tr>
                                        <th> VR </th>
                                        <th> romain.vervoort@sfr.fr </th>
                                        <th> 20</th>
                                        <th>
                                            -a</br>
                                            -b</br>
                                            -c
                                        </th>
                                    </tr>
                                    <tr>
                                        <th> DB </th>
                                        <th> d@b.com </th>
                                        <th> 40</th>
                                        <th> -d</br>
                                            -e</br>
                                            -f
                                        </th>
                                    </tr>



                                </table>
                            </div>
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


</body>

</html>