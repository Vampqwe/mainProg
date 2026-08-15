<?php
declare(strict_types = 1);

class AccountManagementSystem {

    private $Account;

    private $accName;
    private $email;
    private $password;
    private $repPassword;

    public function __construct() {
        $this->Account = new Account();

    }

    public function addAccData (string $accName, string $email, string $password, string $repPassword):void {
        $this->accName = trim($accName);
        $this->email = trim($email);
        $this->password = trim($password);
        $this->repPassword = trim($repPassword);
    }

    public function verification () {

    }
}