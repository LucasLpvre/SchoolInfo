
<?php

 	include 'connect/infobdd.php';
	
	$id=$_POST['id'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$classe=$_POST['classe'];
	$email=$_POST['email'];
	$mot_de_passe=sha1($_POST['mot_de_passe']);
	$jour=$_POST['jour'];
	$mois=$_POST['mois'];
	$annee=$_POST['annee'];
	$sexe=$_POST['sexe'];
	$adresse=$_POST['adresse'];
	$ville=$_POST['ville'];
	$code_postal=$_POST['code_postal'];
	$tel=$_POST['tel'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Echec de la connection: " . $conn->connect_error);
		echo '<meta http-equiv="refresh" content="0;URL=recherche.php">';
	} else{
	}
	$sql = "UPDATE t_eleves SET nom='$nom', prenom='$prenom', classe='$classe', email='$email', mot_de_passe='$mot_de_passe', jour='$jour', mois='$mois', annee='$annee', sexe='$sexe', adresse='$adresse', ville='$ville', code_postal='$code_postal', tel='$tel' WHERE id=$id";
	if ($conn->query($sql) === TRUE) {
		echo '<body onLoad="alert(\'Les modifications ont bien été enregistrées !\')">';
		echo '<meta http-equiv="refresh" content="0;URL=recherche.php">';
	} else {
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}

	$conn->close();

	
?> 