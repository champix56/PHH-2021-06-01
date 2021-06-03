<?php 
include_once('sqlfunctions.php');
$listeprods=getSqlProduits();
?>
<h1>liste produit</h1>
<table class="liste-produit">
    <?php
    for ($i=0; $i < count($listeprods); $i++) { 
        $unProduitByItterationOfList=$listeprods[$i];
     ?>
     <!-- <tr><td colspan="4"><?php print_r($listeprods[$i]);?></td></tr> -->
    <tr class="produit">
        <td class="img"><img src="<?= $unProduitByItterationOfList["photo"];?>" alt=""></td>
        <td class="titre"><?= $unProduitByItterationOfList["titre"];?><br/><?= $unProduitByItterationOfList["prix"];?>€</td>
        <td class="buttons">
            <a href="?page=produit&idp=<?= $unProduitByItterationOfList['idpr']?>"><button type="button" class="btn btn-success">voir</button></a><br/>
             <a href=""><button type="button" class="btn btn-primary">ajouter</button></a>
        </td>
    </tr>  
    <?php } ?>  
</table>