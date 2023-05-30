<?php

class Database {

    private $name;
    private $record;
    private static $singletonObject;

    private function Database($name) {
        $this->name = $name;
        $this->record = 0;
    }

    /**
     * 
     */
    public static function getInstance($name) {
        if(self::$singletonObject == null) {
            self::$singletonObject = new Database($name);
        }   
        return self::$singletonObject;
    }

    /**
     * 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     */
    public function editRecord($operation) {
        return "Performing is a " . $operation . " operation on record " . $this->record . " in database " . $this->name . "\n";
    }
}


$databaseOne = Database::getInstance('viecoi_db');
$databaseTwo =  Database::getInstance('taocv_db');
$databaseThree = Database::getInstance('referral_db');

echo $databaseOne->editRecord(1);
echo $databaseTwo->editRecord(1);
echo $databaseThree->editRecord(1);