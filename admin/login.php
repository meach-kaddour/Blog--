<?php
include("includes/session.php");
include("includes/config.php");
include("includes/db.php");
include("includes/function.php");

?>
<?php
function login_in($username,$Password){
    global $db;
    $viewQuery="SELECT * FROM registration WHERE username='$username' AND reg-pass='$Password'";
    $execute = $db->query($viewQuery);
    if($execute){
        return $execute;
    }else{
        return null;
    }
}

if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $Password = $_POST["Password"];
        

        if(empty($username) ||empty($Password)){
            $_SESSION["ErrorMessage"]="  Oops!!!Renseignés Tous les champs";
            Redirect_to("login.php");
        }
        else{
            $get_account=login_in($username,$password);
            if($get_account){
                $_SESSION["successMessage"]= "Login succesful";
                Redirect_to("dashbord.php");

            }else{
                $_SESSION["ErrorMessage"]= "Invalid compte";
                Redirect_to("login.php");
        }
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Dashbord Admin</title>
 

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- custom CSS link -->
 <link href="../css/adminstyle.css" rel="stylesheet">
 <link href="../css/style.css" rel="stylesheet">

<style>
    body{
        background:#ffffff;
    }
    .col-sm-4{
        margin:auto;
    }
</style>
   
    
</head>

<body>
    
      
        
    <!-- End navbar -->
    <div class="container-fluid">
        <div class="row">
            
        <!-- End aside area -->

            <div class="col-sm-4 ">
                    <?php
                        echo Message(); 
                        echo successMessage();
                    ?>
                    <br><br><br><br>
                    <h2>Welcome To Login</h2>
                    <hr>
                    
                    <br> 

                        <div>
                        <form action="login.php" method="POST">
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
    


<!-- JS, Popper.js, and jQuery -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>