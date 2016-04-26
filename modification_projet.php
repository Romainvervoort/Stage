<!DOCTYPE html>


<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<?php include "connexion.php";
include "head.html";
include "nav_bar.php";
if(isset($_GET['id']))
{
    $id= $_GET['id'];
    $_SESSION['id_projet']=$id;
};
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
                                <span class="caption-subject font-green bold uppercase">Projet</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <form action="modif.php" method="post">
                                        <tr>
                                            <?php $req= $bdd->prepare("Select * from projet where id_Projets=:id");
                                            $req->bindValue(':id',$id,PDO::PARAM_INT);
                                            $req->execute();
                                            while($donne=$req->fetch())
                                            {
                                            ?>
                                            <th> Nom </th>
                                            <th> <input type="text" name="nom" value="<?php echo $donne['nom']?>" </th>
                                        </tr>
                                        <tr>
                                            <th> Producton régis </th>
                                            <th> <input type="text"name="production_regis" value="<?php echo $donne['production_regis'] ?>"</th>
                                        </tr>
                                        <tr>
                                            <th>Production active  </th>
                                            <th><input type="text" name="production_active" value="<?php echo $donne['production_active']?>" </th>
                                        </tr>
                                        <tr>
                                            <th> Début du projet</th>
                                            <th> <input type="text" name= "date_crea" value="<?php echo $donne["date_creation"];?>" </th>
                                        </tr>
                                        <tr>
                                            <th> Fin du projet</th>
                                            <th> <input type="text" name="date_fin" value="<?php echo $donne["date_fin"];?>" </th>
                                        </tr>
                                        <tr>
                                            <th> Temps du projet</th>
                                            <th> <input type="text" name="tempstt" value="<?php echo $donne["temps_total"];?>" </th>
                                        </tr>
                                        <?php
                                        }
                                        $req->closeCursor();
                                        ?>
                                    </thead>



                                </table>
                                <center>  <button type="submit" name="Modifier3" id="Modifier3" class="btn blue">Modifier</button>
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
