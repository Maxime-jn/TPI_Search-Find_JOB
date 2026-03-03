<section class="ad-form-section">
    <div class="container">
        <div class="ad-form-back">
            <a href="/annonces" class="btn btn-outline-dark">&larr; Retour aux annonces</a>
        </div>

        <div class="ad-form-card">
            <h2>Publier une annonce</h2>
            <form action="/annonces/ajouter" method="POST" enctype="multipart/form-data">
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
                    <label>Mots-clés</label>
                    <div class="keywords-wrapper">
                        <input type="search" class="keywords-search" id="keywordsFilter" placeholder="Filtrer les mots-clés...">
                        <div class="keywords-checkboxes" id="keywordsList">
                            <?php foreach ($keywords as $keyword): ?>
                                <label class="keyword-checkbox">
                                    <input type="checkbox" name="keywords[]" value="<?= htmlspecialchars($keyword->idKeywords) ?>">
                                    <?= htmlspecialchars($keyword->name) ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <small class="form-hint keywords-count" id="keywordsCount"></small>
                    <small class="form-hint">Sélectionnez un ou plusieurs mots-clés</small>
                </div>

                <script>
                    const filter = document.getElementById('keywordsFilter');
                    const list   = document.getElementById('keywordsList');
                    const count  = document.getElementById('keywordsCount');

                    function updateCount() {
                        const checked = list.querySelectorAll('input:checked').length;
                        if (checked > 0) {
                            count.textContent = checked + ' mot(s)-clé(s) sélectionné(s)';
                            count.classList.add('visible');
                        } else {
                            count.classList.remove('visible');
                        }
                    }

                    filter.addEventListener('input', () => {
                        const val = filter.value.toLowerCase();
                        list.querySelectorAll('.keyword-checkbox').forEach(label => {
                            label.style.display = label.textContent.trim().toLowerCase().includes(val) ? '' : 'none';
                        });
                    });

                    list.addEventListener('change', updateCount);
                </script>

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