<?php
session_start();
require 'includes/conn.php';
if (isset($_SESSION['admin'])) {
    header('location:home.php');
}

$_SESSION['token'] = $_GET['token'];


?>
<?php include 'includes/header.php';
if (isset($_SESSION['token'])) {
    $stmt = $conn->prepare("SELECT token FROM forgot_password WHERE token = ?");
    $stmt->bind_param("s", $_SESSION['token']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // No matching token found
        header('Location: forgot_password_notFound.php');
        exit; // Stop execution after redirection
    }
}

?>
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

    .labels {
        font-size: large;
    }

    #eye-close-pass {
        cursor: pointer;
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">


        <div class="login-box-body">
            <p class="login-box-msg" style="font-weight: bold; color:black; font-size:xx-large;">Change password</p>
            <p class="login-box-msg">Please enter your new password</p>
            <p class="login-box-msg" style="color:red;" id="noUserExist"></p>

            <form id="forgotPassData">
                <div class="form-group has-feedback">
                    <label for="password" class="labels">New Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Input password" style="font-size: 25px;" id="password" autofocus>
                    <span id="eye-close-pass" class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="confirmPassword" class="labels">Confirm new password</label>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" style="font-size: 25px;" id="confirmPassword" autofocus>
                    <span id="eye-close" class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8 col-sm-9">
                        <button type="submit" class="btn btn-primary btn-lg btn-blockt" name="login" id="submitBtn"><i class="fa fa-sign-in"></i> Reset</button>
                    </div>
                </div>
            </form>

        </div>
        <div class='callout callout-danger text-center mt20' hidden>
            <p id="mismatch"></p>
        </div>
    </div>

    <?php include 'includes/scripts.php' ?>
    <script>
        document.querySelector('#forgotPassData').addEventListener('submit', (event) => {
            event.preventDefault();
            let formData = $('#forgotPassData').serialize();
            $.ajax({
                type: 'POST',
                url: 'forgot_password_isSimilar.php',
                data: formData,
                success: (response) => {
                    document.querySelector('#mismatch').innerHTML = response;
                    alert("Password has changed!");
                   window.location.href = "index.php";
                },
                error: (xhr) => {
                    document.querySelector('#mismatch').innerHTML = xhr.responseText;
                    document.querySelector('.callout.callout-danger.text-center.mt20').removeAttribute('hidden');
                }
            })
        })
    </script>
</body>

</html>