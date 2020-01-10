
<?php

 	include 'connect/infobdd.php';
	
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
	} else{
		echo "Connection réussie, ";
	}
	$sql = "INSERT INTO `t_eleves`(`nom`, `prenom`,`classe`,`email`,`mot_de_passe`,`jour`,`mois`,`annee`,`sexe`,`adresse`,`ville`,`code_postal`,`tel`) VALUES ('$nom', '$prenom','$classe','$email','$mot_de_passe','$jour','$mois','$annee','$sexe','$adresse','$ville','$code_postal','$tel')";
	if ($conn->query($sql) === TRUE) {
		echo "votre inscription a bien été enregistrée.";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();

	
?> 