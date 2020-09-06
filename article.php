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
    <style>
    
    header {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    border: 1px solid #011fc7;
    padding: 5px 15px;
    background-color: #669DE6;
    height: 70px;
}

header h1 {
    margin: 0 auto 0 0;
    padding: 0;
}

header h1 a {
    display: block;
    font-size: 20px;
    text-decoration: none;
}

header h1 a img {
    height: 50px;
    margin-top: 7px;
}

.custom-navbar {
    margin: 0;
    padding: 0;
}

.custom-navbar li {
    position: relative;
    display: inline-block;
    list-style-type: none;
    vertical-align: middle;
}

.custom-navbar li a {
    display: block;
    font-size: 17px;
    color: #0A0000;
    text-align: center;
    text-decoration: none;
    padding: 10px 15px;
}

.custom-navbar li a:hover {
    background-color: #637afe;
    color: #f2f2f2;
}

.menu-icon {
    display: none;
    background-color: transparent;
    border: 1px solid transparent;
    text-align: center;
    width: 45px;
    height: 45px;
    cursor: pointer;
}

.menu-icon:hover {
    background-color: #637afe;
}

.menu-icon:focus {
    outline: none;
}

.menu-icon span {
    color: white;
    font-size: 20px;
}

.ripple-wave {
    position: relative;
    transition: background-color .6s ease;
    overflow: hidden;
}

.ripple-wave:after {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    top: 50%;
    left: 50%;
    transform-style: flat;
    transform: translate3d(-50%, -50%, 0);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 100%;
    transition: width .3s ease, height .3s ease;
}

.ripple-wave:focus,
.ripple-wave:hover {
    background: #fb512e;
}

.ripple-wave:active:after {
    width: 200px;
    height: 200px;
}

@media (min-width: 481px) and (max-width: 761px) {
    header {
        position: relative;
    }
    header h1 {
        margin: 0 auto;
    }
}

@media (max-width: 480px) {
    header h1 {
        margin-right: auto;
    }
}

@media (max-width: 991px) {
    header {
        position: relative;
    }
    .custom-navbar {
        opacity: 0;
        position: fixed;
        z-index: 2;
        top: 70px;
        right: -100%;
        width: 100%;
        height: 100%;
        width: 300px;
        background-color: #304ffe;
        transition: all 1s ease;
    }
    .custom-navbar.open {
        opacity: 1;
        right: 0;
    }
    .custom-navbar li {
        display: block;
    }
    .custom-navbar li a {
        text-align: left;
        border: 1px solid #637afe;
    }
    .menu-icon {
        display: block;
    }
}
    
    </style>
  </head>

  <body>
                
        <!-- Start navbar -->
        <header>
        <h1><a href="#"><img src="img/logo.png" alt="Logo"/></a></h1>
        <ul class="custom-navbar js-custom-navbar">
          <li>
            <a href="blog.php" class="ripple-wave">Blog</a>
          </li>
          <li>
            <a href="#" class="ripple-wave">About</a>
          </li>
          <li>
            <a href="contact.php" class="ripple-wave">Contact</a>
          </li>
        </ul>
        <button class="menu-icon js-menu-icon">
          <span class="fa fa-bars"></span>
        </button>
      </header>
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
