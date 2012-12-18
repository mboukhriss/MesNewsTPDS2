<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <h1 id="titreSite"><a href="index.php">Mes News</a></h1>
                <p class="centre">Bienvenue sur mon site d'actualités.</p>
            </header>
            <nav>
                <section>
                    <h1>Administration</h1>
                    <ul>
                        <li><a href="Vue/newsAjout.php">Ajouter une news</a></li>
                    </ul>
                </section>
            </nav>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedSite">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>