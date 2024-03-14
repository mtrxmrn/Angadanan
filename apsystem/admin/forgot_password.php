<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-box {
        width: 1000px;
        margin: auto;
    }

    .login-box-msg {
        font-size: 30px;
    }

    .form-control {
        padding: 20px 20px;
    }

    #resetBtn {
        border: none;
        background-color: white;
        color: blue;
    }

</style>

<body class="hold-transition login-page">
    <div class="login-box">


        <div class="login-box-body">
            <p class="login-box-msg" style="font-weight: bold; color:black; font-size:xx-large;">Forgot Password</p>
            <p class="login-box-msg">Please enter your username or email to reset your password</p>
            <p class="login-box-msg" style="color:red;" id="noUserExist"></p>
            <form id="formData">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="input username or email" style="font-size: 25px;" id="inputField" autofocus>
                    <span class="glyphicon glyphicon-question-sign form-control-feedback"></span>
                    <input type="text" name="resendEmail" id="resendEmail" hidden>
                </div>
                <div class="row">
                    <div class="col-xs-8 col-sm-9">
                        <button type="submit" class="btn btn-primary btn-lg btn-blockt" name="login" id="submitBtn"><i class="fa fa-sign-in"></i> Reset</button>
                    </div>
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

    <?php include 'includes/scripts.php' ?>
    <script>
        let formData = '';
        document.querySelector('#formData').addEventListener('submit', (event) => {
            event.preventDefault();
            formData = $('#formData').serialize();
            $.ajax({
                type: 'POST',
                url: 'forgot_password_search.php',
                data: formData,
                success: (response) => {
                    document.querySelector('.login-box-body').innerHTML = `
                    <p class="login-box-msg" style="font-weight: bold; color:black; font-size:xx-large;">Password has been reset.</p>
                    <p class="login-box-msg">Please check your email to proceed to the next step of resetting your password</p>
                                <div class="form-group has-feedback">
                                    <button type="button" id="resetBtn" onclick="reSendEmail();">Didn't recieve a code? Click me!</button>

                                </div>
                            <div class="row">
                            </div>
                    `;
                },
                error: () => {
                    document.querySelector('#noUserExist').innerHTML = 'No Username or Email exist!';
                    $('#inputField').val('');
                }
            });
        });


        function reSendEmail() {
            let button = document.querySelector('#resetBtn');
            button.style.color = 'lightblue';
            button.disabled = true;
            $.ajax({
                type: 'POST',
                url: 'forgot_password_search.php',
                data: formData,
                success: (response) => {
                    console.log(formData);
                }
            })
            setTimeout(() => {
                button.disabled = false;
                button.style.color = 'blue';
            }, 7000);

        }
    </script>
</body>

</html>