<?php
$title = $cstatus = "";
$errortitle = "";
if (isset($_REQUEST['submit'])) {
    $title = $_REQUEST['title'];
    $cstatus = $_REQUEST['cstatus'];
    $creationdate = date("Y/m/d");
    $noerror = true;
    if (empty($title)) {
        $errortitle = "Enter Category Name";
        $noerror = false;
    }

    if (isset($_REQUEST['ecid'])) {
        $ecid =$_REQUEST['ecid'];
        if ($noerror) {
            $sql = "UPDATE categories SET title = '$title', status = '$cstatus' WHERE id ='$ecid'";
            $result = mysqli_query($conn, $sql);
            
                if($result){
                    ?>
                    <script>
                        window.location.replace("index.php?file=categories");
                    </script>
                    <?php
                }
        }
    } else {
        if ($noerror) {
            $sql = "INSERT INTO categories (title, status, creationdate) VALUES ('$title', '$cstatus', '$creationdate')";
            $result = mysqli_query($conn, $sql);
            if($result){
                ?>
                <script>
                    window.location.replace("index.php?file=categories");
                </script>
                <?php       
            }
        }
    }
}
if (isset($_REQUEST['ecid'])) {
    $ecid = $_REQUEST['ecid'];
    $sql = "SELECT * FROM categories WHERE id='$ecid'";
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
                                if (isset($_REQUEST['ecid'])) {
                                   echo "<li class='active'><h3>Update Category</h3></li>";
                                } else {
                                   echo "<li class='active'><h3>Add Category</h3></li>";
                                }
                                ?>
                                
                            </ul>
                            <form method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="title" type="text" class="form-control" placeholder="Category Name" value="<?php echo !empty($cedit['title'])?$cedit['title']:"$title"; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errortitle"; ?></span>
                                                                </div>
                                                                <br>
                                                                <div class="form-group">
                                                                <label for="input1" class="col-sm-2 control-label">Status</label> <br><br>
                                                                    <label>
                                                                        <input type="radio" name="cstatus" id="optionsRadios1" value="active" <?php if(!empty($cedit['status']) && $cedit['status']=='active'){ echo "checked";} elseif(!empty($cstatus) && $cstatus=='active'){ echo "checked";} else{ echo "checked"; } ?>>Active
                                                                    </label>
                                                                    <label>
                                                                        <input type="radio" name="cstatus" id="optionsRaadios1" value="inactive" <?php if(!empty($cedit['status']) && $cedit['status']=='inactive'){ echo "checked";} elseif(!empty($cstatus) && $cstatus=='inactive'){ echo "checked";} ?>>Inactive
                                                                    </label>
                                                                    
                                                                </div>
                        
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <input type="submit" name="submit" class="btn btn-primary">
                                                                </div>
                                                            </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        
                        </div>
                    </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>