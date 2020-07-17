<?php
include("includes/header.php");


if(isset($_GET['article'])){
    $id = mysqli_real_escape_string($db,$_GET['article']);
    $query = " SELECT *FROM aricles WHERE id='$id'";
  }

  $articles = $db->query($query);

?>  
            

<br>
<br>

<?php if($articles->num_rows > 0) { 
            while ($row=$articles->fetch_assoc()){
          ?>

              <div class="blog-post">
              <h2 class="blog-post-title"><a href="article.php?post-<?php echo $row['id'];?>"><?php echo $row['titre'];?></a></h2>
              <p class="blog-post-meta"><?php echo $row['date'];?> Par  <a href="#"><?php echo $row['auteur'];?></a></p>

              
              <?php  
              $body=$row['body'];
              echo substr($body,0,400)."...";

              ?>
              
              <a href="<?php echo $row['id'];?>" class="btn btn-primary">Afficher plus</a>
              
              
              </div>
          <?php  } }?>



         


          
        <blockquote>2 Comments</blockquote>
         <div class="comment-area">
         
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text"  name="Website"class="form-control" id="exampleInputEmail1" placeholder="Website">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Commentaire</label>
                        <textarea name="comment" id="" cols="60" rows="10" class="form-control"></textarea>                    
                    </div> 
                    <button type="submit" name="post_comment" class="btn btn-primary">Post Comment</button>
                </form>

                <br>
                <br>
                <hr> 
                <div class="comment">
                    <div class="comment_head">
                        <a href="#">kaddour</a>
                        <img src="img/nimg.png" alt="photo profil" style="width:50px,height:50px" >

                       
                    </div>
                    this test comments

                </div>
                <div class="comment">
                    <div class="comment_head">
                        <a href="#">khalid</a>
                        <img src="img/nimg.png" alt="photo profil" style="width:50px,height:50px" >

                       
                    </div>
                    this test2 comments....

                </div>
         </div>

        </div><!-- /.blog-main -->
        <?php
include("includes/sidebar.php");
?>
<?php
include("includes/footer.php");
?>