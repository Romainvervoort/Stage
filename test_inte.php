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
<head>

</head>
<body>
<input type="text" list="Projets" name="Projets" id='Proj' >
<datalist id="Projets" name="proj">

    <?php
    $rep = $bdd-> query("Select * from projet LIMIT 15");
    while($donnees=$rep->fetch())
    {
    ?>
    <option value ="<?php echo $donnees['nom'];?>"></option>
    <?php
        }
        $rep->closeCursor()
        ?>
    </select>
</datalist>
<?php
if(isset($_POST['pro']))
{
    echo $_POST['pro'];
}
?>
<script>
    /*  var query=document.querySelector('#Projets option'),
     queryall=document.querySelectorAll('#Projets option');
     var test =queryall[1].innerHTML;
     alert(test);*/
    var list = document.getElementById('Proj');

    list.addEventListener('change', function() {

        // On affiche le contenu de l'élément <option> ciblé par la propriété selectedIndex

        alert(document.getElementById('Proj').value);
        var test =document.getElementById('Proj').value;
        $.ajax({
            type: 'POST',
            url: 'test_inte.php',
            data: {pro:test},
            success: function(data){alert("send ok")}
        });

        /* if(list.options[list.selectedIndex].innerHTML == 'test') {
             $("div#test3").show();
         }
         var str= list.options[list.selectedIndex].innerHTML;
         var x = document.createElement("INPUT");
         x.setAttribute("list", "client");
         x.setAttribute("name","client");
         document.getElementById("myForm").appendChild(x);
        <?php //$req=$bdd->prepare("Select * from utilisateur");
    //$req->execute();
    //while($don=$req->fetch())
       // {
       // ?>
         var y = document.createElement("DATALIST");
         y.setAttribute("id", "client");
         y.setAttribute("name","client");
         document.getElementById("myForm").appendChild(y);

         var z = document.createElement("OPTION");
         z.setAttribute("value", "<?php// echo $don['pseudo'] ?>");
         document.getElementById("client").appendChild(z);

        <?php
       // }
    //$req->closeCursor();

    ?>
         */
    });
</script>
<?php
if(isset($_POST['pro']))
{
    $_POST['pro'];
}
?>
<input type="text" list="Proje" name="Proje" id='Proje' >
<datalist id="Proje" name="proje">

    <?php
    $rep = $bdd-> prepare("Select taches.nom from projet,taches where taches.id_Projet=projet.id_Projets where projet.nom=:pro");
    $rep->bindValue(':pro',$_POST['pro'],PDO::PARAM_STR);
    while($donnees=$rep->fetch())
    {
        ?>
        <option value ="<?php echo $donnees['nom'];?>"></option>
        <?php
    }
    $rep->closeCursor()
    ?>
    </select>
</datalist>
<select id="projets">
<option>test</option>
    <?php
    $rep = $bdd-> query("Select * from projet LIMIT 15");
    while($donnees=$rep->fetch())
    {
    ?>
    <option>
        <?php echo $donnees['nom'];?>
        </option>

    <?php

        }
        $rep->closeCursor()
        ?>
</select>

<p id="test" style="display: none">Hello  2</p>
<p id="test2" style="display: none">Hello azeazeeaze 2</p>
<p id="pro"> Coucou</p>
</body>
<script src="../admin_2/assets/js/popup.js" type="text/javascript"></script>


<script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>








</html>