<?php
/**
 * Created by PhpStorm.
 * User: Infog
 * Date: 20/04/2016
 * Time: 09:18
 */
include "connexion.php";
session_start();
session_destroy();
header('Location: ../admin_2/identification.php');