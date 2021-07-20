<?php

//Cette page en vrai est appelé par un lien qui se trouve sur une autre page. Le lien permet juste de transférer l'id de l'élément à supprimer 



    
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

        //On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_GET['idRessource'])) {


            
            $getress = intval($_GET['idRessource']);//Ici la variable cool sert à recupérer l'id de l'élément que je veux supprimer
             $reqiddossier = $bdd ->query('SELECT * FROM ressource WHERE idRessource ='.$getress.'');
             $ressinfo = $reqiddossier->fetch(); 
             $iddossier=$ressinfo['dossierConcerne'];

            $reqsup = $bdd ->query('DELETE FROM ressource WHERE idRessource ='.$getress.'');  //Requête pour supprimer l'élément
            


            header('location:afficheDossier.php?idDossier='.$iddossier);
            
        }
         if (isset($_GET['idFichier'])) {
            
            $getfile = intval($_GET['idFichier']);//Ici la variable cool sert à recupérer l'id de l'élément que je veux supprimer
            $reqiddossier = $bdd ->query('SELECT * FROM fichier WHERE idFichier ='.$getfile.'');
             $fileinfo = $reqiddossier->fetch(); 
             $iddossier=$fileinfo['dossier'];


            $reqsup = $bdd ->query('DELETE FROM fichier WHERE idFichier ='.$getfile.'');  //Requête pour supprimer l'élément
            header('location:afficheDossier.php?idDossier='.$iddossier);
            
        }
        if (isset($_GET['idDossier'])) {
            
            $getiddoss = intval($_GET['idDossier']);//Ici la variable cool sert à recupérer l'id de l'élément que je veux supprimer
            $reqsup = $bdd ->query('DELETE FROM dossier WHERE iddossier ='.$getiddoss.'');  //Requête pour supprimer l'élément
            header('location:dashboard.php');
            
        }



        

     } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
     }
 
    


    
   
?>

