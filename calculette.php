<?php
require_once('_entetemenu.inc.php');
?>
<img src="images/mrsgeek.jpg" />
<h1>Salut c'est ton ami Calculnette</h1>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-group col-md-8">
			<select name="premierchiffre">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
			</select> 
			<select name="choix">
				<option value="addition">+</option>
				<option value="soustraction">-</option>
			</select> 
			<select name="deuxiemechiffre">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
			</select>
			<input type="submit" class="btn btn-success" name="egal" value="=">
			<!--  -->
		</form>
		<br>
		<br>
		<a href="http://www.mangerbouger.fr/pour-qui-242/enfants/"><img src="images/mangerbouger.jpg" /> </a>
        <?php
       // Fonction qui additionne
function addition($premierchiffre, $deuxiemechiffre)
{
    return $resultatCalcul = $premierchiffre + $deuxiemechiffre;
}

// Fonction qui soustrait
function soustraction($premierchiffre, $deuxiemechiffre)
{
    return $resultatCalcul = $premierchiffre - $deuxiemechiffre;
}

// Algorithme qui calcul le résultat de l'addition s'il est supérieur ou inférieur à 10
if (isset($_POST["egal"]) && $_POST["choix"] == "addition") {
    $resultatcalcul = $_POST["egal"];
	$premierchiffre = $_POST["premierchiffre"];
	$deuxiemechiffre = $_POST["deuxiemechiffre"];
    $egal = addition($premierchiffre, $deuxiemechiffre);
    if ($egal <= 9) {
        echo "<div class=\"alert alert-success\" role=\"alert\">Bravo ton addition est égale à $egal. Et il est en dessous à 10 !</div>";
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Désolé mais ton addition est supérieur ou égale à 10 car ton chiffre est $egal !</div>";
    }
    // Et si c'est une soustraction, on détermine si le résultat est supérieur ou inférieur à 0
} elseif (isset($_POST["egal"]) && $_POST["choix"] == "soustraction") {
    $resultatcalcul = $_POST["egal"];
	$premierchiffre = $_POST["premierchiffre"];
	$deuxiemechiffre = $_POST["deuxiemechiffre"];
    $egal = soustraction($premierchiffre, $deuxiemechiffre);
    if ($egal >= 0) {
        echo "<div class=\"alert alert-success\" role=\"alert\">Bravo ta soustraction est $egal. Et il est au dessus ou égal à 0 !</div>";
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Désolé mais ta soustraction est inférieure à 0 car ton chiffre est $egal !</div>";
    }
}
        ?>
<?php 
require_once('_piedpage.inc.php'); 
?>