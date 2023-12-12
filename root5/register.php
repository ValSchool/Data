<?php
include('db.php'); 
$db = new Database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $db->insertUser($name, $password);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">User Registration</h2>

                        <form method="POST" action="" class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter your name.
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter your password.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {
            $('form').validate();
        });
    </script>

</body>

</html>
