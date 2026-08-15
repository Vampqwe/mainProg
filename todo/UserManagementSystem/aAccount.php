<?php
declare(strict_types = 1);

class Account extends UMS{

    //private DataBase $DataBase;

    public function __construct() {
        //$this->DataBase = new DataBase();
    }

    public function getMail ():string {
        return self::$accData['mail'];
    }

    public function getMailDb () {
        $prep = self::$DataBase->prepare("SELECT mail FROM account WHERE mail = :mail");
        $prep->bindValue(':mail', self::$accData['mail'], PDO::PARAM_STR);
        $prep->execute();
        return $prep->fetchAll();
    }

    public function getPassword ():string {
        return self::$accData['password'];
    }

    public function getIps ():string {
        return self::$accData['ip'];
    }

    public function getAccess ():int {
        return self::$accData['access'];
    }

    public function getIsAuth () {
        return self::$accData['isAuth'];
    }

    /** возвращает информацию аккаунта из базы данных,
    * поиск происходит по mail. Если аккаунт (почта) не
    * найден возврашает false
    * @param $data[] название нужной таблицы в бд.
    * @return array
    * @return false
    */
    // public function getDataAccDb (array $data = []):array|false {
    //     $data = implode(',',$data);
	// 	$sql = "SELECT $data FROM account WHERE `mail` = :mail";
    //     $bindValue = [':mail' =>  $this->getMail()];
    //     return self::$DataBase->queryFetchBV($sql, $bindValue);
	// }

    public function addDataAccDb () {
        $sql = "INSERT INTO 
        `account`(`mail`, `password`, `ip`, `dateReg`, `access`, `isAuth`) 
                VALUES 
        ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')";
    }
}