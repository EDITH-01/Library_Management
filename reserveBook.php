<?php
// Connect to the database
$servername = "localhost";
$username = "root";  // Update with your database username
$password = "";      // Update with your database password
$dbname = "library_db";  // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$book_id = $_POST['book_id'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$reservation_date = $_POST['reservation_date'];

// Check if the book is already reserved
$check_sql = "SELECT * FROM reservations WHERE book_id='$book_id'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    echo "Sorry, this book is already reserved.";
} else {
    // Insert the reservation into the database
    $sql = "INSERT INTO reservations (book_id, user_name, user_email, reservation_date) VALUES ('$book_id', '$user_name', '$user_email', '$reservation_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Book reserved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
