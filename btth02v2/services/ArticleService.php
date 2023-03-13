<?php
require_once("configs/DBConnection.php");
include_once("models/Article.php");
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        // $sql = "SELECT * FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai INNER JOHN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia WHERE ma_bviet = '$mabviet' ";
        // $sql = "SELECT baiviet.*,theloai.ten_tloai, tacgia.ten_tgia FROM baiviet, theloai, tacgia WHERE baiviet.ma_tgia = tacgia.ma_tgia AND baiviet.ma_tloai = theloai.ma_tloai";
        // $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat,baiviet.tomtat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet, baiviet.hinhanh FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ma_bviet = '" . $id . "'";


        $sql = "SELECT * FROM baiviet
                INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai ORDER BY baiviet.ma_bviet ASC";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles,$article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }

    public function getDetailArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql = "SELECT *
        FROM baiviet
        INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
        INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai
        WHERE ma_bviet = '".$id."'";
         $stmt = $conn->query($sql);

        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles,$article);
        }


        return $articles;
    }

    public function get_id_Article($id)
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT baiviet.*,theloai.ten_tloai, tacgia.ten_tgia 
                FROM baiviet, theloai, tacgia 
                WHERE baiviet.ma_tgia = tacgia.ma_tgia AND baiviet.ma_tloai = theloai.ma_tloai AND baiviet.ma_bviet = $id;";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {

            $arr = [
                'ma_bviet' => $row['ma_bviet'],
                'tieude' => $row['tieude'],
                'ten_bhat' => $row['ten_bhat'],
                'ma_tloai' => $row['ma_tloai'],
                'tomtat' => $row['tomtat'],
                'noidung' => $row['noidung'],
                'ma_tgia' => $row['ma_tgia'],
                
                'ten_tgia' => $row['ten_tgia'],
                'ngayviet' => $row['ngayviet'],
                'ten_tloai' => $row['ten_tloai'],
                'hinhanh' => $row['hinhanh']

            ];
            array_push($articles, $arr);
        }
        return $articles;
    }

    public function getUpdateArticles($mabviet, $tieuDe, $baiHat, $maTloai, $tomTat, $noiDung, $maTgia, $ngayViet, $hinhAnh){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql_update = "UPDATE `baiviet` SET `tieude` = '$tieuDe', `ten_bhat` = '$baiHat', `ma_tloai` = '$maTloai' , `tomtat` = '$tomTat',
        `noidung` = '$noiDung' , `ma_tgia` = '$maTgia' , `ngayviet` = CURDATE() , `hinhanh` = '$hinhAnh' WHERE `ma_bviet` = '$mabviet' ";
        $stmt_update = $conn->query($sql_update);
     }

    public function getAddArticles( ){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieuDe = $_POST['txttieude'];
            $baiHat = $_POST['txttenbaihat'];
            $maTloai = $_POST['txttloai'];
            $tomTat = $_POST['txttomtat'];
            $noiDung = $_POST['txtnoidung'];
            $maTgia = $_POST['txttgia'];
            $link =  $_POST['path'].$_FILES['file-upload']['name'];
            $hinhAnh = $_FILES['file-upload']['name'];

            $sql_add = "INSERT INTO `baiviet`(`tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `ngayviet`, `hinhanh`) 
            VALUES ('$tieuDe','$baiHat','$maTloai','$tomTat','$noiDung','$maTgia',CURDATE(),'$hinhAnh')";
            $stmt = $conn->query($sql_add);
            move_uploaded_file($_FILES['file-upload']['tmp_name'], $link);//mac ko can dung`
            if ($stmt) {
                return true;
            } else { 
                return false;
            }
        }
    }

    public function deleteArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql_delete = "DELETE FROM `baiviet` WHERE `ma_bviet` = '" . $id . "'";
        $stmt_delete = $conn->query($sql_delete);
 
        $sql_select = "SELECT * FROM baiviet";
        $stmt_select = $conn->query($sql_select);
 
        $delete_articles = [];
        while($row = $stmt_select->fetch()){
            $delete_article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($delete_articles,$delete_article);
        }
  
        return $delete_carticles;
    }
}
?>