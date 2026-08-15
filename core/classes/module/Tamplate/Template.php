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

    public function readTplFile ():string {
        return (string)$this->File->readFile();
    }

    public function assign (string $key, string $value):void {
        $this->Map->put($key, $value);
    }

    public function render ():string {
        $content = $this->readTplFile();
        foreach ($this->Map->getArrayObject() as $key => $value) {
            $content = str_replace('{'.$key.'}', (string)$value, $content);
        }
        return $content;
    }
}