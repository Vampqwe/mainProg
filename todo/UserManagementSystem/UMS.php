<?php
declare(strict_types = 1);

class UMS {

    protected static $accData = [
        'mail' => 'Doctor_try@mail.ru',
        'password' => '',
        'ip' => '',
        'access' => 0,
        'isAuth' => 0
        ];
    protected static DataBase $DataBase;
    private Session $Session;
    private Account $Account;
    private Map $Map;

    public function __construct() {
        self::$DataBase = new DataBase();
        $this->Session = new Session();
        $this->Account = new Account();
    }

    public function update () {
        var_dump( $this->Account->getMailDb());
        // if ($this->Session->getSession()['user']['mail'] !== $this->Account->getMailDb()):
        //     echo 'no';
        // else:
        //     echo 'yes';
        // endif;
    }

    public function addData ($data = []) {
        self::$accData = $data;
    }

    public function registration () {
    }

    public function authorization () {
    }

    public function authentication () {

    }

    public function getAuthRegLinc ($lincAuth, $lincReg) {
        if ($this->Session->getSession()['user']['isAuth'] == 0) {
            [$lincAuth,$lincReg];
        }
        return;
    }
}