<!DOCTYPE html>
<?php

  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  //VERIFICATION D'ENVOI DE FORMULIARE
	    if (isset($_POST['nouveaudossier'])) {
	      extract($_POST);

	      //PROTECTION DES CHAMPS CONTRE LES SCRIPTS
	        $iddossier=htmlspecialchars($iddossier);
	        $projet=htmlspecialchars($projet);
	        $nomclient=htmlspecialchars($nomclient);
	        $numclient=htmlspecialchars($numclient);
	        $emailclient=htmlspecialchars($emailclient);
	        $typemaison=htmlspecialchars($typemaison);
	        $villedistrict=htmlspecialchars($villedistrict);
	        $commune=htmlspecialchars($commune);
	        $zone=htmlspecialchars($zone);
	        $descriptif=htmlspecialchars($descriptif);
	      
	        
	      //VERIFICATION DU REMPLISSAGE DES CHAMPS
	        if ( !empty($iddossier) && !empty($projet) && !empty($nomclient) && !empty($numclient) && !empty($typemaison) && !empty($villedistrict) && !empty($commune) && !empty($zone)) {
	          	$reqdossier = $bdd->prepare("SELECT * FROM dossier WHERE iddossier = ?");
                $reqdossier -> execute(array($iddossier));
                $dossierexist = $reqdossier->rowcount();

		        if ($dossierexist == 0) {
		        	//ENREGISTREMENT DES DONNES DANS LA BASE
		        	 $insertdossier = $bdd->prepare("INSERT INTO dossier(iddossier,projetconcerne,nomclient,numeroclient,emailclient,typedemaison,villedistrict,commune,zone,descriptif) VALUES (?,?,?,?,?,?,?,?,?,?)");
		             $insertdossier->execute(array($iddossier, $projet, $nomclient, $numclient, $emailclient, $typemaison, $villedistrict, $commune, $zone, $descriptif));
		             $suc = "Nouveau dossier crée!!!!";
		        }
		        else
		        	{
		        		$suc = "ce dossier existe deja!!!!!!";
		        	}
	        }
	        else
	        	{
	        		$suc = "remplissez toutes les zones";
	        	}

	    }


	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style>

	.classe1 { text-decoration: none; color: #000000; }
	.classe2 { text-decoration: line-through; color: #888888; }
	</style>
</head>
<body class="container" style="background-image:url('logo.jpg');  background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">

<form name="nouveaudossier" class="row" style="padding-top:50px;" method="POST">

	<!-- MENU DE NAVIGATION-->
		<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

				<h1>FTTH</h1>                            
			  <ul class="nav nav-tabs flex-column">
				 <li class="nav-item">
				 	<a class="nav-link" href="interface utilisateur OBOX.php" style="color: black;">OBOX</a>
				 </li>
				 <li class="nav-item">
				 	<a class="nav-link" href="interface utilisateur OFIBRE.php" style="color: black;">OFIBRE</a>
				 </li>
				 <li class="nav-item">
				 	<a class="nav-link" href="interface utilisateur CI.php" style="color: black;">CI</a>
				 </li>
				 <li class="nav-item">
				 	<a class="nav-link" href="interface utilisateur CLUSTER.php" style="color: black;">CLUSTER</a>
				 </li>
			</ul>
		  
		  
		  <!-- CSS DU FORMULAIRE-->
			  <style type="text/css">

			  	 h1{
			  	 	font-size:20px;
			  	 	color:orange;
			  	 	font-family:fantasy;
			  	 	
			  	 }
			  	li{
			     list-style:none;

			  	}
			  	a{
			  		text-decoration:none;
			  		color:Turquoise;
			  		
			  	}
			  </style> 


		</div>	

	<!-- SECTION D'ENREGISTREMENT DU DOSSIER-->
		
		<div class="col-xs-12 col-sm-12 col-md-11 col-lg-11"  >
			<section class="container" >
				<div>
					
					<h1 style="text-align: center; font-size: 50px;">NOUVEAU DOSSIER
					</h1><br/>

				</div>

					<div class="row" style="padding-left: 180px;"> 
						<table>
							
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;">
									<label for="iddossier">id du dossier</label>
								</td>
								<td>
									<input type="text" name="iddossier" id="iddossier" />
								</td>
							</tr>
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;">
									<label for="projet">Projet concerné</label>
								</td>
								<td>
									<select name="projet" id="projet">
							              <option value="1">--</option>
							              <option value="2">OBOX</option>
							              <option value="3">OFIBRE</option>
							              <option value="4">CI</option>
							              <option value="5">CLUSTER</option>
							    </select>
								</td>
							</tr>
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;">
									<label for="nomclient">nom du client</label>
								</td>
								<td>
									<input type="text" name="nomclient" id="nomclient" />
								</td>

							</tr>
							
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;">
									<label for="numclient">numero du client</label>
								</td>
								<td>
									<input type="text" name="numclient" id="numclient" />
								</td>
								
							</tr>
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;">
									<label for="emailclient">email du client</label>
								</td>
								<td>
									<input type="email" name="emailclient" id="emailclient" />
								</td>
								
							</tr>
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;" >
									<label for="typemaison">type de maison</label>
								</td>
								<td>
									<input type="text" name="typemaison" id="typemaison" />
								</td>
								
							</tr>
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right; ">
									<label for="villedistrict">Ville ou district</label>
								</td>
								<td>
									<input type="text" name="villedistrict" id="villedistrict" />
								</td>
								
							</tr>
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;">
									<label for="commune">Commune</label>
								</td>
								<td>
									<input type="text" name="commune" id="commune" />
								</td>
								
							</tr>
							<tr>
								<td style="font-size: 30px; padding-right: 10px;text-align: right;">
									<label for="typemaison">Zone</label>
								</td>
								<td>
									<input type="text" name="zone" id="zone" />
								</td>
								
							</tr>
						</table>

						<!--SECTION DE DESCRIPTIF-->
						<div style="margin-top: 10px;" class="col-xs-12 col-sm-9 col-md-11 col-lg-9">
							<h1>DESCRIPTIF</h1>
								<textarea id="descriptif" name="descriptif" style= "max-width:100%;" cols="150"></textarea>						
								</div>
						</div>
						<div style="text-align: center ;margin-top: 30px;">
							<input type="submit" name="nouveaudossier" value="Enregistrer"/> 	
						</div>
						<?php 
        if (isset($suc)) {
          echo '<font color="green">' . $suc .'</font>' ;
         }
 
        
        ?>
			</section>	
		</div>
</form>
	

</body>
</html>