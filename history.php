<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to view the chat history.");
}
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat History - NolanAI</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        
        h2 {
            color: #00ff00;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        
        th {
            background-color: #1a1a1a;
            color: #00ff00;
        }
        
        tr:hover {
            background-color: #1a1a1a;
        }
        
        a {
            color: #00ff00;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    $sql = "SELECT * FROM user_conversations WHERE user_id = ? ORDER BY created_at DESC";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Your Chat History</h2>";
            echo "<table>";
            echo "<tr>
                    <th>Prompt</th>
                    <th>Response</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['prompt']) . "</td>
                        <td>" . htmlspecialchars($row['response']) . "</td>
                        <td>" . date('M d, Y H:i', strtotime($row['created_at'])) . "</td>
                        <td>
                            <a href='?edit=" . $row['id'] . "'>Edit</a> | 
                            <a href='?continue=" . $row['id'] . "'>Continue</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No chat history found.</p>";
        }
        $stmt->close();
    } else {
        die("Error preparing the SQL statement: " . $conn->error);
    }
    $conn->close();
    ?>
</body>
</html>