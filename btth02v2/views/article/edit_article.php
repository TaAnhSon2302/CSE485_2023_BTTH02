<?php 
$ma_bviet = $_GET['id'];
include '../connect_db.php';
if(!$_SESSION['login']) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">Người dùng</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <a href="logout.php" class="nav-link" type="submit">Đăng xuất</a>
                </form>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
    <?php   
            $sql = "SELECT baiviet.*,theloai.ten_tloai, tacgia.ten_tgia FROM baiviet, theloai, tacgia WHERE baiviet.ma_tgia = tacgia.ma_tgia AND baiviet.ma_tloai = theloai.ma_tloai AND baiviet.ma_bviet = $ma_bviet;";
    $result = mysqli_query($conn, $sql);
    $article = mysqli_fetch_assoc($result);
    ?>
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <form action="./index.php?controller=article&action=edit" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblArId">Mã bài viết</span>
                        <input type="text" class="form-control" name="txtmabaiviet" readonly value="<?php echo $article['ma_bviet'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 25px 0px 25px" class="input-group-text" id="lblArTitle">Tiêu đề</span>
                        <input type="text" class="form-control" name="txttieude" value = "<?php echo $article['tieude'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblArSong">Tên bài hát</span>
                        <input type="text" class="form-control" name="txttenbaihat" value = "<?php echo $article['ten_bhat'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 24px 0px 24px" class="input-group-text" id="lblTheLoai">Thể loại</span>
                        <select class="form-select" name="txttloai" >
                            <?php
                            // Kết nối tới database
                            $con = mysqli_connect('localhost', 'root', '', 'btth01_cse485');

                            // Lấy danh sách thể loại từ bảng theloai
                            $sql = "SELECT * FROM theloai";
                            $result = mysqli_query($con, $sql);

                            // Hiển thị các tùy chọn thể loại trong dropdown list
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($article['ma_tloai'] == $row['ma_tloai']) {
                                    echo '<option value="' . $row['ma_tloai'] . '" selected>' . $row['ten_tloai'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['ma_tloai'] . '">' . $row['ten_tloai'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 25px 0px 25px" class="input-group-text" id="lblAr">Tóm tắt</span>
                        <?php 
                            $sql = "SELECT tomtat FROM baiviet WHERE ma_bviet = $ma_bviet ";
                            $result = mysqli_query($conn,$sql);
 
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <textarea type="text" class="form-control" name="txttomtat" ><?php echo $article['tomtat'] ?></textarea>
                        <?php 
                                }
                            }
                        ?>
                    </div>


                    <div class="input-group mt-3 mb-3" >
                        <span style ="padding : 0px 20px 0px 20px "class="input-group-text" id="lblArContent">Nội dung</span>
                        <textarea type="text"  class="form-control" name="txtnoidung"><?php echo $article['noidung']; ?></textarea>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 27px 0px 27px" class="input-group-text" id="lblArAuthor">Tác giả</span>
                        <select class="form-select" name="txttgia" >
                            <?php
                            $con = mysqli_connect('localhost', 'root', '', 'btth01_cse485');
                            $sql = "SELECT * FROM tacgia";
                            $result = mysqli_query($con, $sql);

                            // Hiển thị các tùy chọn thể loại trong dropdown list
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($article['ma_tgia'] == $row['ma_tgia']) {
                                    echo '<option value="' . $row['ma_tgia'] . '" selected>' . $row['ten_tgia'] . '</option>';
                                } else {
                                    echo '<option value="' . $row['ma_tgia'] . '">' . $row['ten_tgia'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 18px 0px 18px "class="input-group-text" id="lblArDay">Ngày viết</span>
                        <input type="text" class="form-control" name="Y-m-d H:i:s" value="<?php echo $article['ngayviet'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 22px 0px 22px"class="input-group-text" id="lblArImage">hình ảnh</span>
                        <input type="file" class="form-control" id="file-upload" name="file-upload" value = "<?php echo $article['hinhanh'] ?>">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
        <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>