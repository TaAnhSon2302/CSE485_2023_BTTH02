<?php
class Category {
    // Thuộc tính
    private $matloai;
    private $tentloai;
    public function __construct($matloai,$tentloai ) {
        $this->matloai = $matloai;
        $this->tentloai = $tentloai;
}
  //Setter và Getter
  public function getmatloai(){
    return $this->matloai;
  }
  public function setmatloai($matloai) {
    $this->matloai = $matloai;
}
 public function gettentloai(){
   return $this->tentloai; 
 }
 public function settentloai($tentloai) {
    $this->tentloai = $tentloai;
 }
}
?>