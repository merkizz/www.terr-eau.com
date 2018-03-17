<?php include '../widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'En images : Remise en état des espaces verts | Sarl Terr\'eau';
    $pageDescription = 'Découvrez en images quelques exemples de remise en état par nos équipes. Photos avant / après.';
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
                <h1 class="title">Remise en état</h1>
            </header>

            <div class="img-slider" data-role="image-slider" data-width="960" data-height="720" data-position="70" data-filter="sepia(20%)">
                <div class="img-wrapper left">
                    <img src="<?=$staticRoot?>/img/realisations/remise-en-etat/1-1.jpg" class="img" width="960" height="720"/>
                    <span class="tag"></span>
                </div>
                <div class="img-wrapper right">
                    <img src="<?=$staticRoot?>/img/realisations/remise-en-etat/1-2.jpg" class="img" width="960" height="720"/>
                    <span class="tag"></span>
                </div>
                <span class="slider-bar">
                    <span></span>
                </span>
                <input type="range" class="slider-range" min="0" max="100" step="0.01">
            </div>

            <div class="img-slider" data-role="image-slider" data-width="960" data-height="720" data-position="70" data-filter="sepia(20%)">
                <div class="img-wrapper left">
                    <img src="<?=$staticRoot?>/img/realisations/remise-en-etat/2-1.jpg" class="img" width="960" height="720"/>
                    <span class="tag"></span>
                </div>
                <div class="img-wrapper right">
                    <img src="<?=$staticRoot?>/img/realisations/remise-en-etat/2-2.jpg" class="img" width="960" height="720"/>
                    <span class="tag"></span>
                </div>
                <span class="slider-bar">
                    <span></span>
                </span>
                <input type="range" class="slider-range" min="0" max="100" step="0.01">
            </div>

            <div class="img-slider" data-role="image-slider" data-width="495" data-height="660" data-position="50" data-filter="sepia(20%)">
                <div class="img-wrapper left">
                    <img src="<?=$staticRoot?>/img/realisations/remise-en-etat/3-1.jpg" class="img" width="495" height="660"/>
                    <span class="tag"></span>
                </div>
                <div class="img-wrapper right">
                    <img src="<?=$staticRoot?>/img/realisations/remise-en-etat/3-2.jpg" class="img" width="495" height="660"/>
                    <span class="tag"></span>
                </div>
                <span class="slider-bar">
                    <span></span>
                </span>
                <input type="range" class="slider-range" min="0" max="100" step="0.01">
            </div>

            <?php include '../widget/pave.php'; ?>
        </div>

        <?php include '../widget/footer.php'; ?>
    </div>

    <script src="<?=$staticRoot?>/js/script.min.js"></script>
</body>
</html>