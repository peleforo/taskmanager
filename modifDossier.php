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
	        	if (isset($_POST['newiddossier']) && !empty($_POST['newiddossier']) && $_POST['newiddossier'] != $dossierinfo['idDossier']) {
	        		$newdossier = htmlspecialchars($_POST['newiddossier']);
	        		$newnomclient = htmlspecialchars($_POST['newnomclient']);
	        		$newvilledistrict = htmlspecialchars($_POST['newvilledistrict']);
	        		$newcommnue = htmlspecialchars($_POST['newcommnue']);
	        		$newzone = htmlspecialchars($_POST['newzone']);
	        		$newnumclient = htmlspecialchars($_POST['newnumclient']);
	        		$newemailclient = htmlspecialchars($_POST['newemailclient']);
	        		$newtypemaison = htmlspecialchars($_POST['newtypemaison']);

	        		$modif = $bdd ->prepare('UPDATE dossier SET idDossier = ? WHERE idDossier ='.$_GET['idDossier'].'');
	        		$modif ->execute(array($newiddossier));
	        		header('location:afficheDossier.php?='. $_SESSION['idDossier']);  
	        	}
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
	var_dump($_SESSION);
?>
	
	<form action="" name="modification" method="POST" class="container-fluid">
		<div class="limiter">
			<div class="container-table100 ">
				<!--PREMIERE ETAGE-->
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
											<input type="text" name="newnomclient" id="nomclient" value ="<?php echo $dossierinfo['nomClient']?>"/>
										</td>
									</tr>

									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="villedistrict">VILLE OU DISTRICT</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newvilledistrict" id="villedistrict" value ="<?php echo $dossierinfo['villeDistrict']?>"/>	
							            </td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="commnue">COMMUNE</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="newcommnue" id="commnue" value ="<?php echo $dossierinfo['commune']?>"/>	
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
											<input type="email" name="newemailclient" id="emailclient" value ="<?php echo $dossierinfo['emailClient']?>"/>
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
												<select name="newprojet" id="projet" required>
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
											<textarea id="descriptif" name="descriptif" style= "max-width:100%;" cols="150"><?php
											echo $dossierinfo['descriptif'];
										?></textarea>
										</td>
									</tr>
							</table>
						</div>
					 </div>
					
				 </div>	

				 <div style="text-align: center ;margin-top: 30px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"		>
					
					<input type="submit" class="btn btn-primary btn-lg" name="modification" value="Enregistrer"/>	
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