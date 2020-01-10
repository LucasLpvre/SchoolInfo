<?php
    // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
    session_start ();
    $login_valide = "icn";
    $pwd_valide = "icn";
    $admin_login = "admin";
    $admin_pwd = "admin";
    // On récupère nos variables de session

	if ($_SESSION['login']==$admin_login && $_SESSION['pwd']==$admin_pwd) {
	        echo '<a href="./inscription.php">Créer un profil</a><br>';
    		echo '<a href="./logout.php">Déconnexion</a><br>';
    		echo '<a href="site.zip"> Télécharger le site !</a>';
	    }
	    else {
	        if ($_SESSION['login']==$login_valide && $_SESSION['pwd']==$pwd_valide) {
	            echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	        }
	        else{
	            if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){
	                echo '<meta http-equiv="refresh" content="0;URL=maj.php">';
	            }
	            else{
	            	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	            }
	            
	        }
	    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">

	<head 'Content-type: text/html; charset='UTF8'>
		<title>Recherche</title>
		<link rel="stylesheet" href="css/Recherche.css" media="all" rel="stylesheet" type="text/css" >
		<link rel="SHORTCUT ICON" href="images/LogoUrl.jpg" />
	</head>

	<body>

		<div id="conteneurSite">
			<div id="entete">
				<br>
				<b>Rechercher un élève :</b>	
				<div id="entete_centre">
				</div><!-- div entete centre -->
			</div>
				<div class="container">
					<form id="recherche" action="lectureFiche.php" >

						<label><b>Nom ou email : 
						</b></label>
					    <input type="text" placeholder="Entrez votre nom" name="nom" id="nom" required><br><br>

						<div class="clearfix">
					      <button >Rechercher cet élève !</button>
					    </div>
					</form>
				</div>
		</div>
		<br><b>&copy; <?php echo date("Y"); ?> SchoolInfo.esy.es - Florian, Lucas, Rémi, Cédric</b><br>
		<br>
	</body>
</html>

