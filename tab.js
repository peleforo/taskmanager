function retour_villes(le_dep)
{
	var chaine_villes="";
	
	switch(le_dep)
	{
		case "07":
		chaine_villes = "Alba la Romaine|Annonay|Aubenas|Lamastre|Lavilledieu|Le cheylard|Meyras|Vals les bains";
		break;
		case "26":
		chaine_villes = "Bourg de P&eacute;age|Bourg l&egrave;s Valence|Ch&acirc;teauneuf sur Is&egrave;re|Crest|Dieulefit|Donz&egrave;re|Mont&eacute;limar|Nyons|Pierrelatte|Romans sur Is&egrave;re|Valence";
		break;
		case "38":
		chaine_villes = "Bourgoin Jallieu|Chamrousse|Echirolles|Grenoble|Meylan|Sassenage|Vienne|Voiron|Voreppe";
		break;
		case "69":
		chaine_villes = "Condrieu|Ecully|Givors|Lyon|Saint Priest|Ternay|Vaulx-en-Velin|Villefranche-sur-Sa&ocirc;ne|Villeurbanne";
		break;
		case "73":
		chaine_villes = "Chamb&eacute;ry|Le bourget du lac|Tournon|Voglans";
		break;
	}
	
	return chaine_villes;
}



/*
LORSQUE L'ON CLIQUE SUR UN ONGLET
 *ON RETIRE LA CLASS ACTIVE  DE L'ONGLET ACTIF
 *ON AJOUTE LA CLASSE ACTIVE A L'ONGLET ACTUEL

 *ON RETIRE LA CLASSE ACTIVE SUR LE CONTENU ACTIF
 *ON AJOUTE LA CLASSE ACTIVE SUR LE CONTENU CORRESPONDANT 
*/
var tabs = document.querySelectorAll('.tabs a')
for (var i = 0; i < tabs.length; i++) {
	tabs[i].addEventListener('click' , function (e) {

		var li = this.parentNode
		var div = this.parentNode.parentNode.parentNode
	
		

		if (li.classList.contains('active')) {
			return false
		}
//ON RETIRE LA CLASS ACTIVE  DE L'ONGLET ACTIF
		div.querySelector('.tabs .active').classList.remove('active')
//ON AJOUTE LA CLASSE ACTIVE SUR LE CONTENU CORRESPONDANT 
		li.classList.add('active')
//ON RETIRE LA CLASSE ACTIVE SUR LE CONTENU ACTIF
		div.querySelector('.tab-content.active').classList.remove('active')
//ON AJOUTE LA CLASSE ACTIVE SUR LE CONTENU CORRESPONDANT  
		div.querySelector(this.getAttribute('href')).classList.add('active') 


	})
}	 	

var tabl = document.querySelectorAll('.tabs a')
for (var i = 0; i < tab.llength; i++) {
	tabs[i].addEventListener('click' , function (e) {

		var lis = this.parentNode
		var divi = this.parentNode.parentNode.parentNode.
	
		

		if (li.classList.contains('active')) {
			return false
		}
//ON RETIRE LA CLASS ACTIVE  DE L'ONGLET ACTIF
		divi.querySelector('.tabs .active').classList.remove('active')
//ON AJOUTE LA CLASSE ACTIVE SUR LE CONTENU CORRESPONDANT 
		lis.classList.add('active')
//ON RETIRE LA CLASSE ACTIVE SUR LE CONTENU ACTIF
		divi.querySelector('.tab-content.active').classList.remove('active')
//ON AJOUTE LA CLASSE ACTIVE SUR LE CONTENU CORRESPONDANT  
		divi.querySelector(this.getAttribute('href')).classList.add('active') 


	})
}	 	