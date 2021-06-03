<?php 
include_once('sqlfunctions.php');
$listeprods=getSqlProduits(isset($_GET["search"])?$_GET["search"]:false);
?>
<h1>liste produit :<?=count($listeprods).' résultat(s)';?></h1>
<?php if(isset($_GET["search"]) && strlen($_GET["search"])>0){
    echo 'pour la recherche : '.$_GET['search'];
};?>
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