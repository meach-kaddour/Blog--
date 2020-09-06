<?php include("includes/include.php"); ?>

<?php

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
