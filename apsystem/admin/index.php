<?php
session_start();
if (isset($_SESSION['admin'])) {
	header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>
<style>
	.login-box,
	.register-box {
		width: 360px;
		margin: 7% auto;
	}
</style>

<body class="bg-white"> 

<div class="container ">
    <div class="row mt">
    <div class="col-md-5 margin-top-image">
    <div class="text-center margin-image ">
        <img src="../dist/img/backgroundImage/attendance.jpg" alt="picture" class="img-responsive">
    </div>
    </div>
    <div class="col-md-7">
    <div class="login-box d-flex justify-content-center align-items-center ">
    <div class="login-logo color-admin">
        <b>Admin Login</b>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to Start Your Session</p>
    <form action="login.php" method="POST">
    <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
    <div class="col-xs-8 col-sm-9 ">
         <button type="submit" class="btn color-button text-white btn-md btn-flat " name="login"> Log In</button>
        <a href="forgot_password.php" class="ml-auto color-text-bttn ">Forgot password? Click here!</a>
    </div>
    </div>
    <hr>
    <div class="text-center">
        <button id= "modalregis" type="button" class="btn color-button"><a href="../admin/register.php" target="_blank"
        class="text-white">Create New Account</a></button>
    </div>
    </form>
    </div>

    <?php
    if (isset($_SESSION['error'])) {
        echo "
            <div class='callout callout-danger text-center mt20'>
                            <p>" . $_SESSION['error'] . "</p> 
            </div>
        ";
        unset($_SESSION['error']);
    }
    ?>
    </div>
    </div>
    </div>
    </div>
	<?php include 'includes/scripts.php' ?>

</body>

</html>