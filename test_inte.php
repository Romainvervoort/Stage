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
<!--[if IE 8]> <html lang="fr" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="fr" class="ie9 no-js"> <![endif]-->
<meta charset="utf-8";
<html lang="fr">
<?php
/**
 * Created by PhpStorm.
 * User: Infog
 * Date: 14/04/2016
 * Time: 15:22
 */
include "connexion.php";
session_start();
?>
<body>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--
<form method="post" action="test2.php" >
    <div id="champs" >
        <input type="text" name="titre[]" />
        <input type="text" name="contenu[]" />
        <input type="text" name="description[]" />
        </br>
        </br>
    </div>

        <script type="text/javascript" >
            var div = document.getElementById('champs');
            function addInput(nam){
                var input = document.createElement("input");
                input.name = name;
                div.appendChild(input);
            }
            function addField() {
                addInput("titre[]");
                addInput("contenu[]");
                addInput("description[]");
                div.appendChild(document.createElement("br"));
                div.appendChild(document.createElement("br"));
            }
        </script>
    <button type="button" onclick="addField()" >+</button>
    <input type="submit" />
</form>
-->
<input type=text list=Projets name="Projets" >
<datalist id=Projets >
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    </datalist>
<p id="3"> Coucou</p>
<button onclick="myFunction()">Try it</button>
</body>
<script src="../admin_2/assets/js/popup.js" type="text/javascript"></script>
<script>
    $(function()
    {
    var $list;
    $list = $('p');
    $list.on('click',  function() {
     $id= this.id
        popup = window.open('modification_client.php?id='+$id, 'popup', 'height=600, width=500');
    });
    });
</script>

<script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>


</html>