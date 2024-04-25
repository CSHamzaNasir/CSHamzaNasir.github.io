
<?php
$servername = "localhost";  
$username = "root"; 
$password = "";  
$database = "library"; 

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("error" . mysqli_connect_error());
}

$sql = "SELECT * FROM users"; // Assuming your table name is 'users'
$result = mysqli_query($conn, $sql);

// Check if there are any records in the database
if (mysqli_num_rows($result) > 0) {
    echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Data</title>
        <style>
            body {
                background-color: #151529;
                color: white;
            }
            .container {
                margin: 50px auto;
                max-width: 800px;
            }
            .table {
                width: 100%;
            }
            .table th, .table td {
                border: 1px solid grey;
                padding: 8px;
                text-align: left;
            }
            .table th {
                background-color: black;
                color: white;
            }
        </style>
    </head>
    
    <body>';
    
    echo '<div class="container">';
    echo '<h1 class="text-center">User Data</h1>';
    
    // Display user data in a table with black and grey styling
    echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Date Created</th>
                </tr>
            </thead>
            <tbody>';
    
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . $row["uname"] . '</td>
                <td>' . $row["password"] . '</td>
                <td>' . $row["date"] . '</td>
              </tr>';
    }
    echo '</tbody></table>';
    echo '</div>';
    echo '</body></html>';
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
