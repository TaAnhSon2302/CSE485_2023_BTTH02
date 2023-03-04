<?php
require_once("configs/DBConnection.php");
include("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        //$sql = "SELECT * FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai INNER JOHN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia WHERE ma_bviet = '$mabviet' ";
        //$sql = "SELECT baiviet.*,theloai.ten_tloai, tacgia.ten_tgia FROM baiviet, theloai, tacgia WHERE baiviet.ma_tgia = tacgia.ma_tgia AND baiviet.ma_tloai = theloai.ma_tloai ORDER BY baiviet.ma_bviet ASC";

        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article( $row['hinhanh'], $row['ten_bhat'],$row['ma_bviet']);
            array_push($articles,$article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }

    public function getDetailArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
         // B2. Truy vấn
         $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat,baiviet.tomtat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet, baiviet.hinhanh FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ma_bviet = '" . $id . "'";
         $stmt = $conn->query($sql);

                 // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['hinhanh'], $row['ten_bhat'],$row['ma_bviet'],$row['tieude'], $row['tomtat'],$row['ten_tgia'],$row['ten_tloai'],$row['ngayviet']);
            array_push($articles,$article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }

    public function getUpdateArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "UPDATE baiviet SET tieude = '$tieude', ten_bhat = '$tenbhat', ma_tloai = '$matloai' , tomtat = '$tomtat',
        noidung = '$noidung' , ma_tgia = '$matgia' , ngayviet = '$ngayviet' , hinhanh = '$link$hinhanh'
        WHERE ma_bviet = '$mabviet' ";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $update_articles = [];
        while($row = $stmt->fetch()){
            $update_article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($update_articles,$update_article);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }

    public function getAddArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "INSERT INTO `baiviet`(`tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `ngayviet`, `hinhanh`) 
                VALUES ('$tieude','$tenbhat','$matloai','$tomtat','$noidung','$matgia','$ngayviet','$link$hinhanh')";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $add_articles = [];
        while($row = $stmt->fetch()){
            $add_article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($add_articles,$add_article);
        }
        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }
}
?>