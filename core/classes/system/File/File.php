<?php
declare(strict_types = 1);

class File {

    private $file;
    private $openFile;
    private $writenByte;

    public function __construct ($file) {
        $this->file = $file;
    }

    public function getFile ():string {
        return $this->file;
    }

    public function existsFile () {
        if (!file_exists($this->getFile())) {
            return false;
        }
        return true;
    }

    public function parseIni ():array|bool {
        if (!$this->existsFile()) {
            throw new FileException();
        }
        return parse_ini_file($this->getFile());
    }

    public function createFile ($mode = 'w') {
        $this->openFile = fopen($this->getFile(), $mode);
        if (!$this->openFile) {
            throw new FileException('не удалось создать файл!');
        }
    }

    public function readFile () {
        if ($this->existsFile()) {
            return file_get_contents($this->getFile());
        }
    }

    public function closeFile () {
        if ($this->openFile) {
            fclose($this->openFile);
            $this->openFile = null;
        }
    }

    public function putToFile (string $string, $mode = FILE_APPEND) {
        $this->writenByte = file_put_contents($this->getFile(), $string, $mode);
        if ($this->writenByte === false) {
            throw new FileException('не удалось записать в файл!');
        }
        return $this->writenByte;
    }
}