<!DOCTYPE html>
<?php
session_start();
  
	 try {
	 	$bdd = new PDO('mysql:host=localhost;dbname=taskmanager','root','');

	 	//On définit le mode d'erreur de PDO sur Exception
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      


	    

	 } catch (PDOException $e) {
     echo "Erreur :". $e->getMessage();
	 }
?>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>onglets</title>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="tabs.css">
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

<body class="container">
<?php

	if (isset($_SESSION['idCollaborateur'])) {
		// code...


?>

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
								 	<a class="nav-link" href="dashboard.php" style="color: black;">MA JOURNEE</a>
								 </li>
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
			<div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
				<div style="margin-left:10px ;display: flex; justify-content: space-around;">
					<span title="Ajoutez un nouveau dossier">
						<h1 style="font-size:50px">DASHBOARD ADMIN
							<a href="nouveaudossier CI.php">
								<img src="bouton ajout.png">
							</a>
						</h1>
					</span>
					<!--BOUTON DE DECONNEXION-->
					 <a href="deconnexion.php" style="margin-bottom: 50px;"><input type="submit" name="deconnexion" value="se deconnecter"></a>
				</div>			
			<!--BLOC DE CREATION-->
			 <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
				<div class="container">
					<div class="row">
						<!--BLOC DE CREATION ET VISUALISATION DE SERVICE-->
					 	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					 		<div>
								<div class="table100 ver1 m-b-110">
									<table data-vertable="ver1">
												<thead>
													<tr class="row100 head">
														<th class="column100 column1" data-column="column1">SERVICE</th>
														<th class="column100 column1" data-column="column1"><span title="Ajoutez un nouveau dossier"><a href="nouveaudossier CI.php"><img src="bouton ajout.png"></a></span></th>
													</tr>
		
												</thead>
																
														<?php
													     
															$reqteam = $bdd->query('SELECT * FROM equipe');

											                		
											                while ($team = $reqteam->fetch()) {	
												       			
												       			
																//AFFICHEZ NMBRE DE DOSSIER PAR SERVICE
												       			$reqid = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutdossier = 4 AND equipe ='.$team['idEquipe'].'');
												                $nbredossier = $reqid->rowcount();

												       			echo '<tr class="row100">
												       			<td class="column100 column2" data-column="column2">'.$team['nomEquipe'] .'</td><td class="column100 column2" data-column="column2">'.$nbredossier.'</td></tr>';
												       			
												                		}



													           
														?>	

									</table>
								</div>
							</div>
					 	</div>


						<!--BLOC DE CREATION ET VISUALISATION DE PROJET-->
						<div class="col-xs-12 col-sm-11 col-md-4 col-lg-4">
								<div class="table100 ver1 m-b-110">
									<table data-vertable="ver1">
												<thead>
													<tr class="row100 head">
														<th class="column100 column1" data-column="column1">PROJET</th>
														<th class="column100 column1" data-column="column1"><span title="Ajoutez un nouveau dossier"><a href="nouveaudossier CI.php"><img src="bouton ajout.png"></a></span></th>
													</tr>
												</thead>
																
																
														<?php
													     
															$reqproject = $bdd->query('SELECT * FROM projet');

											                		
											                while ($project = $reqproject->fetch()) {	
												       			
												       			
																//AFFICHEZ NMBRE DE DOSSIER PAR SERVICE
												       			$reqprojet = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutdossier = 1 AND projetConcerne ='.$project['idProjet'].'');
												                $nbredossier = $reqprojet->rowcount();

												       			echo '<tr class="row100">
												       			<td class="column100 column2" data-column="column2">'.$project['nomProjet'] .'</td><td class="column100 column2" data-column="column2">'.$nbredossier.'</td></tr>';
												       			
												                		}



													           
														?>	
									</table>
								</div>
						</div>
						<!--BLOC DE CREATION ET VISUALISATION DE COLLABORATEUR-->
						<div class="col-xs-12 col-sm-11 col-md-4 col-lg-4">
								<div class="table100 ver1 m-b-110">
									<table data-vertable="ver1">
												<thead>
													<tr class="row100 head">
														<th class="column100 column1" data-column="column1">COLLABORATEUR</th>
														<th class="column100 column1" data-column="column1"><span title="Ajoutez un nouveau dossier"><a href="formul.php"><img src="bouton ajout.png"></a></span></th>
													</tr>
												</thead>
																
														<?php
													     
															$reqcollab = $bdd->query('SELECT * FROM collaborateur');

											                		
											                while ($collab = $reqcollab->fetch()) {	
												       			
												       			
																//AFFICHEZ NMBRE DE DOSSIER PAR SERVICE
												       			$reqcollabo = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutdossier = 1 AND projetConcerne ='.$collab['idCollaborateur'].'');
												                $nbredossier = $reqcollabo->rowcount();

												       			echo '<tr class="row100">
												       			<td class="column100 column2" data-column="column2">'.$collab['nomCollaborateur'] .'</td><td class="column100 column2" data-column="column2">'.$nbredossier.'</td></tr>';
												       			
												                		}



													           
														?>			
									</table>
								</div>
						</div>
					</div>
				</div>

				

			 </div>

			<!--BLOC DE VISUALISATION-->

				<!--MENU A ONGLET-->
				<div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">	
						<!--EN TETE DES ONGLETS-->
						<ul class="tabs" style="font-size: 30px;">
							<li class="active"><a href="#encours">En cours
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 1 ");
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
							<li><a href="#enattente">En attente
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 2 ");
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
							<li><a href="#reporte">Reporté
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 3 ");
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
							<li><a href="#valide">Validé
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 4 ");
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
							<li><a href="#perdu">Perdu
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 5 ");
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
						</ul>

						<!--CONTENU DES ONGLETS-->
						<div class="tabs-content" style="font-size: 30px;">
							<div class="tab-content active" id="encours"> 
								<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 1 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					               $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="enattente"> 
								 <?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 2 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					                $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="reporte"> 
								<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 3 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					                $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="valide"> 
								<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 4 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					                $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="perdu"> 
							 	<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE projetconcerne = 4 AND statutdossier = 5 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					                $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
						</div>
				</div>
			</div>
	</div>

    <script type="text/javascript" src="tabs.js"></script>
</body>
</html>
<?php
	}
	else
	{
		header("location:index.php");
	}

?>

