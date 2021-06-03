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
            <a class="navbar-brand" href="?">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="?page=edit&idp=1">edit produit1</a></li>
                <li><a href="?page=new">nouveau produit</a></li>
                <li><a href="?page=produit&idp=1">produit 1</a></li>
                <li><a href="?page=listeproduit">liste produit</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search"  method="GET">
                <div class="form-group">
                    <input type="hidden" name="page" value="listeproduit">
                    <input type="text" value="<?= isset($_GET["search"])? $_GET["search"]: "";?>" class="form-control" placeholder="Search" name="search">
                    <div id="completion-container" style="border:1px solid black;background-color:skyblue; position:fixed;left:44.3%;height:auto;min-height:50px;width:205px;"></div>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=panier">Affichier panier complet</a></li>
                        <!-- <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li> -->
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>