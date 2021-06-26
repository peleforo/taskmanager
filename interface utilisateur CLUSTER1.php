<!DOCTYPE html>
<html lang="fr">
<?php

  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>onglets</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/styli.css">
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
								     
								        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 1 ");
			                			$nbredossier = $reqetat->rowcount();

				                			echo '<div>' . $nbredossier .  '</div>' ;
				                		


							         ?>

							         	
						        )
					    	</div>
					        <div class="container onglets" data-anim="2">En attente 
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
							        <?php
								     
								        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 2 ");
			                			$nbredossier = $reqetat->rowcount();

				                			echo '<div>' . $nbredossier .  '</div>' ;
				                		

							         ?>
						        )
					        </div>
					        <div class="container onglets" data-anim="3">Reporté 
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
							        <?php
								     
								        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 3 ");
			                			$nbredossier = $reqetat->rowcount();

				                			echo '<div>' . $nbredossier .  '</div>' ;
				                		

							         ?>
						        )
					        </div>
					        <div class="container onglets" data-anim="4">validé
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
							        <?php
								     
								        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 4 ");
			                			$nbredossier = $reqetat->rowcount();

				                			echo '<div>' . $nbredossier .  '</div>' ;
				                		

							         ?>
						        )
					        </div>
					        <div class="container onglets" data-anim="5">Perdu 
					        	(
						    	<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
							        <?php
								     
								        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 5 ");
			                			$nbredossier = $reqetat->rowcount();

				                			echo '<div>' . $nbredossier .  '</div>' ;
				                		

							         ?>
						        )
					        </div>
					    </div>
					<!--CONTENU DES ONGLETS-->
					    <div class="contenu activeContenu" data-anim="1">
					        <?php
						     
						        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 1 ");
		                		
		                		while ($donnees = $reqetat->fetch()) {

		                			echo '<a href="">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a>' ;
		                			
		                			
		                		}

					         ?>
					    </div> 

					    <div class="contenu" data-anim="2">
		       				<?php
						     
						        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 2 ");
		                		
		                		while ($donnees = $reqetat->fetch()) {

		                			echo '<div>' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</div>' ;
		                			
		                		}

					         ?>
					    </div>

					    <div class="contenu" data-anim="3">
					        <?php
						     
						        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 3 ");
		                		
						        while ($donnees = $reqetat->fetch()) {

		                			echo '<div>' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</div>' ;
		                			
		                		}
					         ?>
					    </div>
					    <div class="contenu" data-anim="4">
					        	
                        
					                        
											<div class="container">

					                          <div class="table-responsive custom-table-responsive">

					                            <table class="table custom-table">
					                              <thead>
					                                <tr>  

					                                  <th scope="col">
					                                    <label class="control control--checkbox">
					                                      <input type="checkbox"  class="js-check-all"/>
					                                      <div class="control__indicator"></div>
					                                    </label>
					                                  </th>
					                                  
					                                  <th scope="col">id du dossier</th>
					                                  <th scope="col">nom du client</th>
					                                  <th scope="col">localisation</th>
					                                  <th scope="col">habitation</th>
					                                  <th scope="col">numero</th>

					                                </tr>
					                              </thead>
					                              <tbody>
					                                <tr scope="row">
					                                  <th scope="row">
					                                    <label class="control control--checkbox">
					                                      <input type="checkbox"/>
					                                      <div class="control__indicator"></div>
					                                    </label>
					                                  </th>
					                                  <td>
					                                    <?php

					                                    	$reqdossier = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 3 ");
					                                    	while ($dossier = $reqdossier->fetch()) {

									                			  echo $dossier['iddossier'];
									                			
									                		}
					                                    ?>
					                                  </td>
					                                  <td><a href="#">
					                                  	<?php
					                                    	while ($donnees = $reqetat->fetch()) {

									                			echo '<div>' . $donnees['nomClient'] . '</div>' ;
									                			
									                		}
					                                    ?>
					                                  </a></td>
					                                  <td>
					                                    <?php
					                                    	while ($donnees = $reqetat->fetch()) {

									                			echo '<div>' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] .  '</div>' ;
									                			
									                		}
					                                    ?>
					                                  </td>
					                                  <td>
					                                  	<?php
					                                    	while ($donnees = $reqetat->fetch()) {

									                			echo '<div>' . $donnees['idDossier'] . '</div>' ;
									                			
									                		}
					                                    ?>
					                                  </td>
					                                  <td>
					                                  	<?php
					                                    	while ($donnees = $reqetat->fetch()) {

									                			echo '<div>' . $donnees['idDossier'] . '</div>' ;
									                			
									                		}
					                                    ?>
					                                  </td>
					                                </tr>
					                                <tr class="spacer"><td colspan="100"></td></tr>
					                                
					                                
					                              </tbody>
					                            </table>
					                          </div>
					                        </div>		    
					     </div>
					    <div class="contenu" data-anim="5">
					        <?php
						     
						        $reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 5 AND statutdossier = 5 ");
		                		
		                		while ($donnees = $reqetat->fetch()) {

		                			echo '<div>' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</div>' ;
		                			
		                		}

					         ?>
					    </div>
				</div>
			</div>
	</div>

    <script type="text/javascript" src="app.js"></script>
</body>
</html>