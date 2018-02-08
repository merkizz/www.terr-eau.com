<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Nos réalisations - Terr'Eau</title>
    <meta name="description" content="">
    <meta name="keywords" content="jardiniers paysagistes seine saint denis,entretien de jardins seine saint denis,création de jardin seine saint denis">

    <?php include '../widget/includes.php'; ?>
</head>
<body>
    <?php
    $current = 'realisations';
    include '../widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="container">
            <h1>Nos réalisations</h1>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-xs-12">
                        <a href="/v2/realisations/remise-en-etat" class="item">
                            <img src="../static/img/realisations/remise-en-etat-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Remise en état</span>
                        </a>
                        <a href="/v2/realisations/gazon" class="item">
                            <img src="../static/img/realisations/gazon-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Gazon</span>
                        </a>
                        <a href="#" class="item">
                            <img src="../static/img/realisations/creation-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Création</span>
                        </a>
                        <a href="/v2/realisations/elagage-abattage" class="item">
                            <img src="../static/img/realisations/elagage-abattage-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Elagage / Abattage</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <?php include '../widget/footer.php'; ?>
    </div>

    <script src="/v2/static/js/script.min.js" type="text/javascript"></script>
</body>
</html>