<?php
include("includes/config.php");
include("includes/db.php");
include("includes/function.php");
include("includes/session.php");
?>
<?php
if(isset($_POST["Submit"])){
        $Title = $_POST["Title"];
        $category = $_POST["category"];
        $Image = $_POST["Image"];
        $Post = $_POST["Post"];

        date_default_timezone_set("Africa/Casablanca");
        $CurrentTime =time();
        // $DateTime =strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
        $DateTime =strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

        $DateTime;
        $Admin = "kaddour";
        $Image = $_FILES["Image"]["name"];
        $Target= "Upload/".basename($_FILES["Image"]["name"]);

            global $db;
            $DeleteUrl=$_GET['delete'];
            $Query="DELETE  FROM posts WHERE id='$DeleteUrl'";          
            $Execute = $db->query($Query);
            move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
            if($Execute){
                // $_SESSION["ErrorMessage"]= "Error En supperession d'article ";
                $_SESSION["successMessage"]= "La supperession a été bien effectuer";
                Redirect_to("dashbord.php");

            }else{
                $_SESSION["ErrorMessage"]= "Error En supperession d'article ";
                Redirect_to("dashbord.php");
            }
        
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Post</title></head>
 <!-- custom CSS link -->
 <link href="css/adminstyle.css" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">


   
    


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
                    <li class="nav-item">
                      <a class="nav-link" href="../index.php" target="_blank">Acceuil <span class="sr-only">(current)</span></a>
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
    </nav>  <!-- End navbar -->
        <div style="height:10px; background:#27aae1;" ></div>
        <!-- End navbar -->
        <div class="row">
            <div class="col-sm-2">  
                    <ul id="side-menu" class="nav nav-pills nav stacked" >
                        <li ><a class="nav-link " href="dashbord.php">Dashbord</a></li>
                        <li ><a class="nav-link active" href="addNewPost.php">Add New Post</a></li>
                        <li ><a class="nav-link " href="categories.php">Categories</a></li>
                        
                        <li><a class="nav-link" href="#"> Admin Comments</a></li>
                        <li><a class="nav-link" href="../index.php"> Acceder au Live Blog</a></li>
                        <li><a class="nav-link" href="#">Logout</a></li>
                    </ul>
            </div>
        <!-- End aside area -->

            <div class="col-sm-10">
                    <br>
                    <h2>Delete  Post</h2>
                    <hr>
                    <?php
                        echo Message(); 
                        echo successMessage();
                    ?>
                    <br> 

                        <div>
                            <?php 
                             global $db;
                             $urlQuery=$_GET['delete'];
                             $Query="SELECT * FROM posts WHERE id='$urlQuery'";
                             $execute = $db->query($Query);
                             foreach ($execute as $execute){
                                $Title = $execute["title"];
                                $category = $execute["category"];
                                $Image = $execute["image"];
                                $Post = $execute["article"];  
                            }



                            ?>
                        <form action="DeletePost.php?delete=<?php echo $urlQuery ;?>" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Title"><span class="fieldInfo">Title:</span></label>
                                    <input  disabled type="text" value= "<?php echo $Title ; ?>" class ="form-control" name="Title" id="Title"placeholder="Titre">
                                
                                </div>
                                <div class="form-group">
                                    <span class="fieldInfo"> Existe Category:</span>
                                    <?php echo $category; ?>
                                    <br>
                                    <label for="category"><span class="fieldInfo"> Category:</span></label>
                                    <select  disabled class ="form-control" name="category" id="category">
                                    
                                        <?php
                                                global $db;
                                                $viewQuery="SELECT * FROM categories";
                                                $execute = $db->query($viewQuery);
                                                
                                                foreach ($execute as $execute){
                                                    $Id=$execute["id"];
                                                    $nom=$execute["nom"];        
                                        ?>
                                        <option value=""> <?php echo $nom; ?></option>
                                                <?php } ?>
                                    
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                <span class="fieldInfo"> Existe Image:</span>
                                     <img src="Upload/<?php echo $Image; ?> "  width="180px"; height="60px">
                                     <br>
                                    <label for="Image"><span class="fieldInfo">Select Image:</span></label>
                                    <input  disabled type="File" class ="form-control" name="Image" id="Image"placeholder="Select Image">
                                
                                </div>
                                <div class="form-group">
                                    <label for="postarea"><span class="fieldInfo">Post:</span></label>
                                    <textarea disabled class ="form-control" name="Post" id="postarea"><?php echo $Post; ?></textarea>
                                
                                </div>
                           
                                <input class="btn btn-danger btn-block" type="submit" name="Submit" value="Delete L'article">
                            </fieldset>

                        </form>
                        </div>
                        <br>
                        
                        
                                
                           
                        
             </div><!--End main area -->
        </div><!--End row -->


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