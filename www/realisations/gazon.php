<?php include '../widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'En images : Engazonnement et arrosage | Sarl Terr\'eau';
    $pageDescription = 'Découvrez en images les travaux d\'engazonnement par nos équipes : semi, plaquage, gazon synthétique, arrosage.';
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
                <h1 class="title">Gazon</h1>
            </header>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="item">
                            <img src="<?=$staticRoot?>/img/realisations/gazon/1.jpg" width="879" height="495" alt=""/>
                        </div>
                        <div class="item">
                            <img src="<?=$staticRoot?>/img/realisations/gazon/2.jpg" width="879" height="495" alt=""/>
                        </div>
                        <div class="item">
                            <img src="<?=$staticRoot?>/img/realisations/gazon/3.jpg" width="879" height="495" alt=""/>
                        </div>
                        <div class="item">
                            <img src="<?=$staticRoot?>/img/realisations/gazon/4.jpg" width="879" height="495" alt=""/>
                        </div>
                        <div class="item">
                            <img src="<?=$staticRoot?>/img/realisations/gazon/5.jpg" width="879" height="474" alt=""/>
                        </div>
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