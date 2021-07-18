<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_GET['idDossier'])) {

        	$getid = intval($_GET['idDossier']);
        	$reqdossier = $bdd ->query('SELECT * FROM dossier');
        	$reqdossier ->execute(array($getid));
        	$dossierid = $reqdossier->fetch();
        	
        	
        	if (isset($_POST['ressource'])) {
	        			extract($_POST);
        	
        	
        	

        	

        		if (!empty($_POST['ressource1'])) {
        			$insertressource =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource ->execute(array($_POST['ressource1'],$_POST['nressource1'],$_POST['mressource1'],$getid));
        		}
        		if (!empty($_POST['ressource2'])) {
        			$insertressource2 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource2 ->execute(array($_POST['ressource2'],$_POST['nressource2'],$_POST['mressource2'],$getid));
        		}
        		if (!empty($_POST['ressource3'])) {
        			$insertressource3 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource3 ->execute(array($_POST['ressource3'],$_POST['nressource3'],$_POST['mressource3'],$getid));
        		}
        		if (!empty($_POST['ressource4'])) {
        			$insertressource4 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource4 ->execute(array($_POST['ressource4'],$_POST['nressource4'],$_POST['mressource4'],$getid));
        		}
        		if (!empty($_POST['ressource5'])) {
        			$insertressource5 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource5 ->execute(array($_POST['ressource5'],$_POST['nressource5'],$_POST['mressource5'],$getid));
        		}
        		if (!empty($_POST['ressource6'])) {
        			$insertressource6 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource6 ->execute(array($_POST['ressource6'],$_POST['nressource6'],$_POST['mressource6'],$getid));
        		}
        		if (!empty($_POST['ressource7'])) {
        			$insertressource7 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource7 ->execute(array($_POST['ressource7'],$_POST['nressource7'],$_POST['mressource7'],$getid));
        		}
        		if (!empty($_POST['ressource8'])) {
        			$insertressource8 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource8 ->execute(array($_POST['ressource8'],$_POST['nressource8'],$_POST['mressource8'],$getid));
        		}
        		if (!empty($_POST['ressource9'])) {
        			$insertressource9 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource9 ->execute(array($_POST['ressource9'],$_POST['nressource9'],$_POST['mressource9'],$getid));
        		}
        		if (!empty($_POST['ressource10'])) {
        			$insertressource10 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource10 ->execute(array($_POST['ressource10'],$_POST['nressource10'],$_POST['mressource10'],$getid));
        		}
        		if (!empty($_POST['ressource11'])) {
        			$insertressource11 =$bdd->prepare("INSERT INTO ressource(nomRessource,qte,modeleRessource, dossierConcerne) VALUES (?,?,?,?)");
        			$insertressource11->execute(array($_POST['ressource11'],$_POST['nressource11'],$_POST['mressource11'],$getid));
        		}
		        	

		        	

		        	

        	

        	
        	header('location:afficheDossier.php?idDossier='.$getid);

        }	

			
        }


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>

<html lang="en">
<head>
	<title>AJOUTEZ ressource DU DOSSIER N° <?php echo $dossierid['idDossier']?></title>
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
	
	<form name="ressource" action="" method="POST" class="container-fluid">
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
					<div class="wrap-table100 ">
						<div class="table100 ver1 m-b-110">
							<table data-vertable="ver1">
									<thead>
										<tr class="row100 head">
											<th class="column100 column1" data-column="column1">RESSOURCES DU DOSSIER</th>
											<th colspan="4">N °<?php echo $getid ?></th>
										</tr>
									</thead>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"></td>
										<td class="column100 column2" data-column="column2">INTITULE</td>
										<td class="column100 column3" data-column="column3">MODELE</td>
										<td class="column100 column4" data-column="column4">QUANTITE</td>

									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource1">ressource 1</label></td>
										<td class="column100 column2" data-column="column2" size ="15">
											<input type="text" name="ressource1" id="ressource1"/>
										</td>
										<td><input type="text"  name="mressource1"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource1"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource2">ressource 2</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource2" id="ressource2"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource2"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource2"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource3">ressource 3</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource3" id="ressource3"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource3"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource3"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource4">ressource 4</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource4" id="ressource4"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource4"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource4"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource5">ressource 5</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource5" id="ressource5"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource5"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource5"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource6">ressource 6</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource6" id="ressource6"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource5"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource6"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource7">ressource 7</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource7" id="ressource7"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource7"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource7"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource8">ressource 8</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource8" id="ressource8"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource8"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource8"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource9">ressource 9</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource9" id="ressource9"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource9"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource9"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource10">ressource 10</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource10" id="ressource10"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource10"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource10"  style="font-size:20px;"></td>
										
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="ressource11">ressource 11</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="ressource11" id="ressource11"  size ="35"/>
										</td>
										<td><input type="text"  name="mressource11"  style="font-size:20px;"></td>
										<td><input type="number"  name="nressource11"  style="font-size:20px;"></td>
										
									</tr>
							</table>
							
								<div style="text-align: center;">
									<br />
									<input type="submit" class="btn btn-success" value="valider ressource" name="ressource" class="box-button">
								</div>


						</div>
					</div>
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