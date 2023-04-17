<?php
include_once('connection.php');
if (
    isset($_SESSION['user_logged_in']) &&

    $_SESSION['user_logged_in'] == true
) {

    //login success

} else {

    header("Location: Login.php");

}

if (isset($_POST['submit'])) {
    $data = [
        'naam' => $_POST['naam'],
        'beschrijving' => $_POST['beschrijving'],
        'prijs' => $_POST['prijs'],
        'image_path' => $_POST['image_path']
    ];
    $sql = "INSERT INTO menu (naam,beschrijving,prijs,image_path) 
        VALUES (:naam, :beschrijving, :prijs, :image_path)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    header('location: admin.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="/bezorgwebsite/css/admin.css">

</head>
<header>

    <nav class="navigation">

        <a href="/bezorgwebsite/index.php">Home</a>

    </nav>

</header>

<body>
    <main>
        <section class="container-1">
            <div class="text">
                <h1>DashBoard</h1>
            </div>
        </section>
        <form method="post">
            <section class="container-2">

                <div class="input-box">
                    <span class="icon"><ion-icon name="id-card-outline"></ion-icon></span>
                    <input type="text" name="naam">
                    <label>Naam Gerecht</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="fast-food-outline"></ion-icon></span>
                    <input type="text" name="beschrijving">
                    <label>beschrijving</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
                    <input type="text" name="prijs">
                    <label>Prijs</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
                    <input type="text" name="image_path">
                    <label>Image</label>
                </div>

            </section>
            <section class="knoppen">
                <button type="submit" name="submit" class="btn1">Toevoegen</button>

            </section>
        </form>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>