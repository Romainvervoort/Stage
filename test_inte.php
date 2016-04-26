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
<body>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).ready(function() {
        var $regions = $('#regions');
        var $departements = $('#departements');

        // chargement des régions
        $.ajax({
            url: 'test_inte.php',
            data: 'go', // on envoie $_GET['go']
            dataType: 'json', // on veut un retour JSON
            success: function(json) {
                $.each(json, function(index, value) { // pour chaque noeud JSON
                    // on ajoute l option dans la liste
                    $regions.append('<option value="'+ index +'">'+ value +'</option>');
                });
            }
        });

        // à la sélection d une région dans la liste
        $regions.on('change', function() {
            var val = $(this).val(); // on récupère la valeur de la région

            if(val != '') {
                $departements.empty(); // on vide la liste des départements

                $.ajax({
                    url: 'france.php',
                    data: 'id_region='+ val, // on envoie $_GET['id_region']
                    dataType: 'json',
                    success: function(json) {
                        $.each(json, function(index, value) {
                            $departements.append('<option value="'+ index +'">'+ value +'</option>');
                        });
                    }
                });
            }
        });
    });
</script>
<select id="regions" name="regions">
    <option value="">-- Régions --</option>
</select>

<select id="departements" name="departements">
    <option value="">-- Départements--</option>
</select>

<script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
<script src="js/your_js_file.js"></script>

</html>