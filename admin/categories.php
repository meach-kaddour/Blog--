<?php
include("includes/config.php");
include("includes/db.php");
include("includes/function.php");
include("includes/session.php");
?>
<?php
if(isset($_POST["Submit"])){
        $category = $_POST["category"]; 
        date_default_timezone_set("Africa/Casablanca");
        $CurrentTime =time();
        // $DateTime =strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
        $DateTime =strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

        $DateTime;

        if(empty($category)){
            $_SESSION["ErrorMessage"]="  Oops!!! le nom est Nécessaire";
            Redirect_to("categories.php");
        }elseif (strlen($category)>50){
            $_SESSION["ErrorMessage"]="Tres Long comme nom de categories";
            Redirect_to("categories.php");
        }
        else{
            global $db;
            $Query="INSERT INTO categories(nom)
            VALUES ('$category')";
            $Execute = $db->query($Query);
            if($Execute){
                $_SESSION["successMessage"]= "la categories a été bien Ajoutée";
                Redirect_to("categories.php");

            }else{
                $_SESSION["ErrorMessage"]= "Error En l'Ajoute de categories ";
                Redirect_to("categories.php");
            }
        }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashbord Admin</title>
 

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- custom CSS link -->
<link href="../css/adminstyle.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">


   
    
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
        
    <!-- End navbar -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">  
                    <ul id="side-menu" class="nav nav-pills nav stacked" >
                        <li ><a class="nav-link " href="dashbord.php">Dashbord</a></li>
                        <li ><a class="nav-link" href="addNewPost.php">Add New Post</a></li>
                        <li ><a class="nav-link active" href="categories.php">Categories</a><li>
                        <li><a class="nav-link" href="../index.php"> Acceder au Live Blog</a></li>
                        <li><a class="nav-link" href="admin.php"> Manage Admins</a></li>
                        <li><a class="nav-link" href="#">Logout</a></li>
                    </ul>
            </div>
        <!-- End aside area -->

            <div class="col-sm-10">
                    <br>
                    <h2>Manage Categories</h2>
                    <hr>
                    <?php
                        echo Message(); 
                        echo successMessage();
                    ?>
                    <br> 

                        <div>
                        <form action="categories.php" method="post">
                        <fieldset>
                        <div class="form-group">
                        <label for="nom"><span class="fieldInfo">Name :</span></label>
                        <input class ="form-control" name="category" id="nom"placeholder="Name">
                        
                        </div>
                        <br>
                        <br>
                        <input class="btn btn-success btn-block" type="submit" name="Submit" value="Ajouter un catégories">
                        </fieldset>



                        </form>
                        </div>
                        <br>
                        <div class="table-responsive">
                        <table class="table table-striped table-hover">
                                <tr>
                                        <th>categories Id</th>
                                        <th>categories Name</th>
                                        <th>Action</th>

                                </tr>
                        <?php
                        global $db;
                        $viewQuery="SELECT * FROM categories";
                        $execute = $db->query($viewQuery);
                        $SrNo=0;
                        foreach ($execute as $execute){
                            $Id=$execute["id"];
                            $nom=$execute["nom"];
                            $SrNo++;


                        
                        
                        ?>
                                <tr>
                                    <td><?php echo $SrNo ;?></td>
                                    <td><?php echo $nom ;?></td>
                                    <td><a href="deleteCategory.php?id=<?php echo$Id ?>">
                                    <span class="btn btn-danger">Delete</span>
                                </a></td>

                                </tr>
                            <?php } ?>
                        </table>
                        </div>
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
<script src="js/boost"></script>
</body>
</html>