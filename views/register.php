<div class="auth-page">
    <div class="auth-card">
        <h2>Créer un compte</h2>
        <form action="/register" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Choisissez un nom d'utilisateur" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Choisissez un mot de passe" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
            </div>
            <div class="form-group">
                <label for="role">Type de compte</label>
                <select id="role" name="role" required>
                    <option value="">Sélectionnez votre profil</option>
                    <option value="researcher">Chercheur d'emploi</option>
                    <option value="advertiser">Annonceur</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
        <div class="auth-footer">
            <p>Déjà un compte ? <a href="/login">Se connecter</a></p>
        </div>
    </div>
</div>
