<?php 
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new article;

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $data=$article->fetch_data($id);
    ?>
    <html>
            <head>
            <title>cms blog</title>
            <link rel="stylesheet" href="assets/style.css">
            </head>
                <body>
                    <div class="container">
                        <a href="index.php" id="logo" >CMS</a>
                        <h4>
                            <?php echo $data['aricle_tite'];?>-
                           <small> 
                               posted<br> <?php echo date('l jS',$data['article_timestamp']);?>

                           </small>
                        </h4>
                        <p>
                            <?php echo $data['article_content'];?>-
                        </p>
                        <div>
                           Ecriver Par : <?php echo ' '.$data['article_auteur'];?>-

                        </div>
                        <a href="index.php">&larr;Retourne</a>
                    </div>
                </body>
</html> 
 
    <?php
    
        }else{
            header('location:index.php');
            exit();
        }


    ?>