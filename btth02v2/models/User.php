<?php
 class User{
    private $id_ngdung, $tai_khoan, $mat_khau, $quyen_han;
    public function __construct($id_ngdung=null, $tai_khoan=null, $mat_khau=null, $quyen_han=null)
    {
      $this->$id_ngdung =  $id_ngdung;
      $this-> $tai_khoan =   $tai_khoan;
      $this-> $mat_khau  =  $mat_khau;
      $this->$quyen_han = $quyen_han;
    }
    public function getId(){
      return $this->$id_ngdung;
     }
     public function setId($id_ngdung){
       $this->$id_ngdung = $id_ngdung;
     }
     public function getTaiKhoan(){
      return $this->$tai_khoan;
     }
     public function setTaiKhoan($tai_khoan){
       $this->$tai_khoan=$tai_khoan;
     }
     public function gettMatKhau(){
      return $this->$mat_khau;
     }
     public function setMatKhau($mat_khau){
     $this->$mat_khau == $mat_khau;
     }
     public function getQuyenHan(){
      return $this->$quyen_han;
     }
     public function setQuyenHan($quyen_han){
      $this ->$quyen_han = $quyen_han;
     }
}
?>