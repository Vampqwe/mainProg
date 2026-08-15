<?php
declare(strict_types = 1);

class Config {

    private $configArr = [];
    //private $configFile = 'config.ini';

    public function __construct ($configFile = 'config.ini'){
        $p = new File(Route::getPathCore().$configFile);
        try {
            $this->configArr = $p->parseIni();
        }catch(FileException $fe){
            $p->createFile();
            echo "файл конфигурации создан";
            $p->closeFile();
        }
    }

    public function getConfig ($configName) {
        if(!array_key_exists($configName, $this->configArr)) {
            throw new ConfigException('Сonfig name *'.$configName.'* does not exist!');
        }
        return $this->configArr[$configName];
    }
}