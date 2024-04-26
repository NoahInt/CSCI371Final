<?php
session_start();

// Include the database connection file
require 'db.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assign the POST data to variables
    $userId = $_SESSION['userID']; // The user's ID, from the session
    $dogId = $_POST['dogId']; // The dog's ID, from the hidden form field
    $adoptionStatus = $_POST['adoptionStatus']; // The adoption status, from the hidden form field
    $historyNote = $_POST['historyNote']; // The history note, from the textarea
    
    // Prepare the SQL statement
    $sql = "INSERT INTO History (AdoptionDate, AdoptionStatus, HistoryNote, Dogtable_DogID, UserTable_UserID) VALUES (NOW(), ?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $adoptionStatus, $historyNote, $dogId, $userId);
    
    // Attempt to execute the statement
    if ($stmt->execute()) {
        echo "Adoption request submitted successfully.";
        // Here, you might want to redirect or display a success message
    } else {
        echo "Error: " . $stmt->error;
        // Handle errors, possibly return to the form with an error message
    }
    
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
