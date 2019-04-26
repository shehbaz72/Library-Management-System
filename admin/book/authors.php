<?php
    $message="";
    if (isset($_REQUEST['athr'])) {
        $athr = $_REQUEST['athr'];
        $sql = "SELECT * FROM authors WHERE authorname LIKE '%$athr%'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0) {
            $message = "Record not found";
        }
    } else {
        $sql = "SELECT * FROM authors";
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
                                                <input type="text" name="athr" placeholder="Search..." class="search-int form-control">
                                                <a href="index.php?athr=<?php echo $_REQUEST['athr']; ?>"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            
                                            <li><a href="index.php?file=authoropr" class="btn btn-primary">Add Author</a>
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
                                    <h1>Authors Listing</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>  
                                                <th>#</th>                                                
                                                <th>Authors</th>
                                                <th>Creation Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while ($data = mysqli_fetch_assoc($result)){
                                                static $no=1;
                                                $author = $data['authorname'];
                                                $creationdate = $data['creationdate'];
                                    
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $author; ?></td>
                                               <td><?php echo $creationdate; ?></td>
                                                <td><a href="index.php?eaid=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a><a href="index.php?daid=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger">Delete</a></td>
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