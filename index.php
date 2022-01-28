<?php
function afcher($x,$f) { // utilisée pour afcher les résultats
echo var_export($x,TRUE).' => '.var_export($f,TRUE),'<br />';
}
echo "<b>Filtrer un nombre entier</b><br />";
$valeurs = array('123','abc','1.2',NULL);
foreach ($valeurs as $x) {
afcher($x,filter_var($x,FILTER_VALIDATE_INT));
}
echo "<b>+ NULL au lieu de FALSE en cas d’erreur</b><br />";
$x = 'abc';
// indicateur passé en option directement
$options = FILTER_NULL_ON_FAILURE;
afcher($x,filter_var($x,FILTER_VALIDATE_INT,$options));
echo "<b>Filtrer un nombre entier (0-100)</b><br />";
// options du fltre défnies via un tableau associatif
$options =
array
(
'options' => array('min_range' => 0,'max_range' => 100)
);
$valeurs = array('0','100','101');
foreach ($valeurs as $x) {
afcher($x,filter_var($x,FILTER_VALIDATE_INT,$options));
}
echo "<b>+ NULL au lieu de FALSE en cas d’erreur</b><br />";
// indicateur ajouté dans le tableaux des options
$options =
array
(
'options' => array('min_range' => 0,'max_range' => 100),
'flags' => FILTER_NULL_ON_FAILURE
);
$x = '101';
afcher($x,filter_var($x,FILTER_VALIDATE_INT,$options));
echo "<b>Filtrer avec une expression rationnelle</b><br />";
$regexp = '<^[0-9]{2}/[0-9]{2}/[0-9]{4}$>';
$options =
array
(
'options' => array('regexp' => $regexp)
);
$valeurs = array('01/01/2007','01/01/07');
foreach ($valeurs as $x) {
afcher($x,filter_var($x,FILTER_VALIDATE_REGEXP,$options));
}
echo "/////////////////////////////////////<br />";
$texte = "<b>c’est l’été</b>";
echo "// texte afché sans précaution<br />\n";
echo $texte,"<br />\n";
echo "// FILTER_SANITIZE_SPECIAL_CHARS<br />\n";
echo filter_var($texte,FILTER_SANITIZE_SPECIAL_CHARS),"<br />\n";
echo "// FILTER_SANITIZE_STRING<br />\n";
echo filter_var($texte,FILTER_SANITIZE_STRING),"<br />\n";


echo "/////////////////////////////////////<br />";
function aficher($x,$f) { // utilisée pour afcher les résultats
    echo var_export($x,TRUE),'<br /> => ',var_export($f,TRUE),'<br />';
    }
    echo '<b>Filtrer un tableau de nombres entiers</b><br />';
    $valeurs = array('123','abc');
    // Même fltre à appliquer à toutes les données,
    // sans indicateur ni option.
    aficher($valeurs,filter_var_array($valeurs,FILTER_VALIDATE_INT));
    echo '<b>Filtrer un tableau de données diverses (1)</b><br />';
    $valeurs = array
    (
    'age' => 123,
    'taille' => 'abc',
    'mail' => 'contact@Mickey-MOUSE.fr'
    );
    // Filtre diférent mais "simple" (sans indicateur
    // ni option) à appliquer aux données.
    $fltres = array
    (
    'age' => FILTER_VALIDATE_INT,
    'taille' => FILTER_VALIDATE_INT,
    'mail' => FILTER_VALIDATE_EMAIL
    );
    aficher($valeurs,filter_var_array($valeurs,$fltres));
    echo '<b>Filtrer un tableau de données diverses (2)</b><br />';
    $valeurs = array
    (
    'age' => 123,
    'taille' => 'abc',
    'mail' => 'contact@Mickey-MOUSE.fr'
    );
    // Filtre avec options et indicateur à appliquer à une
    // des données.
    $fltre_age = array
    (
    'flter' => FILTER_VALIDATE_INT,
    'options' => array('min_range' => 0,'max_range' => 100),
    'fags' => FILTER_NULL_ON_FAILURE
    );
    // Noter la mention d'un fltre pour une donnée
    // qui n'existe pas.
    $fltres = array
    (
    'age' => $fltre_age,
    'taille' => FILTER_VALIDATE_INT,
    'poids' => FILTER_VALIDATE_INT, // n'existe pas
    'mail' => FILTER_VALIDATE_EMAIL
    );
    aficher($valeurs,filter_var_array($valeurs,$fltres));
    // Désactiver l'ajout des éléments vides.
    echo '<b>La même chose en désactivant l\'ajout d\'éléments vides</b>
    <br />';
    aficher($valeurs,filter_var_array($valeurs,$fltres,FALSE));
?>
