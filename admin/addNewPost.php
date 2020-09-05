<?php
include("includes/session.php");
include("includes/config.php");
include("includes/db.php");
include("includes/function.php");

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


        if(empty($Title)){
            $_SESSION["ErrorMessage"]="Titre est Nécessaire";
            Redirect_to("addNewPost.php");
        }elseif (strlen($Title)<5){
            $_SESSION["ErrorMessage"]="Très court comme titre d'article!!";
            Redirect_to("addNewPost.php");
        }
        else{
            global $db;
            $Query="INSERT INTO  posts (title,date,auteur,image,article,category)
            VALUES ('$Title','$DateTime','$Admin','$Image','$Post','$category')";
            $Execute = $db->query($Query);
            move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
            if($Execute){
                $_SESSION["successMessage"]= "l'article a été bien Ajoutée";
                Redirect_to("addNewPost.php");

            }else{
                $_SESSION["ErrorMessage"]= "Error En l'Ajoute d'article ";
                Redirect_to("addNewPost.php");
            }
        }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Post</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- custom CSS link-->   
    <link href="../css/style.css" rel="stylesheet">

    <link href="../css/adminstyle.css" rel="stylesheet"> 
</head>

<body>
    
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
                      <?php
                        global $db;
                        $viewQuery="SELECT * FROM categories";
                        $execute = $db->query($viewQuery);
                        $SrNo=0;
                        foreach ($execute as $execute){
                            $Id=$execute["id"];
                            $nom=$execute["nom"];
                         
                        ?>
                            
                                    <a class="dropdown-item" href="<?php echo $Id ;?>"><?php echo $nom ;?></a>
                            <?php } ?>
                        
                        
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
        <div class="row">
            <div class="col-sm-2">  
                    <ul id="side-menu" class="nav nav-pills nav stacked" >
                        <li ><a class="nav-link " href="dashbord.php">Dashbord</a></li>
                        <li ><a class="nav-link active" href="addNewPost.php">Add New Post</a></li>
                        <li ><a class="nav-link " href="categories.php">Categories</a></li>
                        <li><a class="nav-link" href="../index.php"> Acceder au Live Blog</a></li>
                        <li><a class="nav-link" href="admin.php"> Manage Admins</a></li>
                        <li><a class="nav-link" href="#">Logout</a></li>
                    </ul>
            </div>
        <!-- End aside area -->

            <div class="col-sm-10">
                    <br>
                    <h2>Ajouter Nouveaux Articles</h2>
                    <hr>
                    <?php
                        echo Message(); 
                        echo successMessage();
                    ?>
                    <br> 

                        <div>
                        <form action="addNewPost.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Title"><span class="fieldInfo">Title:</span></label>
                                    <input type="text" class ="form-control" name="Title" id="Title"placeholder="Titre">
                                
                                </div>
                                <div class="form-group">
                                    <label for="category"><span class="fieldInfo"> Category:</span></label>
                                    <select class ="form-control" name="category" id="category">
                                    
                                        <?php
                                                global $db;
                                                $viewQuery="SELECT * FROM categories";
                                                $execute = $db->query($viewQuery);
                                                
                                                foreach ($execute as $execute){
                                                    $Id=$execute["id"];
                                                    $nom=$execute["nom"];        
                                        ?>
                                        <option value=""><?php echo $nom; ?></option>
                                                <?php } ?>
                                    
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                    <label for="Image"><span class="fieldInfo">Select Image:</span></label>
                                    <input  type="File" class ="form-control" name="Image" id="Image"placeholder="Select Image">
                                
                                </div>
                                <div class="form-group">
                                    <label for="postarea"><span class="fieldInfo">Post:</span></label>
                                    <textarea class ="form-control" name="Post" type="text" id="postarea"></textarea>
                                
                                </div>
                           
                                <input class="btn btn-success btn-block" type="submit" name="Submit" value="Ajouter un Article">
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