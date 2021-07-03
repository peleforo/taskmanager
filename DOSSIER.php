<!DOCTYPE html>
<?php

  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<html lang="en">
<head>
	<title>DOSSIER</title>
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
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">

						

				<div class="table100 ver1 m-b-110">
					
					<table data-vertable="ver6">
						
							<thead>
								<tr class="row100 head">
									<th class="column100 column1" data-column="column1">REFERENCE DU DOSSIER</th>
								</tr>
							</thead>
							<tr class="row100">
								<td class="column100 column1" data-column="column1">IDENTIFIANT DU DOSSIER</td>
								<td class="column100 column2" data-column="column2"><a>echo</a></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NOM DU CLIENT</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">lOCALISATION</td>
								<td class="column100 column2" data-column="column2">9:00 AM</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NUMERO DU CLIENT</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">EMAIL DU CLIENT</td>
								<td class="column100 column2" data-column="column2">8:00 AM</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">TYPE DE MAISON</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">PROJET COMCERNE</td>
								<td class="column100 column2" data-column="column2">9:00 AM</td>

					</table>
				</div>

				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver6">
						
							<thead>
								<tr class="row100 head">
									<th class="column100 column1" data-column="column1">ETAPE DU DOSSIER</th>
								</tr>
							</thead>
							<tr class="row100">
								<td class="column100 column1" data-column="column1">IDENTIFIANT DU DOSSIER</td>
								<td class="column100 column2" data-column="column2"><a href="afficheDossier.php">bonjour</a></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NOM DU CLIENT</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">lOCALISATION</td>
								<td class="column100 column2" data-column="column2">9:00 AM</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NUMERO DU CLIENT</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">EMAIL DU CLIENT</td>
								<td class="column100 column2" data-column="column2">8:00 AM</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">TYPE DE MAISON</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">PROJET COMCERNE</td>
								<td class="column100 column2" data-column="column2">9:00 AM</td>

					</table>
				</div>
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver6">
						
							<thead>
								<tr class="row100 head">
									<th class="column100 column1" data-column="column1">PLANIFATION DU DOSSIER</th>
								</tr>
							</thead>
							<tr class="row100">
								<td class="column100 column1" data-column="column1">IDENTIFIANT DU DOSSIER</td>
								<td class="column100 column2" data-column="column2"><a href="afficheDossier.php">bonjour</a></td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NOM DU CLIENT</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">lOCALISATION</td>
								<td class="column100 column2" data-column="column2">9:00 AM</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NUMERO DU CLIENT</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">EMAIL DU CLIENT</td>
								<td class="column100 column2" data-column="column2">8:00 AM</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">TYPE DE MAISON</td>
								<td class="column100 column2" data-column="column2">--</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">PROJET COMCERNE</td>
								<td class="column100 column2" data-column="column2">9:00 AM</td>

					</table>
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