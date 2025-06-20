<?php

class DB {
    public static ?DB $instance = null;

    private function __construct(public array $amount){
        echo "Instance Created <br />";
    }

    public static function getInstance(array $config){
        if(self::$instance === null){
            self::$instance = new DB($config);
        }

        return self::$instance;
    }
}