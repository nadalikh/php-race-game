<?php

namespace App;
use Ahc\Cli\IO\Interactor as In;



class ConsoleHelper
{
    private $instance, $db;

    public function __construct($db)
    {
        $this->instance = new In();
        $this->db = $db;
    }
    public function showOptions($playerNumber){
        $choices = $this->instance->choices('Player '. $playerNumber, $this->db->options, [1]);
        $choices = \array_map(function ($c)
        {
            return $this->db->options[$c];
        }, $choices);
        $this->instance->greenBold('You selected: ' . implode(', ', $choices), true);

        return $choices[0];
    }

    public function getInput($message){
        return $this->instance->prompt($message, rand(1, 100));
    }

}