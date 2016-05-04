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
            <?php include "menu.php"?>

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- chemin -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                            </li>
                            </ul>
                    </div>


                    <!-- END PAGE HEADER-->

<!-- Dans une class row il y a 2 div -->


                    <div class="row">
                        <div class="col-md-6 col-sm6">
                            <div class="portlet light">
                                <div class="mt-widget-2">
                                    <div class="mt-head" style="background-image: url(../assets/pages/img/background/32.jpg);">
                                        <div class="mt-head-user">
                                            <div class="mt-head-user-img">
                                                <img src="../assets/pages/img/avatars/team7.jpg"> </div>
                                        </div>
                                    </div>
                                    <div class="mt-body">
                                        <h3 class="mt-body-title"> Le monde </h3>
                                        <p class="mt-body-description"> Il était une fois ... </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm6">
                            <div class="portlet light">
                                <div class="mt-widget-2">
                                    <div class="mt-head" style="background-image: url(../assets/pages/img/background/43.jpg);">

                                        <div class="mt-head-user">
                                            <div class="mt-head-user-img">
                                                <img src="../assets/pages/img/avatars/team3.jpg"> </div>

                                        </div>
                                    </div>
                                    <div class="mt-body">
                                        <h3 class="mt-body-title"> Le monde 2 </h3>
                                        <p class="mt-body-description"> RT</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-cursor font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Mes projets</span>
                                    </div>
                                </div>
                                <?php

                                $rep = $bdd-> prepare("Select * from projet,groupe_projet where projet.id_Projets=groupe_projet.id_projet and groupe_projet.id_Users=:user and projet.temps_total>1 and projet.date_fin =''   ");
                               $rep->bindValue(':user',$_SESSION['id'],PDO::PARAM_INT);
                                $rep->execute();
                                $nbrpro = $rep->rowCount();
                                if($nbrpro>0)
                                {
                                while ($donnees = $rep->fetch())
                                {
                                ?>
                                <div class="portlet-body">
                                    <div class="col-md-4">
                                        <div class="easy-pie-chart">
                                            <div class="number visits" data-percent="
                                                <?php
                                            $tempstt = $donnees['temps_total'];
                                            if ($tempstt == 0) {
                                                $tempstt = 1;
                                            }
                                            $temps = $donnees['temps'];
                                            $test = (int)($temps / 60);
                                            $res = ($test * 100) / $tempstt;
                                            $var = intval($res);
                                            echo $var;
                                            ?>">
                                                    <span><?php
                                                        echo $var;
                                                        ?>%</span>
                                            </div><?php echo $donnees['nom'] ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="margin-bottom-10 visible-sm"></div>
                                    <!-- Important cercle -->
                                    <?php
                                    }

                                    $rep->closeCursor();
                                    }
                                    else
                                    {
                                        ?>
                                    <div class="portlet-body">
                                    <h1> Pas de projet avec délai </h1>
                                            </div>
                                            <?php
                                    }
                                        ?>


                                </div>

                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-12">

                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet light ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-users font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Mes horaires</span>
                                        </div>
                                    </div>
                                  <center>  <form action="" method="post">
                                        <input type="date" id="dates" name="dates" >
                                        <input type="submit" value="Envoyer">
                                    </form></center>
                                    <div class="portlet-body">
                                        <span class="caption-subject font-green bold uppercase">Mon planning</span>
                                        <div class="table-scrollable">

                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <?php
                                                    if(isset($_POST['dates']))
                                                    {
                                                    $dates= $_POST['dates'];

                                                    }
                                                    else
                                                    {
                                                    $dates=date("Y-m-d");
                                                    }
                                                    $_SESSION['dates']=$dates;
                                                    $heure= date('H:i'); ?>


                                                    <th>Arrive</th>
                                                    <th>Depart midi</th>
                                                    <th>Retour midi</th>
                                                    <th>Depart</th>
                                                    <th> <?php echo "Horaire du : ". $dates ?></th>
                                                    </tr>
                                                    <?php

                                                    $req = $bdd-> prepare("Select * from horaire where Jours=:dates and id_Users=:user");
                                                    $req->bindValue(':dates',$dates,PDO::PARAM_STR);
                                                    $req->bindValue(':user',$_SESSION['id'],PDO::PARAM_INT);
                                                    $req->execute();
                                                    $nbr=$req->rowCount();
                                                    if($nbr>0) {
                                                        while ($donnee = $req->fetch()) {
                                                            ?>

                                                            <tr>
                                                                <form action="horaire.php" method="post">
                                                                <th>
                                                                    <?php if($donnee['Arrive']<> '00:00:00') {
                                                                          ?><input type="time" name="Arrive" value="<?php echo $donnee['Arrive']?>"
                                                                        <?php
                                                                        }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <input type="time" name="Arrive" value="<?php echo $heure?>">
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </th>
                                                                <th><?php if($donnee['Depart_midi']<> '00:00:00') {
                                                                       ?><input type="time" name="Depart_midi"value="<?php echo $donnee['Depart_midi'];?>">
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <input type="time"  name="Depart_midi" value="<?php echo $heure?>">
                                                                        <?php
                                                                    }
                                                                    ?></th>
                                                                <th><?php if($donnee['Retour_midi']<> '00:00:00') {
                                                                         ?><input type="time" name="Retour_midi" value="<?php echo $donnee['Retour_midi']?>">
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <input type="time" name="Retour_midi" value="<?php echo $heure?>">
                                                                        <?php
                                                                    }
                                                                    ?></th>
                                                                <th><?php if($donnee['Depart']<> '00:00:00') {
                                                                         ?><input type="time" name="Depart" value="<?php echo $donnee['Depart']?>"
                                                                        <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <input type="time" name="Depart" value="<?php echo $heure?>">
                                                                        <?php
                                                                    }
                                                                    ?></th>
                                                                <th><?php echo $donnee['Jours'] ?></th>
                                                                    <th> <input type="submit" name="Maj" value="Mise à jour" </th>
                                                                    </form>
                                                            </tr>

                                                            <?php
                                                        }
                                                        $req->closeCursor();

                                                    }
                                                    else
                                                    {

                                                      ?>
                                                        <form action="horaire.php" method="post">
                                                        <th><input type="time" name="Arrive"value="<?php echo $heure?>"></th>
                                                        <th> <input type="time" name="Depart_midi"value="<?php echo $heure?>"></th>
                                                        <th> <input type ="time" name="Retour_midi"value="<?php echo $heure?>"></th>
                                                        <th> <input type="time"  name="Depart" value="<?php echo $heure?>"></th>
                                                        <th> <?php echo $dates ?></th>
                                                        <th><input type="submit" name="Enregistrer" value ="Enregistrer"></th>
                                                        </form>
                                                <?php
                                                    }
                                                ?>
                                                </thead>

                                            </table>
                                            </br>




                                        </div>
                                        </br>
                                        <!------------------------------------------------------------------------------------------>
                                        <div class="row">

                                        <span class="caption-subject font-green bold uppercase">Ventillation du <?php echo $dates?></span>
                                        <div class="table-scrollable">

                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th> Client</th>
                                                    <th> Projets</th>
                                                    <th> tâches </th>
                                                    <th> Description</th>
                                                    <th> heure</th>
                                                    <th> Minute</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                               <?php

                                               $venti= $bdd->prepare("Select projet.nom,taches.nom,taches.description,taches.heure,taches.minute from ventillation,projet,taches where ventillation.id_Projets=projet.id_Projets and ventillation.id_tache=taches.id_Tache and  ventillation.id_Users=:id and ventillation.date_ventillation=:jour");
                                               $venti->bindValue(':id',$_SESSION['id'],PDO::PARAM_INT);
                                               $venti->bindValue(':jour',$dates,PDO::PARAM_STR);
                                               $venti->execute();
                                               $ventinbr=$venti->rowCount();
                                               if($ventinbr==0)
                                               {?>
                                                <tr>
                                                    <td>

                                                        <form action="ventillation.php" method="post">
                                                    <input type=text list=client name="client" >
                                                        <datalist id=client name="client" onChange="Lien()" >
                                                            <?php
                                                            $rep = $bdd-> query("Select * from entreprise ");
                                                            while($donnees=$rep->fetch())
                                                            {
                                                            ?>
                                                            <option>
                                                                <?php echo $donnees['nom'];
                                                                }
                                                                $rep->closeCursor()
                                                                ?>
                                                        </datalist>
                                                    </td></td>
                                                            <td>
                                                        <input type=text list=Projets name="Projets" >
                                                        <datalist id=Projets name="proj" onChange="Lien()" >
                                                            <?php
                                                            $rep = $bdd-> prepare("Select * from projet where id_Entreprise=:entreprise");
                                                            $rep->bindValue(':entreprise',$ent,PDO::PARAM_INT);
                                                            $rep->execute();
                                                            while($donnees=$rep->fetch())
                                                            {
                                                            ?>
                                                            <option>
                                                                <?php echo $donnees['nom'];
                                                                }
                                                                $rep->closeCursor()
                                                                ?>
                                                        </datalist>
                                                    </td>
                                                    <td>
                                                        <input type=text list=taches name="taches" >
                                                        <datalist id=taches >
                                                            <option> </option>
                                                            <?php
                                                            $rep = $bdd-> prepare("Select * from taches where id_Projet=:projet and id_Users=:id");
                                                            $rep->bindValue(':id',$_SESSION['id'],PDO::PARAM_INT);
                                                            $rep->bindValue(':projet',$pro,PDO::PARAM_INT);
                                                            $rep->execute();
                                                            while($donnees=$rep->fetch())
                                                            {
                                                                ?>
                                                                <option>
                                                                    <?php echo $donnees['nom'];?></option>
                                                                <?php
                                                            }
                                                            $rep->closeCursor()
                                                            ?>
                                                        </datalist>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="description" id="description" />
                                                    </td>
                                                    <td>
                                                       <input type="int" name="heure">
                                                    </td>
                                                    <td>
                                                        <input type="int" name="minute">
                                                    </td>
                                                </tr>
                                                </tbody>
                                                </table>
                                                <center> <input  type="submit" id="tache"value="Valider"></center>
                                                </form>
                                            <?php
                                            }
                                            else
                                            {
                                                while($donne=$venti->fetch())
                                                {
                                                    ?>
                                                    <tr>
                                                    <td><?php echo $donne[0];?></td>
                                                    <td><?php echo $donne[1];?></td>
                                                    <td><?php echo $donne[2];?></td>
                                                    <td><?php echo $donne[3];?></td>
                                                    <td><?php echo $donne[4];?></td>
                                                    </tr>
                                                        <?php
                                                }
                                                        $venti->closeCursor();

                                                        ?>
                                                <tr>
                                                    <td>
                                                    <form action="ventillation.php" method="post">



                                                <input type=text list=Projets name="Projets" >
                                                <datalist id=Projets name="proj" onChange="Lien()">
                                                    <?php
                                                    $rep = $bdd-> query("Select * from projet LIMIT 15");
                                                    while($donnees=$rep->fetch())
                                                    {
                                                    ?>
                                                    <option>
                                                        <?php echo $donnees['nom'];?></option>
                                                    <?php
                                                        }
                                                        $rep->closeCursor()
                                                        ?>
                                                </datalist>
                                                </td>
                                                <td>
                                                 <input type=text list=taches name="taches" >
                                                <datalist id=taches >
                                                    <?php
                                                    $rep = $bdd-> prepare("Select * from taches where id_Projet=1520 and id_Users=:id");
                                                            $rep->bindValue(':id',$_SESSION['id'],PDO::PARAM_INT);
                                                            $rep->execute();
                                                    while($donnees=$rep->fetch())
                                                    {
                                                    ?>
                                                    <option>
                                                        <?php echo $donnees['nom'];?></option>
                                                    <?php
                                                        }
                                                        $rep->closeCursor()
                                                        ?>
                                                </datalist>
                                                </td>
                                                    <input type="text" name="description" id="description" />
                                                </td>
                                                <td>
                                                    <input type="int" name="heure">
                                                </td>
                                                <td>
                                                    <input type="int" name="minute">
                                                </td>

                                                </tr>
                                                </table>

                                                   <center> <input  type="submit" id="tache"value="Valider"></center>
                                                        </form>
                                                         <center>  <table>
                                                </br>
                                                </br>
                                                <form action="" method="post">
                                                   <th> <input class="form-control" id="dates" name="dates" type="date" /></th>
                                                   <th> <input name="Actualliser" type="submit" value="Actualliser"></th>

                                                </form>
                                            </table>
                                              </center>

                                            <?php
                                            }

                                            ?>

                                            </br>
                                        </div>
                                            </div>
                                    </div>
                                </div>
                                <!-- END SAMPLE TABLE PORTLET-->

                        </div>
                    </div>
                        <!----------------------------------------------------------------------------------------------------------------->
                    <!--Mes tâches -->
                    <div class="row">

                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Recent Activities</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                        <ul class="feeds">
                                            <li>
                                                <div class="col1">
                                                    <div class="cont">
                                                        <div class="cont-col1">

                                                        </div>
                                                        <div class="cont-col2">
                                                            <?php
                                                            $req= $bdd->prepare("Select nom from taches where id_Users=:user and nom <> ''   ORDER BY date_taches DESC LIMIT  15");
                                                            $req->bindValue(':user',$_SESSION['id'],PDO::PARAM_INT);
                                                            $req->execute();
                                                            while($do = $req->fetch()) {
                                                                echo $do['nom'];
                                                                ?>
                                                            </br>
                                                            <?php
                                                            }
                                                            $req->closeCursor();
                                                            ?>


                                                        </div>
                                                    </div>
                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </div>
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


        <!-- END THEME LAYOUT SCRIPTS -->

    </body>

</html>