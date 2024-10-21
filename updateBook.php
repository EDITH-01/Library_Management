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

if (isset($_POST['update'])) {
    // Get form data for updating the book
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    // Update book data in the database
    $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', year='$year' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Book updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    // Get the ID of the book to delete
    $id = $_POST['id'];

    // Delete the book from the database
    $sql = "DELETE FROM books WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Book deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
