<?php
$userid = $_SESSION['user'];
$usql = "SELECT * FROM users WHERE id = '$userid'";
$user = mysqli_query($conn, $usql);
$udata = mysqli_fetch_assoc($user);
$ufname = $udata['firstname'];
$ulname = $udata['lastname'];

?>
    
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="../admin/assets/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                <li class="nav-item ">
                                                    <a href="index.php?file=myaccount" role="button">
                                                    <i class="fa fa-users" style="font-size:24px"></i>
														<span class="admin-name"><?php echo $ufname . " " . $ulname; ?></span></a>
															<!--<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>-->
												
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    
            <!-- Mobile Menu start -->
           
            <!-- Mobile Menu end -->

       