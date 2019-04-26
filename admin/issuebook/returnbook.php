<?php
$fine = "";
if (isset($_REQUEST['submit'])) {
    $fine = $_REQUEST['fine'];
    $returndate = date("Y-m-d");
    $returnstatus = 1;
    $eiid = $_REQUEST['eiid'];

    $sql = "UPDATE issuedbooks SET returndate = '$returndate', returnstatus = '$returnstatus', fine = '$fine' WHERE id = '$eiid'";
    $update = mysqli_query($conn, $sql);
    if ($update) {
        $qry = "SELECT * FROM issuedbooks WHERE id='$eiid'";
        $user = mysqli_query($conn,$qry);
        $email = mysqli_fetch_assoc($user);
        $to = $email['email'];
        $subject = "Your book is returned";
        $message = "Congratulations your book is returned. Fine is :-" . $fine;
        $headers = "jarvisapollo23@gmail.com";
        if(mail($to, $subject, $message, $headers)); {
            
            ?>
            <script>
                window.location.replace("index.php?file=manageissuebooks");
            </script>
            <?php
        } 
    }

}
 
if (isset($_REQUEST['eiid'])) {
    $eiid = $_REQUEST['eiid'];
    $sql = "SELECT i.id as iid, b.id as bid, u.id as uid, i.email as iemail, u.email as uemail, u.firstname, u.lastname, u.email, b.bookname, b.isbn, i.bookid, i.email, i.issuedate, i.returndate,i.returnstatus, i.fine FROM issuedbooks i INNER JOIN books b ON i.bookid=b.id INNER JOIN users u ON i.email=u.email WHERE i.id='$eiid'";
    
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    $userfname = $user['firstname'];
    $userlname = $user['lastname'];
    $bookname = $user['bookname'];
    $isbn = $user['isbn'];
    $issuedate = $user['issuedate'];
    $returndate = $user['returndate'];
    $fine = $user['fine'];
}
?>
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class='active'><h3>Issued Book Details</h3></li>
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
                                                                    <label for="">Full Name: </label> <?php echo " ". $userfname . " " . $userlname; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Book Name: </label> <?php echo " ". $bookname; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">ISBN: </label> <?php echo " ". $isbn; ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Book Issued Date: </label> <?php echo " ". $issuedate; ?>
                                                                </div>
                                                                <?php
                                                                if ($returndate == NULL) {
                                                                    $fine = "";
                                                                ?>
                                                                    <label for="">Book Return Date: </label> Not Return Yet
                                                                    <div class="form-group">
                                                                        <label for="">Fine (in rupees): </label> 
                                                                        <input type="number" name="fine" value ="<?php echo $fine; ?>">
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <input type="submit" name="submit" value="Return Book" class="btn btn-primary">
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="form-group">
                                                                        <label for="">Book Return Date: </label><?php echo " ". $returndate; ?>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Fine (in rupees): </label><?php echo " ". $fine; ?>
                                                                    
                                                                    </div>
                                                                <?php } ?>
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
