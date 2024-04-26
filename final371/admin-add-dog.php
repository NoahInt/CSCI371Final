
<?php
session_start();
require 'db.php';  // Include your database connection

// Redirect if not logged in or if the user is not an admin.
if (!isset($_SESSION['loggedin']) || $_SESSION['userType'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect post data and sanitize
    $dogName = $conn->real_escape_string($_POST['dogName']);
    $dogBreed = $conn->real_escape_string($_POST['dogBreed']);
    // Continue for all form fields...

    // Prepare an insert statement
    $sql = "INSERT INTO Dogtable (DogName, DogBreed, DogSex, DogAge, DogColor, DogSize, DogDescription, DogMedical) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssissss", $dogName, $dogBreed, $dogSex, $dogAge, $dogColor, $dogSize, $dogDescription, $dogMedical);
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $message = "Dog added successfully.";
        } else {
            $message = "Error: " . $stmt->error;
        }
        
        // Close statement
        $stmt->close();
    } else {
        $message = "Error preparing statement: " . $conn->error;
    }
    
    // Close connection
    $conn->close();
}

// Include the header
include 'admin_header.php';
?>

<div class="container mt-4">
    <h1>Add a New Dog</h1>
    <?php if ($message): ?>
        <div class="alert <?= strpos($message, 'successfully') ? 'alert-success' : 'alert-danger' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form action="admin-add-dog.php" method="post">
        <div class="mb-3">
            <label for="dogName" class="form-label">Dog Name</label>
            <input type="text" class="form-control" id="dogName" name="dogName" required>
        </div>
        
            <div class="mb-3">
                <label for="dogBreed" class="form-label">Dog Breed</label>
                <input type="text" class="form-control" id="dogBreed" name="dogBreed" required>
            </div>
            <div class="mb-3">
                <label for="dogSex" class="form-label">Dog Sex</label>
                <input type="text" class="form-control" id="dogSex" name="dogSex" required>
            </div>
            <div class="mb-3">
                <label for="dogAge" class="form-label">Dog Age</label>
                <input type="text" class="form-control" id="dogAge" name="dogAge" required>
            </div>
            <div class="mb-3">
                <label for="dogColor" class="form-label">Dog Color</label>
                <input type="text" class="form-control" id="dogColor" name="dogColor" required>
            </div>
            <div class="mb-3">
                <label for="dogSize" class="form-label">Dog Size</label>
                <input type="text" class="form-control" id="dogSize" name="dogSize" required>
            </div>
            <div class="mb-3">
                <label for="dogDescription" class="form-label">Dog Description</label>
                <input type="text" class="form-control" id="dogDescription" name="dogDescription" required>
            </div>
            <div class="mb-3">
                <label for="dogMedical" class="form-label">Dog Medical</label>
                <input type="text" class="form-control" id="dogMedical" name="dogMedical" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Dog</button>
        </form>
    </div>
   

<?php
include 'admin_footer.php';
?>

























