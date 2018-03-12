<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Nous contacter : adresse et coordonnées - Sarl Terr\'Eau';
    $pageDescription = 'La société Sarl Terr\'Eau est basée à Gagny (Seine-Saint-Denis 93). Contactez-nous, nous sommes à votre écoute pour vous servir et vous conseiller.';
    include 'widget/includes.php';
    ?>
</head>
<body>
    <?php
    $current = 'contact';
    include 'widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="container">
            <header class="section-header">
                <h1 class="title">Nous contacter</h1>
            </header>

            <p class="text">
                Toute notre équipe est à votre disposition pour tout renseignement.
            </p>
            <section class="contact-section">
                <div class="contact-section-text">
                    <img class="logo" src="/v2/static/img/logo-415x60.png" width="415" height="60" alt="Sarl Terr'eau"/>
                    <br>50, Avenue René Faugeras
                    <br>93220 GAGNY
                    <br>
                    <br>Tél. : 01 49 32 00 63
                    <br>Fax : 01 49 31 04 04
                    <br>Email : <a class="link" href="mailto:jardinier@terr-eau.com">jardinier@terr-eau.com</a>
                </div>
                <iframe class="contact-section-map" width="450" height="400" marginheight="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.386098991375!2d2.562767415674784!3d48.869915779288625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e611ec9d040719%3A0x41eb17e8cfe24ada!2s50+Avenue+Ren%C3%A9+Faugeras%2C+93220+Gagny!5e0!3m2!1sfr!2sfr!4v1516181826426" frameborder="0" marginwidth="0" scrolling="no"></iframe>
            </section>
        </div>

        <?php include 'widget/footer.php'; ?>
    </div>

    <script src="/v2/static/js/script.min.js" type="text/javascript"></script>
</body>
</html>