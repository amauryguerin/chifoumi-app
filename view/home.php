<form name="chifoumi" method="POST" action='index.php?view=result'>
    <input name="userName" type='text' required placeholder="Votre pseudo..." />
    <div>
        <?php
        foreach ($game->gameChoices as $gameChoice) {
            echo '<button type="submit" name="userChoice" value="' . $gameChoice->value . '">' . $gameChoice->label . '</button>';
        }
        ?>
    </div>
</form>
<?php if (!empty(App\App::getDB()->read('SELECT * FROM users '))) : ?>
    <div class="scoreboard">
        <h3>CLASSEMENT</h3>
        <ol>
            <?php
            foreach (App\App::getDB()->read('SELECT * FROM users ORDER BY score DESC LIMIT 5') as $user) : ?>
                <li>
                    <?= $user->name; ?>
                    <span>(<?= $user->score; ?> 🏆)</span>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>