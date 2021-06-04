<?php 
$maDb=null;

/**
 * @param mixed $query requete SQL
 * 
 * @return [Array] tableau de lignes de reponses
 */
function selectTable($query)
{
    //etape 1 connexion au server & a la db
     $GLOBALS["maDb"]   =   mysqli_connect("localhost", "root" ,"","magasin");
    $res    =   mysqli_query($GLOBALS["maDb"],$query); 
    //print_r($res);
    if($res == false)return false;
    //traitement des non query pour retourner l'etat d'affectation 
   
    else if(gettype($res)=="boolean" && mysqli_affected_rows($GLOBALS["maDb"])>0)return mysqli_affected_rows($GLOBALS["maDb"]);
    
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
    $query='SELECT `idpr`, PR.`titre` AS titre, `prix`, PR.`description` AS decription, `ref`, `photo`, 	PR.`idcat` AS idcat,CA.`titre` AS cat_titre,CA.`description` AS cat_desc FROM `produits` PR, `categories` CA WHERE CA.`idcat`=PR.`idcat` AND `idpr`='.$id.';';
    //reception d'un tableau de resultat possédant q'un seul enregistrement
    //je ne retourne que le 1er (la seule) ligne du tableau 
    $results=selectTable($query);
    //ternaire equivalant a if/else
    //   condition booleen  ?  valeur si cond vrai  :  valeur si cond false
    return $results?$results[0]:false;
}


/**
 * @param mixed $search search value
 * 
 * @return [array[]] 2 dim. array results
 */
function getSqlProduits($search=false)
{
    // echo 
    $query='SELECT `idpr`, PR.`titre` AS titre, `prix`, PR.`description` AS decription, `ref`, `photo`, 	PR.`idcat` AS idcat,CA.`titre` AS cat_titre,CA.`description` AS cat_desc FROM `produits` PR, `categories` CA WHERE CA.`idcat`=PR.`idcat`';
    if($search)
    {
        $query.="AND PR.titre LIKE '%".$search."%'";
        
    }
    //retourne tous les reultats de la requette ou false si la requette à echoué ( le parent selectTable gere le retour faux en caxs d'echec de la requette)
    return selectTable($query);
}
function insertSqlProduit($titre,$prix,$desc,$ref,$idcat,$photo=null)
{
     $req="INSERT INTO `produits`(`titre`, `prix`, `description`, `ref`, `idcat`) VALUES ('".$titre."',".$prix.",'".$desc."','".$ref."',".$idcat.")";
     $isAffected=selectTable($req);
    if($isAffected)
    {
         return mysqli_insert_id ( $GLOBALS["maDb"] );
    }
    else {return false;}
    
}
?>