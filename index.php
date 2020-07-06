<?php
include_once('includes/connection.php');
include_once('includes/article.php');
$article = new article;
$articles =$article->fetch_all();

//echo md5('password');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>cms blog</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    
    </head>
   

<body>

    <div class="container-fluid">
       
            <nav class="navbar navbar-light  col-sm-12">
                <a href="index.php" class="navbar-brand">Kachkat Blog</a>
                <form class="form-inline">
                    <button class="btn btn-danger my-2 my-sm-0" type="submit"><a class="link" href="admin/index.php">Adminstration</a></button>
                </form>
            </nav>
        <!-- End navbar -->
        <div class="row">
            <div class="col-sm-1">  
                    <ul id="side-menu" class="nav nav-pills nav stacked" >
                        <li ><a class="nav-link active" href="dashbord.php"> Articles</a></li>
                        <li ><a class="nav-link" href="categories.php">Categories</a></li>
                        <li><a class="nav-link" href="#">Login</a></li>
                    </ul>
            </div>
        <!-- End aside area -->

            <div class="col-sm-8">
                    <h2> Nouveau Articles </h2>
                    <ol>
                        <?php foreach($articles as $article){?>
                                <li>
                                    <a href="article.php?id=<?php  echo $article['article_id'];?>">
                                    <p><?php  echo $article['aricle_tite'];?></p>
                                    </a>
                                
                                    <p><?php  echo $article['article_content']?></p>
                                    
                                    <small>
                                        poseted on :<br>
                                        <span><?php  echo date('l jS',$article['article_timestamp']); ?></span>
                                    </small>
                                    Ecrivez Par :<?php echo $article['article_auteur'];?>-

                                </li>
                        <?php }?>
                    </ol>
            </div>
            <div class="col-sm-3">  
                    
            <h1>Publicités</h1>

            <div class="card">
                    <img src="img/logo.png" class="card-img-top" alt="...">
            </div>
                <div class="card p-3 text-right">
                    <blockquote class="blockquote mb-0">
                    <p>Haraj Maroc Nouveau solution pour toue les commercents qui on besoin d'aide pour vendre leur Produit enligne</p>
                    <footer class="blockquote-footer">
                        <small class="text-muted">
                        Contacter-nous<cite title="Source Title">Haraj Maroc</cite>
                        </small>
                    </footer>
                    </blockquote>
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



<!--  link JS Boostrap -->
<script src="js/bbootstrap.min.js"></script>


</body>
</html>
