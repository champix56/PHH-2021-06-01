<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>retour de form</title>
</head>
<body>
<?php 
//declaration d'une variable
$mavar=0;
// affectation d'une var declarée
$mavar=$mavar + 3;
//affichage en ligne d'une variable simple
echo $mavar;

?>
<?php 
    $mesData=null;
    echo '<br/>isset POST'.count($_POST).'<br/>isset GET'.count($_GET);
    if(count($_POST)>0)
    {
        $mesData=$_POST;
    }
    elseif (count($_GET)>0) {
        
        $mesData=$_GET;
    }
    else
    {
        echo "rien à voir ici";
        exit(0);
    }

$toto=1;
    if(isset($toto))echo "photo presente";
    else echo "nopn definie"
?>



<h1>Tableau $_GET</h1>
<?php
//affichage decomposé d'une variable complexe (obj, tableau, ...)
print_r( $mesData) ; 
?>
<h1>Position description-produit</h1>
<?php 
//affichage d'un champs d'un tableau position 1
echo $mesData["description-produit"];



// $mesData=12233;
// echo $mesData;
?>

</body>
</html>