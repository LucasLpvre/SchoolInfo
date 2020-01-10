<?php
    // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
    session_start ();
    $login_valide = "icn";
    $pwd_valide = "icn";
    $admin_login = "admin";
    $admin_pwd = "admin";
    // On récupère nos variables de session
    if ($_SESSION['login']==$login_valide && $_SESSION['pwd']==$pwd_valide) {
    	// On affiche un lien pour fermer notre session
    	echo '<a href="./logout.php">Déconnexion</a></div>';
    }
    else {
    	if ($_SESSION['login']==$admin_login && $_SESSION['pwd']==$admin_pwd) {
    		echo '<a href="./recherche.php">Rechercher un profil</a><br>';
    		echo '<a href="./logout.php">Déconnexion</a>';
    	}
    	else{
    		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    	}
    }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">

	<head 'Content-type: text/html; charset='UTF8'>
		<title>Inscription</title>
		<link rel="stylesheet" href="css/Inscription.css" media="all" rel="stylesheet" type="text/css" >
		<link rel="SHORTCUT ICON" href="images/LogoUrl.jpg" /> 
		<script type="text/javascript" language="javascript" src="js/scriptInscription.js"></script>
	</head>

	<body>

		<div id="conteneurSite">
			<div id="entete">	
				<div id="entete_centre">
				</div><!-- div entete centre -->
			</div>

				<div class="container">
					<form id="formRenseignement" >

						<label><b>Nom</b></label>
					    <input type="text" placeholder="Entrez votre nom" name="nom" id="nom" required><br>
					    
					    <label><b>Prénom</b></label>
					    <input type="text" placeholder="Enter votre prénom" name="prenom" id="prenom" required><br>

					    <label><b>Classe</b></label>
					    <input type="text" placeholder="Entrez votre classe" name="classe" id="classe" required><br>

					    <label><b>Adresse mail</b></label>
					    <input type="email" placeholder="Adresse mail" name="email" id="email" required><br>

					    <label><b>Numéro de téléphone</b></label>
					    <input type="tel" placeholder="Numéro de téléphone" name="tel" id="tel" required><br>

					    <label><b>Adresse</b></label>
					    <input type="text" placeholder="Adresse" name="adresse" id="adresse" required><br>

					    <label><b>Code postal et ville</b></label>
					    <input type="text" placeholder="Code postal" name="code_postal" id="code_postal" required><input type="text" placeholder="Ville" name="ville" id="ville" required><br>

					    <label><b>Mot de passe</b></label>
					    <input type="password" placeholder="Mot de passe" name="mot_de_passe" id="mot_de_passe" required><br>

					    <label name="ddn"><b>Date de naissance </b></label>
						<select id="annee" name="annee"  ></select>
						<select id="mois" name="mois" size="1" ></select>
						<select id="jour" name="jour" size="1" ></select><br>

						<label name="sexe"><b>Sexe</b></label>
						<input type="radio" name="sexe" value="Homme" id="sexe" checked> Homme <input type="radio" name="sexe" value="Femme" id="sexe"> Femme<br>

					    <div class="clearfix">
					      <button id="bpS">Inscription</button>
					      <div id="div1"></div>
					    </div>
						
					</form>
				</div>
		</div>
		<br><b>&copy; <?php echo date("Y"); ?> SchoolInfo.esy.es - Florian, Lucas, Rémi, Cédric</b><br>
		<br>
	</body>
</html>
