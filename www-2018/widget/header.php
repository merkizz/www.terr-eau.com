<header class="main-header" data-role="main-header">
    <nav class="main-nav">
        <div class="nav-item nav-toggler" data-role="nav-toggler">
            <div class="nav-text">
                <div class="burger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="nav-item logo">
            <a class="nav-text" href="<?=$contextRoot?>" title="Sarl Terr'eau">
                <img src="<?=$staticRoot?>/img/logo-520x105.png" width="520" height="105" alt="Logo Sarl Terr'eau"/>
            </a>
        </div>
        <div class="nav-list">
            <div class="nav-item<?=($current == 'activites' ? ' active' : '')?>">
                <a class="nav-text" href="<?=$contextRoot?>/activites">Activités</a>
            </div>
            <div class="nav-item<?=($current == 'realisations' ? ' active' : '')?>">
                <a class="nav-text" href="<?=$contextRoot?>/realisations">Réalisations</a>
            </div>
            <div class="nav-item<?=($current == 'devis' ? ' active' : '')?>">
                <a class="nav-text" href="<?=$contextRoot?>/devis">Demande de devis</a>
            </div>
            <div class="nav-item<?=($current == 'contact' ? ' active' : '')?>">
                <a class="nav-text" href="<?=$contextRoot?>/contact">Contact</a>
            </div>
        </div>
    </nav>
    <div class="nav-slide-backdrop" data-role="nav-backdrop"></div>
    <div class="nav-slide" data-role="nav-slide">
        <div class="nav-item<?=($current == 'activites' ? ' active' : '')?>">
            <a class="nav-text" href="<?=$contextRoot?>/activites">Activités</a>
        </div>
        <div class="nav-item<?=($current == 'realisations' ? ' active' : '')?>">
            <a class="nav-text" href="<?=$contextRoot?>/realisations">Réalisations</a>
        </div>
        <div class="nav-item<?=($current == 'devis' ? ' active' : '')?>">
            <a class="nav-text" href="<?=$contextRoot?>/devis">Demande de devis</a>
        </div>
        <div class="nav-item<?=($current == 'contact' ? ' active' : '')?>">
            <a class="nav-text" href="<?=$contextRoot?>/contact">Contact</a>
        </div>
    </div>
</header>