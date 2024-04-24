
<?php 
$servername = "localhost";  
$username = "root"; 
$password = "";  
$database = "library";  
 
$con = mysqli_connect($servername, $username, $password, $database);
 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
include "contact.php"; 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('New record inserted')</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);  
}
?>
