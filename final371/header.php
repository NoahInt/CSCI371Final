<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!-- header.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            <img src="images/doglogo.jpeg" alt="doglogo" width="80" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">CONTACT</a>
                </li>
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <li class="nav-item">
                        <span class="navbar-text">
                            Hello, <?= htmlspecialchars($_SESSION['username']); ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">REGISTER</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
