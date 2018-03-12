<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Nos réalisations en images - Sarl Terr\'Eau';
    $pageDescription = 'Découvrez en images quelques exemples de réalisations par nos équipes: remise en état, gazon, création, élagage, abattage. Photos avant / après.';
    include '../widget/includes.php';
    ?>
</head>
<body>
    <?php
    $current = 'realisations';
    include '../widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="container">
            <header class="section-header">
                <h1 class="title">Nos réalisations</h1>
            </header>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="/v2/realisations/remise-en-etat" class="item">
                            <img src="../static/img/realisations/remise-en-etat-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Remise en état</span>
                        </a>
                        <a href="/v2/realisations/gazon" class="item">
                            <img src="../static/img/realisations/gazon-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Gazon</span>
                        </a>
                        <a href="/v2/realisations/creation" class="item">
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