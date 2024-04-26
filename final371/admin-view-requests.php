<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Redirect if not logged in or if the user is not an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['userType'] !== 'admin') {
    header('Location: login.php');
    exit;
}

require_once 'db.php';
require_once 'admin_header.php'; // Ensure this points to your actual admin header file

// Fetch all adoption requests
$sql = "SELECT h.*, d.DogName, u.Username FROM History h JOIN Dogtable d ON h.Dogtable_DogID = d.DogID JOIN UserTable u ON h.UserTable_UserID = u.UserID ORDER BY h.AdoptionDate DESC";
$result = mysqli_query($conn, $sql);

// Handle status update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateStatus'])) {
    $historyId = $_POST['historyId'];
    $newStatus = $_POST['newStatus'];

    $updateSql = "UPDATE History SET AdoptionStatus = ? WHERE HistoryID = ?";
    if ($updateStmt = mysqli_prepare($conn, $updateSql)) {
        mysqli_stmt_bind_param($updateStmt, "si", $newStatus, $historyId);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);
    }

    // Optionally send an email to the user
    // This would require setting up an email sending functionality with proper headers
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Adoption Requests | Animal Adoption Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<main class="container mt-4">
    <h1>Adoption Requests</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>User</th>
                <th>Dog Name</th>
                <th>Status</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['HistoryID'] ?></td>
                <td><?= $row['AdoptionDate'] ?></td>
                <td><?= htmlspecialchars($row['Username']) ?></td>
                <td><?= htmlspecialchars($row['DogName']) ?></td>
                <td><?= $row['AdoptionStatus'] ?></td>
                <td><?= htmlspecialchars($row['HistoryNote']) ?></td>
                <td>
                    <form method="post" action="update_request.php">
                        <input type="hidden" name="historyId" value="<?= $row['HistoryID'] ?>">
                        <select name="newStatus" required>
                            <option value="pending" <?= $row['AdoptionStatus'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="adopted" <?= $row['AdoptionStatus'] === 'adopted' ? 'selected' : '' ?>>Adopted</option>
                        </select>
                        <button type="submit" name="updateStatus" class="btn btn-primary">Update</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'; // Ensure this points to your actual admin footer file ?>
</html>
