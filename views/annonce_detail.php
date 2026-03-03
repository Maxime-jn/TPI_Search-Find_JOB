<section class="ad-detail-section">
    <div class="container">
        <div class="ad-detail-back">
            <a href="/annonces" class="btn btn-outline-dark">&larr; Retour aux annonces</a>
        </div>

        <div class="ad-detail-card">
            <div class="ad-detail-header">
                <div>
                    <h1><?= htmlspecialchars($ad->title) ?></h1>
                    <p class="ad-detail-author">Publié par <strong><?= htmlspecialchars($ad->authorName) ?></strong></p>
                </div>
                <div class="ad-detail-actions">
                    <a href="/annonces/<?= $ad->idAds ?>/modifier" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="/annonces/<?= $ad->idAds ?>/supprimer" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?');">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </div>

            <div class="ad-detail-meta">
                <span class="meta-item">📅 Publié le : <?= date('d/m/Y à H:i', strtotime($ad->createdAt)) ?></span>
                <?php if ($ad->updatedAt && $ad->updatedAt !== $ad->createdAt): ?>
                    <span class="meta-item">🔄 Mis à jour le : <?= date('d/m/Y à H:i', strtotime($ad->updatedAt)) ?></span>
                <?php endif; ?>
            </div>

            <div class="ad-detail-body">
                <h2>Description du poste</h2>
                <p><?= nl2br(htmlspecialchars($ad->description)) ?></p>
            </div>

            <?php if (!empty($adKeywords)): ?>
                <div class="ad-detail-keywords">
                    <h3>Mots-clés</h3>
                    <div class="keywords-list">
                        <?php foreach ($adKeywords as $keyword): ?>
                            <span class="keyword-tag"><?= htmlspecialchars($keyword->name) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>