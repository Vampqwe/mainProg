<?php
declare(strict_types = 1);

class Logger {

    private File $File;
    private TimeDate $TimeDate;

    public function __construct(string $fileLog = 'log.txt'){
        $this->File = new File(Route::getPathCoreLog().$fileLog);
        $this->TimeDate = new TimeDate();
    }

    public function inLog (string $textLog, string $typeLog = 'main'):void {
        $string = '('.$typeLog.')'.$this->TimeDate->getDate().'__'.$this->TimeDate->getTime().'---> '.$textLog.PHP_EOL;
        try{
            $this->File->putToFile($string);
        }catch(FileException $fe){
            $fe->getMessage();
        }
        return;
    }
}