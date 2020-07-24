<?php
include("includes/config.php");
include("includes/db.php");
// include("includes/function.php");
// include("includes/sesssion.php");


?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog CMS </title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- custom CSS link-->   
    <link href="css/style.css" rel="stylesheet"> 
  </head>

  <body>

    
        <div style="height:10px; background:#27aae1;" ></div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"><img src="img/brand.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link link" href="index.php">Blog<span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <a class="nav-link link" href="#" tabindex="-1" aria-disabled="true">Contacter-Nous</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link link" href="#" tabindex="-1" aria-disabled="true">Service</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0"  name="searchButton" type="submit">Go</button>
                  </form>
                </div>
    </nav>
        <div style="height:10px; background:#27aae1;" ></div>

     

    <div class="container-fluid">
            <div class="blog-header">
                <h1 class="blog-title">Blog-CMS</h1>
                <p class="lead">Le blog informatif a été développé pour créer un réseau personnel d'informations où une personne peut facilement consulter les informations</p>
                <hr>
            </div>
            <div class="row">


              <div class="col-sm-8 blog-main">
        