<?php
$message="";
$uid = $_SESSION['user'];
$user = "SELECT * FROM users WHERE id='$uid'";
$query = mysqli_query($conn, $user);
$udata = mysqli_fetch_assoc($query);
$uemail = $udata['email'];

    $sql = "SELECT i.id as iid, b.id as bid, u.id as uid, i.email as iemail, u.email as uemail, u.firstname, u.lastname, u.email, b.bookname, b.isbn, i.bookid, i.email, i.issuedate, i.returndate,i.returnstatus, i.fine FROM issuedbooks i INNER JOIN books b ON i.bookid=b.id INNER JOIN users u ON i.email=u.email WHERE i.email='$uemail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==0) {
        $message = "Record not found";
    }

?>           
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
                                                <th>Book Name</th>
                                                <th>ISBN</th>
                                                <th>Issued Date</th>
                                                <th>Return Date</th>
                                                <th>Fine (in rupees)</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while ($data = mysqli_fetch_assoc($result)){
                                                static $no=1;
                                                $bookname = $data['bookname'];
                                                $isbn = $data['isbn'];
                                                $issuedate = $data['issuedate'];
                                                $returndate = $data['returndate'];
                                                $fine = $data['fine'];
                                                                                  
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $bookname; ?></td>
                                                <td><?php echo $isbn; ?></td>
                                                <td><?php echo $issuedate; ?></td>
                                                <td><?php if ($returndate==NULL) {
                                                    echo "<span class='text-danger'> Not Return Yet</span>";
                                                } else {
                                                    echo $returndate;
                                                } ?></td>

                                                <td><?php echo $fine; ?></td>
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