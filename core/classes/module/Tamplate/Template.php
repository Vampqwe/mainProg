<?php
declare(strict_types = 1);

class Template {

    private File $File;
    private Map $Map;

    public function __construct()
    {
        $this->Map = new Map();
    }

    public function addTplFile (string $tplFile) {
        $this->File = new File($tplFile);
        if (!$this->File->existsFile()) {
            throw new FileException("не найден шаблон $tplFile");
        }
    }

    public function readTplFile () {
        $this->File->readFile();
    }
}