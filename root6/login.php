<?php
session_start();

include('db.php');

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifier = $_POST["identifier"];
    $password = $_POST["password"];

    $user = $db->loginUser($identifier, $password);

    if ($user) {
        $_SESSION['user'] = $user;
    } else {
        echo "Login failed. Please check your username or email and password.";
    }
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo "Welcome, " . $user['name'] . "! <br>";
    echo '<form method="post" action="logout.php"><button type="submit">Logout</button></form>';
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Login</title>
    </head>

    <body class="bg-light">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center">User Login</h2>
                            <form method="POST" action="" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label for="identifier">Username or Email:</label>
                                    <input type="text" name="identifier" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please enter your username or email.
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please enter your password.
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
}
?>
