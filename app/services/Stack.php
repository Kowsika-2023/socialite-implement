<?php
namespace App\services;

use function PHPUnit\Framework\isEmpty;

class Stack
{
protected $stack;
protected $limit;

public function __construct($limit=10) {
    $this->stack = [];
    $this->limit = $limit;
}

public function push($item){

    if(count($this->stack) < $this->limit){
        array_push($this->stack,$item);
    }
    else{
        throw new \OverflowException("stack is full");
    }
}

public function pop(){

        return array_pop($this->stack);
    
}

public function peek() {
    return end($this->stack);
}

public function isEmpty() {
   return empty($this->stack);
}

public function size(){
    return count($this->stack);
}

public function getStack()
    {
        return $this->stack;
    }
}
?>
