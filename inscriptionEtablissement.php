<?php
require_once ("_entete.inc.php");
// Algorithme qui inaugure un nouvel établissment dans la base de données calcul
$cnx = pg_connect("host=localhost dbname=calcul user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
if (isset($_POST["valider"])) {
   if (isset($_POST["codeuai"], $_POST["nom"], $_POST["adresse"], $_POST["cp"], $_POST["ville"], $_POST["tel"], $_POST["email"], $_POST["motpasse"])) {
	   $codeuai = $_POST["codeuai"];
	   $nom = $_POST["nom"];
	   $adresse = $_POST["adresse"];
	   $cp = $_POST["cp"];
	   $ville = $_POST["ville"];
	   $tel = $_POST["tel"];
	   $email = $_POST["email"];
	   $motpasse = $_POST["motpasse"];
       $req = "INSERT INTO etablissement (code_uai, nom, adresse, codepostal, ville, telephone, email, motpasse) VALUES ('$codeuai', '$nom', '$adresse', '$cp', '$ville', '$tel', '$email', '$motpasse')";
        pg_query($cnx, $req);
        echo "<div class=\"alert alert-success\" role=\"alert\">
            Votre établissement a été enregistré avec succès !
        </div>";
    } else {
        echo "<div class=\"alert alert-warning\" role=\"alert\">
            Votre établissement n'a pas été enregistré sans succès !
        </div>";
    }
}
?>
<body>
	<section class="jumbotron container">
		<h1>Veuillez vous identifiez</h1>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-group col-md-8" method="POST" enctype="application/x-www-form-urlencoded">
			<input type="text" id="codeuai" class="form-control" name="codeuai" autocomplete="off" placeholder="Entrez votre code UAI"> 
			<br> 
			<input type="text" class="form-control" name="nom" placeholder="Entrez votre nom de l'établissement"> 
			<br> 
			<input type="text" class="form-control" name="adresse" id="adresse" placeholder="Entrez l'adresse postale de l'établissement"> 
			<br> 
			<input type="text" class="form-control" name="cp" id="cp" placeholder="Entrez le code postal de l'établissement"> 
			<br> 
			<input type="text" class="form-control" name="ville" id="ville" placeholder="Entrez la ville de l'établissement"> 
			<br> 
			<input type="text" class="form-control" name="tel" placeholder="Entrez le téléphone de l'établissement"> 
			<br> 
			<input type="email" class="form-control" name="email" placeholder="Entrez votre email"> 
			<br> 
			<input type="email" class="form-control" name="confirmemail" placeholder="Confirmez votre email"> 
			<br>
			<input type="password" class="form-control" name="motpasse" placeholder="Entrez votre mot de passe"> 
			<br> 
			<input type="password" class="form-control" name="confirmmotpasse" placeholder="Confirmez votre mot de passe"> 
			<br>
			<input type="submit" class="btn btn-primary" name="valider" value="Valider">
		</form>
	</section>
<?php 
pg_close($cnx); 
require_once ('_piedpage.inc.php'); 
?>
