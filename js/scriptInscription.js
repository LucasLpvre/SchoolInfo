/*
	Fichier de définition des JavaScripts
	Lycée Louis Pasteur Hénin-Beaumont
	Modifié le 26 Septembre 2016 par Pascal LUCAS
*/

	// Déclaration des variables Globales
	var variableGlobale;  // Description de la variable
	var libelleMois = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"];

	// Fonctions d'initialisations diverses
	var init = function() {         // Javascript exécuté à l'ouverture de la page
		creationOptions('annee');	
		creationOptionsJour('jour');
		creationOptionsMois('mois');
	}
	
	var declarationAbonnements = function() {
		var formSaisie=document.getElementById('formRenseignement');
		formSaisie.addEventListener('submit', enregistrementDonnees, false)
	}

	// On ne provoque l'appel à la fonction declarationAbonnements() qu'après le chargement complet de la page
	// Le chargement de la page provoque un événement "load"
	// En attendant la fin du chargement on est certain que tous les éléments ont été créés avant de mettre en place les abonnements
	window.addEventListener("load", declarationAbonnements);
	window.addEventListener("load", init);

	// Transfert des données du formulaire
	var enregistrementDonnees = function(event) {
		event.preventDefault();	// Suppression du comportement par defaut du bouton submit du formulaire
		var nom = document.getElementById('nom').value;	// On récupère les valeurs du formulaire pour le mettre dans un objet formData
		var prenom = document.getElementById('prenom').value; 
		var classe = document.getElementById('classe').value;
		var email = document.getElementById('email').value;
		var tel = document.getElementById('tel').value;
		var adresse = document.getElementById('adresse').value;
		var code_postal = document.getElementById('code_postal').value;
		var mot_de_passe = document.getElementById('mot_de_passe').value;
		var ville = document.getElementById('ville').value;
		var jour = document.getElementById('jour').value;
		var mois = document.getElementById('mois').value;
		var annee = document.getElementById('annee').value;
		var sexe = document.getElementById('sexe').value;
		formData = new FormData(); 		// Création d'un objet FormData pour l'envoi des données https://developer.mozilla.org/fr/docs/Web/Guide/Using_FormData_Objects
		formData.append('nom', nom);	// Rajout des champs
		formData.append('prenom', prenom);
		formData.append('classe', classe);
		formData.append('email', email);
		formData.append('tel', tel);
		formData.append('adresse', adresse);
		formData.append('code_postal', code_postal);
		formData.append('mot_de_passe', mot_de_passe);
		formData.append('ville', ville);
		formData.append('jour', jour);
		formData.append('mois', mois);
		formData.append('annee', annee);
		formData.append('sexe', sexe);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText) {
					alert(this.responseText);
				} else {
					alert("Pas de réponse du script php");
				}
			}
		};
		xmlhttp.open('POST', 'AjouterDonneesBDD.php', true);
		xmlhttp.send(formData);
	}
	
	// Création liste jours, mois, année
		var creationOptions = function(id){
		el=document.getElementById(id);
		var a = 1;
		annee=1950;
		for (a=1;a<58;a++) {
			el.innerHTML+='<option>'+annee+'</option>';
			annee= annee+1
		}
		
	}
	
	var creationOptionsJour = function(id){
		el=document.getElementById(id);
		for (a=1;a<32;a++) {
			el.innerHTML+='<option>'+a+'</option>';
		}
		
	}
	
		var creationOptionsMois = function(id){
		el=document.getElementById(id);
		for (a=0;a<12;a++) {
			el.innerHTML+='<option>'+libelleMois[a]+'</option>';
		}
		
	}