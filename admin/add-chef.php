
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/add-chef.css">
   
</head>

<body>
    <br>
    <br>
    <br>
    <h2>
        Add Chef
    </h2>
    <center>
        <form action="chef-connect.php" method="post">
            <table border="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" placeholder="Enter Chef name" required></td>
                </tr>
                <tr>
                    <td>Details</td>
                    <td><input type="text" name="details" placeholder="Enter Details" required></td>
                </tr>
                <tr>
                    <td>Expertise</td>
                    <td><input type="text" name="expertise" placeholder="Enter Chef Expertise" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>