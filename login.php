<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("components/dbconnect.php");
    $user = $_POST["user"];
    $pasword = $_POST["pasword"];    
    $sql = "SELECT * FROM users WHERE uname = '$user' AND password = '$pasword'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] == true;
            $_SESSION['username'] == $username;
            header("location: index.php");
        }
        else {
            $showError = "Invalid credentials";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
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
    <?php if ($login) {
        echo '<div class="alert alert-success" role="alert">You are logged-in</div>';
    } ?>
    <?php if ($showError) {
        echo '<div class="alert alert-danger" role="alert">Password do not match
        </div>';
    } ?>    <br>
    <br>
    <br>
    <h1 class="text-center">Sign in to the website</h1> <br>
    <br>
    <br>
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="card">
            <div class="card-body">

                <form action="login.php" method="post" autocomplete="off">
                    <div class="mb-3 col-md-15">
                        <label for="username" class="form-label">User name</label>
                        <input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp"
                            autocomplete="off">
                    </div>
                    <div class="mb-3 col-md-15">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pasword" name="pasword" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-secondary">Login</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>