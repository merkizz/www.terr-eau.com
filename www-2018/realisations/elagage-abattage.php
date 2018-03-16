<?php include '../widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'En images : Elagage et abattage d\'arbres | Sarl Terr\'eau';
    $pageDescription = 'Découvrez en images quelques exemples d\'élagage et abattage par nos équipes.';
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
            <header class="section-header">
                <h1 class="title">Elagage / Abattage</h1>
            </header>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="item">
                            <img src="../static/img/realisations/abattage/1.jpg" width="456" height="789" alt=""/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="item">
                            <img src="../static/img/realisations/abattage/2.jpg" width="456" height="789" alt=""/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="item">
                            <img src="../static/img/realisations/abattage/3.jpg" width="456" height="789" alt=""/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="item">
                            <img src="../static/img/realisations/abattage/4.jpg" width="879" height="657" alt=""/>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include '../widget/footer.php'; ?>
    </div>

    <script src="<?=$staticRoot?>/js/script.min.js" type="text/javascript"></script>
</body>
</html>