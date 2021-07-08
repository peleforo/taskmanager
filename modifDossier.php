<!DOCTYPE html>
<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');
	 	//On définit le mode d'erreur de PDO sur Exception
	        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 		
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
	        		$newdossier = htmlspecialchars($_POST['newiddossier']);
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
		       		$etude = htmlspecialchars($_POST['etude']);
	        		$ressources = htmlspecialchars($_POST['ressources']);
	        		$cablage = htmlspecialchars($_POST['cablage']);
	        		$raccordement = htmlspecialchars($_POST['raccordement']);
	        		$configuration = htmlspecialchars($_POST['configuration']);
	        		$recu = htmlspecialchars($_POST['recu']);
	        		$poteau = htmlspecialchars($_POST['poteau']);
	        		$progression = array();


					//modif references
		       		$modifref = $bdd ->prepare('UPDATE dossier SET idDossier = ? , nomClient = ? , commune = ? ,villeDistrict = ? ,zone = ? ,numeroClient = ? , emailClient = ? , typeDeMaison = ? ,projetConcerne = ? WHERE idDossier = ?');
	        		$modifref ->execute(array($newiddossier, $newnom, $newcommune, $newvd, $newzone,$newnumclient,$newemail ,$newtypemaison, $newprojet, $_GET['idDossier']));
			   		
	        		/*//modif plan
		       		$modifplan = $bdd ->prepare('UPDATE dossier SET statutDossier = ? , debutDossier = ADDDATE() , finDossier = ? WHERE idDossier = ?');
	        		$modifplan ->execute(array($newetat, $newintervention, $newcloture, $_GET['idDossier']));*/
			   		

			   		//modif descriptif
		       		$modifplan = $bdd ->prepare('UPDATE dossier SET descriptif= ? WHERE idDossier = ?');
	        		$modifplan ->execute(array($newdescriptif, $_GET['idDossier']));

	        		//modif etape
	        			//modif etape etude
	        			if (isset($etude)) {
	        				$reqetude = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "ETUDE"');
	        				$reqetude ->execute($_GET['idDossier']);
	        				$etudeinfo = $reqetude->fetch();
	        				if ($etudeinfo && $etudeinfo != $etude) {
	        					$modifetude = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "ETUDE"');
							$modifetude ->execute(array($etude, $_GET['idDossier']));
	        				}
							
	        			}
	        			//modif etape ressources
	        			if (isset($ressources)) {
	        				$reqress = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "RECEPTION DE RESSOURCES"');
	        				$reqress ->execute($_GET['idDossier']);
	        				$ressinfo = $reqress->fetch();
		        			if (isset($ressinfo) && $ressinfo != $ressources) {
		        				
								$modifress = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "RECEPTION DE RESSOURCES"');
								$modifress ->execute(array($ressources, $_GET['idDossier']));
		        			}	
		        		}
	        			//modif etape poteau
	        			if (isset($poteau)) {
		        				$reqpo = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "IMPLANTATION DE POTEAU"');
		        				$reqpo ->execute($_GET['idDossier']);
		        				$poinfo = $reqpo->fetch();
		        			if (isset($poinfo) && $poinfo = $poteau) {
		        				
								$modifpo = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "IMPLANTATION DE POTEAU"');
								$modifpo ->execute(array($poteau, $_GET['idDossier']));
		        			}
		        		}
	        			//modif etape cablage
	        			if (isset($cablage)) {
	        					$reqcabl = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "CABLAGE"');
		        				$reqcabl ->execute($_GET['idDossier']);
		        				$cablinfo = $reqpo->fetch();
		        			if (isset($cablinfo) && $cablinfo = $cablage) {
	        				
								$modifcabl = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "CABLAGE"');
								$modifcabl ->execute(array($cablage, $_GET['idDossier']));
		        			}
		        		}
	        			//modif etape raccordement
	        			if (isset($raccordement)) {
	        					
	        					$reqra = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "RACCORDEMENT"');
		        				$reqra ->execute($_GET['idDossier']);
		        				$racinfo = $reqra->fetch();
		        			if (isset($racinfo) && $racinfo = $raccordement) {

								$modifra = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "RACCORDEMENT"');
								$modifra ->execute(array($raccordement, $_GET['idDossier']));
	        				}
	        			}
	        			//modif etape configuration
	        			if (isset($configuration)) {
	        				
							$reqconf = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "CONFIGURATION"');
		        				$reqconf ->execute($_GET['idDossier']);
		        				$confinfo = $reqconf->fetch();
		        			if (isset($confinfo) && $confinfo = $configuration) {
								$modifconf = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "CONFIGURATION"');
								$modifconf ->execute(array($configuration, $_GET['idDossier']));
	        				}
	        			}
	        			//modif etape recu
	        			if (isset($recu)) {
		        				$reqrecu = $bdd ->prepare('SELECT nomEtape FROM etape WHERE doss = ? AND nomEtape = "RECU"');
			        				$reqrecu ->execute($_GET['idDossier']);
			        				$recuinfo = $reqrecu->fetch();
			        			if (isset($recuinfo) && $recuinfo = $recu) {
		        				
								$modifrecu = $bdd ->prepare('UPDATE etape SET statutEtape= ? WHERE doss = ? AND nomEtape = "RECU"');
								$modifrecu ->execute(array($recu, $_GET['idDossier']));
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

/*$newdossier = htmlspecialchars($_POST['newiddossier']);
	        		$newnomclient = htmlspecialchars($_POST['newnomclient']);
	        		$newvilledistrict = htmlspecialchars($_POST['newvilledistrict']);
	        		$newcommnue = htmlspecialchars($_POST['newcommnue']);
	        		$newzone = htmlspecialchars($_POST['newzone']);
	        		$newnumclient = htmlspecialchars($_POST['newnumclient']);
	        		$newemailclient = htmlspecialchars($_POST['newemailclient']);
	        		$newtypemaison = htmlspecialchars($_POST['newtypemaison']);*/

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
											<td class="column100 column1" data-column="column1">ETUDE</td>
											<td class="column100 column2" data-column="column2">
												<select name="etude" id="etude" required="">									
													<option value="0"> </option>
											        <option value="1">en cours</option>
											        <option value="2">validé</option>
												</select>
											</td>
											<td class="column100 column3" data-column="column3">
												<?php echo $dossierinfo['debutDossier'];?>
												
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="ETUDE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">RECEPTION DE RESSOURCES</td>
										<td class="column100 column2" data-column="column2">
											<select name="ressources" id="ressources" required="">
												<option value="0"> </option>
										        <option value="1">en cours</option>
										        <option value="2">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="ETUDE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>

											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DE RESSOURCES" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
					
											</td>
									</tr>
									
									<tr class="row100">
										<td class="column100 column1" data-column="column1">IMPLANTATION DE POTEAU</td>
										<td class="column100 column2" data-column="column2">
											<select name="poteau" id="poteau" required="">									
												<option value="0"> </option>
										        <option value="1">en cours</option>
												<option value="2">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DE RESSOURCES" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													if ($dossierinfo['spec']) {
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="IMPLANTATION DE POTEAU" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
													}
													else
													{
														echo'--';
													}	
												?>
					
											</td>
									</tr>						
									<tr class="row100">
										<td class="column100 column1" data-column="column1">CABLAGE</td>
										<td class="column100 column2" data-column="column2">
											<select name="cablage" id="cablage" required="">									
												<option value="0"> </option>
										        <option value="1">en cours</option>
												<option value="2">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													if ($dossierinfo['spec']) {
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="IMPLANTATION DE POTEAU" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
													}
													else
													{
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DE RESSOURCES" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
													}	
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CABLAGE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">RACCORDEMENT</td>
										<td class="column100 column2" data-column="column2">
											<select name="raccordement" id="raccordement" required="">
												<option value="0"> </option>
										        <option value="1">en cours</option>
										        <option value="2">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CABLAGE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RACCORDEMENT" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">CONFIGURATION</td>
										<td class="column100 column2" data-column="column2">
											<select name="configuration" id="configuration" required="">
												<option value="0"> </option>
										        <option value="1">en cours</option>
										        <option value="2">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RACCORDEMENT" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>	
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CONFIGURATION" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
					
											</td>
									</tr>
															
									<tr class="row100">
										<td class="column100 column1" data-column="column1">RECU</td>
										<td class="column100 column2" data-column="column2">
											<select name="recu" id="recu" required="">
												<option value="0"> </option>
										        <option value="1">en cours</option>
										        <option value="2">validé</option>
										    </select>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CONFIGURATION" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
												?>
											</td>
											<td class="column100 column4" data-column="column4">
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECU" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];
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
					<a href="dashboard.php"><input type="submit" class="btn btn-primary " name="modif" value="Enregistrer"/></a>	
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