<?php include("views/header.php");?>




<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold  my-4">Contact us</h2>
    
    <div class="row">
    <?php 
                        $name = $subject = $email = $message = "";
                        $nameErr = $subjectErr = $emailErr = $messageErr = "";

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            if(empty($_POST['name'])){
                                $nameErr = "Name is required";
                            }else {
                                $name = test_input($_POST["name"]);
                                // check if name 
                                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                                $nameErr = "Only letters and white space allowed";
                                }
                            }
                            if (empty($_POST["email"])) {
                                $emailErr = "Email is required";
                              } else {
                                $email = test_input($_POST["email"]);
                                // check if e-mail address is well-formed
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                  $emailErr = "Invalid email format";
                                }
                              }
                            if (empty($_POST["subject"])) {
                                $subject = "";
                            } else {
                                $subject = test_input($_POST["subject"]);
                            }
                            if (empty($_POST["body"])) {
                                $message = "";
                            } else {
                                $message = test_input($_POST["body"]);
                            }

                            
                            $email_from = 'blog-php@gmail.com';
                            $email_subject = "New form submission";
                            $email_body = "User Name: $name.\n".
                                                "User Email: $email.\n".
                                                    "User subject: $subject.\n".
                                                        "User Message: $message.\n";
                            $to = "meachkaddour1@gmail.com";
                            $headers = "From: $email_from \r\n";
                            $headers .= "Reply-To: $email \r\n";
                            mail($to,$email_subject,$email_body,$headers);

                        }
                        function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                          }
                    ?>


        <!--Grid column-->
        <div class="col-md-12 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">Your name<span class="text-danger"><?php echo $nameErr;?></span></label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo $name;?>" >
                            
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">Your email<span class="text-danger"><?php echo $emailErr;?></span></label>
                            <input type="text" id="email" name="email" class="form-control"value="<?php echo $email;?>" >
                            
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">Subject<span class="text-danger"><?php echo $subjectErr;?></span></label>
                            <input type="text" id="subject" name="subject" class="form-control" value="<?php echo $subject;?>">
                            
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <label for="message">Your message<span class="text-danger"><?php echo $messageErr;?></span></label>
                            <textarea type="text" id="message" name="body" rows="2" class="form-control md-textarea" value="<?php echo $message;?>"></textarea>
                            
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>
<br><br>
            <div class="text-center text-md-left">
                <a class="btn btn-primary btn-lg" onclick="document.getElementById('contact-form').submit();">Envoyer Votre Message</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        

    </div>

</section>
<!--Section: Contact v.2-->
</div>
<div class="col-sm-4">
<div class="col-md-12 text-center">
            <ul class="list-unstyled mb-0">
                <li><img style="width:70px" src="img/local.png" alt="">
                    <p>Youussoufia, 46300, Maroc</p>
                </li>
                <br>

                <li><img style="width:70px" src="img/phone.png" alt="">
                    <p>+ 212 626 307 361</p>
                </li>
<br>
                <li><img style="width:70px" src="img/email.png" alt="">
                    <p>meachkaddour@gmail.com</p>
                </li>
            </ul>
        </div>

</div>

</div>
<!-- End Blog Main -->


<?php
include("views/footer.php");
?>