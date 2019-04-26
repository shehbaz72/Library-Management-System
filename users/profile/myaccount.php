<?php

    $uid = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id='$uid'";
    
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    $ufname = $user['firstname'];
    $ulname = $user['lastname'];
    $uregdate = $user['regdate'];
    $uemail = $user['email'];
    $ustatus = $user['status'];
    $umobile = $user['mobile'];

?>
<div class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class='active'><h3>My Profile</h3></li>
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
                                                                    <label for="">Full Name: </label> <?php echo " ". $ufname . " " . $ulname; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Email: </label> <?php echo " ". $uemail; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Reg Date: </label> <?php echo " ". $uregdate; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Status: </label> <?php echo " ". $ustatus; ?>
                                                                </div>
                                                                <div>
                                                                    <label for="">Mobile No.: </label> <?php echo " ". $umobile; ?>
                                                                    
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
