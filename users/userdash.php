<?php
$uid = $_SESSION['user'];
$user = "SELECT * FROM users WHERE id='$uid'";
$query = mysqli_query($conn, $user);
$udata = mysqli_fetch_assoc($query);
$uemail = $udata['email'];

$isql = "SELECT * FROM issuedbooks WHERE email='$uemail'";
$issued = mysqli_query($conn,$isql);
$tissued = mysqli_num_rows($issued);

$rsql = "SELECT * FROM issuedbooks WHERE email='$uemail' AND returnstatus = '1'";
$returned = mysqli_query($conn,$rsql);
$treturned = mysqli_num_rows($returned);

$nrsql = "SELECT * FROM issuedbooks WHERE email='$uemail' AND returnstatus = '0'";
$nreturned = mysqli_query($conn,$nrsql);
$tnreturned = mysqli_num_rows($nreturned);
?>

<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                <h1 class="page-header">-User Dashboard</h1>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
                            <h4><?php echo $tissued; ?></h4>
                            <h4>Book Issued</h4>   
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-recycle fa-5x"></i>
                            <h4><?php echo $treturned; ?></h4>
                            <h4>Books Returned</h4>   
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-close fa-5x"></i>
                            <h4><?php echo $tnreturned; ?></h4>
                            <h4>Books Not Returned Yet</h4>   
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>