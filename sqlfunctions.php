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
    if($res == false)return false;

    
    $returnArray = array();
    while ( $row    =   mysqli_fetch_assoc($res)) {
        array_push($returnArray,$row);
    } 
    return $returnArray; 
}

/**
 * @param mixed $id id du produit
 * 
 * @return [Array] une seul ligne (+ colonne) de produit
 */
function getSqlProduit($id)
{
    // echo 
    $query='SELECT `idpr`, PR.`titre` AS titre, `prix`, PR.`description` AS decription, `ref`, `photo`, 	PR.`idcat` AS idcat,CA.`titre` AS cat_titre,CA.`description` AS cat_desc FROM `produitS` PR, `categories` CA WHERE CA.`idcat`=PR.`idcat` AND `idpr`='.$id.';';
    //reception d'un tableau de resultat possédant q'un seul enregistrement
    //je ne retourne que le 1er (la seule) ligne du tableau 
    $results=selectTable($query);
    //ternaire equivalant a if/else
    //   condition booleen  ?  valeur si cond vrai  :  valeur si cond false
    return $results?$results[0]:false;
}
?>