<?php include '../widget/includes.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <?php
    $pageTitle = 'Nos activités et compétences | Sarl Terr\'eau';
    $pageDescription = 'Découvrez nos activités et compétences : entretien parc et jardin, remise en état, création de jardin, élagage, abattage, débroussayage, taille, engazonnemment, plantation, terrasse, éclairage extérieur... Nos prestations sont réalisées avec sérieux et compétence dans le respect des délais et de l\'environnement.';
    include '../widget/head.php';
    ?>
</head>
<body>
    <?php
    $current = 'activites';
    include '../widget/header.php';
    ?>

    <div class="main-wrapper">
        <div class="container">
            <?php include '../widget/banner.php'; ?>

            <header class="section-header">
                <h1 class="title">Nos activités</h1>
            </header>

            <section class="mosaic-section">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="item grey">
                            <img src="<?=$staticRoot?>/img/activites/entretien.jpg" width="595" height="495" alt="Entretien"/>
                            <ul class="list-item">
                                <li>- Entretien de parcs et jardins</li>
                                <li>- Remise en état / Débroussaillage</li>
                                <li>- Taille des végétaux</li>
                                <li>- Soins des pelouses</li>
                            </ul>
                        </div>
                        <div class="item grey">
                            <img src="<?=$staticRoot?>/img/activites/terrasse.jpg" width="595" height="495" alt="Terrasse Bois / composite"/>
                            <ul class="list-item">
                                <li>- Création de terrasse en bois ou en composite</li>
                                <li>- Palissade / Claustra</li>
                                <li>- Clôture grillagée</li>
                                <li>- Entretien de terrasse</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="item grey">
                            <img src="<?=$staticRoot?>/img/activites/creation.jpg" width="595" height="495" alt="Création et aménagement de jardin"/>
                            <ul class="list-item">
                                <li>- Création et aménagement de jardin</li>
                                <li>- Engazonnement, semi et plaquage</li>
                                <li>-   Gazon synthétique</li>
                                <li>-   Plantation</li>
                                <li>-   Massif & rocaille</li>
                                <li>- Apport et livraison de terre, terreau, terre de bruyère...</li>
                            </ul>
                        </div>
                        <div class="item grey">
                            <img src="<?=$staticRoot?>/img/activites/eclairage-exterieur.jpg" width="595" height="495" alt="Eclairage extérieur"/>
                            <ul class="list-item">
                                <li>- Éclairage extérieur</li>
                                <li>- Petite maçonnerie paysagère</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="item grey">
                                    <img src="<?=$staticRoot?>/img/activites/elagage.jpg" width="456" height="379" alt="Elagage"/>
                                    <ul class="list-item">
                                        <li>- Élagage</li>
                                        <li>- Abattage</li>
                                        <li>- Grignotage / Dessouchage</li>
                                        <li>- Soins des arbres</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <div class="item grey">
                                    <img src="<?=$staticRoot?>/img/activites/arrosage.jpg" width="595" height="495" alt="Arrosage"/>
                                    <ul class="list-item">
                                        <li>- Étude et réalisation d'arrosage automatique</li>
                                        <li>- Réalisation et entretien de bassin</li>
                                        <li>- Nettoyage à haute pression</li>
                                    </ul>
                                </div>
                            </div>
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
