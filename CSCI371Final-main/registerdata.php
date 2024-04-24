
<?php # DISPLAY COMPLETE REGISTRATION PAGE.
ini_set('display_errors', 1);
error_reporting(E_ALL);

# Set page title and display header section.
$page_title = 'Register';
include ('header.html');

# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    # Connect to the database.
    require ('connect.php');
    
    # Initialize an error array.
    $errors = array();

    # Check for a user name.
    $un = mysqli_real_escape_string($link, trim($_POST['username']));
    
    # Check for a first name.
    $fn = mysqli_real_escape_string($link, trim($_POST['firstname']));
    
    # Check for a last name.
    $ln = mysqli_real_escape_string($link, trim($_POST['lastname']));
    
    # Check for an email address:
    $e = mysqli_real_escape_string($link, trim($_POST['email']));
    
    # Check for a password and matching input passwords.
    $p = mysqli_real_escape_string($link, trim($_POST['password1']));
}

# Check if email address already registered.
if (empty($errors))
{
    $q = "SELECT user_id FROM users WHERE email='$e'";
    $r = @mysqli_query($link, $q);
    if (mysqli_num_rows($r) != 0) $errors[] = 'Email address already registered. <a href="login.php">Login</a>';
}

# On success register user inserting into 'users' database table.
if (empty($errors))
{
    $q = "INSERT INTO users (username,first_name, last_name, email, pass, reg_date) VALUES ('$un', '$fn', '$ln', '$e', SHA1('$p'), NOW() )";
    $r = @mysqli_query($link, $q);
    if ($r)
    {
        echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p>';
    }
    # Close database connection.
    mysqli_close($link);
    
    # Display footer section and quit script:
    include ('includes/footer.html');
    exit();
}
# Or report errors.
else
{
    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';
    foreach ($errors as $msg)
    {
        echo " - $msg<br>";
    }
    echo 'Please try again.</p>';
    # Close database connection.
    mysqli_close($link);
}

?>
