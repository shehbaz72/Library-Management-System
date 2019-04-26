<?php   
$errorfname = $errorlname = $erroremail = $errormobile = $errorpass = $errorcpass = "";
$fname = $lname = $email =$mobile = $pass = $cpass = "";
if (isset($_REQUEST['submit'])) {
    $fname = $_REQUEST['firstname'];
    $lname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $mobile = $_REQUEST['mobile'];
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['confpassword'];
    $regdate = date("Y/m/d");
    $noerror = true;
    $status = 'active';
    if (empty($fname)) {
        $errorfname = "Enter First Name";
        $noerror = false;
    }elseif (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
        $errorfname = "Only letters allows in first name";
        $noerror = false;
    }
    if (empty($lname)) {
        $errorlname = "Enter Last Name";
        $noerror = false;
    }elseif (!preg_match("/^[a-zA-Z ]*$/", $lname)) {
        $errorlname = "Only letters allows in last name";
        $noerror = false;
    }
    if (empty($email)) {
        $erroremail = "Enter Email-Id";
        $noerror = false;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroremail = "Invalid Email Id";
        $noerror = false;
    }
    if (empty($mobile)) {
        $errormobile = "Enter Mobile No.";
        $noerror = false;
    }
    if (empty($pass)) {
        $errorpass = "Enter Password";
        $noerror = false;
    } elseif (empty($cpass)) {
        $errorcpass = "Enter Confirm Password";
        $noerror = false;
    } elseif ($pass !== $cpass) {
        $errorcpass = "Confirm password isn't match";
        $noerror = false; 
    }
    if ($noerror) { 
        
        $sql = "INSERT INTO users (firstname, lastname, email, mobile, regdate, status, password) VALUE ('$fname', '$lname', '$email', '$mobile', '$regdate', '$status', '$pass')";
        $result = mysqli_query($conn, $sql);
        if($result){
            //header ('location:index.php?file=users.php');
            ?>
            <script>
                    window.location.replace("index.php");
            </script>
            <?php   
        }
    } 
}  
?>
 <!-- Single pro tab re -->
 <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class='active'><h3>User Registion</h3></li>                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <!--<div class="product-tab-list tab-pane fade active in" id="description">-->
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <!--<div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">-->
                                                    <form method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                          <!--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">-->
                                                                <div class="form-group">
                                                                    <input name="firstname" type="text" class="form-control" placeholder="First Name" value="<?php echo $fname; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorfname"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="lastname" type="text" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorlname"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="email" type="text" class="form-control" placeholder="Email Id" value="<?php echo $email; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$erroremail"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="mobile" type="number" class="form-control" placeholder="Mobile no." value="<?php echo $mobile; ?>">
                                                                    <span class="text-danger" id="validation" ><?php echo "$errormobile"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="password" type="password" class="form-control" placeholder="Password" value="<?php echo $pass; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorpass"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="confpassword" type="password" class="form-control" placeholder="Confirm Password" value="<?php echo $cpass; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorcpass"; ?></span>
                                                                </div>
                        
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <input type="submit" name="submit" class="btn btn-primary">
                                                                </div>
                                                            <!--</div>-->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                   <!-- </div>
                                </div>-->
                            </div>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
