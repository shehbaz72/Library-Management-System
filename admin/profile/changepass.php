<?php
$errorcpass = $errornpass = $errorcnpass = "";
$cpass = $npass = $cnpass = "";
$id = $_REQUEST['capass'];
if (isset($_REQUEST['submit'])) {
    $cpass = trim($_REQUEST['cpass']);
    $npass = trim($_REQUEST['npass']);
    $cnpass = trim($_REQUEST['cnpass']);
    $updationdate = date("Y-m-d h:i:s");
    $noerror = true;
    
    if(empty($cpass)) {
        $errorcpass = "Enter Current Password";
        $noerror = false;
    } else {
        $sql = "SELECT * FROM admin WHERE password='$cpass' AND id='$id'";
        $user = mysqli_query($conn,$sql);
        if (mysqli_num_rows($user) == 0) {
            $errorcpass = "Invalid Password";
            $noerror = false;
        }   
    }
    if(empty($npass)) {
        $errornpass = "Enter New Password";
        $noerror = false;
    }
    if(empty($cnpass)) {
        $errorcnpass = "Enter Confirm Password";
        $noerror = false;
    }


    if ($noerror) {
        $sql = "UPDATE admin SET password='$npass' , updationdate = '$updationdate' WHERE id='$id'";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            ?>
            <script>
                window.location.replace("index.php?file=adminaccount");
            </script>
            <?php
        }
    }
}
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                   <li class='active'><h3>Change Password</h3></li>                              
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
                                                                    <input name="cpass" type="password" class="form-control" placeholder="Enter Current Password" value="<?php echo $cpass; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorcpass"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="npass" type="password" class="form-control" placeholder="Enter New Password" value="<?php echo $npass; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errornpass"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="cnpass" type="password" class="form-control" placeholder="Confirm New Password" value="<?php echo $cnpass; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorcnpass"; ?></span>
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