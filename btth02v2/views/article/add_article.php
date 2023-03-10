
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
<?php
include 'views/includes/header_admin.php';
?>

   <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết </h3>
                <form action="index.php?controller=article&action=add" enctype="multipart/form-data" method="post">
                <input type="hidden" name="path" value="assets/images/songs/">
                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 25px 0px 25px" class="input-group-text" id="lblArTitle">Tiêu đề</span>
                        <input type="text" class="form-control" name="txttieude" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblArSong">Tên bài hát</span>
                        <input type="text" class="form-control" name="txttenbaihat" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 24px 0px 24px" class="input-group-text" id="lblTheLoai">Thể loại</span>
                        <select class="form-select" name="txttloai" >
                        <?php
                            foreach($categories as $key){
                            ?>
                            <option value=" <?php echo $key-> getMaTloai()?> " ><?php echo $key-> getTentloai()?></option>;
                        <?php
                            }
                        ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 25px 0px 25px" class="input-group-text" id="lblAr">Tóm tắt</span>
                        <textarea type="text" class="form-control" name="txttomtat" ></textarea>
                    </div>


                    <div class="input-group mt-3 mb-3" >
                        <span style ="padding : 0px 20px 0px 20px "class="input-group-text" id="lblArContent">Nội dung</span>
                        <div class="" id = "editor">
                        <textarea type="text"  class="form-control" name="txtnoidung" >
                        </textarea>
                        </div>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 27px 0px 27px" class="input-group-text" id="lblArAuthor">Tác giả</span>
                        <select class="form-select" name="txttgia" >
                            <?php
                            foreach($authors as $key){
                            ?>
                            <option value=" <?php echo $key-> getMatgia()?> " selected><?php echo $key-> getTentgia()?></option>;
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    
                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 22px 0px 22px"class="input-group-text" id="lblArImage">Hình ảnh</span>
                        <input type="file" class="form-control" id="file-upload" name="file-upload" >
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="index.php?controller=article" class="btn btn-warning ">Quay lại</a>
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