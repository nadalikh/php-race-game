<?php

// THIS CLASS HANDLE DRY , SINGLE RESPONSIBILITY AND KISS PRINCIPLES.
namespace App;
class DbHelper
{
    public $data, $options;

    private function createOptions()
    {
        $options = [];
        foreach ($this->data as $key => $record) {
            $options[$key + 1] = $record['name'];
        }
        $this->options = $options;
    }

    public function __construct()
    {
        // Load the json file as database in this class.
        $loadData = file_get_contents("./src/DB/vehicles.json");
        $this->data = json_decode($loadData, true);
        $this->createOptions();
    }

    public function findWithName($name){
        foreach ($this->data as $record)
            if($record['name'] == $name)
                return $record;
    }

}