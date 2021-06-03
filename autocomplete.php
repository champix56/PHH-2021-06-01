<style>
    #auto-complet img{
        width:48px;
        height:48px;
    }
</style>
<?php 
    include_once('sqlfunctions.php');
    $mesprods=getSqlProduits($_GET["search"]);
?>
<table id="auto-complet">
    <?php
    foreach ($mesprods as $value) {
    ?>
        <tr>
            <td><img src="<?= $value["photo"];?>" alt=""></td>
            <td><?= $value["titre"];?></td>
        </tr>
    <?php 
    }
?>

</table>