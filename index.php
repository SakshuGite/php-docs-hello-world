<?php
session_start();
$conn = new mysqli("your-mysql-server.mysql.database.azure.com", "adminuser", "StrongPass@123", "student_portal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h2>Welcome to Student Portal</h2>";

$sql = "SELECT name, email FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No students found.";
}

$conn->close();
?>
