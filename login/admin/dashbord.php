<?php
include("includes/session.php");
include("includes/config.php");
include("includes/db.php");

// include("includes/function.php");


?>
<?php include("views/header.php");?>
        
        <div class="container-fluid">
            <div class="row">
            <!-- aside-area -->
                <div class="col-sm-2">  
                        <ul id="side-menu" class="nav nav-pills nav stacked" >
                            <li ><a class="nav-link active" href="dashbord.php">Dashbord</a></li>
                            <li ><a class="nav-link" href="addNewPost.php">Add New Post</a></li>
                            <li ><a class="nav-link " href="categories.php">Categories</a></li>
                            
                            <li><a class="nav-link" href="../../blog.php"> Acceder au Live Blog</a></li>
                            <li><a class="nav-link" href="logout.php">Logout</a></li>
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
                
                <br>
                <br>
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
                           <a href="DeletePost.php?delete=<?php echo $idArticle;?>"> <span class="btn btn-danger">Delete</span></a> 

                        </td>
                        <td><a href="../article.php?id=<?php echo $idArticle;?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>                       
                    </tr>
                    <?php }?>
                   </table>
                </div>
            

            </div>
        </div>
        <footer class="blog-footer">
            <p>Copyright @2020 <a href="index.php">Designe</a> Par <a href="https://youcode.ma">@kaddour</a>.</p>
     
            </footer>




<!-- JS, Popper.js, and jQuery -->
<script src="../../js/bootstrap.min.js"></script>

</body>
</html>