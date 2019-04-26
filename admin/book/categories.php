<?php
    $message="";
    if (isset($_REQUEST['ttl'])) {
        $name = $_REQUEST['ttl'];
        $sql = "SELECT * FROM categories WHERE title LIKE '%$name%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0) {
            $message = "Record not found";
        }
    } else {
        $sql = "SELECT * FROM categories";
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
                                                <input type="text" name="ttl" placeholder="Search..." class="search-int form-control">
                                                <a href="index.php?ttl=<?php echo $_REQUEST['ttl']; ?>"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            
                                            <li><a href="index.php?file=categoryopr" class="btn btn-primary">Add Categories</a>
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
                                    <h1>Categories Listing</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>  
                                                <th>#</th>                                                
                                                <th>Categories</th>
                                                <th>Status</th>
                                                <th>Creation Date</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while ($data = mysqli_fetch_assoc($result)){
                                                static $no=1;
                                                $title = $data['title'];
                                                $status = $data['status'];
                                                $creationdate = $data['creationdate'];
                                    
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $title; ?></td>
                                                <td><?php if ($status == 'active') { ?>
                                                    <button class="btn btn-primary"> Active</button>
                                                    <?php } else { ?>
                                                    <button class="btn btn-danger"> Inactive</button>

                                               <?php } ?></td>
                                               <td><?php echo $creationdate; ?></td>
                                                <td><a href="index.php?ecid=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a></td>
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