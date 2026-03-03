<section class="ads-header">
    <div class="container">
        <h1>Toutes les annonces</h1>
        <p>Découvrez les offres d'emploi disponibles</p>
        <div class="ads-actions">
            <a href="/annonces/ajouter" class="btn btn-primary">+ Publier une annonce</a>
        </div>
    </div>
</section>

<section class="ads-section">
    <div class="container">
        <div class="ads-filters">
            <form class="search-bar" method="GET" action="/annonces">
                <input type="text" name="search" placeholder="Rechercher une annonce..." class="search-input"
                    id="searchInput" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>

        <div class="ads-grid">

            <?php foreach ($ads as $ad): ?>
                <div class="ad-card">
                    <div class="ad-card-header">
                        <span class="ad-date"><?= $ad->created_at ?></span>
                    </div>
                    <h3 class="ad-title"><a href="/annonces/<?= $ad->idAds ?>"><?= $ad->title ?></a></h3>
                    <p class="ad-description"><?= $ad->description ?></p>
                    <div class="ad-meta">
                        <span class="ad-author"></span>
                    </div>
                    <div class="ad-card-footer">
                        <a href="/annonces/<?= $ad->idAds ?>" class="btn btn-primary btn-sm">Détails</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>