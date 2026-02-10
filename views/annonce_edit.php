<section class="ad-form-section">
    <div class="container">
        <div class="ad-form-back">
            <a href="/annonces/1" class="btn btn-outline-dark">&larr; Retour au détail</a>
        </div>

        <div class="ad-form-card">
            <h2>Modifier l'annonce</h2>
            <form action="/annonces/1/modifier" method="POST">
                <div class="form-group">
                    <label for="title">Titre de l'annonce</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="10" required></textarea>
                </div>

                <div class="form-group">
                    <label for="keywords">Mots-clés</label>
                    <input type="text" id="keywords" name="keywords">
                    <small class="form-hint"></small>
                </div>

                <div class="form-group">
                    <label>Médias actuels</label>
                    <div class="current-media">
                        <div class="media-thumb">
                            <div class="media-placeholder">Image 1</div>
                            <button type="button" class="btn-remove-media">&times;</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="media">Ajouter de nouveaux médias</label>
                    <div class="file-upload-area">
                        <input type="file" id="media" name="media[]" multiple accept="image/*,video/*">
                        <p>Glissez vos fichiers ici ou cliquez pour sélectionner</p>
                        <small>Images et vidéos acceptées (max 5 Mo par fichier)</small>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="/annonces/1" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</section>