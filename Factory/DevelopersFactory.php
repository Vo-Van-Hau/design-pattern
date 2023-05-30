<?php

abstract class Developer {
    /**
     * 
     */
    public $type = '';
    public $price = 0;
    /**
     * 
     */
    public function training() {
        echo $this->type . ' Developer is trained.<br/>';
    }
    /**
     * 
     */
    public function deliver() {
        echo $this->type . ' Developer is delivered with ' . $this->price . '$.<br/>';
    }
}

class PhpDeveloper extends Developer {
    public $type = 'Php';
    public $price = 1000;
}

class RubyDeveloper extends Developer {
    public $type = 'Ruby';
    public $price = 500;
}

class AndroidDeveloper extends Developer {
    public $type = 'Android';
    public $price = 150;
}

/**
 * @docs: https://viblo.asia/p/laravel-design-patterns-series-factory-pattern-part-2-WkwGnWJqv75g
 */
class DevelopersFactory {

    public $simpleFactory;

    public function __construct() {
        $this->simpleFactory = new SimpleFactory();
    }

    /**
     * 
     */
    public function produceDeveloper($type) {
        $developer = $this->simpleFactory->createDeveloper($type);
        $developer->training();
        $developer->deliver();
        return $developer;
    }
}

class SimpleFactory {

    /**
     * 
     */
    public function createDeveloper($type) {
        switch($type) {
            case 'Php':
                $developer = new PhpDeveloper();
                break;
            case 'Ruby':
                $developer = new RubyDeveloper();
                break;
            case 'Android':
                $developer = new AndroidDeveloper();
                break;
            default:
                $developer = null;
                break;
        }
        return $developer;
    }
}

$developersFactory = new DevelopersFactory();
$developersFactory->produceDeveloper('Php');