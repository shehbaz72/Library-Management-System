<?php
    $message="";
    if (isset($_REQUEST['name'])) {
        $name = $_REQUEST['name'];
        $sql = "SELECT * FROM users WHERE firstname LIKE '%$name%' OR lastname LIKE '%$name%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0) {
            $message = "Record not found";
        }
    } else {
        $sql = "SELECT * FROM users";
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
                                                <input type="text" name="name" placeholder="Search..." class="search-int form-control">
                                                <a href="index.php?name=<?php echo $_REQUEST['name']; ?>"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            
                                            <li><a href="index.php?file=useropr" class="btn btn-primary">Add User</a>
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
                                    <h1>Registered User</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>  
                                                <th>#</th>                                                
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email Id</th>
                                                <th>Mobile Number</th>
                                                <th>Reg Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while ($data = mysqli_fetch_assoc($result)){
                                                static $no=1;
                                                $fname = $data['firstname'];
                                                $lname = $data['lastname'];
                                                $email = $data['email'];
                                                $mobile = $data['mobile'];
                                                $regdate = $data['regdate'];
                                                $status = $data['status'];
                                    
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $fname; ?></td>
                                                <td><?php echo $lname; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $mobile; ?></td>
                                                <td><?php echo $regdate; ?></td>
                                                <td><?php echo $status; ?></td>
                                                <td><?php if ($status == 'active') { ?>
                                                    <a href="index.php?sid=<?php echo $data['id'];?>" onclick="return confirm('Are you sure you want to inactive this user?');"><button class="btn btn-danger"> Inactive</button></a>
                                                    <?php } else { ?>
                                                        <a href="index.php?sid=<?php echo $data['id'];?>" onclick="return confirm('Are you sure you want to active this user?');"><button class="btn btn-primary"> Active</button></a>

                                               <?php } ?></td>
                                                <td><a href="index.php?eid=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a></td>
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