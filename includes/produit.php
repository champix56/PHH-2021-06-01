<?php
include_once( 'sqlfunctions.php' );
$unProduit = getSqlProduit( $_GET['idp'] );
// print_r( $unProduit );
if ( $unProduit ) {
    ?>
    <div class = 'produit'>
        <div class = 'left' >
            <a href = "<?php echo $unProduit["photo"] ?>" target = '_blank'>
                <img src = "<?php echo $unProduit["photo"] ?>" alt = "<?php echo $unProduit["titre"] ?>"/>
            </a>
            <h1 class = 'prix'><?php echo $unProduit['prix'] ?>€</h1>
        </div>
        <div class = 'right'>
            <h1 class = 'titre'><?php echo $unProduit['titre'] ?></h1>
            <h4>Categorie : <?php echo $unProduit['cat_titre'] ?></h4>
            <h2>description :</h2>
            <div class = 'desc'>
                <?php echo $unProduit['decription'] ?>
            </div>
            <div class = 'buttons'>
                <button type = 'button' class = 'btn btn-primary'>Ajouter panier</button>
            </div>
        </div>
    </div>
<?php } 
else { ?>
    <h2>Produit innexistant </h2>
<?php } ?>