<?php
include("includes/config.php");
include("includes/db.php");
include("includes/session.php");
include("includes/function.php");


?>
<?php
if(isset($_POST["Submit"])){
        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $comment = $_POST["comment"];

        date_default_timezone_set("Africa/Casablanca");
        $CurrentTime =time();
        // $DateTime =strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
        $DateTime =strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

        $DateTime;
        $PostIdUrl=$_GET["id"];

        if(empty($Name)||empty($Email)||empty($comment)){
            $_SESSION["ErrorMessage"]="Tous Les Champs Doit Rensignés";
            
        }elseif (strlen($comment)>500){
            $_SESSION["ErrorMessage"]="Ne Doit Pas Passé 500 caractère.";           
        }
        else{
            global $db;
            global $PostIdUrl;
            $Query="INSERT INTO  commentss (name,email,date,comment,status)
            VALUES ('$Name','$Email','$DateTime','$comment','OFF'";
            $Execute = mysqli_query($db,$Query);
            
            if($Execute){
                $_SESSION["successMessage"]= "Comments a été bien Ajoutée";
                Redirect_to("article.php?id=$PostId");
              

            }else{
                $_SESSION["ErrorMessage"]= "Error En l'Ajoute d'article ";
                Redirect_to("article.php?id=$PostId");

            }
        }
}
?>

<!Doctype html>
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
                
        <!-- Start navbar -->
        <div style="height:10px; background:#27aae1;" ></div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><img src="img/brand.jbg" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link link" href="index.php">Blog<span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">PHP</a>
                        <a class="dropdown-item" href="#">HTML</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Autres</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Contacter-Nous</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Service</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0"  name="searchButton" type="submit">Go</button>
                  </form>
                </div>
         </nav>
        <div style="height:10px; background:#27aae1;" ></div>
        <!-- End Navbar -->
        

     

    <div class="container-fluid">
            <div class="blog-header">
                <h1 class="blog-title">Blog-CMS</h1>
                <p class="lead">Le blog informatif a été développé pour créer un réseau personnel d'informations où une personne peut facilement consulter les informations</p>
                <hr>
            </div>
            <div class="row">

<!-- Start Main Area -->
              <div class="col-sm-8 blog-main">
        
                          <?php

                              global $db;

                              if(isset($_GET['searchButton'])){
                                $search = $_GET["search"]; 
                                $Query = " SELECT * FROM posts
                                WHERE date LIKE '%$search%' OR titel LIKE '%$search%'
                                OR category LIKE '%$search%' OR post LIKE '%$search%' OR auteur LIKE '%$search%' ";
                              }else{
                                  $PostIdUrl = $_GET["id"];
                                $Query =" SELECT * FROM posts where id='$PostIdUrl' ";
                              }

                              $execute = mysqli_query($db,$Query);
                              ?>
                                      
                                    <?php 
                                  
                                  foreach ($execute as $execute){
                                        $idArticle=$execute['id'];
                                        $titleArticle=$execute['title'];
                                        $imageArticle=$execute['image'];
                                        $categoryArticle=$execute['category'];
                                        $auteurArticle=$execute['auteur'];
                                        $dateArticle=$execute['date'];
                                        $contentArticle=$execute['article'];
                                    ?>

              <div class="card ">
              

                            <img style="height:60vh" class="img-responsive img-rounded" src="admin/upload/<?php echo $imageArticle; ?>" alt="image article">
                            <br>
                            <div class="caption">
                              <p class="blog-post-title">
                                <a href="article.php?id=<?php echo $idArticle;?>"><?php echo htmlentities($titleArticle);?></a>
                              </p>

                            </div>
                            <br>
                              <p class="blog-post-meta description">Category : <?php echo htmlentities($categoryArticle);?><br> Publier en : <?php echo htmlentities($dateArticle);?><br> Par : <a href="#"><?php echo $auteurArticle;?></a></p>  
                              <p cass="post"><?php  echo $contentArticle;?></p>
                          
                    
                            </div>
                      <br>

                      <?php   }?>


              
              </div><!-- End Main Area-->
        <?php include("views/sidebar.php");?>
        <!-- End side bar -->
        <?php include("views/footer.php");?>
        <!-- End Footer-->
