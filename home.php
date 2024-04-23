<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Adoption</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
</head>
<body>
    <!-- Header -->
<?php
    include('header.html'); // Include the header section
?>
    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Picture/Pictures of dogs -->
                
            </div>
            <div class="col-md-6">
                <!-- Welcome message -->
                <h1>Welcome to Animal Adoption</h1>
                <p>Find your perfect furry companion here!</p>
            </div>
            <div>
                <img src="images/dogpic1.jpg" alt="sad gray dog sitting" width="300" height="200">
                <img src="images/dogpic2.jpg" alt="sad white dog laying down" width="300" height="200">
                <img src="images/dogpic3.jpg" alt="sad brown dog sitting" width="300" height="200">
            </div>
        </div>
    </div>
<?php
    include('footer.html'); // Include the footer section
?>
    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>