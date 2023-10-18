<?php

namespace App\Class;

class GameInstance
{
    public array $gameChoices;

    public string|object $computerChoice;
    public int $computerScore = 0;

    public string $userName;
    public string $userChoice;
    public int $userScore = 0;
    public int $userWinStreak = 0;
    public object $user;

    public array $usersData = [];

    public string $result;

    public function startGame()
    {
        // définition des choix disponibles pour le joueur
        $rock = new GameChoice('rock', 'Pierre', 'paper');
        $paper = new GameChoice('paper', 'Feuille', 'scissors');
        $scissors = new GameChoice('scissors', 'Ciseaux', 'rock');
        $this->gameChoices = [$rock, $paper, $scissors];
    }

    public function duel(string $userChoice, string $userName)
    {
        // randomisation du choix de l'ordinateur
        $this->computerChoice = $this->gameChoices[array_rand($this->gameChoices, 1)];
        
        // assignation des choix utilisateur dans les propriétés associées
        $this->userChoice = $userChoice;
        $this->userName = $userName;

        // création d'un nouvel utilisateur
        $this->user = new GameUser($this->userName, $this->userScore);

        // vérification ! de si l'utilisateur existe dans usersData via son nom userName
        if (!isset($this->usersData[$this->userName])) {
            $this->usersData[$this->userName] = 0;
            $this->computerScore = 0;
            $this->userWinStreak = 0;

            $params = [':userName' => $this->userName, ':userScore' => $this->usersData[$this->userName]];
            \App\App::getDB()->create($params);
        }

        // gestion de la logique de résultat + incrémentation du score
        if ($this->computerChoice->value === $this->userChoice) {
            $this->result = "Égalité 😳";
            $this->userWinStreak = 0;
        } elseif ($this->computerChoice->nemesisValue === $this->userChoice) {
            $this->result = "Vous avez perdu 😾";
            $this->computerScore++;
            $this->userWinStreak = 0;
        } else {
            $this->result = "Vous avez gagné 🙌";
            $this->usersData[$this->userName]++;
            $this->userWinStreak++;

            $params = [':userName' => $this->userName, ':userScore' => $this->usersData[$this->userName]];
            \App\App::getDB()->update($params);
        }
    }
}
