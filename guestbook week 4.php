<?php

session_start();
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$db = "leaky_guest_book";
$conn;



try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
} catch (Exception $e) {
    die("Failed to open database connection, did you start it and configure the credentials properly?");
}

if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

?>

<html>
<head>
    <title>Guestbook</title>
    <style>
body {
width: 100%;
}

        
.body-container {
background-color: aliceblue;
width: 200px;
margin-left: auto;
margin-right: auto;
padding-left: 100px;
padding-right: 100px;
padding-bottom: 20px;
        }

        
        .heading {
            text-align: center;
        }

        .disclosure-notice {
            color: lightgray;
        }
    </style>
</head>
<body>
<div class="body-container">
    <h1 class="heading">Gastenboek 'De lekkage'</h1>
    <form action="guestbook.php" method="post">
        Email: <input type="email" name="email"><br/>
        <input type="hidden" value="red" name="color">
        Bericht: <textarea name="text" minlength="4"></textarea><br/>
        <?php if (userIsAdmin($conn)) {
            echo "<input type=\"hidden\" name=\"admin\" value=" . $_COOKIE['admin'] . "\">";
        } ?>
        <input type="hidden" name="token" value="<?php echo $token; ?>">
        <input type="submit">
    </form>
    <hr/>
    <?php
    $email = isset($_POST['email']) ? $_POST['email'] : "";


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo "<h1 style='color:red;'>" . $emailErr . "</h1>";
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $text = $_POST['text'];
        $admin = isset($_POST['admin']) ? 1 : 0;
        
        $color = "red";
    


        
        $conn->query(
            "INSERT INTO `entries`(`email`, `color`, `admin`, `text`)
                             VALUES ('$email', '$color', '$admin', '$text');"
        );
    }


    $result = $conn->query("SELECT `email`, `text`, `color`, `admin` FROM `entries`");
    foreach ($result as $row) {
        print "<div style=\"color: " . $row['color'] . "\">Email: " . $row['email'];
        if ($row['admin']) {
            print '&#9812;';
        }
        print ": " . htmlspecialchars($row['text'], ENT_QUOTES, 'UTF-8') . "</div><br/>";
    }


    function userIsAdmin($conn)
    {
        if (isset($_COOKIE['admin'])) {
            $adminCookie = $_COOKIE['admin'];
            $result = $conn->query("SELECT cookie FROM `admin_cookies`");

            foreach ($result as $row) {
                if ($adminCookie === $row['cookie']) {
                    return true;
                }
            }
        }
        return false;
    }
    ?>
    <hr/>
    <div class="disclosure-notice">
        <p>
            
            Hierbij krijgt iedereen expliciete toestemming om dit Gastenboek zelf te gebruiken voor welke doeleinden dan
            ook.
        </p>
        <p>
            Onthoud dat je voor andere websites altijd je aan de princiepes van
            <a href="https://en.wikipedia.org/wiki/Responsible_disclosure" target="_blank" style="color: lightgray;">
                Responsible Disclosure
            </a> wilt houden.
        </p>
    </div>
</div>
    
</body>
</html>
