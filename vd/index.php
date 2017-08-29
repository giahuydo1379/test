<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db549595537";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT DISTINCT OC.category_id,`name`,image
FROM oc_category OC, oc_category_description OD
WHERE OC.category_id  = OD.category_id;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID : " . $row["category_id"]." - Name : ".$row["name"]. " - Image : " . $row["image"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
