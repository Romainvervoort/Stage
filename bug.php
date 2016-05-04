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
                        <span>Les Bug</span>
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
                                <span class="caption-subject font-green bold uppercase">Les Bug</span>


                            </div>

                        </div>

                        <a href="Ajouter_bug.php"><input type="submit" value="Ajouter un bug"></a>

                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Nom du bug</th>
                                        <th>Description </th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tr></tr>
                                    <?php
                                    $req= $bdd->prepare("Select * from taches where Type='Bug' and id_Projet=:pro");
                                    $req->bindValue(':pro',$_SESSION['id_Projets'],PDO::PARAM_INT);
                                    $req->execute();
                                    while($donne= $req->fetch())
                                    {
                                        ?>
                                        <th><?php echo $donne['nom']?></th>
                                        <th><?php echo $donne['description'];?></th>
                                    <form action="" method="post">
                                        <input class="form-control" name="id" id="id" type="hidden" value="<?php echo $donne['id_Tache']?>" />
                                        <th><button id="Corriger" name="Corriger" class="btn green-sharp btn-large" data-toggle="confirmation" data-placement="top" data-btn-ok-label="Oui" data-btn-ok-icon="icon-like" data-btn-ok-class="btn-success" data-btn-cancel-label="Non!"
                                                    data-btn-cancel-icon="icon-close" data-btn-cancel-class="btn-danger">Corriger</button>
                                            </form>
                                        </th>
                                        </tr>
                                    <?php
                                    }
                                    ?>



                                </table>
                                <?php
                                if(isset($_POST['Corriger']))
                                {
                                    $idtache= $_POST['id'];
                                    $req= $bdd->prepare("Update taches set Type='' where id_Tache=:tache");
                                    $req->bindValue(':tache',$idtache,PDO::PARAM_INT);
                                    $req->execute();

                                }
                                ?>
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
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
</body>

</html>