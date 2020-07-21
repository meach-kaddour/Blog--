<?php
include("includes/config.php");
include("includes/db.php");
include("includes/session.php");
include("includes/function.php");


?>
<!DOCTYPE html>
<html>
<head>
<title>Dashbord Admin</title></head>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- custom CSS link-->   
    <link href="css/adminstyle.css" rel="stylesheet">
</head>


<body>

    <div class="container-fluid">
    <div style="height:10px; background:#27aae1;" ></div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><img src="../img/brand.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                      <a class="nav-link link" href="../index.php">Blog<span class="sr-only">(current)</span></a>
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
        <!-- End navbar -->
        
        
        <div class="row">
        <!-- aside-area -->
            <div class="col-sm-2">  
                    <ul id="side-menu" class="nav nav-pills nav stacked" >
                        <li ><a class="nav-link active" href="dashbord.php">Dashbord</a></li>
                        <li ><a class="nav-link" href="addNewPost.php">Add New Post</a></li>
                        <li ><a class="nav-link " href="categories.php">Categories</a></li>
                        
                        <li><a class="nav-link" href="#"> Admin Comments</a></li>
                        <li><a class="nav-link" href="../index.php"> Acceder au Live Blog</a></li>
                        <li><a class="nav-link" href="#">Logout</a></li>
                    </ul>
            </div>
        <!-- End aside area -->
        <!-- Main area -->

            <div class="col-sm-10">
                <div><?php
                    echo Message(); 
                    echo successMessage();
                    ?>
                </div>
                <h1>Admin Dashbord</h1>
                 <div class="table-responsive">
                     <table class="table table-striped table-hover">
                         <tr>
                            <th>No</th>
                            <th>Article titel</th>
                            <th>Auteur</th>
                            <th>Category</th>
                            <th>Date de creation</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Détails</th>
                        </tr>

                    <?php
                     global $db;
                     $Query="SELECT *FROM posts ORDER BY date desc ";
                     $Execute = $db->query($Query);
                     $srN=0;
                     foreach ($Execute as $execute){
                        $idArticle=$execute['id'];
                        $titleArticle=$execute['title'];
                        $imageArticle=$execute['image'];
                        $categoryArticle=$execute['category'];
                        $auteurArticle=$execute['auteur'];
                        $dateArticle=$execute['date'];
                        $contentArticle=$execute['article'];
                        $srN++;

                    ?>
                    <tr>
                        <td><?php echo $srN ;?></td>
                        <td style="color:#5E5fEB">
                            <?php
                             if(strlen($titleArticle) >20)
                                {
                                 $titleArticle=substr($titleArticle,0,20)."..";
                                }
                         echo $titleArticle ;
                         ?>
                         </td>
                        <td><?php echo $auteurArticle; ?></td>
                        
                        
                        <td><?php echo $categoryArticle ;?></td>
                        <td>
                            <?php if(strlen($dateArticle) >20)
                                {
                                    $dateArticle=substr($dateArticle,0,11)."..";
                                }
                            echo $dateArticle ;
                            ?>
                        </td>
                        <td><img src="upload/<?php echo $imageArticle; ?>" width="200px"; height="40px"></td>
                        <td>
                           <a href="EditPost.php?Edit=<?php echo $idArticle;?>"> <span class="btn btn-warning">Edit</span></a> 
                           <a href="deletePost.php?delete=<?php echo $idArticle;?>"> <span class="btn btn-danger">Delete</span></a> 

                        </td>
                        <td><a href="../article.php?id=<?php echo $idArticle;?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>

                        
                    </tr>



                    <?php }?>



                    </table>
                </div>
             







            </div>
        </div>
    <div id="footer">
        </hr><p>Designed by | kaddour Meach | &copy:2020---All right reserved</p>
        <a style="color:#fff;text-decoration:none;cursor:pointer; font-weight:bold;" href="#">
                <p>
                    this site is only used for confirm the compétance php,sql,front end..  
                </p>
        </a>
    </div>
    <div style="height:15px;background-color:#e3f2fd"></div>



<!-- JS, Popper.js, and jQuery -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>