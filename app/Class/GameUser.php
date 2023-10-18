<?php

namespace App\Class;

class GameUser {
    public string $userName;
    public int $userScore;

    public function __construct(string $userName, int $userScore)
    {
        $this->userName = $userName;
        $this->userScore = $userScore;
    }
}