﻿<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Animal Adoption</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
<?php
    include('header.html'); // Include the header section
?> 
    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Register</h2>
                <!-- Registration Form -->
                <form action="register_process.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="ConfirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpass" name="confirmpassword" required>
                    </div>
                    <div class="form-group">
                        <label for="userType">User Type:</label>
                        <select class="form-control" id="userType" name="userType" required>
                            <option value="user">User</option>
                            <option value="administrator">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="annualIncome">Annual Income:</label>
                        <input type="text" class="form-control" id="annualIncome" name="annualIncome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="numberOfPetsAtHome">Number of Pets at Home:</label>
                        <input type="number" class="form-control" id="numberOfPetsAtHome" name="numberOfPetsAtHome" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <button type="reset" class="btn btn-secondary btn-block">Reset</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
<?php
    include('footer.html'); // Include the footer section
?> 
    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>