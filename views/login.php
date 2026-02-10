<div class="auth-page">
    <div class="auth-card">
        <h2>Connexion</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        <form action="/login" method="POST">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Votre nom d'utilisateur" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
        <div class="auth-footer">
            <p>Pas encore de compte ? <a href="/register">S'inscrire</a></p>
        </div>
    </div>
</div>