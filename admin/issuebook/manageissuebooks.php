<?php
    $message="";
    if (isset($_REQUEST['issuebook'])) {
        $issuebook = $_REQUEST['issuebook'];
        $sql = "SELECT i.id as iid, b.id as bid, u.id as uid, i.email as iemail, u.email as uemail, u.firstname, u.lastname, u.email, b.bookname, b.isbn, i.bookid, i.email, i.issuedate, i.returndate,i.returnstatus, i.fine FROM issuedbooks i INNER JOIN books b ON i.bookid=b.id INNER JOIN users u ON i.email=u.email WHERE bookname LIKE '%$issuebook%' OR firstname LIKE '%$issuebook%' OR lastname LIKE '%$issuebook%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0) {
            $message = "Record not found";
        }
    } else {
        
        $sql = "SELECT i.id as iid, b.id as bid, u.id as uid, i.email as iemail, u.email as uemail, u.firstname, u.lastname, u.email, b.bookname, b.isbn, i.bookid, i.email, i.issuedate, i.returndate,i.returnstatus, i.fine FROM issuedbooks i INNER JOIN books b ON i.bookid=b.id INNER JOIN users u ON i.email=u.email";
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
                                                <input type="text" name="issuebook" placeholder="Search..." class="search-int form-control">
                                                <a href="index.php?issuebook=<?php echo $_REQUEST['name']; ?>"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
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
                                    <h1>Issued Books</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>  
                                                <th>#</th>                                                
                                                <th>User Name</th>
                                                <th>Book Name</th>
                                                <th>ISBN</th>
                                                <th>Issued Date</th>
                                                <th>Return Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while ($data = mysqli_fetch_assoc($result)){
                                                static $no=1;
                                                $userfname = $data['firstname'];
                                                $userlname = $data['lastname'];
                                                $bookname = $data['bookname'];
                                                $isbn = $data['isbn'];
                                                $issuedate = $data['issuedate'];
                                                $returndate = $data['returndate'];
                                                                                  
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $userfname . " " . $userlname; ?></td>
                                                <td><?php echo $bookname; ?></td>
                                                <td><?php echo $isbn; ?></td>
                                                <td><?php echo $issuedate; ?></td>
                                                <td><?php if ($returndate==NULL) {
                                                    echo "-";
                                                } else {
                                                    echo $returndate;
                                                } ?></td>
                                                <td><a href="index.php?eiid=<?php echo $data['iid']; ?>" class="btn btn-warning">Edit</a></td>
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