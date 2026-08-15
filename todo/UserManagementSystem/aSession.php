<?php
declare(strict_types = 1);

class Session extends UMS{

    private array $user = [];

    public function __construct() {
        if(session_start()):
            if (!isset($_SESSION['user'])):
                $this->initSession();
            endif;
            return true;
        endif;
        return false;
    }

    public function initSession () {
        $_SESSION['user']['mail'] = self::$accData['mail'];
        $_SESSION['user']['access'] = self::$accData['access'];
        $_SESSION['user']['isAuth'] = self::$accData['isAuth'];
    }

    public function getSession () {
        return $_SESSION;
    }

    public function resetSession () {

    }
    
}