<?php include("includes/header.php");?>
<?php

global $db;

if(isset($_GET['searchButton'])){
  $search= $_GET["search"]; 
  $query = " SELECT * FROM posts
  WHERE date LIKE '%$search%' OR titel LIKE '%$search%'
  OR category LIKE '%$search%' OR post LIKE '%$search%' OR auteur LIKE '%$search%' ";
}else{
  $query =" SELECT * FROM posts";
}

$Execute = $db->query($query);
?>
            
          <?php 
        global $db;
        foreach ($Execute as $execute){
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
                <div class="caption">
                  <p class="blog-post-title">
                    <a href="article.php?id=<?php echo $idArticle;?>"><?php echo htmlentities($titleArticle);?></a>
                  </p>

                </div>
              <p class="blog-post-meta description">Category : <?php echo htmlentities($categoryArticle);?><br> Publier en : <?php echo htmlentities($dateArticle);?><br> Par : <a href="#"><?php echo $auteurArticle;?></a></p>

              
              <p cass="post"><?php  echo substr($contentArticle,0,150)."...";?></p>
              
             <a href="article.php?id=<?php echo $idArticle;?>" > <span class="btn btn-primary right">Afficher plus</span></a>
              
              </div>
              <br>
          <?php   }?>



           </div><!-- /.blog-main -->
        <?php
include("includes/sidebar.php");
?>
<?php
include("includes/footer.php");
?>