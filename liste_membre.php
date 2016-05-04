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
<!--[if IE 8]> <html lang="en" class="ie8 "> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 "> <![endif]-->
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
                        <form method="post">
                            <?php $req= $bdd->prepare("Select utilisateur.pseudo from utilisateur where utilisateur.actif='true' and not EXISTS (Select * from groupe_projet where utilisateur.id_Users = groupe_projet.id_Users and groupe_projet.id_projet=:projet)") ;
                            $req->bindValue(':projet',$_SESSION['id_Projets'],PDO::PARAM_INT);
                            $req->execute();
                            while($donne=$req->fetch())
                            {
                                ?>
                            <INPUT type="submit"id="ajout" name="ajout" value= "<?php echo $donne['pseudo']?>">
                            <?php
                            }
                            $req->closeCursor()
?>


                        </form>

                        <?php if(isset($_POST['ajout'])) {
                            $req= $bdd->prepare("Select utilisateur.id_Users from utilisateur where utilisateur.pseudo=:pseudo");
                            $req->bindValue(':pseudo',$_POST['ajout'],Pdo::PARAM_STR);
                            $req->execute();
                            while ($donne= $req->fetch())
                            {
                                $id=$donne['id_Users'];
                            }

                            $req->closeCursor();
                            $req=$bdd->prepare("Insert into groupe_projet(id_Users,id_projet,heure_prevu)values(:id,:projet,2)");
                            $req->bindValue(':id',$id,PDO::PARAM_INT);
                            $req->bindValue(':projet',$_SESSION['id_Projets'],PDO::PARAM_INT);
                            $req->execute();
                            }
?>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Utilisateur</th>
                                        <th>Adresse mail </th>
                                        <th>Heure  prévu sur le projet</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                        <?php
                                        $req= $bdd->prepare("Select utilisateur.id_Users, utilisateur.pseudo,utilisateur.mail ,groupe_projet.heure_prevu from utilisateur,groupe_projet where utilisateur.id_Users=groupe_projet.id_Users and groupe_projet.id_projet=:projet  group by utilisateur.id_Users,groupe_projet.id_projet");
                                        $req->bindValue(':projet',$_SESSION['id_Projets'],PDO::PARAM_INT);
                                        $req->execute();
                                        while($donne= $req->fetch())
                                        {
                                            ?>
                                        <tr>
                                            <th><?php echo $donne['pseudo']; ?></th>
                                            <th ><?php echo $donne['mail']; ?></th>
                                            <th><?php echo $donne['heure_prevu'].' H'; ?></th>
                                            <th><?php echo '<a href="ajout_heure.php?id='. $donne['id_Users'] ?>" onclick="window.open(this.href, 'popup', 'height=200, width=200');return false">Ajouter des heures</a></th>
                                            </tr>

                                        <?php
                                        }
                                        ?>





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
<script>
    $(function()
    {
        var $list;
        $list = $('th');
        $list.on('click',  function() {
            $id= this.id
            popup = window.open('modification_client.php?id='+$id, 'popup', 'height=600, width=500');
        });
    });
</script>
</body>

</html>