<!DOCTYPE html>


<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<?php include "connexion.php";
include "head.html";
include "nav_bar.php";
?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
<!-- La nav bar -->


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
                        <span> Paramétre </span>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Mon profil</span>
                    </li>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-user font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Mon Profil</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <form action="modif.php" method="post">
                                        <tr>

                                            <th> Nom </th>
                                            <th> <input type="text" name="nom" value="<?php echo $_SESSION['nom']?>" </th>
                                        </tr>
                                        <tr>
                                            <th> Prenom </th>
                                            <th> <input type="text"name="prenom" value="<?php echo $_SESSION['prenom'] ?>"</th>
                                        </tr>
                                        <tr>
                                            <th>Pseudo </th>
                                            <th><?php echo $_SESSION['pseudo']?> </th>
                                        </tr>
                                        <tr>
                                            <th> Mot de passe</th>
                                            <th> <input type="password" name= "mdp" value="<?php echo $_SESSION['mdp'];?>" </th>
                                        </tr>
                                        <tr>
                                            <th>Adresse mail </th>
                                            <th><input type="text" name="mail" value="<?php echo $_SESSION['mail']?>" </th>
                                        </tr>
                                        <tr>
                                            <th>Numéro de téléphone </th>
                                            <th><input type="text" name="num" value="<?php echo $_SESSION['num']?>" </th>
                                        </tr>

                                    </thead>



                                </table>
                                <center>  <button type="submit" name="Modifier5" id="Modifier4" class="btn blue">Modifier</button>
                                    <a href="client.php" <button type="submit" name="Retour" id="Retour" class="btn gray">Retour</button></a></center>
                                </form>

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


</html>
