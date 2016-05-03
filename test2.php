<!DOCTYPE html>
<html>
<body>

<form action="" method="post">
    <input type="text" name="nom" value="">
    <input type="checkbox" name="vehicle" value="Bike" checked>I have a bike<br>
    <input type="checkbox" name="vehicle" value="Car">I have a car
    <button type="submit" value="Envoyer">Envoyer</button>
</form>
<?php
if(isset($_POST['vehicle']))
{
    echo "Bonjour";
    echo $_POST['vehicle'];
    echo $_POST['nom'];
}
?>
</body>
</html>
