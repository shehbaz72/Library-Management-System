<?php
$bsql = "SELECT * FROM books";
$book = mysqli_query($conn,$bsql);
$tbooks = mysqli_num_rows($book); 

$csql = "SELECT * FROM categories";
$categories = mysqli_query($conn,$csql);
$tcategories = mysqli_num_rows($categories);

$asql = "SELECT * FROM authors";
$authors = mysqli_query($conn,$asql);
$tauthors = mysqli_num_rows($authors);

$usql = "SELECT * FROM users";
$users = mysqli_query($conn,$usql);
$tusers = mysqli_num_rows($users);

$isql = "SELECT * FROM issuedbooks";
$issued = mysqli_query($conn,$isql);
$tissued = mysqli_num_rows($issued);

$rsql = "SELECT * FROM issuedbooks WHERE returnstatus = '1'";
$returned = mysqli_query($conn,$rsql);
$treturned = mysqli_num_rows($returned);

$nrsql = "SELECT * FROM issuedbooks WHERE returnstatus = '0'";
$nreturned = mysqli_query($conn,$nrsql);
$tnreturned = mysqli_num_rows($nreturned);
?>
<div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                <h1 class="page-header">-Admin Dashboard</h1>
                    
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <h4><?php echo $tbooks; ?></h4>
                            <h4>Books Listed</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-file-archive-o fa-5x"></i>
                            <h4><?php echo $tcategories; ?></h4>
                            <h4>Categories Listed</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-danger back-widget-set text-center">
                            <i class="fa fa-user fa-5x"></i>
                            <h4><?php echo $tauthors; ?></h4>
                            <h4>Authors Listed</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-warning back-widget-set text-center">
                            <i class="fa fa-users fa-5x"></i>
                            <h4><?php echo $tusers; ?></h4>
                            <h4>Users Listed</h4>   
                        </div>
                    </div>
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