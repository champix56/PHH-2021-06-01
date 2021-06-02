<?php 
if(isset($_GET["page"])){
    switch ($_GET["page"]) {
        case 'new':
            include('includes/formproduit.php');
            break;
        case 'edit':
            include('includes/formproduit.php');
            break;
        default:
            include('includes/home.php');
            break;
    }
}
else include('includes/home.php');

?>