<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start active open">
                <a href="Home.php" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="nav-item start active open">
                <a href="Mes_projets.php" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Mes projets</span>
                    <span class="arrow open"></span>
                </a>
                <?php
                if(isset ($_SESSION['id_Projets']))
                {
                    ?>


                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="Projets.php" class="nav-link ">
                            <i class="icon-doc"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="liste_membre.php" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">Equipe sur le projet</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="les_taches.php" class="nav-link ">
                            <i class="icon-tag"></i>
                            <span class="title">Les tâches</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="bug.php" class="nav-link ">
                            <i class="icon-tag"></i>
                            <span class="title">Les bug</span>
                        </a>
                    </li>
                </ul>
                    <?php
                }
                ?>

            </li>

            <li class="nav-item start active open">
                <a href="client.php" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Clients</span>
                </a>

            </li>
            <li class="nav-item start active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-calendar"></i>
                    <span class="title">Calendrier</span>
                </a>
            </li>
            <li class="nav-item start active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Paramétre</span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="Mon_profil.php" class="nav-link ">
                            <i class="icon-doc"></i>
                            <span class="title">Profil</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="Tags.php" class="nav-link ">
                            <i class="icon-doc"></i>
                            <span class="title">Les tags</span>
                        </a>
                    </li>
                </ul>

            </li>
            <?php
            $req=$bdd->prepare("Select * from utilisateur where id_Users=:users and administrateur='true'");
            $req->bindValue(':users',$_SESSION['id'],PDO::PARAM_INT);
            $req->execute();
            while($don = $req->fetch())
            {

            ?>
            <li class="nav-item start active open">
                <a href="liste_employe.php" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Administration</span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="liste_employe.php" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">Liste des employés</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="Administration_projet.php" class="nav-link ">
                            <i class="icon-docs"></i>
                            <span class="title">Les projets</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="Archives.php" class="nav-link ">
                            <i class="icon-tag"></i>
                            <span class="title">Les archives</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="extraction.php" class="nav-link ">
                            <i class="icon-docs"></i>
                            <span class="title">Extraction des données</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="fiche_jour.php" class="nav-link ">
                            <i class="icon-tag"></i>
                            <span class="title">Les fiches jours</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="Listing_mois.php" class="nav-link ">
                            <i class="icon-tag"></i>
                            <span class="title">Listing des horaires mois</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="Projet_supprimer.php" class="nav-link ">
                            <i class="icon-tag"></i>
                            <span class="title">Les projtes supprimés</span>
                        </a>
                    </li>

                </ul>
                <?php

            }
            ?><li class="nav-item start active open">
                <a href="deconnexion.php" class="nav-link nav-toggle">
                    <i class="icon-logout"></i>
                    <span class="title">Deconnexion</span>

                </a>

            </li>

            </li>
        </ul>

    </div>
    <!-- END SIDEBAR -->
</div>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
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

<script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>


<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>