<?php
    $message="";
    if (isset($_REQUEST['bk'])) {
        $bk = $_REQUEST['bk'];
        $sql = "SELECT b.id as bid, c.id as cid, a.id as aid, b.bookname, b.category, b.author, b.publishers, b.isbn, b.price, c.title, a.authorname FROM books b INNER JOIN categories c ON c.id=b.category INNER JOIN authors a ON a.id=b.author WHERE bookname LIKE '%$bk%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0) {
            $message = "Record not found";
        }
    } else {
        
        $sql = "SELECT b.id as bid, c.id as cid, a.id as aid, b.bookname, b.category, b.author, b.publishers, b.isbn, b.price, c.title, a.authorname FROM books b INNER JOIN categories c ON c.id=b.category INNER JOIN authors a ON a.id=b.author";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0) {
            $message = "Record not found";
        }
    }
?>
 <!-- Mobile Menu end -->
 <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" name="bk" placeholder="Search..." class="search-int form-control">
                                                <a href="index.php?bk=<?php echo $_REQUEST['bk']; ?>"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            
                                            <li><a href="index.php?file=bookopr" class="btn btn-primary">Add Book</a>
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
        
           
        <!-- Static Table Start -->
        <div class="static-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 pull-right">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Books Listing</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>  
                                                <th>#</th>                                                
                                                <th>Books Name</th>
                                                <th>Categories</th>
                                                <th>Authors</th>
                                                <th>Publishers</th>
                                                <th>ISBN</th>
                                                <th>Price</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <?php
                                            while ($data = mysqli_fetch_assoc($result)){
                                                static $no=1;
                                                $bookname = $data['bookname'];
                                                $category = $data['title'];
                                                $author = $data['authorname'];
                                                $Publishers = $data['publishers'];
                                                $isbn = $data['isbn'];
                                                $price = $data['price'];                                    
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $bookname; ?></td>
                                                <td><?php echo $category; ?></td>
                                                <td><?php echo $author; ?></td>
                                                <td><?php echo $Publishers; ?></td>
                                                <td><?php echo $isbn; ?></td>
                                                <td><?php echo $price; ?></td>
                                                <td><a href="index.php?ebid=<?php echo $data['bid']; ?>" class="btn btn-warning">Edit</a><a href="index.php?dbid=<?php echo $data['bid']; ?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                        </tbody>
                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>