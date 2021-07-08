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
        	
        	$dossier = $_POST['dossier'];
        	$ETUDE =$_POST['ETUDE'];
        	$CABLAGE =$_POST['CABLAGE'];
        	$RESSOURCES =$_POST['RESSOURCES'];
        	$POTEAUX =$_POST['POTEAUX'];
        	$RACCORDEMENT =$_POST['RACCORDEMENT'];
        	$CONFIGURATION =$_POST['CONFIGURATION'];
        	$RECU =$_POST['RECU'];

        	

        		if (!empty($dossier)) {
        			$insertetape =$bdd->prepare("INSERT INTO etape(nomEtape,doss) VALUES (?,?)");
        			$insertetape ->execute(array($ETUDE,$dossier));
        		}
        		if (!empty($RESSOURCES)) {
        			$insertre =$bdd->prepare("INSERT INTO etape(nomEtape,doss) VALUES (?,?)");
		        	$insertre ->execute(array($RESSOURCES,$dossier));
        		}
        		if (!empty($POTEAUX)) {
        			$insertpo =$bdd->prepare("INSERT INTO etape(nomEtape,doss) VALUES (?,?)");
        			$insertpo ->execute(array($POTEAUX,$dossier));
        		}
        		if (!empty($CABLAGE)) {
        			$insertca =$bdd->prepare("INSERT INTO etape(nomEtape,doss) VALUES (?,?)");
		        	$insertca ->execute(array($CABLAGE,$dossier));
        		}
        		if (!empty($RACCORDEMENT)) {
        			$insertra =$bdd->prepare("INSERT INTO etape(nomEtape,doss) VALUES (?,?)");
		        	$insertra ->execute(array($RACCORDEMENT,$dossier));
        		}
        		if (!empty($CONFIGURATION)) {
        			$insertcon =$bdd->prepare("INSERT INTO etape(nomEtape,doss) VALUES (?,?)");
        			$insertcon ->execute(array($CONFIGURATION,$dossier));
        		}
        		if (!empty($RECU)) {
        			$insertrec =$bdd->prepare("INSERT INTO etape(nomEtape,doss) VALUES (?,?)");
		        	$insertrec ->execute(array($RECU,$dossier));
        		}

		        	

		        	

		        	

        	

        	
        	header('location:afficheDossier.php?idDossier='.$dossier);

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
											<th class="column100 column1" data-column="column1">REFERENCE DU DOSSIER</th>
										</tr>
									</thead>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="dossier">IDENTIFIANT DU DOSSIER</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="dossier" id="dossier" value ="<?php echo $getid ?>" />
										</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape1">ETAPE 1</label></td>
										<td class="column100 column2" data-column="column2" size ="15">
											<input type="text" name="ETUDE" id="etape1" value ="ETUDE"  />
										</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape2">ETAPE 2</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="RESSOURCES" id="etape2" value ="RECEPTION DE RESSOURCES" size ="35"/>
										</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape3">ETAPE 3</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="POTEAUX" id="etape3" value ="IMPLANTATION DE POTEAUX" size ="35"/>
										</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape4">ETAPE 4</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="CABLAGE" id="etape4" value ="CABLAGE" size ="35"/>
										</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape4">ETAPE 5</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="RACCORDEMENT" id="etape5" value ="RACCORDEMENT" size ="35"/>
										</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape5">ETAPE 6</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="CONFIGURATION" id="etape6" value ="CONFIGURATION" size ="35"/>
										</td>
									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="etape7">ETAPE 7</label></td>
										<td class="column100 column2" data-column="column2">
											<input type="text" name="RECU" id="etape7" value ="RECU" size ="35"/>
										</td>
									</tr>
							</table>
							<input type="submit" value="Connexion " name="etape" class="box-button">


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