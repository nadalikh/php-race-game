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

    /**
     * @return mixed
     * Show the vehicles for the players.
     */
    public function showOptions(){
        $choices = $this->instance->choices('Player ' . Player::$id , $this->db->options, [1]);
        $choices = \array_map(function ($c)
        {
            return $this->db->options[$c];
        }, $choices);
        $this->instance->greenBold('You selected: ' . implode(', ', $choices), true);

        return $choices[0];
    }

    /**
     * @param $message
     * @return mixed
     * Get input from users.
     */
    public function getInput($message){
        return $this->instance->prompt($message, rand(1, 100));
    }

    /**
     * @param $message
     * @return void
     * Show message to users.
     */
    public function output($message){
        $this->instance->greenBold($message, true);
    }

}