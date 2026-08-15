<?php
class Map {
    
    private array $defaultArr = [];
    
    private ArrayObject $ArrayObject;


    public function __construct() {
        $this->ArrayObject = new ArrayObject($this->defaultArr);
    }
    
    public function getArrayObject() {
        return $this->ArrayObject;
    }


    public function addNewArr(array $newArray):void {
        $this->ArrayObject->exchangeArray($newArray);
    }
    
    public function put (string|int $key, mixed $val):void {
        $this->ArrayObject->offsetSet($key, $val);
    }
    
    public function checkKeyExists(string|int $key): bool {
        return ($this->ArrayObject->offsetExists($key));
    }
    
    public function getValueByKey (string|int $key):string|int|bool {
        if ($this->checkKeyExists($key)):
            return ($this->ArrayObject->offsetGet($key));
        endif;
        return (false);
    }
    
    public function getCountAvailableValue():int {
        return ($this->ArrayObject->count());
    }
    
    public function deleteValueByKey(string|int $key):void {
        $this->ArrayObject->offsetUnset($key);
    }
}
