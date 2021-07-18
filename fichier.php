<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=fichier','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        	
        	
        	if (isset($_POST['fichier'])) {
	        			extract($_POST);

		        
		        			
		        		if(isset($_FILES['file'])){
						$tmpName = $_FILES['file']['tmp_name'];
					    $name = $_FILES['file']['name'];
					    $size = $_FILES['file']['size'];
					    $error = $_FILES['file']['error'];

					    $tabExtension = explode('.', $name);
					    $extension = strtolower(end($tabExtension));

					    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
					    $maxSize = 400000;

						    if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

						      /*  $uniqueName = uniqid('', true);
						        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
						        $file = $uniqueName.".".$extension;
						        //$file = 5f586bf96dcd38.73540086.jpg*/
						        $desti= 'media/'.$name;

						        move_uploaded_file($tmpName, 'media/'.$file);


						        $insertfichier =$bdd->prepare("INSERT INTO file(name,url) VALUES (?,?)");
		       					$insertfichier ->execute(array($_POST['doc'],$desti));
						        echo "Fichier enregistré";
						    }
						    else{
							        echo "Une erreur est survenue";
						    }
						}
		        			
		        
		    
		        
		       
        	
        	header('location:afficheDossier.php?idDossier='.$getid);

        	

			
        }


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>

<html lang="en">
<head>
	<title>AJOUTEZ fichier DU DOSSIER N° 86469</title>
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
	
	<form name="fichier" action="" method="POST" class="container-fluid" enctype="multipart/form-data">
		<div class="limiter">
			<div class="container-table100 ">
				<!--PREMIERE ETAGE-->
	
				 <div class="row">
				 	<!--TABLE REFERENCE DE DOSSIER-->
					<div class="wrap-table100">
						<div class="table100 ver1 m-b-110">
							<table data-vertable="ver1" style="width: 800px;">
									<thead>
										<tr class="row100 head">
											<th class="column100 column1" data-column="column1">AJOUTEZ DES FICHIERS AU DOSSIER</th>
											<th colspan="2">N °839499</th>
										</tr>
									</thead>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"></td>
										<td class="column100 column2" data-column="column2">INTITULE</td>
										<td class="column100 column3" data-column="column3">FICHIER</td>
										

									</tr>
									<tr class="row100">
										<td class="column100 column1" data-column="column1"><label for="file">Fichier</label></td>
										<td class="column100 column2" data-column="column2" style="font-size:20px;" >
											<input type="text" name="doc" id="fichier1"/>
										</td>
										<td><input type="file" name="file"></td>
										
										
									</tr>
							
								
							</table>
							
								<div style="text-align: center;">
									<br />
									<input type="submit" class="btn btn-success" value="valider fichier" name="fichier" class="box-button">
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