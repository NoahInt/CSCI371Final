<?php
session_start(); // Start the session to access session variables

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['userType'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'] ?? 'Admin'; // Fallback to 'Admin' if username is not set
include 'admin_header.php'; // Use the common admin header

// Check for success or error messages
$feedback = '';
if (isset($_SESSION['error_message'])) {
    $feedback = '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
} elseif (isset($_SESSION['success_message'])) {
    $feedback = '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard | Animal Adoption Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="admin-styles.css" />
</head>
<body>
<main class="container mt-4">
    <h1 class="text-center mb-4">Welcome, <?= htmlspecialchars($username); ?></h1>
    <?= $feedback ?>
    <!-- Admin functionalities could be listed here -->
    <div class="list-group">
        <a href="admin-view-requests.php" class="list-group-item list-group-item-action">View Adoption Requests</a>
        <a href="admin-add-dog.php" class="list-group-item list-group-item-action">Add a Dog</a>
        <a href="admin-manage-dogs.php" class="list-group-item list-group-item-action">Manage Dogs</a>
        <a href="admin-view-contact-messages.php" class="list-group-item list-group-item-action">View Contact Messages</a>
    </div>
</main>

<?php include 'footer.php'; // Include the common admin footer ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
