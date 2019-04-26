<?php
$author = "";
$errorauthor = "";
if (isset($_REQUEST['submit'])) {
    $author = $_REQUEST['author'];
    $creationdate = date("Y/m/d");
    $noerror = true;
    if (empty($author)) {
        $errorauthor = "Enter Author Name";
        $noerror = false;
    }

    if (isset($_REQUEST['eaid'])) {
        $eaid =$_REQUEST['eaid'];
        if ($noerror) {
            $sql = "UPDATE authors SET authorname = '$author' WHERE id ='$eaid'";
            $result = mysqli_query($conn, $sql);
                if($result){
                    ?>
                    <script>
                        window.location.replace("index.php?file=authors");
                    </script>
                    <?php
                }
        }
    } else {
        if ($noerror) {
            $sql = "INSERT INTO authors (authorname, creationdate) VALUES ('$author', '$creationdate')";
            $result = mysqli_query($conn, $sql);
            if($result){
                ?>
                <script>
                    window.location.replace("index.php?file=authors");
                </script>
                <?php       
            }
        }
    }
}
if (isset($_REQUEST['daid'])) {
    $daid = $_REQUEST['daid'];
    $sql = "DELETE FROM authors WHERE id = '$daid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        ?>
        <script>
            window.location.replace("index.php?file=authors");
        </script>
        <?php       
    }
}
if (isset($_REQUEST['eaid'])) {
    $eaid = $_REQUEST['eaid'];
    $sql = "SELECT * FROM authors WHERE id='$eaid'";
    $result = mysqli_query($conn, $sql);
    $cedit = mysqli_fetch_assoc($result);

}

?>

<!-- Single pro tab re -->
<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                            <?php
                                if (isset($_REQUEST['eaid'])) {
                                   echo "<li class='active'><h3>Update Author</h3></li>";
                                } else {
                                   echo "<li class='active'><h3>Add Author</h3></li>";
                                }
                                ?>
                                
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
                                                                    <input name="author" type="text" class="form-control" placeholder="Author Name" value="<?php echo !empty($cedit['authorname'])?$cedit['authorname']:"$author"; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorauthor"; ?></span>
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