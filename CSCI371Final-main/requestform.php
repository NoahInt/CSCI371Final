<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for Adoption - Animal Adoption</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <?php include('header.html'); // Include the header section ?>
    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Request for Adoption</h2>
                <!-- Adoption Request Form -->
                <form action="adoption_request_process.php" method="POST">
                    <div class="form-group">
                        <label for="adoptionStatus">Adoption Status:</label>
                        <select class="form-control" id="adoptionStatus" name="adoptionStatus" required>
                            <option value="pending">Pending</option>
                            <option value="adopted">Adopted</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="historyNote">History Note:</label>
                        <textarea class="form-control" id="historyNote" name="historyNote" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('footer.html'); // Include the footer section ?>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>