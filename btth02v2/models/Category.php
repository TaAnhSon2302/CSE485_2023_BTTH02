<?php
class Category {
    // Thuộc tính
    private $ma_tloai;
    private $ten_tloai;
    public function __construct($ma_tloai=NULL,$ten_tloai=Null ) {
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
}
  //Setter và Getter
  public function getMaTloai(){
    return $this->mat_loai;
  }
  public function setMaRloai($mat_loai) {
    $this->mat_loai = $mat_loai;
}
 public function gettentloai(){
   return $this->ten_tloai; 
 }
 public function settentloai($tentloai) {
    $this->ten_tloai = $ten_tloai;
 }
}
?>