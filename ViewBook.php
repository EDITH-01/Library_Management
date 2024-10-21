<?php
// Connect to the database
$servername = "localhost";
$username = "root";  // Update with your database username
$password = "";      // Update with your database password
$dbname = "library_db";  // Update with your database name

// // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// // Get book ID from the form submission
// $bookId = $_POST['book_id'];  // Assuming the form input has the name "book_id"

// // Prepare and execute SQL query to retrieve the book
// $sql = "SELECT * FROM books WHERE id = '$bookId'";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "Title: " . $row["title"] . "<br>";
//         echo "Author: " . $row["author"] . "<br>";
//         echo "Genre: " . $row["genre"] . "<br>";
//         echo "Year: " . $row["year"] . "<br>";
//     }
// } else {
//     echo "No book found with ID: $bookId";
// }

// // Close connection
// $conn->close();
//----------------------------

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM books WHERE id = ?");
$stmt->bind_param("i", $bookId);  // "i" means the parameter is an integer

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if a book is found
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"] . "<br>";
        echo "Author: " . $row["author"] . "<br>";
        echo "Genre: " . $row["genre"] . "<br>";
        echo "Year: " . $row["year"] . "<br>";
    }
} else {
    echo "No book found with ID: $bookId";
}

// Close connection
$stmt->close();
$conn->close();
?>