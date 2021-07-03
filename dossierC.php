<!DOCTYPE html>
<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_GET['idDossier'])) {
        	$getid = intval($_GET['idDossier']);

        	$reqdossier = $bdd ->prepare('SELECT * FROM dossier WHERE idDossier ='.$_GET['idDossier'].'');
        	$reqdossier ->execute(array($getid));
        	$dossierinfo = $reqdossier->fetch();
        }


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<html lang="en">
<head>
	<title>Table V03</title>
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
<script language="javascript">

		function coche(){
		var obj = document.getElementById('texte1');
			if (obj) {
				if (document.form1.case1.checked) {
				obj.className = 'classe2';
				} 
				else {
				obj.className = 'classe1';
				}
			}
			var obj = document.getElementById('texte2');
			if (obj) {
				if (document.form1.case2.checked) {
				obj.className = 'classe2';
				} 
				else {
				obj.className = 'classe1';
				}
			}
			var obj = document.getElementById('texte3');
			if (obj) {
				if (document.form1.case3.checked) {
				obj.className = 'classe2';
				} 
				else {
				obj.className = 'classe1';
				}
			}
		}

	</script>
</head>
<body>
<?php
	var_dump($getid);
?>
	
	<div class="limiter">
		<div class="container-table100 ">
			<!--PREMIERE ETAGE-->
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
									<td class="column100 column1" data-column="column1">lOCALISATION</td>
									<td class="column100 column2" data-column="column2">
										<?php
											echo '<div>' . $dossierinfo['commune'] .' '. $dossierinfo['zone'] . '</div>' ;
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
						<table data-vertable="ver1">
								<thead>
									<tr class="row100 head">
										<th class="column100 column1" data-column="column1">PROGRESSION DU DOSSIER</th>
									</tr>
								</thead>
								

												<?php  
													$reqetape = $bdd -> query('SELECT * FROM etape WHERE projet = 3');
													while ($etape = $reqetape->fetch()) {
														echo'<tr class="row100"><td class="column100 column1" data-column="column1"><input type="checkbox" name="case1" onclick="javascript:coche();"/>
															<label id="texte1" class="classe1 form-check-label" for="flexCheckDefault">' 
															. $etape['nomEtape'] .'</label></td></tr>';
									                		}
												?> 
										
										
								
						</table>
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