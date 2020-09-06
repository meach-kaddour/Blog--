<?php include("includes/include.php"); ?>

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
            $EditUrl=$_GET['Edit'];
            $Query="UPDATE posts SET date='$DateTime',title='$Title',
            category='$category',auteur='$Admin',image='$Image'WHERE id='$EditUrl'";
            
            
            
            
            $Execute = $db->query($Query);
            move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
            if($Execute){
                $_SESSION["successMessage"]= "l'article a été bien Modifier";
                Redirect_to("dashbord.php");

            }else{
                $_SESSION["ErrorMessage"]= "Error En l'Ajoute d'article ";
                Redirect_to("dashbord.php");
            }
        }
}
?>
<?php include("views/header.php");?>
    
        <!-- End navbar -->
        <div class="row">
            <div class="col-sm-2">  
                    <ul id="side-menu" class="nav nav-pills nav stacked" >
                        <li ><a class="nav-link " href="dashbord.php">Dashbord</a></li>
                        <li ><a class="nav-link active" href="addNewPost.php">Add New Post</a></li>
                        <li ><a class="nav-link " href="categories.php">Categories</a></li>
                        <li><a class="nav-link" href="../../blog.php"> Acceder au Live Blog</a></li>
                        <li><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
            </div>
        <!-- End aside area -->

            <div class="col-sm-10">
                    <br>
                    <h2>Mise à Jour Des Articles</h2>
                    <hr>
                    <?php
                        echo Message(); 
                        echo successMessage();
                    ?>
                    <br> 

                        <div>
                            <?php 
                             global $db;
                             $urlQuery=$_GET['Edit'];
                             $Query="SELECT * FROM posts WHERE id='$urlQuery'";
                             $execute = $db->query($Query);
                             foreach ($execute as $execute){
                                $Title = $execute["title"];
                                $category = $execute["category"];
                                $Image = $execute["image"];
                                $Post = $execute["article"];  
                            }



                            ?>
                        <form action="EditPost.php?Edit=<?php echo $urlQuery ;?>" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="Title"><span class="fieldInfo">Title:</span></label>
                                    <input type="text" value= "<?php echo $Title ; ?>" class ="form-control" name="Title" id="Title"placeholder="Titre">
                                
                                </div>
                                <div class="form-group">
                                    <span class="fieldInfo"> Existe Category:</span>
                                    <?php echo $category; ?>
                                    <br>
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
                                        <option value=""> <?php echo $nom; ?></option>
                                                <?php } ?>
                                    
                                    </select>
                                
                                </div>
                                <div class="form-group">
                                <span class="fieldInfo"> Existe Image:</span>
                                     <img src="Upload/<?php echo $Image; ?> "  width="180px"; height="60px">
                                     <br>
                                    <label for="Image"><span class="fieldInfo">Select Image:</span></label>
                                    <input  type="File" class ="form-control" name="Image" id="Image"placeholder="Select Image">
                                
                                </div>
                                <div class="form-group">
                                    <label for="postarea"><span class="fieldInfo">Post:</span></label>
                                    <textarea class ="form-control" name="Post" id="postarea"><?php echo $Post; ?></textarea>
                                
                                </div>
                           
                                <input class="btn btn-success btn-block" type="submit" name="Submit" value="Modifier L'article">
                            </fieldset>

                        </form>
                        </div>
                        <br>
                        
                        
                                
                           
                        
             </div><!--End main area -->
        </div><!--End row -->


    </div>
    <footer class="blog-footer">
      <p>Copyright @2020 <a href="index.php">Designe</a> Par <a href="https://twitter.com/mdo">@kaddour</a>.</p>
     
    </footer>



<!-- JS, Popper.js, and jQuery -->
<script src="../../js/bootstrap.min.js"></script>

</body>
</html>