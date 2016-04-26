<?php include "connexion.php";
session_start();?>
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="../assets/pages/img/logo.png" alt="logo" class="logo-default" /> </a>

        </div>
        <!-- END LOGO A changé-->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="../assets/layouts/layout2/img/avatar3_small.jpg" />


                            <span class="username username-hide-on-mobile">Vous êtes connecté en tant que :  <?php echo $_SESSION['pseudo']?> </span>

                        </a>
                    </li>
                </ul>
            </div>
            <!-- Un utilisateur-->
            <!-- END TOP NAVIGATION MENU  -->
        </div>
        <!-- END PAGE TOP nav bar -->
    </div>
    <!-- END HEADER INNER -->
</div>