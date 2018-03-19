<?php include 'widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Sarl Terr\'eau | Jardinier paysagiste en Seine-Saint-Denis';
    $pageDescription = 'Aménagement et entretien des jardins et espaces verts. Située à Gagny (93), Sarl Terr\'eau est à votre service pour la création et l\'entretien de vos jardins en Ile-de-France. Nos jardiniers paysagistes vous accompagnent toute l\'année dans la réalisation de vos projets à partir de devis gratuits personnalisés.';
    $pageKeywords = 'jardinier, paysagiste, seine-saint-denis, entretien des espaces verts, création de jardin';
    include 'widget/head.php';
    ?>

    <meta name="google-site-verification" content="w5wYi4iqtz0H6MLeq0iSbtOu7SqmWc1ThXDPv-jce2M" />

    <meta property="og:site_name" content="Sarl Terr'eau" />
    <meta property="og:url" content="<?=$contextRoot?>" />
    <meta property="og:title" content="Sarl Terr'eau, jardinier paysagiste en Seine-Saint-Denis" />
    <meta property="og:description" content="Située à Gagny (93), Sarl Terr'eau est à votre service pour la création et l'entretien de vos jardins en Ile-de-France. Nos jardiniers paysagistes vous accompagnent toute l'année dans la réalisation de vos projets à partir de devis gratuits personnalisés." />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?=$staticRoot?>/img/logo-200x200.jpg" />
    <meta property="og:image:width" content="200"/>
    <meta property="og:image:height" content="200"/>
</head>
<body>
    <?php include 'widget/header.php'; ?>

    <div class="main-wrapper">
        <div class="container">
            <?php include 'widget/banner.php'; ?>

            <header class="section-header">
                <h1 class="title">Présentation</h1>
            </header>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="item">
                            <img src="<?=$staticRoot?>/img/banner-hp-879x440.jpg" width="879" height="440" alt=""/>
                        </div>
                    </div>
                </div>
            </section>

            <p class="text">
                Depuis 2007, la société Sarl Terr'eau est au service des particuliers et des professionnels. Située à Gagny 93220 (Seine Saint-Denis), elle intervient sur toute l'Ile-de-France.
                <br>
                <br>Elle contribue à la réalisation de vos jardins et vous propose de les entretenir au fil des saisons, pour révéler au mieux leur vraie nature.
                <br>
                <br>Sur le terrain, Geoffrey et Audric, les deux co-gérants, sont à votre écoute pour vous servir et vous conseiller.
                <br>
                <br>Nos études et nos prestations, à partir d'un <a class="link" href="<?=$contextRoot?>/devis">devis gratuit</a> personnalisé et précis, sont réalisées avec sérieux et compétences par notre équipe dans le respect des délais et de l'environnement.
            </p>

            <?php include 'widget/pave.php'; ?>
        </div>

        <?php include 'widget/footer.php'; ?>
    </div>

    <script src="<?=$staticRoot?>/js/script.min.js"></script>
</body>
</html>