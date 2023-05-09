<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apoointments";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$time = mysqli_real_escape_string($conn, $_POST['time']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$treatment = mysqli_real_escape_string($conn, $_POST['treatment']);

// Attempt insert query execution
$sql = "INSERT INTO appointments(Name, Email, Phone_Number, Date, Time, Gender, Treatment) VALUES ('$name', '$email', '$phone', '$date', '$time', '$gender', '$treatment')";
if(mysqli_query($conn, $sql)){
    echo "Appointment booked successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
