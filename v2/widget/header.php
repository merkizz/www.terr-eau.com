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
            <a class="nav-text" href="/v2" title="Terr'Eau">
                <img src="/v2/static/img/logo.png" height="50" alt="Logo Terr'eau"/>
                <span>Terr'Eau</span>
            </a>
        </div>
        <div class="nav-list">
            <div class="nav-item<?php if ($current == 'competences') echo ' active'?>">
                <a class="nav-text" href="/v2/competences">Compétences</a>
            </div>
            <div class="nav-item<?php if ($current == 'activites') echo ' active'?>">
                <a class="nav-text" href="/v2/activites">Activités</a>
            </div>
            <div class="nav-item<?php if ($current == 'realisations') echo ' active'?>">
                <a class="nav-text" href="/v2/realisations">Réalisations</a>
            </div>
            <div class="nav-item<?php if ($current == 'devis') echo ' active'?>">
                <a class="nav-text" href="/v2/devis">Demande de devis</a>
            </div>
            <div class="nav-item<?php if ($current == 'contact') echo ' active'?>">
                <a class="nav-text" href="/v2/contact">Contact</a>
            </div>
        </div>
    </nav>
    <div class="nav-slide-backdrop" data-role="nav-backdrop"></div>
    <div class="nav-slide" data-role="nav-slide">
        <div class="nav-item<?php if ($current == 'competences') echo ' active'?>">
            <a class="nav-text" href="/v2/competences">Compétences</a>
        </div>
        <div class="nav-item<?php if ($current == 'activites') echo ' active'?>">
            <a class="nav-text" href="/v2/activites">Activités</a>
        </div>
        <div class="nav-item<?php if ($current == 'realisations') echo ' active'?>">
            <a class="nav-text" href="/v2/realisations">Réalisations</a>
        </div>
        <div class="nav-item<?php if ($current == 'devis') echo ' active'?>">
            <a class="nav-text" href="/v2/devis">Demande de devis</a>
        </div>
        <div class="nav-item<?php if ($current == 'contact') echo ' active'?>">
            <a class="nav-text" href="/v2/contact">Contact</a>
        </div>
    </div>
</header>