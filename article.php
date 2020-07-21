<?php
include("includes/header.php");
?>
<?php

global $db;

if(isset($_GET['searchButton'])){
  $search= $_GET["search"]; 
  $query = " SELECT * FROM posts
  WHERE date LIKE '%$search%' OR titel LIKE '%$search%'
  OR category LIKE '%$search%' OR post LIKE '%$search%' OR auteur LIKE '%$search%' ";
}else{
    $PostIdUrl = $_GET["id"];
  $Query =" SELECT * FROM posts where id='$PostIdUrl' ";
}

$execute =  mysqli_query($db,$Query);
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
              

                <img class="img-responsive img-rounded" src="admin/upload/<?php echo $imageArticle; ?>" alt="image article">
                <br>
                <div class="caption">
                  <p class="blog-post-title">
                    <a href="article.php?post-<?php echo $idArticle;?>"><?php echo htmlentities($titleArticle);?></a>
                  </p>

                </div>
                <br>
              <p class="blog-post-meta description">Category : <?php echo htmlentities($categoryArticle);?><br> Publier en : <?php echo htmlentities($dateArticle);?><br> Par : <a href="#"><?php echo $auteurArticle;?></a></p>

              
              <p cass="post"><?php  echo $contentArticle;?></p>
              
            
              </div>
              <br>
          <?php   }?>

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