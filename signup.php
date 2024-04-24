<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $user = $_POST["user"];
    $pasword = $_POST["pasword"];
    $confirmpassword = $_POST["confirmpassword"];
    $exist = false;
    if ($pasword == $confirmpassword && $exist == false) {
        include("components/dbconnect.php");
        $sql = "INSERT INTO `users` (`uname`, `password`, `date`) VALUES ('$user', '$pasword', CURRENT_DATE());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    }
    else {
        $showError = "password do not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body {
        background-color: pink;
    }

    h1 {
        color: #3e606b;
        font-family: "Playfair Display", serif;
    }
    </style>
</head>

<body>
    <?php include("components/nav.php"); ?>
    <?php if ($showAlert) {
        echo '<div class="alert alert-success" role="alert">Success—Your Account is created now</div>';
    } ?>
    <?php if ($showError) {
        echo '<div class="alert alert-danger" role="alert">Password do not match</div>';
    } ?>
        <h1 class="text-center">Sign up to the website</h1>
        <br>
        <br>
        <br>
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="card">
            <div class="card-body">
                <form action="signup.php" method="post">
                    <div class="mb-3 col-md-15">
                        <label for="username" class="form-label">User name</label>
                        <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-md-15">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pasword" name="pasword">
                    </div>
                    <div class="mb-3 col-md-15">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
                        <div id="emailHelp" class="form-text">Make sure to match the same password</div>
                    </div>
                    <button type="submit" class="btn btn-secondary">Sign-up</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>