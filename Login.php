<?php
$message = '';
include_once "connection.php";

if (isset($_SESSION['user_logged_in'])) {
    header("Location: admin.php");
}


if(isset($_POST['submit'])){
    $sql = "SELECT * FROM Users WHERE email = :email AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":email", $_POST['email']);
    $stmt->bindParam(":password", $_POST['password']);
    $stmt->execute();
    $result = $stmt->fetchAll();
    //var_dump($result);

    if (count($result) > 0) {
        $_SESSION["username"] = $_POST['username'];
        $_SESSION['user_logged_in'] = true;
        header("Location:/bezorgwebsite/admin.php");
    } else {
        $message = "username niet gevonden";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BezorgWebsite</title>
    <link rel="stylesheet" href="/bezorgwebsite/css/Login.css">

</head>

<body>


    <header>

        <nav class="navigation">

            <a href="/bezorgwebsite/index.php">Home</a>

        </nav>

    </header>

    <div class="wrapper">
        <div class="form-box Login">
            <h2>Login</h2>
            <p>
                <?php echo ($message == '' ? '' : $message); ?>
            </p>
            <form method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-me">
                    <label><input type="checkbox" name="remember">Remember me</label>
                </div>
                <button type="submit" name="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>