<?php require_once("_entete.inc.php"); ?>
<nav class="navbar-fixed-top navbar container">
		<div class="navbar-header">
			<a class="navbar-brand"></a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
<?php if (isset($_SESSION["email"])){ ?>
                <div class="nav navbar-nav pull-right">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-form navbar-right" method="POST" enctype="application/x-www-form-urlencoded">
					<span class="glyphicon glyphicon-user white xsTabulation" aria-hidden="true"> </span> 
					<a href="inscription.php" class="white"><span class="text-center white xsTabulation"><?php echo "Bienvenue  " . $_SESSION["email"]; ?></span> 
						<input type="submit" name="deconnecter" class="btn btn-success" aria-hidden="true" title="log-out" value="Se déconnecter"></a>
				</form>
			</div>
<?php }; ?>
        </div>
</nav>
	<section class="jumbotron container">