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
        <a href="/bezorgwebsite/logout.php">Logout</a>

    </nav>

</header>

<body>

    <section class="container-1">
        <div class="text">
            <h1>DashBoard</h1>
            <?php
            $stmt = $conn->prepare("SELECT * FROM menu");
            $stmt->execute();
            $data = $stmt->fetchAll();

            if ($data) {
                ?>
                <button class="btn1"
                    onclick="window.location.href='toevoegen.php?id=<?= $data[0]['id'] ?>'">Toevoegen</button>
            <?php } else {
                foreach ($data as $row) {
                    ?>
                    <button class="btn1" onclick="window.location.href='toevoegen.php?id=<?= $row['id'] ?>'">Toevoegen</button>
                <?php }
            } ?>

        </div>
    </section>
    <section class="container-2">
        <table>
            <tr>
                <th>naam</th>
                <th>beschrijving</th>
                <th>prijs</th>
                <th>image</th>
                <th>actions</th>
            </tr>
            <?php
            $stmt = $conn->prepare("SELECT * FROM menu");
            $stmt->execute();
            $data = $stmt->fetchAll();
            // and somewhere later:
            foreach ($data as $row) {
                ?>

                <tr>
                    <td>
                        <?= $row['naam'] ?>
                    </td>
                    <td>
                        <?= $row['beschrijving'] ?>
                    </td>
                    <td>
                        <?= $row['prijs'] ?>
                    </td>
                    <td><img src="/bezorgwebsite/fotos/<?= $row['image_path'] ?>" alt="foto" width="100"></td>
                    <td>
                        <button class="btn2" onclick="window.location.href='edit.php?id=<?= $row['id'] ?>'">edit</button>
                        <button class="btn3"
                            onclick="window.location.href='delete.php?id=<?= $row['id'] ?>'">delete</button>
                    </td>
                </tr>

            <?php } ?>

        </table>
    </section>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>