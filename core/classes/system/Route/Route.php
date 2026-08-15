<?php
declare(strict_types = 1);

class Route {

    public function __construct() {
        
    }

    public static function getPathRoot () {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function getPathCore () {
        return self::getPathRoot().'/core/';
    }

    public static function getPathCoreDb () {
        return self::getPathCore().'db/';
    }

    public static function getPathCoreLog () {
        return self::getPathCore().'log/';
    }
}