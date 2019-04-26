<?php
  include('admin/include/config.php');
  include('admin/include/dbcon.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Library Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo aimg; ?>favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>owl.carousel.css">
    <link rel="stylesheet" href="<?php echo acss; ?>owl.theme.css">
    <link rel="stylesheet" href="<?php echo acss; ?>owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo acss; ?>metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo acss; ?>calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="admin/assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo acss; ?>responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo ajs; ?>vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    
    <?php
        if (isset($_REQUEST['file'])) {
            if ($_REQUEST['file'] == "aindex") {
                header("location:admin/index.php");
            } elseif ($_REQUEST['file'] !== "aindex" && $_REQUEST['file'] !== "signup") {
                $userid = $_REQUEST['file'];
                header("location:users/index.php?userid=$userid");
            } elseif ($_REQUEST['file'] == "signup") {
                $userid = $_REQUEST['file'];
                include("signup.php");
            } 
        }else {
            include("login.php");
        }
  
    ?>  
</body>

</html>