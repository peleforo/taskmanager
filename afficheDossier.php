<!DOCTYPE html>
<html lang="en">
<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_SESSION['iddossier'])) {
        	$iddossier =  intval($_SESSION['iddossier']);
        	$reqdossier = $bdd ->prepare('SELECT * FROM dossier WHERE iddosier = ?');
        	$dossier = $reqdossier->fetch();
        }


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
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
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
						
							<tr class="row100">
								<td class="column100 column1" data-column="column1">IDENTIFIANT DU DOSSIER</td>
								<td class="column100 column2" data-column="column2">
									<?php
			             			  echo $dossier['iddossier'];
					                 ?>
								</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NOM DU CIENT</td>
								<td class="column100 column2" data-column="column2">
									<?php
			             			  echo $dossier['nomClient'];
					                 ?>
								</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">lOCALISATION</td>
								<td class="column100 column2" data-column="column2">
									<?php
										echo '<div>' . $dossier['commune'] .' '. $dossier['zone'] . '</div>' ;
					                 ?>
					                 	
					            </td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">NUMERO DU CLIENT</td>
								<td class="column100 column2" data-column="column2">
									<?php
										echo '<div>' . $dossier['numeroClient'] . '</div>' ;
									?>
								</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">EMAIL DU CLIENT</td>
								<td class="column100 column2" data-column="column2">
									<?php
										echo '<div>' . $dossier['emailClient'] . '</div>' ;
									?>
								</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">TYPE DE MAISON</td>
								<td class="column100 column2" data-column="column2">
									<?php
										echo '<div>' . $dossier['typeDeMaison'] . '</div>' ;
									?>

								</td>
							</tr>

							<tr class="row100">
								<td class="column100 column1" data-column="column1">PROJET CONCERNE</td>
								<td class="column100 column2" data-column="column2">OBOX</td>
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