<?php
$game->startGame();
$game->duel($_POST['userChoice'], $_POST['userName']);
?>

<h2>
    <?php echo $game->result;
    if ($game->userWinStreak !== 0) {
        echo '<span>🔥 Winstreak de ' . $game->userWinStreak . ' 🔥</span>';
    };
    ?>
</h2>
<p>
    <?php echo ucfirst($game->userName) ?>, voici votre score : <?php echo $game->usersData[$game->userName] ?>
</p>
<p>Score de l'ordinateur : <?php echo $game->computerScore ?></p>
<a href="index.php" class="btn">Rejouer</a>