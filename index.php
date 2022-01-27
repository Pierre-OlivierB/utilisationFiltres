<?php
function afcher($x,$f) { // utilisée pour afcher les résultats
echo var_export($x,TRUE),’ => ’,var_export($f,TRUE),’<br />’;
}
echo "<b>Filtrer un nombre entier</b><br />";
$valeurs = array(’123’,’abc’,’1.2’,NULL);
foreach ($valeurs as $x) {
afcher($x,flter_var($x,FILTER_VALIDATE_INT));
}
echo "<b>+ NULL au lieu de FALSE en cas d’erreur</b><br />";
$x = ’abc’;
// indicateur passé en option directement
$options = FILTER_NULL_ON_FAILURE;
afcher($x,flter_var($x,FILTER_VALIDATE_INT,$options));
echo "<b>Filtrer un nombre entier (0-100)</b><br />";
// options du fltre défnies via un tableau associatif
$options =
array
(
’options’ => array(’min_range’ => 0,’max_range’ => 100)
);
$valeurs = array(’0’,’100’,’101’);
foreach ($valeurs as $x) {
afcher($x,flter_var($x,FILTER_VALIDATE_INT,$options));
}
echo "<b>+ NULL au lieu de FALSE en cas d’erreur</b><br />";
// indicateur ajouté dans le tableaux des options
$options =
array
(
’options’ => array(’min_range’ => 0,’max_range’ => 100),
’fags’ => FILTER_NULL_ON_FAILURE
);
$x = ’101’;
afcher($x,flter_var($x,FILTER_VALIDATE_INT,$options));
echo "<b>Filtrer avec une expression rationnelle</b><br />";
$regexp = ’<ˆ[0-9]{2}/[0-9]{2}/[0-9]{4}$>’;
$options =
array
(
’options’ => array(’regexp’ => $regexp)
);
$valeurs = array(’01/01/2007’,’01/01/07’);
foreach ($valeurs as $x) {
afcher($x,flter_var($x,FILTER_VALIDATE_REGEXP,$options));
}
?>