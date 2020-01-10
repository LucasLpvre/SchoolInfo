    <?php
    // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
    $login_valide = "icn";
    $pwd_valide = "icn";
    $admin_login = "admin";
    $admin_pwd = "admin";
    include 'connect/infobdd.php';
    // on teste si nos variables sont définies
    if (isset($_POST['login']) && isset($_POST['pwd'])) {

        // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
        if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
            // dans ce cas, tout est ok, on peut démarrer notre session

            // on la démarre :)
            session_start ();
            // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pwd'] = $_POST['pwd'];

            // on redirige notre visiteur vers une page de notre section membre
            header ('location: inscription.php');
        }
        else {
            if ($admin_login == $_POST['login'] && $admin_pwd == $_POST['pwd']) {
            // dans ce cas, tout est ok, on peut démarrer notre session

            // on la démarre :)
            session_start ();
            // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pwd'] = $_POST['pwd'];

            // on redirige notre visiteur vers une page de notre section membre
            header ('location: recherche.php');
            }
            else {
            		$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Echec de la connection: " . $conn->connect_error);
						echo '<meta http-equiv="refresh" content="0;URL=recherche.php">';
					} else{
					}
					// on teste si une entrée de la base contient ce couple login / pass
					$sql = 'SELECT id,nom,prenom,classe,email,jour,mois,annee,sexe,adresse,ville,code_postal,tel FROM `t_eleves` WHERE (nom OR email)="'.$_POST['login'].'" AND mot_de_passe=sha1("'.$_POST['pwd'].'")';
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					   // Sortie des différents champs
						while($row = $result->fetch_assoc()) {
							$tab[] = $row ;
						}
						session_start ();
			            // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
			            $_SESSION['login'] = $_POST['login'];
			            $_SESSION['pwd'] = $_POST['pwd'];
						echo '<meta http-equiv="refresh" content="0;URL=maj.php">';

					} else {
						echo '<body onLoad="alert(\'Identifiant ou mot de passe incorrect !\')">';	// L'id=-1 pour indiquer que l'enregistrement n'a pas été trouvé
						echo '<meta http-equiv="refresh" content="0;URL=index.php">';
					}
					// sinon, alors la, il y a un gros problème :)
                // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
                //echo '<body onLoad="alert(\'Membre non reconnu...\')">';
                // puis on le redirige vers la page d'accueil
                //echo '<meta http-equiv="refresh" content="0;URL=index.php">';
            }
        }
    }
    else {
        echo 'Les variables du formulaire ne sont pas déclarées.';
        echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
    ?>