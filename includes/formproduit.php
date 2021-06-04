<?php 
    include_once('sqlfunctions.php');
    if(isset($_GET['idp']))
    {
          $prod=getSqlProduit($_GET['idp']);
    }
    else $prod=null;
    print_r($prod);
?>
<div id="form-produit">
        <!-- snippet 'bs3-form' -->
        <?php 
            $constitutionUrl="?page=saveproduit";
            if(isset($_GET["idp"]))
            {
                $constitutionUrl.="&idp=".$_GET["idp"];
            }
        ?>
        <form action="<?= $constitutionUrl ?>" method="POST" role="form">
         <?php /*
         
         action="?page=saveproduit<?= isset($_GET["idp"])?("&idp=".$_GET["idp"]):""?>"
         
         */ ?>
            <legend>Edition produit</legend>
        
            <div class="form-group">
                <label for="titre-produit">Titre</label>
                <input type="text" 
                    class="form-control" 
                    id="titre-produit" 
                    name="titre-produit" 
                    placeholder="saisir titre" 
                    value="<?= $prod?$prod["titre"]:"" ?>"
                >
                <label for="ref-produit">Ref</label>
                <input type="text" class="form-control" id="ref-produit" name="ref-produit" placeholder="saisir titre" pattern="REF-[\d\w]{1,25}">
                <label for="cat-produit">Catégorie</label>
                <!-- snippet 'bs3-select' -->
                <?php 
                    $monResultat=selectTable("SELECT idcat, titre FROM categories ;");
                print_r($monResultat);
                ?>
                <select name="cat-produit" id="cat-produit" class="form-control" required="required">
                    <?php 
                    for($i=0;$i<count($monResultat);$i++)
                    {                    
                        echo '<option value="'.$monResultat[$i]["idcat"].'">'.$monResultat[$i]["titre"].'</option>';
                    } ?>
                </select>
                
            </div>
            <div class="form-group">
                <label for="photo-produit">Photo</label>
                <input type="file" class="form-control" id="photo-produit" name="photo-produit" placeholder="slectionnez image">
            </div>
            <div class="form-group">
                <label for="prix-produit">prix</label>
                <input type="number" min="0.01" step="0.01" class="form-control" id="prix-produit" name="prix-produit" placeholder="saisir prix">€
            </div>
            <div class="form-group">
                <label for="description-produit">Description</label>
                <br/>
                <textarea name="description-produit" id="description-produit" rows="5" placeholder="saisir description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Su<span style="color:red">bm</span>it</button>
        </form>
        
    </div>