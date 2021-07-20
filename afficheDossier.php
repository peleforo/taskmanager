<!DOCTYPE html>
<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_GET['idDossier'])) {
        	$getid = intval($_GET['idDossier']);

        	$reqdossier = $bdd ->prepare('SELECT * FROM dossier WHERE idDossier ='.$getid.'');
        	$reqdossier ->execute(array($getid));
        	$dossierinfo = $reqdossier->fetch();
        	$_SESSION['idDossier']= $dossierinfo['idDossier'];




        }


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<html lang="en">
<head>
	<title>DOSSIER N° <?php echo $dossierinfo['idDossier']?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
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
<body>
<?php
	var_dump($dossierinfo);
	var_dump($_POST);
?>
	
<?php

	if (isset($_SESSION['idCollaborateur'])) {


?>
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
					<?php
					$lien ='modifDossier.php?idDossier='. $dossierinfo['idDossier'];
					$liensupdoss ='sup.php?idDossier='. $dossierinfo['idDossier'];
					?>
					<span>
						<a href="<?php echo $lien; ?>" title="modifier dossier">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
							  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
							  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
							</svg>
						</a>
						<a type="submit" href="<?php echo $liensupdoss; ?>" title="supprimer dossier"> 
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
							  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							</svg>	
						</a>
					</span>
														
					<br />
			</div>
			 <div class="row">
				<div class="wrap-table100 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="table100 ver1 m-b-110">
						<table data-vertable="ver1">
								<thead>
									<tr class="row100 head">
										<th class="column100 column1" data-column="column1">REFERENCE DU DOSSIER</th>
									</tr>
								</thead>
								<tr class="row100">
									<td class="column100 column1" data-column="column1">IDENTIFIANT DU DOSSIER</td>
									<td class="column100 column2" data-column="column2">
										<?php
				             			  echo $dossierinfo['idDossier'];
						                 ?>
									</td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">NOM DU CIENT</td>
									<td class="column100 column2" data-column="column2">
										<?php
				             			  echo $dossierinfo['nomClient'];
						                 ?>
									</td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">lOCALISATION</td>
									<td class="column100 column2" data-column="column2">
										<?php
											echo '<div>' . $dossierinfo['commune'] .' '. $dossierinfo['zone'] . '</div>' ;
						                 ?>
						                 	
						            </td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">NUMERO DU CLIENT</td>
									<td class="column100 column2" data-column="column2">
										<?php
											echo $dossierinfo['numeroClient']  ;
										?>
									</td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">EMAIL DU CLIENT</td>
									<td class="column100 column2" data-column="column2">
										<?php
											echo '<div>' . $dossierinfo['emailClient'] . '</div>' ;
										?>
									</td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">TYPE DE MAISON</td>
									<td class="column100 column2" data-column="column2">
										<?php
											echo '<div>' . $dossierinfo['typeDeMaison'] . '</div>' ;
										?>

									</td>
								</tr>
								<tr class="row100">
									<td class="column100 column1" data-column="column1">Equipe</td>
									<td class="column100 column2" data-column="column2">
										<?php
											if ($dossierinfo['equipe'] = 1) {
												// code...
												echo '<div>' . $dossierinfo['equipe'] . '</div>' ;
											}
											
										?>

									</td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">PROJET CONCERNE</td>
									<td class="column100 column2" data-column="column2"><?php 
									$reqpro = $bdd -> query('SELECT * FROM projet WHERE idProjet='.$dossierinfo['projetConcerne']);
													$proinfo = $reqpro->fetch(); 
													echo $proinfo['nomProjet'];
									?></td>
								</tr>
						</table>
					</div>
				</div>
				<div class="wrap-table100 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="table100 ver1 m-b-110">
						<form method="POST" action="" >
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
												<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="ETUDE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
												?>
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
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DE RESSOURCES" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
												?>
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
									
							
											<?php 
												$reqpot = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="IMPLANTATION DE POTEAUX" AND doss ='.$getid.'');
													$potinfo = $reqstep->fetch();

													if ($dossierinfo['spec'] != "poteau"  /*&& empty($potinfo['nomEtape']=>"IMPLANTATION DE POTEAUX" )*/) {
											?>

												
											<?php
														
												}
												else
												{
													$reqostep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DE RESSOURCES" AND doss ='.$getid.'');
													$oetapeinfo = $reqostep->fetch();
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="IMPLANTATION DE POTEAUX" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													
												?>
												
												<tr class="row100">
													<td class="column100 column1" data-column="column1">IMPLANTATION DE POTEAU</td>
													<td class="column100 column2" data-column="column2"><?php if (!empty($etapeinfo['statutEtape'])) {
															echo $etapeinfo['statutEtape'];}?></td>
													<td class="column100 column3" data-column="column3"><?php if (!empty($oetapeinfo['finEtape'])) {
															echo $oetapeinfo['finEtape'];}	?></td>
													<td class="column100 column3" data-column="column3"><?php if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														} ?></td>
												</tr>
												<?php
												}

													?>

												
												
									
									<tr class="row100">
										<td class="column100 column1" data-column="column1">CABLAGE</td>
										<td class="column100 column2" data-column="column2">
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CABLAGE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
												?>
										</td>
										<td class="column100 column3" data-column="column3">
											<?php  
													if ($dossierinfo['spec'] != "poteau"  ) {
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECEPTION DE RESSOURCES" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['finEtape'];


													}
													else
													{
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="IMPLANTATION DE POTEAUX" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													if (!empty($etapeinfo['finEtape'])) {
															echo $etapeinfo['finEtape'];
														}
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
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RACCORDEMENT" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
												?>
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
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CONFIGURATION" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
												?>
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
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="RECU" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
												?>
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
							</table>
						</form>
					</div>
				</div>
			 </div>
			<!--DEUXIEME ETAGE-->
			 <div class="row">
				<div class="wrap-table100 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="table100 ver1 m-b-110">
						<table data-vertable="ver1">
								<thead>
									<tr class="row100 head">
										<th class="column100 column1" data-column="column1">PLANIFICATION DU DOSSIER</th>
									</tr>
								</thead>
								<tr class="row100">
									<td class="column100 column1" data-column="column1">ETAT DU DOSSIER</td>
									<td class="column100 column2" data-column="column2">
										<?php
				             			  echo $dossierinfo['statutDossier'];
						                 ?>
									</td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">DATE DE RECEPTION DU DOSSIER</td>
									<td class="column100 column2" data-column="column2">
										<?php
				             			  echo $dossierinfo['enregistrementDossier'];
						                 ?>
									</td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">DATE D'INTERVENTION</td>
									<td class="column100 column2" data-column="column2">
										<?php
											echo $dossierinfo['debutDossier'];
						                 ?>
						                 	
						            </td>
								</tr>

								<tr class="row100">
									<td class="column100 column1" data-column="column1">DATE DE CLOTURE</td>
									<td class="column100 column2" data-column="column2">
										<?php
											echo $dossierinfo['finDossier'];
										?>
									</td>
								</tr>
						</table>
					</div>
				</div>
				<div class="wrap-table100 col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="table100 ver1 m-b-110">
						<table data-vertable="ver1">
								<thead>
									<tr class="row100 head">
										<th class="column100 column1" data-column="column1" colspan="2">MATERIEL UTILISE</th>
										<td style="text-align: center;">
											<?php
												$lienr ='ressource.php?idDossier='. $dossierinfo['idDossier'];
												echo '<div><a href="'.$lienr.'">
												<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
													<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
												</svg>

												</a></div>' ;
											?>
											
										</td>
									</tr>
								</thead>
								<tr class="row100">
										
										<td class="column100 column1" data-column="column1">INTITULE</td>
										<td class="column100 column2" data-column="column2">MODELE</td>
										<td class="column100 column3" data-column="column3">QUANTITE</td>

								</tr>
								<?php  
										$reqstep = $bdd -> query('SELECT * FROM ressource WHERE  dossierConcerne ='.$getid.'');
										
										while ($ressourceinfo = $reqstep->fetch()) {
											/*for ($etapeinfo['ordre']==1; $etapeinfo['ordre'] < ; $etapeinfo['ordre']++) { 
												// code...
											}
										 */
										
											
											
										  ?>
										
											<tr class="row100">
												<td class="column100 column1" data-column="column1"><?php if (!empty($ressourceinfo['nomRessource'])) {echo $ressourceinfo['nomRessource'];} ?></td>
												<td class="column100 column2" data-column="column2"><?php if (!empty($ressourceinfo['modeleRessource'])) {echo $ressourceinfo['modeleRessource'];}?>
													
												</td>
												<td class="column100 column3" data-column="column3"><?php if (!empty($ressourceinfo['qte'])) {echo $ressourceinfo['qte'];}?>
													
												</td>
												<td class="column100 column3" data-column="column3"><?php if (!empty($ressourceinfo['idRessource'])) { $liensup = 'sup.php?idRessource='.$ressourceinfo['idRessource'];
												?>
													<a type="submit" href="<?php echo $liensup; ?>"> 
														<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
														  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
														  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
														</svg>	
													</a>
														
												<?php 
												}
												?>

												</td>


												
									<?php
											
											
										}

									?>
						</table>
					</div>
				</div>
			 </div>	
			<!--TROISIEME ETAGE-->
			 <div class="row">
				<!--COMMENTAIRE-->
				 <div class="wrap-table100 col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<div class="table100 ver1 m-b-110">
						<table data-vertable="ver1">
								<thead>
									<tr class="row100 head">
										<th class="column100 column1" data-column="column1">COMMENTAIRE</th>
									</tr>
								</thead>
								<tr class="row100">
									<td class="column100 column1" data-column="column1">
										<?php
											echo $dossierinfo['descriptif'];
										?>
									</td>
									
								</tr>
						</table>
					</div>
				 </div>
				<!--PIECE JOINTE-->
				 <div class="wrap-table100 col-xs-12 col-sm-12 col-md-5 col-lg-5">
					<div class="table100 ver1 m-b-110">
						<table data-vertable="ver1">
								<thead>
									<tr class="row100 head">
										<th class="column100 column1" data-column="column1">pieces jointes</th>
										<td style="text-align: center;">
											<?php
												$lienr ='fichie.php?idDossier='. $dossierinfo['idDossier'];
												echo '<div><a href="'.$lienr.'">
												<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
													<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
												</svg>

												</a></div>' ;
											?>
											
										</td>


									</tr>
								</thead>
								<?php
											$reqpj = $bdd ->query('SELECT * FROM fichier WHERE dossier =' .$getid);
        									$reqpj ->execute(array($getid));
        									while ($pj = $reqpj ->fetch()) {
        										// code...
        									
										?>
								<tr class="row100">
									<td class="column100 column1" data-column="column1">
										<?php
													if (!empty($pj['nomFichier'])) {
														echo $pj['nomFichier'];
													}
													
										?>
									</td>
									<td class="column100 column1" data-column="column1">
										<?php
													if (!empty($pj['url'])) {
														echo '<a href="'.$pj['url'].'">telecharger '.$pj['nomFichier'].'</a>';
													}
													
										?>
									</td>
									<td class="column100 column4" data-column="column4"><?php if (!empty($pj['idFichier'])) { $liensupfile = 'sup.php?idFichier='.$pj['idFichier']; 
										?>
													<a type="submit" href="<?php echo $liensupfile; ?>"> 
														<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
														  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
														  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
														</svg>	
													</a>
														
												<?php 
												}
												?>
																										
									</td>
								</tr>
								<?php 
							}
								?>
						</table>
					</div>
				 </div>				
			 </div>			 	
		</div>		
	</div>


	

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