<?php
include("includes/config.php");
include("includes/db.php");
// include("includes/function.php");
// include("includes/sesssion.php");

$query = "select * FROM categories";
$categories= $db->query($query);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <title>Blog CMS </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- custom CSS link-->
    
    <link href="css/style.css" rel="stylesheet">

 
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav navbar" role="navigation">
          <div class="container">
          
                <a class="navbar-brand navbar-right" href="index.php" >
                <img style="transform:translateX(-160px);max-width:140px" src="img/brand.png" >
                </a>

          
          
                  <?php if(isset($_GET['category'])){ ?>
                            <a class="blog-nav-item " href="index.php">Home</a>


                  <?php  }else{ ?>
                            <a class="blog-nav-item active" href="index.php">Home</a>
                    <?php } ?>
                  
                  <?php if($categories->num_rows>0){
                    while($row =$categories->fetch_assoc()){
                      if(isset($_GET['category']) && $row['id']==$_GET['category'] ){?>
                    
                      <a class="blog-nav-item active" href="index.php?category=<?php echo $row['id'];?>"><?php echo $row['nom'];?></a>
                      
                      <?php }else echo "<a class='blog-nav-item ' href='index.php?category= $row[id]'> $row[nom]</a>";

                      } } 
                      ?>
          
         </div>
        </nav>
      </div>
    </div>

    <div class="container-fluid">
            <div class="blog-header">
                <h1 class="blog-title">Blog-CMS</h1>
                <p class="lead">Le blog informatif a été développé pour créer un réseau personnel d'informations où une personne peut facilement consulter les informations</p>
                <hr>
            </div>
            <div class="row">


              <div class="col-sm-8 blog-main">
        