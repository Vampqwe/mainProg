<?php
declare(strict_types = 1);
class DataBase extends PDO{
	
	private Config $Config;
	private Logger $Logger;
	private $options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];

	public function __construct () {
		$this->Config = new Config();
		$this->Logger = new Logger();
		$this->mySqlDb();
	}

	public function getDbCon ():self {
		return $this;
	}
	
	private function mySqlDb ():void {
		try{
			parent::__construct($this->Config->getConfig('db_driver').
							":host=".$this->Config->getConfig('db_host').
							";dbname=".$this->Config->getConfig('db_name').
							";charset=".$this->Config->getConfig('db_charset'),
							$this->Config->getConfig('db_login'),
							$this->Config->getConfig('db_password'),
							$this->options);
		}catch(ConfigException $cExc){
			$this->Logger->inLog($cExc->getMessage(), 'DataBase');
			throw $cExc;
		}catch(PDOException $dbExc){
			$this->Logger->inLog($dbExc->getMessage(), 'DataBase');
			throw $dbExc;
		}
	}
	
}
?>