<section class="ad-form-section">
    <div class="container">
        <div class="ad-form-back">
            <a href="/annonces" class="btn btn-outline-dark">&larr; Retour aux annonces</a>
        </div>

        <div class="ad-form-card">
            <h2>Publier une annonce</h2>
            <form action="/annonces/ajouter" method="POST">
                <div class="form-group">
                    <label for="title">Titre de l'annonce</label>
                    <input type="text" id="title" name="title" placeholder="Ex: Développeur Web Full Stack" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="10"
                        placeholder="Décrivez le poste, les responsabilités, les compétences requises..."
                        required></textarea>
                </div>

                <div class="form-group">
                    <label for="keywords">Mots-clés</label>
                    <input type="text" id="keywords" name="keywords"
                        placeholder="Ex: PHP, JavaScript, React (séparés par des virgules)">
                    <small class="form-hint">Séparez les mots-clés par des virgules</small>
                </div>

                <div class="form-group">
                    <label for="media">Ajouter des médias</label>
                    <div class="file-upload-area">
                        <input type="file" id="media" name="media[]" multiple accept="image/*,video/*">
                        <p>Glissez vos fichiers ici ou cliquez pour sélectionner</p>
                        <small>Images et vidéos acceptées (max 5 Mo par fichier)</small>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Publier l'annonce</button>
                    <a href="/annonces" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</section>