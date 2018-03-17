<?php include 'widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Nous contacter : adresse et coordonnées | Sarl Terr\'eau';
    $pageDescription = 'Sarl Terr\'eau est située au 50 Avenue René Faugeras à Gagny (Seine-Saint-Denis 93). Téléphone : 01 49 32 00 63. Fax : 01 49 31 04 04. Email : jardinier@terr-eau.com. Contactez-nous pour toute demande, notre équipe est à votre service pour tout renseignement.';
    include 'widget/head.php';
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
                    <img class="logo" src="<?=$staticRoot?>/img/logo-415x60.png" width="415" height="60" alt="Sarl Terr'eau"/>
                    <br>50, Avenue René Faugeras
                    <br>93220 GAGNY
                    <br>
                    <br>Tél. : 01 49 32 00 63
                    <br>Fax : 01 49 31 04 04
                    <br>Email : <a class="link" href="mailto:jardinier@terr-eau.com">jardinier@terr-eau.com</a>
                </div>
                <iframe class="contact-section-map" width="450" height="400" marginheight="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10497.54434965964!2d2.564956!3d48.869916!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x92f8ddcacd9219a9!2sSARL+TERR&#39;EAU!5e0!3m2!1sfr!2sfr!4v1520881182702" frameborder="0" marginwidth="0" scrolling="no"></iframe>
            </section>
        </div>

        <?php include 'widget/footer.php'; ?>
    </div>

    <script src="<?=$staticRoot?>/js/script.min.js"></script>
</body>
</html>