<?php 
$servername = "localhost";  
$username = "root"; 
$password = "";  
$database = "library";  

$con = mysqli_connect($servername, $username, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve chefs from the database
$sql = "SELECT * FROM chef";
$result = mysqli_query($con, $sql);

// Check if there are any chefs
if (mysqli_num_rows($result) > 0) {
    
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chefs</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/add-chef.css">
        <style>
            .chef-card {
                margin-bottom: 20px;
                padding: 20px;
                border-radius: 10px;
                width: 300px; /* Set width to 200px */
            }
            .pink-bg {
                background-color: #ffc0cb;
            }
            .white-bg {
                background-color: #ffffff;
            }
           
        </style>
    </head>
    <body>
        <div class="container">
        
        <br>
    
            '
            ;
    $counter = 0; 
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $details = $row['details'];
        $expertise = $row['expertise'];
        
        $bg_class = ($counter % 2 == 0) ? 'pink-bg' : 'white-bg';
        
        echo '<div class="row ' . $bg_class . ' chef-card">
                <div class="col">
                    <h3>Name: ' . $name . '</h3>
                    <p>Details: ' . $details . '</p>
                    <p>Expertise: ' . $expertise . '</p>
                </div>
              </div>';
        
        $counter++; // Increment counter
    }
    
    echo '</div></body></html>';
} else {
    echo "No chefs found.";
}

mysqli_close($con);  
?>

