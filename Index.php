<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sushu Town</title>
    <link rel="stylesheet" href="/bezorgwebsite/css/style.css?v=2">
</head>
<header>

    <nav class="navigation">

        <a href="#gerechten" class="smooth-scroll">Gerechten</a>
        <a href="#footer" class="smooth-scroll">Over Ons</a>
        <a href="#footer" class="smooth-scroll">Contact</a>
        <a href="/bezorgwebsite/Login.php">Login</a>

    </nav>

</header>

<body>
    <div class="maindiv">
        <section class="landing-section">
            <h1>Sushu Town</h1>
            <h2>De beste sushi in town!</h2>
        </section>

        <section class="landing-section2">
            <h1>Open 6 dagen in de week, 11:00-22:00</h1>
            <h1>Locatie: 310 Rozengracht, Nijmegen, NL</h1>

        </section>
    </div>

    </section>

    <section class="menu-section" id="gerechten">
        <?php
        $stmt = $conn->prepare("SELECT * FROM menu");
        $stmt->execute();
        $data = $stmt->fetchAll();
        // and somewhere later:
        foreach ($data as $row) {



            ?>
            <!-- <form action="addcart.php" method="post"> -->
                <div class="menu-item">
                    <img src="/bezorgwebsite/fotos/<?php echo $row['image_path']; ?>" alt="Sushi 1">
                    <h2>
                        <?php echo $row['naam']; ?>
                    </h2>
                    <p>
                        <?php echo $row['beschrijving']; ?>
                    </p>

                    <button type="submit" id="product_<?php echo $row['id']; ?>">
                        <p>
                            <?php echo $row['prijs']; ?>
                        </p>
                    </button>
                    
                    <input id="product_<?php echo $row['id']; ?>" type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                </div>
            <!-- </form> -->
        <?php } ?>

    </section>

    <section class="order-section">
        <div class="order-item">
            <img src="/bezorgwebsite/fotos/winkelwagen.png" alt="Order">
            <h2>Uw Bestelling</h2>
            <ul id="item-list"></ul>
            <h3 class="order-total">Total: $<span id="order-total">0.00</span></h3>
            <button>Plaats Bestelling</button>
        </div>
    </section>
    <footer>
        <div class="container" id="footer">
            <div class="row">
                <div class="col-md-4">
                    <h4>Over Sushu</h4>
                    <p>Sushu is een sushi-restaurant gevestigd in Nijmegen, Nederland. Onze missie is om onze klanten de
                        hoogste
                        kwaliteit sushi te bieden terwijl we een gastvrije en comfortabele omgeving creëren.</p>

                    <p>Ons team van ervaren chefs maakt elke sushirol met de hand en gebruikt alleen de meest verse
                        ingrediënten, zodat
                        elke hap een heerlijke en gedenkwaardige ervaring is. Van klassieke favorieten zoals California
                        rolls tot unieke
                        creaties zoals onze pittige tonijn- en avocado-rol, er is voor elk wat wils op ons menu.</p>

                    <p> Naast onze uitstekende sushi bieden we een verscheidenheid aan andere Japanse gerechten en
                        drankjes, waaronder
                        sake en groene thee. Of je nu zin hebt in een snelle lunch of een ontspannen diner, we nodigen
                        je uit om te
                        komen en de beste Japanse keuken te ervaren bij Sushu.</p>

                    <p> Bedankt voor het overwegen van Sushu voor je volgende eetervaring. We kijken ernaar uit om je
                        van dienst te
                        zijn!</p>
                </div>
            </div>
            <div class="col-md-4">
                <h4>Kom een keertje Lang!</h4>
                <p>Locatie: 310 Rozengracht, <br>Nijmegen, NL</p>
                <p>Open 6 dagen in de week | 11:00-22:00</p>
            </div>
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p>Phone: 123-456-7890 | <a href="mailto:info@sushu.com">info@sushu.com</a></p>
                <div class="social-icons">
                    <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <script src="css/laden.js"></script>
    <script type="module" src="css/script.js"></script>
    <script src="https://kit.fontawesome.com/db9de94a89.js" crossorigin="anonymous"></script>
</body>

</html>