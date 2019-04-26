<?php
$book = $isbn = $price = $Publishers = "";
$errorbook = $errorcategory = $errorauthor = $errorisbn = $errorprice = $errorPublishers = "";
if (isset($_REQUEST['submit'])) {
    $book = $_REQUEST['bookname'];
    $category = $_REQUEST['category'];
    $author = $_REQUEST['author'];
    $isbn = $_REQUEST['isbn'];
    $price = $_REQUEST['price'];
    $regdate = date("Y/m/d");
    $Publishers = $_REQUEST['Publishers'];
    $noerror = true;
    if (empty($book)) {
        $errorbook = "Enter Book Name";
        $noerror = false;
    }
    if (empty($category)) {
        $errorcategory = "Select Category";
        $noerror = false;
    }
    if (empty($author)) {
        $errorauthor = "Select Author";
        $noerror = false;
    }
    if (empty($Publishers)) {
        $errorPublishers = "Enter Publishers";
        $noerror = false;
    }
    if (empty($isbn)) {
        $errorisbn = "Enter ISBN Number";
        $noerror = false;
    }
    if (empty($price)){
        $errorprice = "Please enter price";
        $noerror = false;
    } elseif (!filter_var($price,FILTER_VALIDATE_FLOAT)) {
        $errorprice = "Enter valid price";
        $noerror = false;
    }

    if (isset($_REQUEST['ebid'])) {
        $ebid =$_REQUEST['ebid'];
        if ($noerror) {
            $sql = "UPDATE books SET bookname = '$book', category = '$category', author ='$author', publishers = '$Publishers', isbn = '$isbn', price = '$price' WHERE id ='$ebid'";
            $result = mysqli_query($conn, $sql);
                if($result){
                    ?>
                    <script>
                        window.location.replace("index.php?file=books");
                    </script>
                    <?php
                }
        }
    } else {
        if ($noerror) {
            $sql = "INSERT INTO books (bookname, category, author, publishers, isbn, price, regdate) VALUES ('$book', '$category', '$author', '$Publishers', '$isbn', '$price', '$regdate')";
            $result = mysqli_query($conn, $sql);
            if($result){
                ?>
                <script>
                    window.location.replace("index.php?file=books");
                </script>
                <?php       
            }
        }
    }
}
if (isset($_REQUEST['dbid'])) {
    $dbid = $_REQUEST['dbid'];
    $sql = "DELETE FROM books WHERE id = '$dbid'";
    $result = mysqli_query($conn, $sql);
    if($result){
        ?>
        <script>
            window.location.replace("index.php?file=books");
        </script>
        <?php       
    }
}
if (isset($_REQUEST['ebid'])) {
    $ebid = $_REQUEST['ebid'];
    $sql = "SELECT * FROM books WHERE id='$ebid'";
    $result = mysqli_query($conn, $sql);
    $edit = mysqli_fetch_assoc($result);

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
                                if (isset($_REQUEST['ebid'])) {
                                   echo "<li class='active'><h3>Update Book</h3></li>";
                                } else {
                                   echo "<li class='active'><h3>Add Book</h3></li>";
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
                                                                    <input name="bookname" type="text" class="form-control" placeholder="Book Name" value="<?php echo !empty($edit['bookname'])?$edit['bookname']:"$book"; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorbook"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="category" class="form-control" >
                                                                        <option value="">select category</option>
                                                                        <?php    
                                                                        $sql = "SELECT * FROM categories WHERE status='active'";
                                                                        $result = mysqli_query($conn, $sql);
                                                                        $rows = mysqli_num_rows($result);
                                                                        while ($category = mysqli_fetch_assoc($result)){                                  
                                                                        ?>
                                                                            <option value ="<?php echo $category['id']; ?>" <?php if (!empty($edit['category']) && $edit['category'] == $category['id'] ){ echo "selected"; } ?>><?php echo $category['title'];  ?></option>        
                                                                        <?php } ?>
                                                                    </select>
                                                                    <span class="text-danger"><?php echo "$errorcategory"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="author" class="form-control" >
                                                                    <option value="">select author</option>
                                                                    <?php    
                                                                        $sql = "SELECT * FROM authors";
                                                                        $result = mysqli_query($conn, $sql);
                                                                        $rows = mysqli_num_rows($result);
                                                                        while ($author = mysqli_fetch_assoc($result)){                                  
                                                                    ?>
                                                                            <option value ="<?php echo $author['id']; ?>" <?php if (!empty($edit['author']) && $edit['author'] == $author['id'] ){ echo "selected"; } ?>><?php echo $author['authorname'];  ?></option>        
                                                                        <?php } ?>
                                                                        </select>
                                                                        <span class="text-danger"><?php echo "$errorauthor"; ?></span>
                                                                </div>  
                                                                <div class="form-group">
                                                                    <input name="Publishers" type="text" class="form-control" placeholder="Publishers" value="<?php echo !empty($edit['publishers'])?$edit['publishers']:"$Publishers"; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorPublishers"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="isbn" type="number" class="form-control" placeholder="ISBN Number" value="<?php echo !empty($edit['isbn'])?$edit['isbn']:"$isbn"; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorisbn"; ?></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="price" type="text" class="form-control" placeholder="Book Price" value="<?php echo !empty($edit['price'])?$edit['price']:"$price"; ?>">
                                                                    <span class="text-danger" id="validation"><?php echo "$errorprice"; ?></span>
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