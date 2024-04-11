<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../dist/css/register.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Noto+Sans:wght@300&family=Roboto+Condensed&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="bg-color">

    <main class="container-fluid d-flex justify-content-center custom-font">
    <?php
    if (isset($_SESSION['error'])) {
        echo '
            <div class="text-danger border position-absolute mt-5">
                ' . $_SESSION['error'] . '
            </div>
        ';
        unset($_SESSION['error']);
    }
?>

        <div class="background-register rounded mt-top"> <!--background-for registration-->
    
            <div class="p-5"> <!--for element of h1 and input-->
                <div class="custom-font text-center"> <!--For h1-->
                    <h1>Registration</h1>
                </div>
                <form action="register_process.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 p-3">
                            <label class="mt-2" for="fname">First Name</label><br>
                            <input class="rounded border p-1 mt-1" type="text" placeholder="Enter your name" name="fname" id="fname"><br>

                            <label class="mt-2" for="username">Username</label><br>
                            <input class="rounded border p-1 mt-1" type="text" placeholder="Enter your email" name="username" id="username" required><br>

                            <label class="mt-2" for="password">Password</label><br>
                            <input class="rounded border p-1 mt-1" type="password" placeholder="Enter your password" name="password" id="password" required><br>

                            <label class="mt-2" for="code">Code</label><br>
                            <input class="rounded border p-1 mt-1" type="text" placeholder="Enter the code" name="code" id="code" required>

                            <button type="button" class="bttn border text-white" onclick="sendCode();" id="codeBtn">Send</button>
                        </div>
                        <div class="col-lg-6 col-sm-6 p-3">
                            <label class="mt-2" for="lname">Last Name</label><br>
                            <input class="rounded border p-1 mt-1" type="text" placeholder="Enter your last name" name="lname" id="lname"><br>

                            <label class="mt-2" for="email">Email</label><br>
                            <input class="rounded border p-1 mt-1" type="email" placeholder="Enter your email" name="email" id="email" required><br>

                            <label class="mt-2" for="cpassword">Confirm Password</label><br>
                            <input class="rounded border p-1 mt-1" type="password" placeholder="Confirm password" name="cpassword" id="cpassword" required>
                        </div>


                        <div class="mt-5 text-center">
                            <input class="bttn  border text-white" type="submit" value="Register">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script>
        function sendCode() {
            const button = document.querySelector('#codeBtn');
            button.disabled = true;
            let countdown = 60;
            let countdownInterval = setInterval(() => {
                if (countdown > 0) {
                    button.innerHTML = countdown--;
                    console.log(countdown);
                } else {
                    clearInterval(countdownInterval);
                    button.innerHTML = 'Re-send Code';
                }
            }, 1000);
            setTimeout(() => {
                button.disabled = false;
            }, 60000);
            $.ajax({
                url: 'register_code.php',
                success: (response) => {
                    console.log(response);
                }
            });
        }
    </script>
</body>

</html>