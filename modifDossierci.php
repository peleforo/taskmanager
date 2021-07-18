<!DOCTYPE html>
<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');
	 	//On définit le mode d'erreur de PDO sur Exception
	        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        //var_dump($_POST);
	 		
	        if (isset($_GET['idDossier'])) {
	        	$getid = intval($_GET['idDossier']);


	        	$suc = 'bon';

	        		

	        	$reqdossier = $bdd ->prepare('SELECT * FROM dossier WHERE idDossier ='.$_GET['idDossier'].'');
	        		$reqdossier ->execute(array($getid));
	        		$dossierinfo = $reqdossier->fetch();
	        		$suc="";

	        	$reqetape = $bdd -> query('SELECT * FROM etape WHERE doss ='.$getid.'');
				$etape = $reqetape->fetch();
				
	        	
	        		
	        	if (isset($_POST['modif'])) {
	        			extract($_POST);
	        		$suc ="bonbon";

	        		
	        			
	        		//references
	        		
	        		$newdossier= htmlspecialchars($_POST['newiddossier'])	;
					$newnom = htmlspecialchars($_POST['newnom']);
	        		$newcommune = htmlspecialchars($_POST['newcommune']);
	        		$newvd = htmlspecialchars($_POST['newvd']);
	        		$newzone = htmlspecialchars($_POST['newzone']);
	        		$newnumclient = htmlspecialchars($_POST['newnumclient']);
		      		$newemail = htmlspecialchars($_POST['newemail']);
		       		$newtypemaison = htmlspecialchars($_POST['newtypemaison']);
		       		$newprojet = htmlspecialchars($_POST['newprojet']);
		       		//planification
		       		$newetat = htmlspecialchars($_POST['newetat']);
		       		$newintervention = htmlspecialchars($_POST['newintervention']);
		       		$newcloture = htmlspecialchars($_POST['newcloture']);
		       		$newdescriptif = htmlspecialchars($_POST['newdescriptif']);
		       		//progression
		       		$survey = htmlspecialchars($_POST['survey']);
	        		$recep = htmlspecialchars($_POST['recep']);
	        		$enlev = htmlspecialchars($_POST['enlev']);
	        		$perfo = htmlspecialchars($_POST['perfo']);
	        		$cablage = htmlspecialchars($_POST['cablage']);
	        		$raccordement = htmlspecialchars($_POST['raccordement']);
	        		$vti = htmlspecialchars($_POST['vti']);
	        		$vtoci = htmlspecialchars($_POST['vtoci']);
	        		$alignement = htmlspecialchars($_POST['alignement']);

	        		if (isset($_POST['poteau'])) {
	        			$poteau = htmlspecialchars($_POST['poteau']);
	        		}
	        		


	        		//var_dump($newintervention, $newcloture);
					//modif references
		       		$modifref = $bdd ->prepare('UPDATE dossier SET idDossier = :idDossier , nomClient = :nomClient , commune = :commune ,villeDistrict = :villeDistrict ,zone = :zone ,numeroClient = :numeroClient , emailClient = :emailClient , typeDeMaison = :typeDeMaison  WHERE idDossier = :oldId');
	        		$modifref ->execute(array(
	        			'idDossier' => $newiddossier,
	        			'nomClient' => $newnom,
	        			'commune' => $newcommune,
	        			'villeDistrict' => $newvd,
	        			'zone' => $newzone,
	        			'numeroClient' => $newnumclient,
	        			'emailClient' => $newemail,
	        			'typeDeMaison' => $newtypemaison,
	        			
	        			'oldId' => $_GET['idDossier']));

			   		
	        		
			   		

			   		//modif descriptif
		       		$modifplan = $bdd ->prepare('UPDATE dossier SET descriptif= ? WHERE idDossier = ?');
	        		$modifplan ->execute(array($newdescriptif, $_GET['idDossier']));



	        		if (isset($newetat)) {
	        			/*//modif plan*/
		       		$modifetat = $bdd ->prepare('UPDATE dossier SET statutDossier = ? WHERE idDossier = ?');
	        		$modifetat ->execute(array($newetat, $newdossier));
	        		}

	        		if (isset($newintervention) && !empty($newintervention)) {
	        			/*//modif plan*/
		       		$modifinter = $bdd ->prepare('UPDATE dossier SET debutDossier = ? WHERE idDossier = ?');
	        		$modifinter ->execute(array($newintervention, $_GET['idDossier']));
	        		}
	        		



	        		if ($newcloture) {
	        			/*//modif plan*/
		       		$modifclo = $bdd ->prepare('UPDATE dossier SET  finDossier = ? WHERE idDossier = ?');
	        		$modifclo ->execute(array($newcloture, $_GET['idDossier']));
	        		}
	        		

	        		//modif etape
	        			//modif etape SURVEY 
	        			if (isset($survey) ) {
	        				$reqetude = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "SURVEY"');
	        				$reqetude ->execute(array($getid));
	        				$etudeinfo = $reqetude->fetch();        				
	        				if (isset($_POST['survey']) && !empty($_POST['survey']) && $etudeinfo['statutEtape'] != $_POST['survey']) {
	        					$modifetude = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "SURVEY"');
								$modifetude ->execute(array($etude, $_GET['idDossier']));
								if ($_POST['survey'] != 3) {
									$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "SURVEY"');
									$modiffinetude ->execute(array($_GET['idDossier']));	
		        				}
		        				elseif ($_POST['survey'] = 3)
		        				{
		        					$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape = NOW()  WHERE doss = ? AND nomEtape = "SURVEY "'); 
									$modiffinetude ->execute(array($_GET['idDossier']));

		        				}
	        				}
	        			}
	        			//modif etape recep 
	        			if (isset($recep) ) {
	        				$reqetude = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "RECEPTION DOSSIER ET BOM"');
	        				$reqetude ->execute(array($getid));
	        				$etudeinfo = $reqetude->fetch();        				
	        				if (isset($_POST['recep']) && !empty($_POST['recep']) && $etudeinfo['statutEtape'] != $_POST['recep']) {
	        					$modifetude = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "RECEPTION DOSSIER ET BOM"');
								$modifetude ->execute(array($etude, $_GET['idDossier']));
								if ($_POST['recep'] != 3) {
									$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "SURVEY"');
									$modiffinetude ->execute(array($_GET['idDossier']));	
		        				}
		        				elseif ($_POST['recep'] = 3)
		        				{
		        					$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape = NOW()  WHERE doss = ? AND nomEtape = "RECEPTION DOSSIER ET BOM "'); 
									$modiffinetude ->execute(array($_GET['idDossier']));

		        				}
	        				}
	        			}
	        			//modif etape enlev 
	        			if (isset($enlev) ) {
	        				$reqetude = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "ENLEVEMENT DE MAT"');
	        				$reqetude ->execute(array($getid));
	        				$etudeinfo = $reqetude->fetch();        				
	        				if (isset($_POST['enlev']) && !empty($_POST['enlev']) && $etudeinfo['statutEtape'] != $_POST['enlev']) {
	        					$modifetude = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "ENLEVEMENT DE MAT"');
								$modifetude ->execute(array($etude, $_GET['idDossier']));
								if ($_POST['enlev'] != 3) {
									$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "ENLEVEMENT DE MAT"');
									$modiffinetude ->execute(array($_GET['idDossier']));	
		        				}
		        				elseif ($_POST['enlev'] = 3)
		        				{
		        					$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape = NOW()  WHERE doss = ? AND nomEtape = "ENLEVEMENT DE MAT "'); 
									$modiffinetude ->execute(array($_GET['idDossier']));

		        				}
	        				}
	        			}
	        			//modif etape perfo 
	        			if (isset($perfo) ) {
	        				$reqetude = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "PERFORATION IMMEUBLE ET POSE TUYAU"');
	        				$reqetude ->execute(array($getid));
	        				$etudeinfo = $reqetude->fetch();        				
	        				if (isset($_POST['perfo']) && !empty($_POST['perfo']) && $etudeinfo['statutEtape'] != $_POST['perfo']) {
	        					$modifetude = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "PERFORATION IMMEUBLE ET POSE TUYAU"');
								$modifetude ->execute(array($etude, $_GET['idDossier']));
								if ($_POST['perfo'] != 3) {
									$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "PERFORATION IMMEUBLE ET POSE TUYAU"');
									$modiffinetude ->execute(array($_GET['idDossier']));	
		        				}
		        				elseif ($_POST['perfo'] = 3)
		        				{
		        					$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape = NOW()  WHERE doss = ? AND nomEtape = "perfoPERFORATION IMMEUBLE ET POSE TUYAU "'); 
									$modiffinetude ->execute(array($_GET['idDossier']));

		        				}
	        				}
	        			}
	        			//modif etape vti 
	        			if (isset($vti) ) {
	        				$reqetude = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "VTI"');
	        				$reqetude ->execute(array($getid));
	        				$etudeinfo = $reqetude->fetch();        				
	        				if (isset($_POST['vti']) && !empty($_POST['vti']) && $etudeinfo['statutEtape'] != $_POST['vti']) {
	        					$modifetude = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "VTI"');
								$modifetude ->execute(array($etude, $_GET['idDossier']));
								if ($_POST['vti'] != 3) {
									$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "VTI"');
									$modiffinetude ->execute(array($_GET['idDossier']));	
		        				}
		        				elseif ($_POST['vti'] = 3)
		        				{
		        					$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape = NOW()  WHERE doss = ? AND nomEtape = "VTI "'); 
									$modiffinetude ->execute(array($_GET['idDossier']));

		        				}
	        				}
	        			}
	        			//modif etape VTOCI 
	        			if (isset($vtoci) ) {
	        				$reqetude = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "VTOCI"');
	        				$reqetude ->execute(array($getid));
	        				$etudeinfo = $reqetude->fetch();        				
	        				if (isset($_POST['vtoci']) && !empty($_POST['vtoci']) && $etudeinfo['statutEtape'] != $_POST['vtoci']) {
	        					$modifetude = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "VTOCI"');
								$modifetude ->execute(array($etude, $_GET['idDossier']));
								if ($_POST['vtoci'] != 3) {
									$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "VTOCI"');
									$modiffinetude ->execute(array($_GET['idDossier']));	
		        				}
		        				elseif ($_POST['vtoci'] = 3)
		        				{
		        					$modiffinetude = $bdd ->prepare('UPDATE etape SET finEtape = NOW()  WHERE doss = ? AND nomEtape = "VTOCI "'); 
									$modiffinetude ->execute(array($_GET['idDossier']));

		        				}
	        				}
	        			}
	        			
	        			//modif etape cablage
	        			if (isset($cablage)) {
	        					$reqcabl = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "CABLAGE"');
		        				$reqcabl ->execute(array($_GET['idDossier']));
		        				$cablinfo = $reqcabl->fetch();
		        			if (isset($_POST['cablage']) && !empty($_POST['cablage']) && $cablinfo['statutEtape'] != $_POST['cablage']) {
	        				
								$modifcabl = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "CABLAGE"');
								$modifcabl ->execute(array($cablage, $_GET['idDossier']));

								if ($_POST['cablage'] != 3) {

									$modiffincabl = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "CABLAGE"');
									$modiffincabl ->execute(array($_GET['idDossier']));
								}
								elseif ($_POST['cablage'] = 3) {
									$modiffincabl = $bdd ->prepare('UPDATE etape SET finEtape= NOW() WHERE doss = ? AND nomEtape = "CABLAGE"');
									$modiffincabl ->execute(array($_GET['idDossier']));
								}
		        			}
		        		}
	        			//modif etape raccordement
	        			if (isset($raccordement)) {
	        					
	        					$reqra = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "RACCORDEMENT"');
		        				$reqra ->execute(array($_GET['idDossier']));
		        				$racinfo = $reqra->fetch();
		        			if (isset($_POST['raccordement']) && !empty($_POST['raccordement']) && $racinfo['statutEtape'] != $_POST['raccordement']) {

								$modifra = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "RACCORDEMENT"');
								$modifra ->execute(array($raccordement, $_GET['idDossier']));
								if ($_POST['raccordement'] != 3) {

									$modiffinrac = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "RACCORDEMENT"');
									$modiffinrac ->execute(array($_GET['idDossier']));
								}
								elseif ($_POST['raccordement'] = 3) {
									$modiffinrac = $bdd ->prepare('UPDATE etape SET finEtape= NOW() WHERE doss = ? AND nomEtape = "RACCORDEMENT"');
									$modiffinrac ->execute(array($_GET['idDossier']));
								}
	        				}
	        			}
	        			//modif etape configuration
	        			if (isset($configuration)) {
	        				
							$reqconf = $bdd ->prepare('SELECT * FROM etape WHERE doss = ? AND nomEtape = "CONFIGURATION"');
		        				$reqconf ->execute(array($_GET['idDossier']));
		        				$confinfo = $reqconf->fetch();
		        			if (isset($_POST['configuration']) && !empty($_POST['configuration']) && $confinfo['statutEtape'] != $_POST['configuration']) {
								$modifconf = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "CONFIGURATION"');
								$modifconf ->execute(array($configuration, $_GET['idDossier']));

								if ($_POST['configuration'] != 3) {

									$modiffinconf = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "CONFIGURATION"');
									$modiffinconf ->execute(array($_GET['idDossier']));
								}
								elseif ($_POST['configuration'] = 3) {
									$modiffinconf = $bdd ->prepare('UPDATE etape SET finEtape= NOW() WHERE doss = ? AND nomEtape = "CONFIGURATION"');
									$modiffinconf ->execute(array($_GET['idDossier']));
								}
	        				}
	        			}
	        			//modif etape recu
	        			if (isset($recu)) {
		        				$reqrecu = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "RECU"');
			        				$reqrecu ->execute(array($_GET['idDossier']));
			        				$recuinfo = $reqrecu->fetch();
			        			if (isset($_POST['recu']) && !empty($_POST['recu']) && $recuinfo['statutEtape'] != $_POST['recu']) {
		        				
								$modifrecu = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "RECU"');
								$modifrecu ->execute(array($recu, $_GET['idDossier']));

								if ($_POST['recu'] != 3) {

									$modiffinrecu = $bdd ->prepare('UPDATE etape SET finEtape= null WHERE doss = ? AND nomEtape = "RECU"');
									$modiffinrecu ->execute(array($_GET['idDossier']));
								}
								elseif ($_POST['recu'] = 3) {
									$modiffinrecu = $bdd ->prepare('UPDATE etape SET finEtape= NOW() WHERE doss = ? AND nomEtape = "RECU"');
									$modiffinrecu ->execute(array($_GET['idDossier']));
								}
		        			}
		        		}

		        		if (isset($newprojet) && !empty($newprojet) && $newprojet != $dossierinfo['projetConcerne'] && $newprojet != 1) {
		        			$modifref = $bdd ->prepare('UPDATE dossier SET projetConcerne = :projetConcerne WHERE idDossier = :oldId');
	        		$modifref ->execute(array(
	        			'projetConcerne' => $newprojet,
	        			'oldId' => $_GET['idDossier']));
	        		
		        		}
		        		if (isset($_POST['spec']) && !empty($_POST['spec'])  && $dossierinfo['spec'] != $_POST['spec']) {
		        			
		        				if ($_POST['spec']==3 and $dossierinfo['projetConcerne']!=3) {
		        					echo "c";
		        				} 
		        				elseif ($_POST['spec']==2 and $dossierinfo['projetConcerne']!=2) {
		        					echo "a";	
		        				}
		        				else {
		        					$modifspec = $bdd ->prepare('UPDATE dossier SET spec = ? WHERE idDossier = ?');
	        						$modifspec ->execute(array($_POST['spec'], $_GET['idDossier']));
	        						echo "i";
		        				}
		        				
		        			
		        			
	        			
		        			
		        			}		        		

			   		
			   		
			   			header('location:afficheDossier.php?idDossier='.$newdossier);   
	        		

	        	}
	        	else
	        	{
	        		$suc ='pas de form';
	        	}	   
	        }
	        else
	        {
	        	header('location:dashboard.php');
	        }
	        
	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<?php



	if (isset($_SESSION['idCollaborateur'])) {
		// code...

?>
<html lang="en">
<head>
	<title>MODIFICATION DU DOSSIER N° <?php echo $dossierinfo['idDossier']?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #f1f1f1;">
<?php
	var_dump($dossierinfo);

	var_dump($_POST);
?>
	
	<form action="" name="modif" method="POST" class="container-fluid">
		<div class="limiter">
			<div class="container-table100 ">
				<!--PREMIERE ETAGE-->
				<div style="display: flex;margin: 30px;justify-content: space-between;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">					
					<p>
						<a  href= "dashboard.php" type="button" class="btn btn-success">
	                		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
							  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
							  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"></path>
							</svg>
                			HOME
              			</a>
				    </p>
					
					<br />
			</div>

				 <div class="row">
				 	<!--TABLE REFERENCE DE DOSSIER-->
					<div class="wrap-table100 col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="table100 ver1 m-b-110">
							<table data-vertable="ver1">
									<thead>
										<tr class="row100 head">
											<th class="column100 column1" data-column="column1">REFERENCE DU DOSSIER</th>
											
										</tr>
									</thead>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="iddossier">IDENTIFIANT DU DOSSIER</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newiddossier" id="iddossier" value ="<?php echo $dossierinfo['idDossier']?>" />
										</td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="nomclient">NOM DU CLIENT</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newnom" id="nomclient" value ="<?php echo $dossierinfo['nomClient']?>"/>
										</td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="villedistrict">VILLE OU DISTRICT</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newvd" id="villedistrict" value ="<?php echo $dossierinfo['villeDistrict']?>"/>	
							            </td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="commune">COMMUNE</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newcommune" id="commune" value ="<?php echo $dossierinfo['commune']?>"/>	
							            </td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="zone">ZONE</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newzone" id="zone" value ="<?php echo $dossierinfo['zone']?>"/>	
							            </td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="numclient">NUMERO DU CLIENT</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newnumclient" id="numclient" value ="<?php echo $dossierinfo['numeroClient']?>"/>
										</td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="emailclient">EMAIL DU CLIENT</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="email" name="newemail" id="emailclient" value ="<?php echo $dossierinfo['emailClient']?>"/>
										</td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="typemaison">TYPE DE MAISON</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newtypemaison" id="typemaison" value ="<?php echo $dossierinfo['typeDeMaison']?>"/>

										</td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1">PROJET CONCERNE</td>
										<td class="column100 column2" data-column="column2">
											<select name="newprojet" id="projet" required>
										        <option value="1">--</option>
										        <option value="2">OBOX</option>
										        <option value="3">OFIBRE</option>
										        <option value="4">CI</option>
										        <option value="5">CLUSTER</option>
										    </select>
										</td>
									</tr>
							</table>
						</div>
					</div>
					<!--PROGRESSION-->
					<div class="wrap-table100 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="table100 ver1 m-b-110">

							<table data-vertable="ver1">
								<thead>
									<tr class="row100 head">
										<th class="column100 column1" data-column="column1">PROGRESSION DU DOSSIER</th>
										<th class="column100 column1" data-column="column1">STATUT DU DOSSIER</th>
										<th class="column100 column1" data-column="column1">DATE DE DEBUT DE L'ETAPE</th>
										<th class="column100 column1" data-column="column1">DATE DE FIN DE L'ETAPE</th>
										
									</tr>
								</thead>
								<tbody>
									<tr class="row100">
											<td class="column100 column1" data-column="column1">SURVEY</td>
											<td class="column100 column2" data-column="column2">
											<select name="survey"  required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
											</td>
											<td class="column100 column3" data-column="column3">
												<?php echo $dossierinfo['debutDossier'];?>
												
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="SURVEY" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">RECEPTION DOSSIER ET BOM</td>
										<td class="column100 column2" data-column="column2">
											<select name="recep"  required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="SURVEY" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}
												?>

											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DOSSIER ET BOM" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}
												?>
					
											</td>
									</tr>
									
												
									<tr class="row100">
										<td class="column100 column1" data-column="column1">ENLEVEMENT DE MAT</td>
										<td class="column100 column2" data-column="column2">
											<select name="enlev"  required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DOSSIER ET BOM" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}	
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="ENLEVEMENT DE MAT" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];}
														
												?>
					
											</td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1">PERFORATION IMMEUBLE ET POSE TUYAU</td>
										<td class="column100 column2" data-column="column2">
											<select name="perfo" required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="ENLEVEMENT DE MAT" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}	
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="PERFORATION IMMEUBLE ET POSE TUYAU" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}
												?>
					
											</td>
									</tr>			
									
									<tr class="row100">
										<td class="column100 column1" data-column="column1">CABLAGE</td>
										<td class="column100 column2" data-column="column2">
											<select name="cablage" required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="PERFORATION IMMEUBLE ET POSE TUYAU" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}	
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CABLAGE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];}
														
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">RACCORDEMENT</td>
										<td class="column100 column2" data-column="column2">
											<select name="raccordement"  required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CABLAGE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RACCORDEMENT" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														}
														
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">VTI</td>
										<td class="column100 column2" data-column="column2">
											<select name="vti"  required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RACCORDEMENT" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														}
												?>	
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="VTI" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														}
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">VTOCI</td>
										<td class="column100 column2" data-column="column2">
											<select name="vtoci" required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="VTI" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														}
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="VTOCI" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														}
												?>
					
											</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1">ALIGNEMENT</td>
										<td class="column100 column2" data-column="column2">
											<select name="alignement" required="">
												<option value="0"> </option>
										        <option value="1">pas encore commencer</option>
										        <option value="2">en cours</option>
												<option value="3">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="VTOCI" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														
													}	
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CABLAGE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														}
												?>
					
											</td>
									</tr>
								</tbody>
							</table>
							
					</div>
				</div>
					<!--TABLE PLANIFICATION DE DOSSIER ET PJ-->
					 <div class="wrap-table100 col-xs-12 col-sm-12 col-md-6 col-lg-6" style="display: flex; flex-wrap: wrap; align-content: space-between;">
					 	<div class="wrap-table100 col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<!--TABLE PLANIFICATION DE DOSSIER-->
							<div class="table100 ver1 m-b-110" 	>
								<table data-vertable="ver1">
										<thead>
											<tr class="row100 head">
												<th class="column100 column1" data-column="column1">PLANIFICATION DU DOSSIER</th>
											</tr>
										</thead>
										<tr class="row100">
											<td class="column100 column1" data-column="column1"><label for="projet">ETAT DU DOSSIER</label></td>
											<td class="column100 column2" data-column="column2">
												<select name="newetat" id="etat" required>
											        <option value="1">en cours</option>
											        <option value="2">en attente</option>
											        <option value="3">reporté</option>
											        <option value="4">validé</option>
											        <option value="5">perdu</option>
											    </select>
											</td>
										</tr>
										<tr class="row100">
											<td class="column100 column1" data-column="column1">DATE D'INTERVENTION</td>
											<td class="column100 column2" data-column="column2">
												<input type="date" name="newintervention" id="intervention"/>	
								            </td>
										</tr>

										<tr class="row100">
											<td class="column100 column1" data-column="column1">DATE DE CLOTURE</td>
											<td class="column100 column2" data-column="column2">
												<input type="date" name="newcloture" id="cloture" />	
								            </td>
										</tr>
								</table>
							</div>	
						</div>

						<!--PIECE JOINTE-->
						 <div class="wrap-table100 col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="table100 ver1 m-b-110">
								<table data-vertable="ver1">
										<thead>
											<tr class="row100 head">
												<th class="column100 column1" data-column="column1">pieces jointes</th>

											</tr>
										</thead>
										<tr class="row100">
											<td class="column100 column1" data-column="column1">
												<?php
													echo $dossierinfo['descriptif'];
												?>
											</td>
											<td class="column100 column1" data-column="column1">
												<?php echo $dossierinfo['descriptif'];?>
											</td>
										</tr>
								</table>
							</div>
						 </div>	

					 </div>			
				
				 </div>
				<!--DEUXIEME ETAGE-->
				 <div class="row">
					<!--COMMENTAIRE-->
					 <div class="wrap-table100 col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="table100 ver1 m-b-110">
							<table data-vertable="ver1">
									<thead>
										<tr class="row100 head">
											<th class="column100 column1" data-column="column1">COMMENTAIRE</th>
										</tr>
									</thead>
									<tr class="row100">
										<td class="column100 column1" data-column="column1">
											<textarea id="descriptif" name="newdescriptif" style= "max-width:100%;" cols="150"><?php
											echo $dossierinfo['descriptif'];
										?></textarea>
										</td>
									</tr>
							</table>
						</div>
					 </div>
					
				 </div>	

				 <div style="text-align: center ;margin-top: 30px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<input type="submit" class="btn btn-primary " name="modif" value="Enregistrer"/>	
				</div>

			</div>		
		</div>

	</form>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main1.js"></script>

</body>
</html>

<?php
	}
	else
	{
		header("location:index.php");
	}

?>