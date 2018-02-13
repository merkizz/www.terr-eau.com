<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Nos activités - Terr'Eau</title>
    <meta name="description" content="">
    <meta name="keywords" content="jardiniers paysagistes seine saint denis,entretien de jardins seine saint denis,création de jardin seine saint denis">

    <?php include '../widget/includes.php'; ?>
</head>
<body>
    <?php
    $current = 'activites';
    include '../widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="container">
            <h1>Nos activités</h1>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="item">
                            <img src="../static/img/activites/entretien.jpg" width="591" height="478" alt="Entretien"/>
                            <span class="title">Entretien</span>
                        </div>
                        <div class="item">
                            <img src="../static/img/activites/maconnerie-paysagere.jpg" width="591" height="478" alt="Maçonnerie paysagère"/>
                            <span class="title">Maçonnerie paysagère</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="item">
                            <img src="../static/img/activites/creation.jpg" width="591" height="478" alt="Création"/>
                            <span class="title">Création</span>
                        </div>
                        <div class="item">
                            <img src="../static/img/activites/eclairage.jpg" width="591" height="478" alt="Eclairage extérieur"/>
                            <span class="title">Eclairage extérieur</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="item">
                                    <img src="../static/img/activites/elagage.jpg" width="591" height="478" alt="Elagage"/>
                                    <span class="title">Elagage</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="item">
                                    <img src="../static/img/activites/arrosage.jpg" width="591" height="478" alt="Arrosage"/>
                                    <span class="title">Arrosage</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include '../widget/footer.php'; ?>
    </div>

    <script src="/v2/static/js/script.min.js" type="text/javascript"></script>
</body>
</html>