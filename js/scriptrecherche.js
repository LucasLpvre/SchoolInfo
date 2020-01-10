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
	}

	// On ne provoque l'appel à la fonction declarationAbonnements() qu'après le chargement complet de la page
	// Le chargement de la page provoque un événement "load"
	// En attendant la fin du chargement on est certain que tous les éléments ont été créés avant de mettre en place les abonnements
	window.addEventListener("load", declarationAbonnements);
	window.addEventListener("load", init);

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