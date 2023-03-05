<?php
include 'views/includes/header_admin.php';
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="index.php?controller=category&action=create" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
     foreach ( $category as $key){
          ?>
                        <tr>
                            <th scope="row"><?php echo $key->getMaTloai()?></th>
                            <td><?php echo $key->getTentloai()?></td>
                            <td>
                            <a href="index.php?controller=category&action=edit&id=<?php echo $key->getMaTloai()?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="index.php?controller=category&action=delete&id=<?php echo $key->getMaTloai()?>"onclick="return confirm('Bạn có muốn xoá thể loại này không?')">  <i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php 
         }
        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>