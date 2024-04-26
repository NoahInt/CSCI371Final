<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'db.php'; // Database connection file
require_once 'header.php'; // Include the header

// Fetch available dogs
$dogs = mysqli_query($conn, "SELECT DogID, DogName FROM Dogtable");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userID']; // Get user ID from session
    $dogId = $_POST['dogId']; // Get dog ID from form
    $adoptionStatus = $_POST['adoptionStatus'];
    $historyNote = $_POST['historyNote'];

    $sql = "INSERT INTO History (AdoptionDate, AdoptionStatus, HistoryNote, Dogtable_DogID, UserTable_UserID) VALUES (NOW(), ?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssii", $adoptionStatus, $historyNote, $dogId, $userId);
        $stmt->execute();
        $stmt->close();
        echo "<p>Request submitted successfully.</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request | Animal Adoption Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main class="container mt-4">
    <h1>Adoption Request Form</h1>
    <form action="adoption-form.php" method="post">
        <div class="mb-3">
            <label for="dogId" class="form-label">Select Dog:</label>
            <select class="form-control" id="dogId" name="dogId" required>
                <?php while ($dog = mysqli_fetch_assoc($dogs)): ?>
                    <option value="<?= $dog['DogID'] ?>"><?= htmlspecialchars($dog['DogName']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="adoptionStatus" class="form-label">Adoption Status:</label>
            <select class="form-control" id="adoptionStatus" name="adoptionStatus" required>
                <option value="pending">Pending</option>
                <option value="adopted">Adopted</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="historyNote" class="form-label">History Note:</label>
            <textarea class="form-control" id="historyNote" name="historyNote" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Request</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</main>

<?php include 'footer.php'; // Include the footer ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
