<?php
    // On démarre la session
    session_start ();

    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) { // On détruit les variables de notre session
	    session_unset ();

	    // On détruit notre session
	    session_destroy ();

	    // On redirige le visiteur vers la page d'accueil
	    header ('location: index.php');
	}
	else{
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
	}
?>