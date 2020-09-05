<?php
include("includes/config.php");
include("includes/db.php");
include("includes/session.php");
include("includes/function.php");
if(isset($_GET["id"])){
    $Idurl=$_GET["id"];
    global $db;
    $Query="DELETE FROM categories WHERE id='$Idurl'";
    $Execute = $db->query($Query);
    if($Execute){
        $_SESSION["successMessage"]= "category deleted";
        Redirect_to("categories.php");

    }else{
        $_SESSION["ErrorMessage"]= "Error En delete. ";
        Redirect_to("categories.php");
    }
           
}

?>
