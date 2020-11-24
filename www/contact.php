<?php include 'widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Nous contacter : adresse et coordonnées | Sarl Terr\'eau';
    $pageDescription = 'Sarl Terr\'eau est située au 1 Rue Eugène Freyssinet 77500 CHELLES (Seine-et-Marne 77). Téléphone : 01 49 32 00 63. Fax : 01 49 31 04 04. Email : jardinier@terr-eau.com. Contactez-nous pour toute demande, notre équipe est à votre service pour tout renseignement.';
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
            <?php include 'widget/banner.php'; ?>

            <header class="section-header">
                <h1 class="title">Nous contacter</h1>
            </header>

            <p class="text">
                Notre équipe est à votre disposition pour tous renseignements.
            </p>
            <section class="contact-section">
                <div class="contact-section-text">
                    <img class="logo" src="<?=$staticRoot?>/img/logo-415x60.png" width="415" height="60" alt="Sarl Terr'eau"/>
                    <br>1 Rue Eugène Freyssinet
                    <br>77500 CHELLES
                    <br>
                    <br>Tél. : 01 49 32 00 63
                    <br>Fax : 01 49 31 04 04
                    <br>Email : <a class="link" href="mailto:jardinier@terr-eau.com">jardinier@terr-eau.com</a>
                </div>
                <iframe class="contact-section-map" width="450" height="400" marginheight="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.441822158652!2d2.602038015674746!3d48.8688533792885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6110e5ba16c61%3A0xbf92bef0e44ac662!2sSarl%20Terr&#39;eau!5e0!3m2!1sfr!2sfr!4v1606215247101!5m2!1sfr!2sfr" frameborder="0" marginwidth="0" scrolling="no"></iframe>
            </section>

            <?php include 'widget/pave.php'; ?>
        </div>

        <?php include 'widget/footer.php'; ?>
    </div>

    <script src="<?=$staticRoot?>/js/script.min.js"></script>
</body>
</html>