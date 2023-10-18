<?php

namespace App\Class;

class GameChoice
{
    // déclaration des propriétés
    public string $value;
    public string $label;
    public string $nemesisValue;

    public function __construct(string $value, string $label, string $nemesisValue)
    {
        // assignation des arguments dans les propriétés
        $this->value = $value;
        $this->label = $label;
        $this->nemesisValue = $nemesisValue;
    }
}
