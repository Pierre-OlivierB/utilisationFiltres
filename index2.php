<?php
// Inclusion du fchier qui contient les défnitions de nos
// fonctions générales.
// include('fonctions.inc');
// Tester si la page est appelée après validation du formulaire
if (filter_has_var(INPUT_POST, 'ok')) {
// Défnir les fltres pour les données saisies.
$fltres =
array
(
'nom' => array('flter'=> FILTER_SANITIZE_STRING,
'fags' => FILTER_FLAG_ENCODE_LOW)
);
// Récupérer la saisie fltrée.
$saisie = filter_input_array(INPUT_POST,$fltres);
$nom = $saisie['nom'];
// La valeur saisie est réafchée dans le formulaire e
// dans la page...
}
?>
<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8" />
<title>Saisie</title>
</head>
<body>
<form action="saisie.php" method="post">
<div>
Nom :
<input type="text" name="nom" value="<?php echo $nom; ?>" />
<input type="submit" name="ok" value="OK" /><br />
<?php echo $nom; ?>
</div>
</form>
</body>
</html>