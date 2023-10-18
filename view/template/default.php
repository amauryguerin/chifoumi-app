<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css" />
    <title>Chifoumi 2.0</title>
</head>

<body>
    <header class="site--header">
        <nav>
            <a class="site--logo" href="index.php">
                🗿 🍁 ✂️
            </a>
            <a class="contact--btn" href="https://amauryguerin.netlify.app/">
                <span>Crédits</span>
            </a>
        </nav>
    </header>
    <main class="<?= $view ?>">
        <h1>Chifoumi</h1>
        <?= $content; ?>
    </main>
    <footer class="site--footer">
        <div>
            <h2>
                Comment jouer au Chifoumi :
            </h2>
            <p>
                Le jeu se joue généralement en duel même s’il est possible de s’affronter à plusieurs. Pour commencer les joueurs comptent jusqu’à trois en mettant la main dans le dos. Une fois à trois les joueurs révèlent leur main (pierre, feuille ou ciseaux) en même temps. La plus forte des formes l’emporte et le joueur marque le point gagnant. Si les deux joueurs utilisent la même forme c’est un match nul. A savoir que le jeu se déroule généralement en une manche gagnante. Mais pour plus de plaisir de jeu, il est bien de jouer au meilleur des trois manches (le premier a deux points remporte la partie) ou cinq manches (premier à trois points). A vous de décider !
            </p>
        </div>
    </footer>
</body>

</html>