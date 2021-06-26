<!DOCTYPE html>
<?php
session_start();
  
  $bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');
  //VERIFICATION D'ENVOI DE FORMULIARE
    if (isset($_POST['savecollab'])) {
      extract($_POST);

      //PROTECTION DES CHAMPS CONTRE LES SCRIPTS
        $emailconnect=htmlspecialchars($emailconnect);
        $mdpconnect=sha1($mdpconnect);
      //VERIFICATION DU REMPLISSAGE DES CHAMPS
        if ( !empty($emailconnect) && !empty($mdpconnect)) {
          //VERIFICATION D'EXISTENCE DE L'UTILISATEUR
            $requser = $bdd->prepare("SELECT * FROM collaborateur WHERE emailcollaborateur = ? AND motdepasse = ?");
            $requser -> execute(array($emailconnect, $mdpconnect));
            $userexist = $requser->rowcount();
            
            if ($userexist == 1) {

              $userinfo = $requser->fetch();
              $_SESSION['idCollaborateur']= $userinfo['idCollaborateur'];
              $_SESSION['nomCollaborateur']= $userinfo['nomCollaborateur'];
              $_SESSION['prenomCollaborateur']= $userinfo['prenomCollaborateur'];
              $_SESSION['emailCollaborateur']= $userinfo['emailCollaborateur'];
              $_SESSION['fonctionCollaborateur']= $userinfo['fonctionCollaborateur'];
              var_dump($_SESSION);
              header("location:interface utilisateur OBOX.php?idCollaborateur=".$_SESSION['idCollaborateur']);
            }
            else
            {
              $msg="Mauvais mail ou mot de passe!!!!!!!";
            }

        }
        else
        {
          $msg = "Tous les champs doivent etre rempli!!!!!!!!!!!!!!!!!!";
        }
        /*
        */
    }



?>

<html>
<head></head>
 <body> 
 	<style type="text/css">
 		form{
  /* Uniquement centrer le formulaire sur la page */
  margin: 0 auto;
  width: 370px;
  /* Encadré pour voir les limites du formulaire */
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

input {
  margin-top: 1em;
}

input {
  /* Pour être sûrs que toutes les étiquettes ont même taille et sont correctement alignées */
  display: inline-block;
  width: 90px;
  
}

input {
  /* Pour s'assurer que tous les champs texte ont la même police.
     Par défaut, les textarea ont une police monospace */
  font: 1em sans-serif;


  /* Pour que tous les champs texte aient la même dimension */
  width:250px;
  box-sizing: border-box;

  /* Pour harmoniser le look & feel des bordures des champs texte */
  border: 1px solid #999;
}

input{
  /* Pour souligner légèrement les éléments actifs */
  border-color: #000;
}

input {
  /* Pour aligner les champs texte multi‑ligne avec leur étiquette */
  vertical-align: top;

  /* Pour donner assez de place pour écrire du texte */
  height: 2em;
  border-radius:4px;
  padding-right:2px;
}

input{
  /* Pour placer le bouton à la même position que les champs texte */
  padding-left:5px; /* même taille que les étiquettes */
  size:5px;
}
 	</style>

<form name="formulaire" action="" method="post">
	<div style="text-align: center;"><img src="logo.jpg" width="100px" height="100px"></div>
  <fieldset><legend><h1>CONNECTEZ-VOUS A VOTRE ESPACE</h1></legend>
      <pre>
      <input type="email" size="40" name="emailconnect" placeholder="email ">
      <input type="password" size="40" name="mdpconnect" placeholder="mot de passe">

  </pre>
   
      <?php 
        if (isset($msg)) {
           echo '<font color="red">' . $msg .'</font>' ;
         }
         elseif (isset($suc)) {
          echo '<font color="green">' . $suc .'</font>' ;
         }
        
        ?>

	<div style="margin-left: 46px;">
		<input type="submit" name="savecollab" value="Enregistrer"/> 
	</div>


</fieldset>
</form>
</body>
</html>