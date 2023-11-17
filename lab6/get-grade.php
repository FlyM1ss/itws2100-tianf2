<?php
$servername = "localhost";
$username = "root";
$password = "TeamSixteen16";
$dbname = "lab6";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch grades from the database
$sql = "SELECT rin, grade FROM grades";
$result = $connection->query($sql);

// Start the table
echo '<table>';
echo '<tr><th>RIN</th><th>Grade</th></tr>';

$sum = 0;
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row["rin"] . '</td><td>' . $row["grade"] . '</td></tr>';
        $sum += $row["grade"];
    }
    // Display the sum of all grades
    echo '<tr><td>Sum</td><td>' . $sum . '</td></tr>';
} else {
    echo '<tr><td colspan="2">No grades found</td></tr>';
}

// End the table
echo '</table>';

// Close connection
$connection->close();
?>
