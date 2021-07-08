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
					echo '<div><a type="submit" class="btn btn-primary" href="'.$lien.'">MODIFIER DOSSIER</a></div>' ;
					?>
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
									<td class="column100 column2" data-column="column2">OBOX</td>
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
									
									<tr class="row100">
										<td class="column100 column1" data-column="column1">IMPLANTATION DE POTEAU</td>
										<td class="column100 column2" data-column="column2">
											<?php  
													if ($dossierinfo['spec']) {
														$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="IMPLANTATION DE POTEAU" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
													}
													else
													{
														echo'pas effectué';
													}	
												?>
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
											<?php  
													$reqstep = $bdd -> query('SELECT * FROM etape WHERE nomEtape ="CABLAGE" AND doss ='.$getid.'');
													$etapeinfo = $reqstep->fetch(); 
													echo $etapeinfo['statutEtape'];
												?>
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
										<th class="column100 column1" data-column="column1">MATERIEL UTILISE</th>
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
						</table>
					</div>
				</div>
			 </div>	
			<!--TROISIEME ETAGE-->
			 <div class="row">
				<!--COMMENTAIRE-->
				 <div class="wrap-table100 col-xs-12 col-sm-12 col-md-8 col-lg-8">
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
				 <div class="wrap-table100 col-xs-12 col-sm-12 col-md-4 col-lg-4">
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
										<?php
											echo $dossierinfo['descriptif'];
										?>
									</td>
								</tr>
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