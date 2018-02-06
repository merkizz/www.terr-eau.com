<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Nos réalisations - Terre'Eau</title>
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
                    <div class="col-sm-6">
                        <a href="/v2/realisations/remise-en-etat" class="item">
                            <img src="../static/img/realisations/remise-etat.jpg" width="591" height="478" alt="Remise en état"/>
                            <span class="title">Remise en état</span>
                        </a>
                        <a href="/v2/realisations/gazon" class="item">
                            <img src="../static/img/realisations/gazon-placage.jpg" width="591" height="478" alt="Gazon de placage"/>
                            <span class="title">Gazon</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="item">
                            <img src="../static/img/realisations/plantations.jpg" width="591" height="478" alt="Gazon de semis"/>
                            <span class="title">Création</span>
                        </a>
                        <a href="/v2/realisations/abattage" class="item">
                            <img src="../static/img/realisations/elagage-abattage.jpg" width="591" height="478" alt="Gazon de placage"/>
                            <span class="title">Elagage / abattage</span>
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