<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
   
    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <?php foreach ($errors as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <h1>User Registration form</h1>

    <div class="formdetail">
    <form method="POST" action="">
        <label for="fullName">Full Name:</label><br>
        <input type="text" id="fullName" name="fullName" placeholder="enter your name" required"><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" placeholder="enter your email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="enter your password" required><br><br>

        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="confirm password" required><br><br>

        <input type="submit">
    </form>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate form data
    $errors = [];

    if (empty($fullName)) {
        $errors[] = 'Full name is required.';
    }

    if (empty($email)) 
    {
        $errors[] = 'Email address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = 'Invalid email address.';
    }

    if (empty($password))
    {
        $errors[] = 'Password is required.';
    } 
    elseif ($password !== $confirmPassword) 
    {
        $errors[] = 'Passwords do not match.';
    }

    // If no errors, display success message
    if (empty($errors)) {
        echo 'Registration successful!';
        exit;
    }
}
?>


