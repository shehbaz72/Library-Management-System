<?php
$errorbook = $erroremail = "";
$email = $book = "";
if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];
    $book = $_REQUEST['book'];
    $issuedate = date("Y/m/d");
    $noerror = true;
    
    if(empty($email)) {
        $erroremail = "Enter Email";
        $noerror = false;
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $user = mysqli_query($conn,$sql);
        $ud = mysqli_fetch_assoc($user);
        if (mysqli_num_rows($user) == 0) {
            $erroremail = "User Not Found";
            $noerror = false;
        } elseif ($ud['status'] =='inactive') {
            $erroremail = "Inactive User";
            $noerror = false;
        }   
    }
    if(empty($book)) {
        $errorbook = "Select Book";
        $noerror = false;
    }

    if ($noerror) {
        $sql = "INSERT INTO issuedbooks (bookid, email, issuedate) VALUE ('$book', '$email', '$issuedate')";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            $to = $email;
            $subject = "Book Issue By Your Account";
            $message = "Congratulations your book is issued.You return this book before:-". date('Y-m-d', strtotime(' + 15 days'));
            $headers = "jarvisapollo23@gmail.com";
            if (mail($to, $subject, $message, $headers)) {
                ?>
                <script>
                    window.location.replace("index.php?file=manageissuebooks");
                </script>
                <?php
            } else {
                die;
            }
        }
        ?>
        <!-- <script>
            window.location.replace("index.php?file=manageissuebooks");
        </script> -->
        <?php
    }
}
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                   <li class='active'><h3>Issue New Book</h3></li>                              
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
                                                                    <input name="email" type="text" class="form-control" placeholder="User Email" value="<?php echo $email; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$erroremail"; ?></span>
                                                                </div>
                                                                <br>
                                                                <div class="form-group">
                                                                <select name="book" class="form-control" value="<?php echo $book; ?>">
                                                                    <option value="">select book and ISBN number</option>
                                                                    <?php    
                                                                        $sql = "SELECT * FROM books";
                                                                        $result = mysqli_query($conn, $sql);
                                                                        $rows = mysqli_num_rows($result);
                                                                        while ($book = mysqli_fetch_assoc($result)){                                  
                                                                    ?>
                                                                            <option value ="<?php echo $book['id']; ?>" ><?php echo $book['bookname']; echo str_repeat('&nbsp;', 10); echo $book['isbn'];  ?></option>        
                                                                        <?php } ?>
                                                                        </select>
                                                                        <span class="text-danger"><?php echo "$errorbook"; ?></span>
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