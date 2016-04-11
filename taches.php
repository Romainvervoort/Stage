<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Infog
 * Date: 06/04/2016
 * Time: 09:34
 */
include "connexion.php";
    session_start();
    $od = $_GET['id'];
    echo $od;
?>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Metronic | Dashboard 2</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="../assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>

<body>
<?php
$reponse =$bdd-> query("Select * from projet where idProjets='$od'");
while($don=$reponse->fetch())
{
    ?>

<h1> Liste des tâches pour le projet :<?php echo $don['nom'] ?> </h1>
<?php
}
?>
<div class="portlet-body">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_actions_pending">
            <!-- BEGIN: Actions -->
            <div class="mt-actions">
                <div class="mt-action">
                    <div class="mt-action-body">
                        <div class="mt-action-row">
                            <div class="mt-action-info ">
                                <div class="mt-action-details ">



                                        <span class="mt-action-author">
                                        Les tâches :
                                    </span>


                                </div>
                            </div>


                        </div>


                    </div>





            <?php
            $rep= $bdd->query("Select * from tâches where idProjets='$od'");
            while($donnees=$rep->fetch()) {

                ?>
            <div class="mt-actions">
                <div class="mt-action">
                    <div class="mt-action-body">
                        <div class="mt-action-row">
                            <div class="mt-action-info ">
                                <div class="mt-action-details ">

                                        <span class="mt-action-author">
                                        <?php
                                        echo $donnees['nom'];

                                        ?>
                                            <p class="mt-action-desc">Description : </br><?php echo $donnees['description'];?></p>
                                    </span>
                                    </div>


                            </div>
                            <div class="mt-action-buttons ">
                                <div class="btn-group btn-group-circle">
                                    <button type="button" class="btn btn-outline green btn-sm">fini</button>
                                    <button type="button" class="btn btn-outline red btn-sm">Remarque</button>
                                </div>



                            </div>

                        </div>


                </div>


                <!-- Une personne -->

            </div>

            <!-- END: Actions -->
        </div>
            <?php
            }
            $rep->closeCursor();
            ?>

</div>

</div>
</div>
        <div class="mt-action-buttons ">
            <div class="btn-group btn-group-circle">
                <button type="button" class="btn btn-outline green btn-sm">Projet terminé</button>
                </div>


</body>