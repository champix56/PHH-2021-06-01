<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP store</title>

    <!-- snippet 'bs3-cdn' -->
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- snippet 'bs3-navbar' -->
    <nav class="navbar navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Title</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <div id="form-produit">
        <!-- snippet 'bs3-form' -->
        <form action="traitement-formulaire.php" method="GET" role="form">
            <legend>Edition produit</legend>
        
            <div class="form-group">
                <label for="titre-produit">Titre</label>
                <input type="text" class="form-control" id="titre-produit" name="titre-produit" placeholder="saisir titre">
                <label for="ref-produit">Ref</label>
                <input type="text" class="form-control" id="ref-produit" name="ref-produit" placeholder="saisir titre" pattern="REF-[\d\w]{1,25}">
                <label for="cat-produit">Catégorie</label>
                <!-- snippet 'bs3-select' -->
                <select name="cat-produit" id="cat-produit" class="form-control" required="required">
                    <option value="dessert">dessert</option>
                    <option value="laitier">laitier</option>
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
</body>

</html>