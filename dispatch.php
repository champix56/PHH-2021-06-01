<?php
if ( isset( $_GET['page'] ) ) {
    switch ( $_GET['page'] ) {
       
        case 'new':
        include( 'includes/formproduit.php' );
        break; 
        case 'saveproduit':
            //tache1
            // echo 'isEmpty : '.(empty($_POST["cat-produit"])==true).' isset : '.(isset($_POST["cat-produit"])==true);
            if( 
                isset($_POST["titre-produit"]) 
                && isset($_POST["cat-produit"])
                && !isset($_GET["idp"])
            ){
               $idp= insertSqlProduit($_POST["titre-produit"],$_POST["prix-produit"],
                $_POST["description-produit"],$_POST["ref-produit"],$_POST["cat-produit"]);
                
                $_GET["idp"]=$idp;
                print_r($_GET);
            }
            elseif (   
                isset($_POST["titre-produit"]) 
                && isset($_POST["cat-produit"])
                && !empty($_GET["idp"])
            ){
                updateSqlProduit($_GET["idp"], $_POST["titre-produit"],$_POST["prix-produit"],
                $_POST["description-produit"], $_POST["ref-produit"],$_POST["cat-produit"]);  
            }
        case 'edit':
            include( 'includes/formproduit.php' );
        break;
        case 'produit':
        include( 'includes/produit.php' );
        break;
        case 'listeproduit':
        include( 'includes/listeproduit.php' );
        break;
        case 'panier':
        include( 'includes/panier.php' );
        break;
        default:
        include( 'includes/home.php' );
        break;
    }
} else include( 'includes/home.php' );

?>