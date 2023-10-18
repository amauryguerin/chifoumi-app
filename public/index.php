<?php
require '../app/Autoloader.php';

use App\Class\GameInstance;

App\Autoloader::register();

if (isset($_GET['view'])) {
    $view = $_GET['view'];
} else {
    $view = 'home';
}

// initialisation

session_start();
if (!isset($_SESSION["game"])) {
    $game = new GameInstance;
    $game->startGame();
    $_SESSION["game"] = $game;
} else {
    $game = $_SESSION["game"];
}

ob_start();
if ($view === 'home') {
    require '../view/home.php';
} elseif ($view === 'result') {
    require '../view/result.php';
}
$content = ob_get_clean();
require '../view/template/default.php';
