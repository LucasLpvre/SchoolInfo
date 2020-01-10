<?php
	session_start ();
    $login_valide = "icn";
    $pwd_valide = "icn";
    $admin_login = "admin";
    $admin_pwd = "admin";
    // On récupère nos variables de session
    if ($_SESSION['login']==$login_valide && $_SESSION['pwd']==$pwd_valide) {
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
        // On affiche un lien pour fermer notre session
    }
    else {
    	if ($_SESSION['login']==$admin_login && $_SESSION['pwd']==$admin_pwd) {
    		echo '<a href="./recherche.php">Retour</a></div>';
    		if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET["nom"])) {
			include 'connect/infobdd.php';
			$nom = $_GET['nom'];
			// Déclaration de la connexion à la base de données
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Test de la connexion
			if ($conn->connect_error) {
				//die("Erreur de connexion : " . $conn->connect_error);
				echo ('[ "id"'.':'.'"-2'.'" ]');	// L'id=-2 pour indiquer une erreur de connexion à la base
			} 
			else {			
				$nom='"'.$nom.'"';	// Transformation en chaine de caractères
				// Elaboration de la requête
				$sql = " SELECT id,nom,prenom,classe,email,jour,mois,annee,sexe,adresse,ville,code_postal,tel FROM `t_eleves` WHERE email=$nom OR nom=$nom LIMIT 1";	// Le premier enregistrement est pris en compte
				// Exécution de la requête avec gestion des erreurs
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				   // Sortie des différents champs
					while($row = $result->fetch_assoc()) {
						$tab[] = $row ;
					}
				} else {
					echo "Ce nom n'est pas entré dans la base de données.";	// L'id=-1 pour indiquer que l'enregistrement n'a pas été trouvé
					echo '<meta http-equiv="refresh" content="0;URL=index.php">';
				}
			}
			// Fermeture de la base de données
			$conn->close();
			}
			else{
				echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			}
    	}
    	else{
    		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    	}
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">

	<head 'Content-type: text/html; charset='UTF8'>
		<title>Lecture Fiche élève</title>
		<link rel="stylesheet" href="css/ModifProfil.css" media="all" rel="stylesheet" type="text/css" >
		<link rel="SHORTCUT ICON" href="images/LogoUrl.jpg" />
		<script type="text/javascript" language="javascript" src="js/scriptrecherche.js"></script>
	</head>

	<body>

		<div id="conteneurSite">
			<div id="entete">
			 	<br>Fiche de <?php echo $tab[0]['prenom'] ; ?> <?php echo $tab[0]['nom'] ; ?> en classe de <?php echo $tab[0]['classe'] ; ?> : </br>
				<div id="entete_centre">
				</div><!-- div entete centre -->
			</div>

				<div class="container">
					<form id="recherche" method="POST" action="updateadmin.php" >

						<label><b>Nom</b></label>
					    <input type="text" placeholder="Nom de l'élève" name="nom" id="nom" value="<?php echo $tab[0]['nom'] ; ?>" required><br>

					    <label><b>Prénom</b></label>
					    <input type="text" placeholder="Prénom de l'élève" name="prenom" id="prenom" value="<?php echo $tab[0]['prenom'] ; ?>" required><br>

					    <label><b>Classe</b></label>
					    <input type="text" placeholder="Entrez votre classe" name="classe" id="classe" value="<?php echo $tab[0]['classe'] ; ?>" required><br>

					    <label><b>Adresse mail</b></label>
					    <input type="email" placeholder="Adresse mail" name="email" id="email" value="<?php echo $tab[0]['email'] ; ?>" required><br>

					    <label><b>Numéro de téléphone</b></label>
					    <input type="tel" placeholder="Numéro de téléphone" name="tel" id="tel" value="<?php echo $tab[0]['tel'] ; ?>" required><br>

					    <label><b>Adresse</b></label>
					    <input type="text" placeholder="Adresse" name="adresse" id="adresse" value="<?php echo $tab[0]['adresse'] ; ?>" required><br>

					    <label><b>Code postal et ville</b></label>
					    <input type="text" placeholder="Code postal" name="code_postal" id="code_postal" value="<?php echo $tab[0]['code_postal'] ; ?>" required><input type="text" placeholder="Ville" name="ville" id="ville" value="<?php echo $tab[0]['ville'] ; ?>" required><br>

					    <label name="ddn"><b>Date de naissance </b></label>
						<input id="annee" name="annee" value="<?php echo $tab[0]['annee'] ; ?>">
						<input id="mois" name="mois" value="<?php echo $tab[0]['mois'] ; ?>">
						<input id="jour" name="jour" value="<?php echo $tab[0]['jour'] ; ?>"><br>

						<label name="sexe"><b>Sexe</b></label>
						<input type="text" name="sexe" value="<?php echo $tab[0]['sexe'] ; ?>" id="sexe"><br>
						

						<input type="hidden" id="id" name="id" value="<?php echo $tab[0]['id'] ; ?>">

						<div class="clearfix">
					      <button >Mettre à jour les informations !</button>
					    </div>
					</form>
				</div>
		</div>
		<br><b>&copy; <?php echo date("Y"); ?> SchoolInfo.esy.es - Florian, Lucas, Rémi, Cédric</b><br>
		<br>
	</body>
</html>

