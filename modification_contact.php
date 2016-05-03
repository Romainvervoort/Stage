<!--[if !IE]><!-->
<html lang="en">
<?php include "connexion.php";
include "head.html";
include "nav_bar.php";
if(isset($_GET['id']))
{
    $id= $_GET['id'];
    $_SESSION['id_entreprise']= $_GET['id'];
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
                                <span class="caption-subject font-green bold uppercase">Mon profil</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <form action="modif.php" method="post">
                                        <tr>
                                            <?php $req= $bdd->prepare("Select contact.nom, contact.prenom,contact.mail,contact.numero, entreprise.nom as nom2 from contact,entreprise where id_Contact=:id and contact.id_Entreprise=entreprise.id_Entreprise;");
                                            $req->bindValue(':id',$id,PDO::PARAM_INT);
                                            $req->execute();
                                            while($donne=$req->fetch())
                                            {
                                            ?>
                                            <th> Nom </th>
                                            <th> <input type="text" name="nom" value="<?php echo $donne['nom']?>" </th>
                                        </tr>
                                        <tr>
                                            <th> Prenom </th>
                                            <th> <input type="text"name="prenom" value="<?php echo $donne['prenom'] ?>"</th>
                                        </tr>
                                        <tr>
                                            <th>Entreprise  </th>
                                            <th>
                                                   <?php echo $donne['nom2'];?>
                                               </th>
                                        </tr>
                                        <tr>
                                            <th> Adresse mail</th>
                                            <th> <input type="email" name= "mail" value="<?php echo $donne["mail"];?>" </th>
                                        </tr>
                                        <tr>
                                            <th> Numéro de téléphone</th>
                                            <th> <input type="text" name="num" value="<?php echo $donne["numero"];?>" </th>
                                        </tr>
                                        <?php
                                        }
                                        $req->closeCursor();
                                        ?>
                                        <tr>
                                            <th> Les Projets</th>
                                            <th>
                                                <?php
                                        $req=$bdd->prepare("Select nom,id_Projets from projet where id_Contact=:id");
                                        $req->bindValue(':id',$id,PDO::PARAM_INT);
                                        $req->execute();
                                        while($donne = $req->fetch())
                                        {
                                            echo '<a href ="modification_projet.php?id='.$donne['id_Projets'].'">';echo $donne['nom'];
                                        }
                                        ?>
                                        </th>
                                        </tr>
                                    </thead>



                                </table>
                                <center>  <button type="submit" name="Modifier2" id="Modifier2" class="btn blue">Modifier</button>
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
