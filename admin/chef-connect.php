
<?php 
$servername = "localhost";  
$username = "root"; 
$password = "";  
$database = "library";  
 
$con = mysqli_connect($servername, $username, $password, $database);
 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $details = $_POST['details'];
    $expertise = $_POST['expertise']; 
    
    $sql = "INSERT INTO chef (name, details, expertise) VALUES ('$name', '$details', '$expertise')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('New Chef inserted')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);  
}
?>
