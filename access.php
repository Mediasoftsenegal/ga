<?php
session_start();
@$profil = $_POST["profil"];
@$prenom = $_POST["nom_afficher"];
@$login = $_POST["login"];
@$password = $_POST["pwd"];
@$pass_crypt = md5($_POST["pwd"]);

@$valider = $_POST["login"];

$erreur = "";
if (isset($valider)) 
	{
		$pdo = new PDO('mysql:host=localhost;dbname=groupe10_ga', 'groupe10_groupeal', 'Alpages@2017');
		$verify = $pdo->prepare("SELECT * From users WHERE login=? and password=? limit 1");
		$verify->execute(array($login, $pass_crypt));
		$user = $verify->fetchAll();
		
			if (count($user) > 0) 
			{
				$_SESSION["nom_afficher"] = ucfirst(strtolower($user[0]["nom_afficher"]));
				$_SESSION["connecter"] = "Oui";
				$_SESSION["id_user"] = $user[0]["iduser"];
				//echo 'ID:'.$_SESSION["id_user"] ;
				$_SESSION["Profileur"] = $user[0]["profil"];
				//echo 'Profileur:'.$_SESSION["Profileur"] ;
				header("location:tabbord.php");
			} else
			{
			
		//	header("location:login.php");
			echo "<h4>Utilisateur ou mot de passe non défini dans la plateforme !</h4>"; 
			?>
			<script type="text/javascript">
			function redirection() {
				window.location.replace("ga.groupe-alpages.com");
					}      o
				setTimeout("redirection()", 5000);
			</script>
			<?php
	}
	}
?>