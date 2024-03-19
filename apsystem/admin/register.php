<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="../dist/css/register.css">

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <!--font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&family=Noto+Sans:wght@300&family=Roboto+Condensed&family=Roboto:wght@300&display=swap" rel="stylesheet">

    <body class="bg-color">
      
        <main class="container-fluid d-flex justify-content-center custom-font">
            <div class="background-register rounded mt-top"> <!--background-for registration-->
            <div class="p-5 "> <!--for element of h1 and input-->
            <div class="custom-font"> <!--For h1-->
                <h1>Registration</h1>
            </div>
            <form action="#" method="post">
            <div class="row"> 
            <div class="col-lg-6 col-sm-6 p-3">
                <label class="mt-2" for="fname">Full Name</label><br>
                <input class="rounded border p-1 mt-1" type="text" placeholder="Enter your name"><br>

                <label class="mt-2" for="email">Email</label><br>
                <input class="rounded border p-1 mt-1" type="email" placeholder="Enter your email" required><br>

                <label class="mt-2" for="password">Password</label><br>
                <input class="rounded border p-1 mt-1" type="password" placeholder="Enter your password" required><br>
            </div>
            <div class="col-lg-6 col-sm-6 p-3">
                <label class="mt-2" for="Username">User Name</label><br>
                <input class="rounded border p-1 mt-1" type="text" placeholder="Enter your username"><br>

                <label class="mt-2" for="pNumber">Phone Number</label><br>
                <input class="rounded border p-1 mt-1" type="number" placeholder="Enter your phone number" required><br>
                
                <label class="mt-2" for="confirmpassword">Confirm Password</label><br>
                <input class="rounded border p-1 mt-1" type="password" placeholder="Confirm password" required>
            </div>
            <div class="mt-5 text-center">
                <input class="bttn bg-color border text-white" type="submit" value="Register" >
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
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
