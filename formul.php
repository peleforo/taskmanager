<!DOCTYPE html>
<?php
  
  try {
    
    $bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

      //On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //VERIFICATION D'ENVOI DE FORMULIARE
      if (isset($_POST['savecollab'])) {
        extract($_POST);
      //VERIFICATION DU REMPLISSAGE DES CHAMPS
        if (!empty($nom) && !empty($email) && !empty($mdp) && !empty($mdp2) && !empty($numero) && !empty($fonction) &&!empty($service)) {

          //PROTECTION DES CHAMPS CONTRE LES SCRIPTS
            $nom=htmlspecialchars($nom);
            $email=htmlspecialchars($email);
            $mdp=sha1($mdp);
            $mdp2=sha1($mdp2);
            $numero=htmlspecialchars($numero);
            $fonction=htmlspecialchars($fonction);
            $numerolength = strlen($numero);

          //VERIFICATION DE VALIDITE DE MAIL
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
              //VERIFICATION D'EXISTENCE D'ADRESSE MAIL DANS LA BASE DE DONNEE
              //RECHERCHE DANS LA BD
                $reqmail = $bdd->prepare("SELECT * FROM collaborateur WHERE emailcollaborateur = ?");
                $reqmail -> execute(array($email));
                $mailexist = $reqmail->rowcount();
              //CONFRONTATION DE LA BD AVEC LE FORMULAIRE
                  if ($mailexist == 0) {
                  //VERIFICATION DE CONFORMITE DE NUMERO
                    if ($numerolength == 10) {
                        //VERIFICATION DE CONFORMITE DE MOT DE PASSE ENTRE
                          if ($mdp == $mdp2) 
                          { 
                              //ENREGISTREMENT D'UN NOUVEAU MEMBRE
                                $insertcollab = $bdd->prepare("INSERT INTO collaborateur(nomcollaborateur, emailcollaborateur, motdepasse, numerocollaborateur, fonctioncollaborateur,service) VALUES (?,?,?,?,?,?)");
                                $insertcollab->execute(array($nom, $email, $mdp, $numero, $fonction, $service));
                                $suc = "Nouveau compte collaborateur crée!!!!";
                                header("location: index.php");  
                          }
                          else
                          {
                            $msg = "les mots de passe saisis ne sont pas conformes!!!!!!!!";
                          }

                      }  
                    else
                    {
                      $msg ="le numero ne repecte pas la numerotation en vigueur en cote d'ivoire";
                    }
                    
                    }
                    else
                    {
                      $msg= "mail deja existant.Utilisez un autre!!!!!!!! ";
                    }
                  }
                  else
                  {
                    $msg = "votre addresse mail n'est pas valide";
                  }


        }
        else
        {
          $msg = "Tous les champs doivent etre rempli!!!!!!!!!!!!!!!!!!";
        }
        /*
        */
      }

  } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
    
  }
    


?>

<html>
<head></head>
 <body> 
  <?php
  var_dump($_POST);
?>
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

<form name="savecollab" action="" method="POST">
	<div style="text-align: center;"><img src="logo.jpg" width="100px" height="100px"></div>
  <fieldset><legend><h1>formulaire du collaborateur</h1></legend>
      <pre>
      <input type="text" size="40" name="nom" placeholder="nom " > 
      <input type="email" size="40" name="email" placeholder="email ">
      <input type="password" size="40" name="mdp" placeholder="mot de passe">
      <input type="password" size="40" name="mdp2" placeholder="confirmez votre mot de passe">
      <input type="text"  size="40" name="numero" placeholder="numero">
      <input type="text" size="40" name="fonction" placeholder="fonction">
      <div> 
          <span>
            <select name="service" id="service">
              <option value="1">choisir le service</option>
              <option value="2">FTTH</option>
            </select>
          </span>
      </div>
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

