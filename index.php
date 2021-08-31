<?php
require_once ("_entete.inc.php");
$cnx = pg_connect("host=localhost dbname=calcul user=root password=root options=--client_encoding=UTF8") or die("Pas de connexion à la base de données");
// Algorithme permettant la connexion de l'établissement
if (isset($_POST["envoyer"], $_POST["email"], $_POST["motpasse"])) {
	$email = $_POST["email"];
    $req = "SELECT * FROM etablissement WHERE email='$email'";
    $requete_exec = pg_query($cnx, $req);
    while ($lEtablissement = pg_fetch_assoc($requete_exec)) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["codeuai"] = $lEtablissement["code_uai"];
            $_SESSION["nom"] = $lEtablissement["nom"];
            $_SESSION["adresse"] = $lEtablissement["adresse"];
            $_SESSION["cp"] = $lEtablissement["codepostal"];
            $_SESSION["ville"] = $lEtablissement["ville"];
            $_SESSION["tel"] = $lEtablissement["telephone"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["motpasse"] = $_POST["motpasse"];
			header("location:bienvenue.php");
        }
    }
}
?>
<body>
	<div class="jumbotron container center-block">
		<h1>Veuillez vous identifiez</h1>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-group col-md-8" method="POST" enctype="application/x-www-form-urlencoded">
			<input type="email" class="form-control" name="email" placeholder="Entrez votre email"> 
			<br> 
			<input type="password" class="form-control" name="motpasse" placeholder="Entrez votre mot de passe"> 
			<br>
			<button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
			<br> <br>
		</form>
	</div>
	<a href="inscriptionEtablissement.php"><input type="submit" name="envoyer" class="btn btn-info btn-lg" value="S'inscrire"></a>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<?php 
pg_close($cnx); 
require_once("_piedpage.inc.php");
?>