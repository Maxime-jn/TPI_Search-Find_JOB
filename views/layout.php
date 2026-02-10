<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title><?= $title ?? 'S&FO' ?> - Search & Find Offers</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a class="logo" href="/">S&<span>FO</span></a>
            <div class="nav-links">
                <a href="/annonces">Annonces</a>
                <?php if ($isConnected == false) { ?>
                    <a href="/login">Connexion</a>
                    <a href="/register" class="btn-primary">S'inscrire</a>
                <?php } else { ?>
                    <a href="/profile">Mon Profil</a>
                    <a href="/logout" class="btn-primary">Se déconnecter</a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?= $content ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <!-- <div class="footer-bottom"> -->
            <p>&copy; 2026 S&FO - Tous droits réservés</p>
            <!-- </div> -->
        </div>
    </footer>
</body>

</html>