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
        	
        	
        	if (isset($_POST['etape'])) {
	        			extract($_POST);
        	
        	
        	

        	

        		if (!empty($_POST['etape1'])) {
        			$insertetape =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape ->execute(array($_POST['etape1'],$_POST['netape1'],$getid));
        		}
        		if (!empty($_POST['etape2'])) {
        			$insertetape2 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape2 ->execute(array($_POST['etape2'],$_POST['netape2'],$getid));
        		}
        		if (!empty($_POST['etape3'])) {
        			$insertetape3 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape3 ->execute(array($_POST['etape3'],$_POST['netape3'],$getid));
        		}
        		if (!empty($_POST['etape4'])) {
        			$insertetape4 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape4 ->execute(array($_POST['etape4'],$_POST['netape4'],$getid));
        		}
        		if (!empty($_POST['etape5'])) {
        			$insertetape5 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape5 ->execute(array($_POST['etape5'],$_POST['netape5'],$getid));
        		}
        		if (!empty($_POST['etape6'])) {
        			$insertetape6 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape6 ->execute(array($_POST['etape6'],$_POST['netape6'],$getid));
        		}
        		if (!empty($_POST['etape7'])) {
        			$insertetape7 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape7 ->execute(array($_POST['etape7'],$_POST['netape7'],$getid));
        		}
        		if (!empty($_POST['etape8'])) {
        			$insertetape8 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape8 ->execute(array($_POST['etape8'],$_POST['netape8'],$getid));
        		}
        		if (!empty($_POST['etape9'])) {
        			$insertetape9 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape9 ->execute(array($_POST['etape9'],$_POST['netape9'],$getid));
        		}
        		if (!empty($_POST['etape10'])) {
        			$insertetape10 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape10 ->execute(array($_POST['etape10'],$_POST['netape10'],$getid));
        		}
        		if (!empty($_POST['etape11'])) {
        			$insertetape11 =$bdd->prepare("INSERT INTO etape(nomEtape,ordre,doss) VALUES (?,?,?)");
        			$insertetape11->execute(array($_POST['etape11'],$_POST['netape11'],$getid));
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
	<title>AJOUTEZ ETAPE DU DOSSIER N° <?php echo $dossierid['idDossier']?></title>
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
	
	<form name="etape" action="" method="POST" class="container-fluid">
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
											<th class="column100 column1" data-column="column1">ETAPE DU DOSSIER</th>
											<th colspan="2">N °<?php echo $getid ?></th>
										</tr>
									</thead>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"></td>
										<td class="column100 column2" data-column="column2">INTITULE</td>
										<td class="column100 column3" data-column="column3">ORDRE</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape1">ETAPE 1</label></td>
										<td class="column100 column2" data-column="column2" size ="15">
											<input type="text" name="etape1" id="etape1"/>
										</td>
										<td><input type="number"  name="netape1" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape2">ETAPE 2</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape2" id="etape2"  size ="35"/>
										</td>
										<td><input type="number"  name="netape2" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape3">ETAPE 3</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape3" id="etape3"  size ="35"/>
										</td>
										<td><input type="number"  name="netape3" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape4">ETAPE 4</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape4" id="etape4"  size ="35"/>
										</td>
										<td><input type="number"  name="netape4" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape5">ETAPE 5</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape5" id="etape5"  size ="35"/>
										</td>
										<td><input type="number"  name="netape5" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape6">ETAPE 6</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape6" id="etape6"  size ="35"/>
										</td>
										<td><input type="number"  name="netape6" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape7">ETAPE 7</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape7" id="etape7"  size ="35"/>
										</td>
										<td><input type="number"  name="netape7" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape8">ETAPE 8</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape8" id="etape8"  size ="35"/>
										</td>
										<td><input type="number"  name="netape8" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape9">ETAPE 9</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape9" id="etape9"  size ="35"/>
										</td>
										<td><input type="number"  name="netape9" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape10">ETAPE 10</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape10" id="etape10"  size ="35"/>
										</td>
										<td><input type="number"  name="netape10" min="1" max="12" style="font-size:20px;"></td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape11">ETAPE 11</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="etape11" id="etape11"  size ="35"/>
										</td>
										<td><input type="number"  name="netape11" min="1" max="12" style="font-size:20px;"></td>
									</tr>
							</table>
							
								<div style="text-align: center;">
									<br />
									<input type="submit" class="btn btn-success" value="valider etape" name="etape" class="box-button">
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