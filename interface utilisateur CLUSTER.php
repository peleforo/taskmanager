<!DOCTYPE html>
<?php

  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        	
        	$reqetat = $bdd->prepare("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = ? ");
        	$reqetat -> execute(array());
			$nbredossier = $reqetat->rowcount();
			$dossierinfo = $reqetat->fetch();


        	


	        

	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>onglets</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	
</head>
<body class="container">
	<div class="row">
		<!--Menu de navigation-->
			<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">

					<h1>FTTH</h1>   
					<!-- MENU REDUCTIBLE
					<button type="button" class="navbar-toggler bg-dark" data-toggle="collapse" data-target="#Centenunav">
				     	<span class="navbar-toggler-icon"></span>
					</button>                       
					<div class="collapse navbar-collapse justify-content-between" id="Centenunav">
					-->
							<ul class="nav nav-tabs flex-column">
								 <li>
								 	<a class="nav-link" href="interface utilisateur OBOX.php" style="color: black;">OBOX</a>
								 </li>
								 <li>
								 	<a class="nav-link" href="interface utilisateur OFIBRE.php" style="color: black;">OFIBRE</a>
								 </li>
								 <li>
								 	<a class="nav-link" href="interface utilisateur CI.php" style="color: black;">CI</a>
								 </li>
								 <li>
								 	<a class="nav-link" href="interface utilisateur CLUSTER.php" style="color: black;">CLUSTER</a>
								 </li>
							</ul>
						<!--</div>-->  
					  
			</div>
			<!-- CSS DU FORMULAIRE-->
			  <style type="text/css">

			  	 h1{
			  	 	font-size:20px;
			  	 	color:orange;
			  	 	font-family:fantasy;
			  	 	
			  	 }
			  	li{
			     list-style:none;

			  	}
			  	a{
			  		text-decoration:none;
			  		color:Turquoise;
			  		
			  	}
			  </style> 
		<!-- visualisation des dossiers selon leur etat-->
			<div class="col-xs-12 col-sm-11 col-md-11 col-lg-11"  >
				<h1 style="text-align: center; font-size: 50px;margin-bottom: 50px;">CLUSTER <span title="Ajoutez un nouveau dossier"><a href="nouveaudossier CI.php"><img src="bouton ajout.png"></a></span></h1>
				<!--BOUTON DE DECONNEXION-->
					<div style="text-align: right;margin-bottom: 50px;">
						<a href="deconnexion.php"><input type="submit" name="deconnexion" value="se deconnecter"></a>
					</div>
				<!--MENU A ONGLET-->
				<div class="containers col-xs-12 col-sm-11 col-md-11 col-lg-11">
					<!--EN TETE DES ONGLETS-->
					    <div class="container-onglets">
						    <div class="onglets active" data-anim="1">En cours 
						    	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
						    	<?php
						    		$dossierinfo['statutdossier'] = 1 ;
						    		$nbredossier = $reqetat->rowcount();
						    		echo '<div>' . $nbredossier .  '</div>' ;

						    	?>

						        )
					    	</div>
					        <div class="container onglets" data-anim="2">En attente 
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->

						        )
					        </div>
					        <div class="container onglets" data-anim="3">Reporté 
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->

						        )
					        </div>
					        <div class="container onglets" data-anim="4">validé
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->

						        )
					        </div>
					        <div class="container onglets" data-anim="5">Perdu 
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->

						        )
					        </div>
					    </div>
					<!--CONTENU DES ONGLETS-->
					    <div class="contenu activeContenu" data-anim="1">
					       <thead>
					            <tr>  

					              <th scope="col">
					                <label class="control control--checkbox">
					                  <input type="checkbox"  class="js-check-all"/>
					                  <div class="control__indicator"></div>
					                </label>
					              </th>
					              
					              <th scope="col">Order</th>
					              <th scope="col">Name</th>
					              <th scope="col">Occupation</th>
					              <th scope="col">Contact</th>
					              <th scope="col">Education</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php
							     

						         ?>
					        </tbody> 
					    </div> 

					    <div class="contenu" data-anim="2">
		       				<?php
						     
				
					         ?>
					    </div>

					    <div class="contenu" data-anim="3">
					        <?php
						     


					         ?>
					    </div>
					    <div class="contenu" data-anim="4">
					    	<thead>
					            <tr>  

					              <th scope="col">
					                <label class="control control--checkbox">
					                  <input type="checkbox"  class="js-check-all"/>
					                  <div class="control__indicator"></div>
					                </label>
					              </th>
					              
					              <th scope="col">Order</th>
					              <th scope="col">Name</th>
					              <th scope="col">Occupation</th>
					              <th scope="col">Contact</th>
					              <th scope="col">Education</th>
					            </tr>
					        </thead>
					        <tbody>
					        	<?php
							     

						         ?>
					        </tbody> 				    
					    </div>
					    <div class="contenu" data-anim="5">
					        <?php
						     


					         ?>
					    </div>
				</div>
			</div>
	</div>

    <script type="text/javascript" src="app.js"></script>
</body>
</html>