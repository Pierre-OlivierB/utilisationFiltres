<!-- alimentez la variable $auteur avec le nom de l’auteur 
uniquement si le numéro passé dans l’URL est un entier 
et que ce numéro correspond bien au numéro d’un auteur 
(indice dans le tableau $auteurs). -->
<!-- ----- -->
<!-- Dans la page HTML, 
afchez le nom de l’auteur s’il est défni 
ou « Auteur introuvable » dans le cas contraire. -->
<!-- ----- -->
<!-- Testez le script modifé en l’appelant directement dans votre navigateur avec diférents cas :
    auteur.php (sans paramètre), 
    auteur.php?numero (paramètre vide), 
    auteur.php?numero=abc (paramètre du mauvais type),
    auteur.php?numero=99 (numéro qui n’existe pas) et 
    auteur.php?numero=0 (paramètre correct). -->
<?php
include_once('commun.inc.php');
$numero = filter_input(INPUT_GET,'numero',FILTER_VALIDATE_INT);
echo $numero;
if (is_int($numero) and array_key_exists($numero,$auteurs)) {
    $auteur = $auteurs[$numero];
}
// else {
//     $auteur = "Auteur introuvable";
// }

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>Auteur</title>
</head>

<body>
    <h1><?= isset($auteur)?($auteur):'Auteur introuvable'; ?></h1>
    <p><a href="accueil.php">Retour à la liste</a></p>
</body>

</html>