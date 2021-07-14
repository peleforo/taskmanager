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
	<link rel="stylesheet" type="text/css" href="tabs.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

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
			<div class="col-xs-12 col-sm-11 col-md-11 col-lg-11"  >
				<h1 style="text-align: center; font-size: 70px;margin-bottom: 50px;">DOSSIER DU JOUR <span title="Ajoutez un nouveau dossier"><a href="nouveaudossier.php"><img src="bouton ajout.png"></a></span></h1>
				<!--BOUTON DE DECONNEXION-->

					<div style="text-align: right;margin-bottom: 50px;">
						<a href="deconnexion.php"><input type="submit" name="deconnexion" value="se deconnecter"></a>
					</div>
				<!--MENU A ONGLET-->
				<!--MENU A ONGLET-->
				<div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">	
						<!--EN TETE DES ONGLETS-->
						<ul class="tabs">
							<li class="active"><a href="#encours" style="font-size: 30px;">En cours
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 1 ');
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
							            
								?>
							</a></li>
							<li><a href="#enattente"style="font-size: 30px;">En attente
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 2 ');
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
							<li><a href="#reporte" style="font-size: 30px;">Reporté
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 3 ');
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
							<li><a href="#valide" style="font-size: 30px;">Validé
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutdossier = 4 ');
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
							<li><a href="#perdu" style="font-size: 30px;">Perdu
								<!--AFFICHAGE DU NOMBRE DE DOSSIER-->
								<?php
											     
										$reqetat = $bdd->query('SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutdossier = 5 ');
						                $nbredossier = $reqetat->rowcount();

							            echo '<span>' . $nbredossier .  '</span>' ;
								?>
							</a></li>
						</ul>

						<!--CONTENU DES ONGLETS-->
						<div class="tabs-content" style="font-size: 30px;">
							<div class="tab-content active" id="encours"> 
								<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 1 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					               $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="enattente"> 
								 <?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 2 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					                $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="reporte"> 
								<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 3 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					                $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="valide"> 
								<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 4 ");
					                		
					                while ($donnees = $reqetat->fetch()) {

					                $lien ='afficheDossier.php?idDossier='. $donnees['idDossier'] ;
						                			$_SESSION['idDossier'] = $donnees['idDossier'] ;
						                			

						                			echo '<div><a href="'.$lien.'">' . $donnees['idDossier'] . ' - ' . $donnees['nomClient'] . ' - ' . $donnees['commune'] .' '. $donnees['zone'] . ' ' . $donnees['typeDeMaison'] . ' / ' . $donnees['numeroClient'] . '</a></div>' ;
						                		}

								?>
							</div>
							<div class="tab-content" id="perdu"> 
							 	<?php
									     
									$reqetat = $bdd->query("SELECT * FROM dossier WHERE debutDossier = CURDATE() AND statutDossier = 5 ");
					                		
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

