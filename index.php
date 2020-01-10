<?php
    // On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
    session_start ();
    $login_valide = "icn";
    $pwd_valide = "icn";
    $admin_login = "admin";
    $admin_pwd = "admin";
    // On récupère nos variables de session
    echo '<a href="schoolinfo.pdf" target="_blank"> Ouvrir le didacticiel !</a>';
    if ($_SESSION['login']==$admin_login && $_SESSION['pwd']==$admin_pwd) {
        echo '<meta http-equiv="refresh" content="0;URL=recherche.php">';
        // On affiche un lien pour fermer notre session
    }
    else {
        if ($_SESSION['login']==$login_valide && $_SESSION['pwd']==$pwd_valide) {
            echo '<meta http-equiv="refresh" content="0;URL=inscription.php">';
        }
        else{
            if (isset($_SESSION['login']) && isset($_SESSION['pwd'])){
                echo '<meta http-equiv="refresh" content="0;URL=maj.php">';
            }
            
        }
    }
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr" dir="ltr">

    <head 'Content-type: text/html; charset='UTF8'>
        <title>Identification</title>
        <link rel="stylesheet" href="css/Identification.css" media="all" rel="stylesheet" type="text/css" >
        <link rel="SHORTCUT ICON" href="images/LogoUrl.jpg" /> 
    </head>

    <body>

        <div id="conteneurSite">
            <div id="entete">   
                <div id="entete_centre">
                </div><!-- div entete centre -->
            </div>

                <div class="container">
                    <form action="login.php" method="post">
                        <label><b>Votre nom ou email : </b></label><input type="text" name="login" id="login" required>
                        <br />
                        <label><b>Votre mot de passe : </b></label><input type="password" name="pwd" id="pwd" required><br />
                        <div class="clearfix">
                          <button id="bpS1">Connexion</button>
                        </div>       
                    </form>
                </div>
        </div>
    </body>
    <br><br><b>&copy; <?php echo date("Y"); ?> SchoolInfo.esy.es - Florian, Lucas, Rémi, Cédric</b>
</html>