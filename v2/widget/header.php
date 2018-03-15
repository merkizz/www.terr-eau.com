<header class="main-header" data-role="main-header">
    <nav class="main-nav">
        <div class="nav-item nav-toggler" data-role="nav-toggler">
            <span class="nav-text">
                <div class="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </span>
        </div>
        <div class="nav-item logo">
            <a class="nav-text" href="<?php echo $contextRoot ?>" title="Sarl Terr'eau">
                <img src="<?php echo $staticRoot ?>/img/logo-520x105.png" width="520" height="105" alt="Logo Sarl Terr'eau"/>
            </a>
        </div>
        <div class="nav-list">
            <div class="nav-item<?php if ($current == 'activites') echo ' active'?>">
                <a class="nav-text" href="<?php echo $contextRoot ?>/activites">Activités</a>
            </div>
            <div class="nav-item<?php if ($current == 'realisations') echo ' active'?>">
                <a class="nav-text" href="<?php echo $contextRoot ?>/realisations">Réalisations</a>
            </div>
            <div class="nav-item<?php if ($current == 'devis') echo ' active'?>">
                <a class="nav-text" href="<?php echo $contextRoot ?>/devis">Demande de devis</a>
            </div>
            <div class="nav-item<?php if ($current == 'contact') echo ' active'?>">
                <a class="nav-text" href="<?php echo $contextRoot ?>/contact">Contact</a>
            </div>
        </div>
    </nav>
    <div class="nav-slide-backdrop" data-role="nav-backdrop"></div>
    <div class="nav-slide" data-role="nav-slide">
        <div class="nav-item<?php if ($current == 'activites') echo ' active'?>">
            <a class="nav-text" href="<?php echo $contextRoot ?>/activites">Activités</a>
        </div>
        <div class="nav-item<?php if ($current == 'realisations') echo ' active'?>">
            <a class="nav-text" href="<?php echo $contextRoot ?>/realisations">Réalisations</a>
        </div>
        <div class="nav-item<?php if ($current == 'devis') echo ' active'?>">
            <a class="nav-text" href="<?php echo $contextRoot ?>/devis">Demande de devis</a>
        </div>
        <div class="nav-item<?php if ($current == 'contact') echo ' active'?>">
            <a class="nav-text" href="<?php echo $contextRoot ?>/contact">Contact</a>
        </div>
    </div>
</header>