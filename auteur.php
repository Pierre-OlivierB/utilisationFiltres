<?php
include_once('commun . inc . php');
$numero = $_GET['numero'];
$auteur = $auteurs[$numero];
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Auteur</title>
</head>

<body>
    <h1><?= $auteur ?></h1>
    <p><a href="accueil.php">Retour à la liste</a></p>
</body>

</html>