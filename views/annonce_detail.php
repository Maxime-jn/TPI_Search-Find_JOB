<section class="ad-detail-section">
    <div class="container">
        <div class="ad-detail-back">
            <a href="/annonces" class="btn btn-outline-dark">&larr; Retour aux annonces</a>
        </div>

        <div class="ad-detail-card">
            <div class="ad-detail-header">
                <div>
                    <h1><?= $title ?></h1>
                    <p class="ad-detail-author">Publié par <strong><?= $username ?></strong></p>
                </div>
                <div class="ad-detail-actions">
                    <a href="/annonces/1/modifier" class="btn btn-primary btn-sm">Modifier</a>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </div>
            </div>

            <div class="ad-detail-meta">
                <span class="meta-item">Publié le : <?= $created_at ?></span>
                <span class="meta-item">Mis à jour le : <?= $updated_at ?></span>
            </div>

            <div class="ad-detail-body">
                <h2>Description du poste</h2>
                <p>
                    <?= $description ?>
                </p>
            </div>

            <div class="ad-detail-keywords">
                <h3>Mots-clés</h3>
                <div class="keywords-list">
                    <? foreach ($keywords as $keyword) ?>
                    <span class="keyword-tag"><?= $name ?></span>
                </div>
            </div>
        </div>
    </div>
</section>