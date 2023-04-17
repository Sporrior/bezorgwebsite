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

$stmt = $conn->prepare("SELECT * FROM menu WHERE id = :id");

$stmt->execute(['id' => $_GET['id']]);

$data = $stmt->fetch();


if (isset($_POST['submit'])) {
    $sql = "UPDATE menu SET
            naam = :naam,
            beschrijving = :beschrijving,
            prijs = :prijs,
            image_path = :image_path
            WHERE id = :id";




    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':naam', $_POST['naam']);

    $stmt->bindParam(':beschrijving', $_POST['beschrijving']);

    $stmt->bindParam(':prijs', $_POST['prijs']);

    $stmt->bindParam(':image_path', $_POST['image_path']);

    $stmt->bindParam(':id', $data['id']);

    $stmt->execute();
    header('location: admin.php');
}
;



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="/bezorgwebsite/admin.css">

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
                    <input type="text" name="naam" value="<?php echo $data['naam']; ?>" />
                    <label>Naam Gerecht</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="fast-food-outline"></ion-icon></span>
                    <input type="text" name="beschrijving" value="<?php echo $data['beschrijving']; ?>" />
                    <label>beschrijving</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
                    <input type="text" name="prijs" value="<?php echo $data['prijs']; ?>" />
                    <label>Prijs</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
                    <input type="text" name="image_path" value="<?php echo $data['image_path']; ?>" />
                    <label>Image</label>
                </div>

            </section>
            <section class="knoppen">
                <button type="submit" name="submit" class="btn1">Aanpassen</button></button>

            </section>
        </form>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>