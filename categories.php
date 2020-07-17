<?php 
require_once("../include/DB.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashbord Admin</title></head>
<!-- CSS  boostrap only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- css link -->
<link rel="stylesheet" href="../css/adminstyle.css">


<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light  col-sm-12">
                <a class="navbar-brand">Kachkat Blog</a>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </div>
        <!-- End navbar -->
        <div class="row">
            <div class="col-sm-2">  
                    <ul id="side-menu" class="nav nav-pills nav stacked" >
                        <li ><a class="nav-link " href="dashbord.php">Dashbord</a></li>
                        <li ><a class="nav-link" href="#">Add New Post</a></li>
                        <li ><a class="nav-link active" href="categories.php">Categories</a></li>
                        <li><a class="nav-link" href= "#">Manage Admin</a></li>
                        <li><a class="nav-link" href="#"> Admin Comments</a></li>
                        <li><a class="nav-link" href="#"> Acceder au Live Blog</a></li>
                        <li><a class="nav-link" href="#">Logout</a></li>
                    </ul>
            </div>
        <!-- End aside area -->

            <div class="col-sm-10">
                <h1>Manage categories</h1>
            </div>
            <form action="categories.php" method="post">
                
                <fieldset>
                    <div class="form-group">
                        <label for="categoryname">Name</label>
                        <input class="form-control" type="text name="category" id ="categoryname" placeholder="Name">
                    </div>
                    <input class="btn btn-success btn-block" type="submit" name="submit" value='Ajouter Une Categories' >
                </fieldset>
            </form>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>
</html>