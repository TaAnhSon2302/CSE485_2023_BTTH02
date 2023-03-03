<?php
class Author{

    private $matgia;
    private $tentgia;

    public function __construct($matgia, $tentgia){
        $this->matgia = $matgia;
        $this->tentgia = $tentgia;
    }

    public function getMatgia(){
        return $this->matgia;
    }

    public function setMatgia($matgia){
        $this->matgia = $matgia;
    }

    public function getTentgia(){
        return $this->tentgia;
    }

    public function setTentgia($matgia){
        $this->tentgia = $tentgia;
    }
}
?>