<?php
    $servername = "localhost";
    $username = "root";  // default XAMPP username, change if different
    $password = "";      // default XAMPP password, change if different
    $dbname = "Robot_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Extract task details from the POST data
        $move = $_POST['move'];

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO movments (move ) VALUES (?)");
        $stmt->bind_param("s", $move);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $stmt->error]);
        }
    } else {
        http_response_code(405);  // Method Not Allowed
    }
?>