<?php
$erroremail = $errorsub = $errormsg = "";
$mail = $sub = $msg = "";
$id = $_SESSION['user'];
if (isset($_REQUEST['send'])) {
    $mail = trim($_REQUEST['mail']);
    $sub = trim($_REQUEST['sub']);
    $msg = trim($_REQUEST['msg']);
    $noerror = true;
    
    if(empty($mail)) {
        $erroremail = "Enter Email Id";
        $noerror = false;
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $erroremail = "Invalid Email Id";
        $noerror = false;
    }
    if(empty($sub)) {
        $errorsub = "Enter Subject";
        $noerror = false;
    }
    if(empty($msg)) {
        $errormsg = "Enter Message";
        $noerror = false;
    }


    if ($noerror) {
        $to = "jarvisapollo23@gmail.com";
        if(mail($to, $sub, $msg, $mail)); {
            ?>
            <script>
                window.location.replace("index.php");
            </script>
            <?php
        }
    }
}
?>

<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Contact Us</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="email">Email Id <span class="text-danger">*</span></label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email" value="" name="mail" id="emailid" class="form-control">
                                <span class="text-danger"><?php echo $erroremail; ?></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="subject">Subject <span class="text-danger">*</span></label>
                                <input type="text" title="Please enter your subject" placeholder="Subject" value="" name="sub" id="subject" class="form-control">
                                <span class="text-danger"><?php echo $errorsub; ?></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="message">Message <span class="text-danger">*</span></label>
                                <!--<textarea rows="4" cols="50" title="Enter your message" placeholder="Enter your message..." value="" name="message" id="message" class="form-control">-->
                                <textarea name="msg" id="" cols="30" rows="10"></textarea>
                                <span class="text-danger"><?php echo $errormsg; ?></span>
                            </div>
                            
                            <button class="btn btn-success btn-block loginbtn" name="send">Send Message</button>
                           
                        </form>
                    </div>
                </div>
			</div>
        </div>
    </div>