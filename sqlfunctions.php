<?php 

function selectTable($query)
{
    //etape 1 connexion au server & a la db
    $maDb   =   mysqli_connect("localhost", "root" ,"","magasin");
    $res    =   mysqli_query($maDb,$query);
    if($res == false)return null;
    //print_r($res); 
    
    //soit par l'objet du resultat soit par la fonction fournit par mysqli_
    //echo '<br/>'.$res->num_rows.'<br/>';
   
    $rowscount= mysqli_num_rows($res);
    //echo 'rows count : '.$rowscount.'<hr/>';

    $returnArray = array();
    while ( $row    =   mysqli_fetch_assoc($res)) {
       //print_r($row);
        //echo '<hr/>';
        array_push($returnArray,$row);
    } 
    return $returnArray; 
}
$monResultat=selectTable("SELECT * FROM produits ;");
print_r($monResultat);
?>