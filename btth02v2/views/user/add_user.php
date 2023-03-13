<?php
include 'views/includes/header_admin.php';
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
                <form action="./index.php?controller=user&action=add" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="username">Tên tài khoản</span>
                        <input type="text" class="form-control" name="txtusername">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 26px 0px 26px"  class="input-group-text" id="userpass">Mật khẩu</span>
                        <input type="text" class="form-control" name="txtpassword">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span style ="padding : 0px 23px 0px 23px" class="input-group-text" id="userpass">Quyền hạn</span>
                        <input type="text" class="form-control" name="txtquyenhan">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="index.php?controller=user" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>