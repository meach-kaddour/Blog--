<?php 
include("admin/includes/session.php");
include("admin/includes/function.php"); 
// session_start();
// if(isset($_SESSION['username'])){
//     header("location: admin/dashbord.php");
// }

// if(isset($_SESSION['password'])){
//     header("location: admin/dashbord.php");
// }

if(isset($_POST["submit"]) && !empty($_POST["username"]) && !empty($_POST["Password"])){
        $username = $_POST["username"];
        $Password = $_POST["Password"];
        if ($_POST['username'] == 'admin' && $_POST['Password'] == '1234') 
            {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = 'admin';
                    $_SESSION['password'] = '1234';
                    $_SESSION["successMessage"]= "Login succesful";
                    Redirect_to("admin/dashbord.php");
                  
                  echo 'You have entered valid use name and password';
               }else {
                    $_SESSION["ErrorMessage"]= "Invalid compte";
                    Redirect_to("index.php");
                    $msg = 'Wrong username or password';
               }

            }


?>
<!DOCTYPE html>
<html>
<head>
<title>Dashbord Admin</title>
 

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- custom CSS link -->
 <link href="../css/adminstyle.css" rel="stylesheet">
 <link href="../css/style.css" rel="stylesheet">

<style>
    body{
        background:#ffffff;
    }
    .col-sm-4{
        margin:auto;
        width:50%;
    }
</style>   
</head>
<body>       
    
    <div class="container-fluid">
        <div class="row">    
        <!-- End aside area -->
            <div class="col-sm-4 ">
                    <!-- <?php
                        // echo Message(); 
                        // echo successMessage();
                    ?> -->
                    <br><br><br><br>
                    <h2>Welcome To Login</h2>
                    <hr>
                    
                    <br> 

                        <div>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                <fieldset>
                                <div class="form-group">
                                <label for="username"><span class="fieldInfo">Username :</span></label>
                                
                                <input class ="form-control" type="text" name="username" id="username"placeholder="Username">                                
                                </div>
                                <div class="form-group">
                                <label for="Password"><span class="fieldInfo">Password:</span></label>
                                <input class ="form-control" name="Password" id="Password" type="Password" placeholder="Password">
                                
                                </div>
                                
                                
                                <br>
                                <input class="btn btn-success btn-block" type="submit" name="submit" value="Login">
                                </fieldset>

                        </form>
                        </div>
                        <br>
                        
            </div>
        </div>


    </div>
    <br><br><br><br>
    <footer class="blog-footer">
      <p>Copyright @2020 <a href="index.php">Designe</a> Par <a href="https://twitter.com/mdo">@kaddour</a>.</p>
     
    </footer>
    


<!-- JS, Popper.js, and jQuery -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>