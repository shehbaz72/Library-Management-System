<?php

    $sql = "SELECT * FROM admin";
    
    $result = mysqli_query($conn, $sql);
    while ($admin = mysqli_fetch_assoc($result)) {
        static $no = 1;
        $name = $admin['fullname'];
        $email = $admin['adminemail'];
        $username = $admin['username'];
        $updationdate = $admin['updationdate'];
?>
<div class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class='active'><h3>Admin <?php echo $no++ ?></h3></li>
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
                                                                    <label for="">Full Name: </label> <?php echo " ". $name; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Email: </label> <?php echo " ". $email; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">User Name: </label> <?php echo " ". $username; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Updation Date: </label> <?php echo " ". $updationdate; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <a href="index.php?capass=<?php echo $admin['id']; ?>"><label for="">Change Password </label></a>
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
<?php } ?>