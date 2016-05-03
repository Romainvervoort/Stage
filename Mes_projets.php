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
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
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

                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="Home.php">Home</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>Mes projets</span>
                        </li>
                        </li>
                    </ul>
                </div>



            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <span class="caption-subject bold uppercase">Liste des projets</span>
                                <a href ="Ajouter_projet.php"><input type="submit" value="Ajouter un projet"></a>
                            </div>

                        </div>
                        <!-- EN tête-->
                        <!--Début tableau -->
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th> Nom du projet </th>
                                    <th> Nom du client </th>
                                    <th> Nom du contact</th>
                                    <th> Nombre d'heure </th>
                                    <th> Avancement</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php
                                    $req= $bdd->prepare("Select * from projet inner join groupe_projet on projet.id_Projets = groupe_projet.id_projet where groupe_projet.id_Users=:user");
                                    $req->bindValue(':user',$_SESSION['id'],PDO::PARAM_INT);
                                    $req->execute();
                                    while($donnees=$req->fetch())
                                    {
                                       ?>
                                <td><?php echo '<a href="Projets.php?id=' . $donnees['id_Projets'] . '">';echo  $donnees['nom']?></a>
                                   </td>
                                <td><?php
                                    $reqclient=$bdd->prepare("Select * from entreprise where id_Entreprise=:id_entreprise");
                                    $reqclient->bindValue(':id_entreprise',$donnees['id_Entreprise'],PDO::PARAM_INT);
                                    $reqclient->execute();
                                    while($doncli = $reqclient->fetch())
                                    {
                                        echo $doncli['nom'];
                                    }
                                    $reqclient->closeCursor();
                                    ?>
                                    </td>
                                <td> <?php
                                    $reqcontact = $bdd->prepare("Select * from contact where id_Contact=:id_contact");
                                    $reqcontact->bindValue('id_contact',$donnees['id_Contact'],PDO::PARAM_INT);
                                    $reqcontact->execute();
                                    while ($doncontact= $reqcontact->fetch())
                                    {
                                        echo $doncontact['nom'];
                                    }
                                    $reqcontact->closeCursor();
                                    ?>
                                    </td>
                                <td><?php echo $donnees['temps_total']?> </td>
                                    <td>
                                                <?php
                                                    $tempstt = $donnees['temps_total'];
                                                    $temps=$donnees['temps'];
                                                if($tempstt <> 0) {
                                                    $temps=(int)($temps/60);
                                                    $res = ($temps * 100) / $tempstt;
                                                    $var = intval($res);
                                                    echo $var;
                                                    echo "%";
                                                }
                                                else
                                                {
                                                    echo "Pas de temps imparti";
                                                }
                                                    ?>

                                       </td>
                                            </tr>

                                            <?php
                                            }
                                           $req->closeCursor()
                                            ?>

                                </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
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

</div>

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