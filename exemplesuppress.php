<?php

//Cette page en vrai est appelé par un lien qui se trouve sur une autre page. Le lien permet juste de transférer l'id de l'élément à supprimer 

 

    include 'oracle.php'; //Le include me permetait de me connecter à la base de Donnée
 
    $cool = $_GET['cod'];  //Ici la variable cool sert à recupérer l'id de l'élément que je veux supprimer


    $sql = " DELETE FROM livre WHERE codeL = '$cool'";  //Requête pour supprimer l'élément
     $go = oci_parse($conn, $sql);
    oci_execute($go);
   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bibiliothèque</title>
    <link rel="stylesheet" href="/livre/static/css/bootstrap.min.css">
    
    <!--<link rel="stylesheet" href="/livre/static/css/style.css">-->
</head>
<body>

    <div class="container"><br>
        <h3> Suppression Réussie !</h3>
        <hr>
        <a class="btn btn-primary" href="indexl.php">Revenons à la liste </a>
        <hr>
    </div>

</body>
</html>