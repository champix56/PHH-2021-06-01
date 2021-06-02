<?php 

/**
 * @param mixed $query requete SQL
 * 
 * @return [Array] tableau de lignes de reponses
 */
function selectTable($query)
{
    //etape 1 connexion au server & a la db
    $maDb   =   mysqli_connect("localhost", "root" ,"","magasin");
    $res    =   mysqli_query($maDb,$query);
    if($res == false)return null;

    
    $returnArray = array();
    while ( $row    =   mysqli_fetch_assoc($res)) {
        array_push($returnArray,$row);
    } 
    return $returnArray; 
}
?>