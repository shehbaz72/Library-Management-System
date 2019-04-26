<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin']=='admin') {
    header('location: admin/index.php');
} elseif (isset($_SESSION['user'])) {
    header('location: users/index.php');
}
$errorusername = $errorpass = "";
    if (isset($_REQUEST['login'])) {
        $lurname = trim($_REQUEST['username']);
        $lpass = trim($_REQUEST['password']);
        $noerror = true;

        if (empty($lurname)) {
            $noerror = false;
            $errorusername = "Enter User Name"; 
        }
        if (empty($lpass)) {
            $noerror = false;
            $errorpass = "Enter Password"; 
        }
        if ($noerror) {
            $sql = "SELECT * FROM admin WHERE (username = '$lurname' OR adminemail = '$lurname') AND password = '$lpass'";
            $admin = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($admin)>=1) {
                $_SESSION['admin'] = 'admin';
                ?>
                <script>
                    window.location.replace("index.php?file=aindex");
                </script>
                <?php
            } else {
                $usql = "SELECT * FROM users WHERE email='$lurname' AND password='$lpass'";
                $user = mysqli_query($conn, $usql);
                
                if (mysqli_num_rows($user)>=1) {
    
                    $userdata = mysqli_fetch_assoc($user);
                    $status = $userdata['status'];
                    if ($status == 'inactive') {
                        ?>
                        <script>
                            alert("You are inactivated by admin!!!");
                        </script>
                        <?php 
                    } else {
                        $userid = $userdata['id'];
                        $_SESSION['user'] = $userid;
                        ?>
                        <script>
                            window.location.replace("index.php?file=<?php echo $userid; ?>");
                        </script>
                        <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("Invalid user name or password!!!");
                    </script>
                    <?php
                }
            }
        }
    }
?>

<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" value="" name="username" id="username" class="form-control">
                                <span class="text-danger"><?php echo $errorusername; ?></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" title="Please enter your password" placeholder="Password" value="" name="password" id="password" class="form-control">
                                <span class="text-danger"><?php echo $errorpass; ?></span>
                            </div>
                            
                            <button class="btn btn-success btn-block loginbtn" name="login">Login</button>
                            <a class="btn btn-default btn-block" href="index.php?file=signup">User Signup</a>
                        </form>
                    </div>
                </div>
			</div>
        </div>
    </div>