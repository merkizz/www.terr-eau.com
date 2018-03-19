<?php include '../widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Nos réalisations en images | Sarl Terr\'eau';
    $pageDescription = 'Découvrez en images quelques exemples de réalisations par nos équipes : remise en état des espaces verts, engazonnement, création de jardin, pose de terrasse, élagage, abattage. Visionnez les photos avant et après le passage de nos jardiniers paysagistes.';
    include '../widget/head.php';
    ?>
</head>
<body>
    <?php
    $current = 'realisations';
    include '../widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="container">
            <?php include '../widget/banner.php'; ?>

            <header class="section-header">
                <h1 class="title">Nos réalisations</h1>
            </header>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?=$contextRoot?>/realisations/remise-en-etat" class="item">
                            <img src="<?=$staticRoot?>/img/realisations/remise-en-etat-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Remise en état</span>
                        </a>
                        <a href="<?=$contextRoot?>/realisations/gazon" class="item">
                            <img src="<?=$staticRoot?>/img/realisations/gazon-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Gazon</span>
                        </a>
                        <a href="<?=$contextRoot?>/realisations/creation" class="item">
                            <img src="<?=$staticRoot?>/img/realisations/creation-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Création</span>
                        </a>
                        <a href="<?=$contextRoot?>/realisations/elagage-abattage" class="item">
                            <img src="<?=$staticRoot?>/img/realisations/elagage-abattage-879x440.jpg" width="879" height="440" alt=""/>
                            <span class="tag">Élagage / Abattage</span>
                        </a>
                    </div>
                </div>
            </section>

            <?php include '../widget/pave.php'; ?>
        </div>

        <?php include '../widget/footer.php'; ?>
    </div>

    <script src="<?=$staticRoot?>/js/script.min.js"></script>
</body>
</html>