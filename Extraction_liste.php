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
include "connexion.php"; ?>
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
                        <a href="Mes_projets.php">Mes projets</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="extraction.php">Extraction des données</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <span>Résultat de l'extraction</span>
                    </li>
                </ul>
            </div>
            <!-- Chemin -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <span class="caption-subject bold uppercase"> Extraction des heures de production</span>
                            </div>
                        </div>
                        <!-- EN tête-->
                        <!--Début tableau -->

                                    <!-- Récupération des informations -->
                                    <?php
                                    if(isset ($_POST['date_dep'])) {
                                        /* Récupération des check boxe checked */
                                        $date_dep = $_POST['date_dep'];
                                        $date_fin = $_POST['date_fin'];
                                        $Client = $_POST['Client'];
                                        if (empty($_POST['date_fin']) != 1) {
                                            $today = $_POST['date_fin'];
                                        } else {
                                            $today = date("Y-m-d");
                                        }
                                        // echo empty($_POST['Projets']);
                                        $id_Users="";
                                    $req = $bdd->query("Select * from utilisateur where actif='true'");
                                    while ($donnees = $req->fetch()) {
                                       $pseudo= $donnees['pseudo'];

                                    if (isset($_POST['' . $pseudo])) {
                                    if(strcmp($id_Users,"")==0)
                                    {
                                    $id_Users= $donnees['id_Users'];
                                    }
                                    else
                                    {
                                    $id_Users = $id_Users .','.$donnees['id_Users'];
                                    }
                                           }
                                           }
                                        $req->closeCursor();
                                        echo $id_Users;
                                        $array=array_map('intval', explode(',', $id_Users));
                                        $array = implode("','",$array);
                               ?>
                               <?php
                               /*      Recherche avec un ou plusieur pseudo*/
                               if (empty($_POST['Client']) == 1 && empty($_POST['Projets']) == 1 && empty($_POST['date_dep']) == 1) {
                                   $proj = "";

                                   ?>
                                   <?php
                                   $req = $bdd->prepare("Select utilisateur.pseudo, entreprise.nom,projet.nom,taches.nom,taches.date_taches,taches.temps,projet.temps_total, projet.temps from utilisateur,taches,projet,entreprise where taches.id_Users=utilisateur.id_Users and taches.id_Projet=projet.id_Projets and projet.id_Entreprise=entreprise.id_Entreprise and utilisateur.id_Users IN ('".$array."') and date_taches BETWEEN '2014-01-01' and '2016-12-31' ORDER by projet.nom ");

                                   $req->execute();
                                   while ($do = $req->fetch()) {
                                       if (strcmp($proj, $do[2]) != 0) {

                                           ?>

                                           <div class="portlet-body">
                                           <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                           <thead>
                                           <?php  echo $do[2]. ' -'. $do[1]." - nombre d'heure prévu : ".$do[6] ." - Nombre d'heure passé :".(int)($do[7]/60);?>
                                           </thead>
                                           <tbody>
                                           <tr>
                                               <th> Users</th>
                                               <th> Nom client</th>
                                               <th> Nom projet</th>
                                               <th> Tâche</th>
                                               <th> date</th>
                                               <th> Heure </th>

                                           </tr>
                                           <tbody>
                                           <tr class="odd gradeX">
                                               <td> <?php echo $do[0]; ?></td>
                                               <td> <?php echo $do[1]; ?></td>
                                               <td> <?php echo $do[2]; ?></td>
                                               <td> <?php echo $do[3]; ?></td>
                                               <td> <?php echo $do[4]; ?></td>
                                                <td> <?php echo (int)($do[5]/60).'Heures';
                                                 echo $do[5]-((int)($do[5]/60)*60).'min'?></td>

                                           </tr>
                                           </tbody>
                                           <?php
                                           $proj= $do[2];
                                       }
                                       else {
                                           ?>
                                           <tr class="odd gradeX">
                                               <td> <?php echo $do[0]; ?></td>
                                               <td> <?php echo $do[1]; ?></td>
                                               <td> <?php echo $do[2]; ?></td>
                                               <td> <?php echo $do[3]; ?></td>
                                               <td> <?php echo $do[4]; ?></td>
                                               <td> <?php echo (int)($do[5]/60).'Heures';
                                                echo $do[5]-((int)($do[5]/60)*60).'min'?></td>

                                           </tr>
               <?php
                                           $proj= $do[2];
                                       }

                                   }
                                           ?>
                                               </div>
                                               <?php
                                               // Fin de la première recherche
                               }



                       else
                       {
                           // Utilisateur + Projet
                           if (empty($_POST['Client']) == 1 && empty($_POST['Projets'])!=1 && empty($_POST['date_dep'])==1) {
                               $req = $bdd->query("Select * from utilisateur where actif='true'");
                               while ($donnees = $req->fetch()) {
                                   $pseudo = $donnees['pseudo'];
                                   if (isset($_POST['' . $pseudo])) {
                                       $id_Users = $donnees['id_Users'];
                                      $req2 = $bdd->prepare("Select id_Projets,id_Entreprise from projet where nom=:projet");
                                       $req2->bindValue(':projet',$_POST['Projets'],PDO::PARAM_STR);
                                       $req2->execute();
                                       while($dopro = $req2->fetch())
                                       {
                                           $id_projet= $dopro['id_Projets'];
                                           $id_entreprise=$dopro['id_Entreprise'];

                                       }
                                       $req2->closeCursor();
                                       $req4 = $bdd->prepare("Select * from entreprise WHERE id_Entreprise=:entreprise");
                                       $req4->bindValue(':entreprise',$id_entreprise,PDO::PARAM_INT);
                                       $req4->execute();
                                       while($docli=$req4->fetch())
                                       {
                                           $entreprise=$docli['nom'];
                                       }
                                       $req4->closeCursor();

                                       $req3=$bdd->prepare("Select * from taches where id_Projet=:projet and id_Users=:user");
                                       $req3->bindValue(':projet',$id_projet,PDO::PARAM_INT);
                                       $req3->bindValue(':user',$id_Users,PDO::PARAM_INT);
                                       $req3->execute();
                                       while($dontache= $req3->fetch())
                                       {
                                           ?>
                                           <!-- tab1 -->
                                           <td> <?php echo $pseudo ?></td>
                                           <td> <?php echo $entreprise?></td>
                                           <td> <?php echo $_POST['Projets']?></td>
                                           <td> <?php echo $dontache['nom'];?></td>
                                           <td> <?php echo $dontache['date_tache'];?></td>
                                           <td> <?php echo $dontache['temps'];?></td></tr>
                                           <!-- fin tab 1 -->
                                           <?php


                                       }
                                   }
                               }
                           }
                           else
                           {
                           if (empty($_POST['Client']) == 1 && empty($_POST['Projets'])!=1 && empty($_POST['date_dep'])!=1) {
                               $req = $bdd->query("Select * from utilisateur where actif='true'");

                               while ($donnees = $req->fetch()) {
                                   $pseudo = $donnees['pseudo'];
                                   if (isset($_POST['' . $pseudo])) {
                                       $id_Users = $donnees['id_Users'];
                                      $req2 = $bdd->prepare("Select id_Projets,id_Entreprise from projet where nom=:projet");
                                       $req2->bindValue(':projet',$_POST['Projets'],PDO::PARAM_STR);
                                       $req2->execute();
                                       while($dopro = $req2->fetch())
                                       {
                                           $id_projet= $dopro['id_Projets'];
                                           $id_entreprise=$dopro['id_Entreprise'];

                                       }
                                       $req2->closeCursor();
                                       $req4 = $bdd->prepare("Select * from entreprise WHERE id_Entreprise=:entreprise");
                                       $req4->bindValue(':entreprise',$id_entreprise,PDO::PARAM_INT);
                                       $req4->execute();
                                       while($docli=$req4->fetch())
                                       {
                                           $entreprise=$docli['nom'];
                                       }
                                       $req4->closeCursor();

                                       $req3=$bdd->prepare("Select * from taches where id_Projet=:projet and id_Users=:user and date_taches BETWEEN '$date_dep' and '$today' GROUP BY id_Projet");
                                       $req3->bindValue(':projet',$id_projet,PDO::PARAM_INT);
                                       $req3->bindValue(':user',$donnees['id_Users'],PDO::PARAM_INT);
                                       $req3->execute();


                                       while($dontache= $req3->fetch())
                                       {
                                           ?>
                                           <td> <?php echo $pseudo ?></td>
                                           <td> <?php echo $entreprise?></td>
                                           <td> <?php echo $_POST['Projets']?></td>
                                           <td> <?php echo $dontache['nom'];?></td>
                                           <td> <?php echo $dontache['date_tache'];?></td>
                                           <td> <?php echo $dontache['temps'];?></td></tr>
                                           <?php


                                       }
                                   }
                               }
                           }
                           else
                           {
                           if (empty($_POST['Client']) != 1 && empty($_POST['Projets'])==1 && empty($_POST['date_dep'])==1) {
                            $req = $bdd->query("Select * from utilisateur where actif='true'");
                               while ($donnees = $req->fetch()) {
                                   $pseudo = $donnees['pseudo'];
                                   if (isset($_POST['' . $pseudo])) {
                                       $id_Users = $donnees['id_Users'];
                                       $req2= $bdd->prepare("Select id_Entreprise from entreprise where nom=:entreprise");
                                       $req2->bindValue(':entreprise',$_POST['Client'],PDO::PARAM_STR);
                                       $req2->execute();
                                       while ($docli=$req2->fetch())
                                       {
                                       $id_entreprise=$docli['id_Entreprise'];

                                       }
                                       $req2->closeCursor();
                                       $req3 = $bdd->prepare("Select nom,id_Projets from projet where id_Entreprise=:entreprise");
                                       $req3->bindValue(':entreprise',$id_entreprise,PDO::PARAM_INT);
                                       $req3->execute();
                                       while($donpro = $req3->fetch())
                                       {
                                      $req4 = $bdd->prepare("Select * from taches where id_Projet=:projet and id_Users=:user");
                                      $req4->bindValue(':projet',$donpro['id_Projets'],PDO::PARAM_INT);
                                      $req4->bindValue(':user',$id_Users,PDO::PARAM_INT);
                                      $req4->execute();
                                      while($dontache= $req4->fetch())
                                      {
                                      ?>
                                       <td> <?php echo $pseudo ?></td>
                                       <td> <?php echo $_POST['Client']?></td>
                                           <td> <?php echo $donpro['nom']?></td>
                                           <td> <?php echo $dontache['nom'];?></td>
                                           <td> <?php echo $dontache['date_tache'];?></td>
                                           <td> <?php echo $dontache['temps'];?></td></tr>
                                       <?php
                                      }
                                      $req4->closeCursor();
                                       }
                                       $req3->closeCursor();
                                       }

                                       }
                                       $req->closeCursor();

                           }
                           else
                           {
                               if (empty($_POST['Client']) != 1 && empty($_POST['Projets'])==1 && empty($_POST['date_dep'])!=1) {
                                    $req = $bdd->query("Select * from utilisateur where actif='true'");
                                       while ($donnees = $req->fetch()) {
                                           $pseudo = $donnees['pseudo'];
                                           if (isset($_POST['' . $pseudo])) {
                                               $id_Users = $donnees['id_Users'];
                                               $req2= $bdd->prepare("Select id_Entreprise from entreprise where nom=:entreprise");
                                               $req2->bindValue(':entreprise',$_POST['Client'],PDO::PARAM_STR);
                                               $req2->execute();
                                               while ($docli=$req2->fetch())
                                               {
                                               $id_entreprise=$docli['id_Entreprise'];

                                               }
                                               $req2->closeCursor();
                                               $req3 = $bdd->prepare("Select nom,id_Projets from projet where id_Entreprise=:entreprise");
                                               $req3->bindValue(':entreprise',$id_entreprise,PDO::PARAM_INT);
                                               $req3->execute();
                                               while($donpro = $req3->fetch())
                                               {
                                               //Declaration du tableau

                                              $req4 = $bdd->prepare("Select * from taches where id_Projet=:projet and id_Users=:user and date_taches BETWEEN '$date_dep' and '$today' GROUP BY id_Projet");
                                              $req4->bindValue(':projet',$donpro['id_Projets'],PDO::PARAM_INT);
                                              $req4->bindValue(':user',$id_Users,PDO::PARAM_INT);
                                              $req4->execute();
                                              while($dontache= $req4->fetch())
                                              {
                                              ?>
                                               <td> <?php echo $pseudo ?></td>
                                               <td> <?php echo $_POST['Client']?></td>
                                               <td> <?php echo $donpro['nom']?></td>
                                               <td> <?php echo $dontache['nom'];?></td>
                                               <td> <?php echo $dontache['date_tache'];?></td>
                                               <td> <?php echo $dontache['temps'];?></td></tr>
                                               <?php
                                              }
                                              $req4->closeCursor();
                                               }
                                               $req3->closeCursor();
                                               }

                                               }
                                               $req->closeCursor();
                                   }
                               }
                           }

                       }
               }
                       }
                               else
                               {
                                   echo "Information manquante";
                               }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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