<?php
class Article{
    // Thuộc tính

    private $tieude;
    private $tomtat;
    private $tenbhat;
    private $matloai,$noidung,$matgia,$ngayviet,$hinhanh;


    public function __construct($tieude,$tenbhat,$matloai ,$tomtat,$noidung,$matgia,$ngayviet,$hinhanh){
        $this->tieude = $tieude;
        $this->tenbhat = $tenbhat;

        $this->matloai = $matloai;
        $this->tomtat = $tomtat;
        $this->noidung = $noidung;
        $this->matgia = $matgia;
        $this->ngayviet = $ngayviet;
        $this->hinhanh = $hinhanh;
    }

    // Setter và Getter
    public function gettieude(){
        return $this->title;
    }
    public function settieude($tieude){
        $this->tieude = $tieude;
    }

    public function gettenbhat(){
        return $this->tenbhat;
    }
    public function settenbhat($tenbhat){
        $this->tenbhat = $tenbhat;
    }

    public function getmatloai(){
        return $this->matloai;
    }
    public function setmatloai($matloai){
        $this->matloai = $matloai;
    }

    public function gettomtat(){
        return $this->tomtat;
    }
    public function settomtat($tomtat){
        $this->tomtat = $tomtat;
    }

    public function getnoidung(){
        return $this->noidung;
    }
    public function setnoidung($noidung){
        $this->noidung = $noidung;
    }

    public function getmatgia(){
        return $this->matgia;
    }
    public function setmatgia($matgia){
        $this->matgia = $matgia;
    }

    public function gethinhanh(){
        return $this->hinhanh;
    }
    public function sethinhanh($hinhanh){
        $this->hinhanh = $hinhanh;
    }

    public function getngayviet(){
        return $this->ngayviet;
    }
    public function setngayviet($ngayviet){
        $this->ngayviet = $ngayviet;
    }

}