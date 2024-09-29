<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login_register.css">
</head>

<body>
    <?php include '../connectdb.php' ?>
    <div class="register-container bg-info-subtle">
        <div class="register-card card">
            <div class="card-body">
                <h2 class="text-center mb-4">Đăng Ký</h2>
                <form class="register-form" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label"><span style="color: red;">*</span>Họ Tên</label>
                        <input type="text" class="form-control" id="username" name="ten_sv" value="<?php if (isset($_POST['ten_sv'])) {
                            echo $_POST['ten_sv'];
                        } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><span style="color: red;">*</span>Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><span style="color: red;">*</span>Mật Khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_POST['sb'])) {
                            echo $_POST['password'];
                        } ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label"><span style="color: red;">*</span>Nhập Lại Mật Khẩu</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?php if (isset($_POST['sb'])) {
                            echo $_POST['confirmPassword'];
                        } ?>" required>
                    </div>
                    <?php
                    if (isset($_POST['sb'])) {
                        $ten = $_POST['ten_sv'];
                        $email = $_POST['email'];
                        $mk = $_POST['password'];
                        $mk1 = $_POST['confirmPassword'];

                        $kiemtraAdmin = "SELECT * FROM `user` WHERE ten_sv = 'admin'";
                        $result = mysqli_query($conn, $kiemtraAdmin);
                        if (mysqli_num_rows($result) === 0) {
                            $sqlAdmin = "INSERT INTO `user`(`id_user`, `ten_sv`, `email`, `mat_khau`, `role`)
                                 VALUES (null,'Admin','parkchoahyun@gmail.com','c4ca4238a0b923820dcc509a6f75849b',0)";
                            mysqli_query($conn, $sqlAdmin);
                        }
                        if ($mk != $mk1) {
                            echo "Mật khẩu không đúng!";
                        } else {
                            $mkmd5 = md5($mk);
                            $kiemtratontaiMSV = "SELECT * FROM `user` WHERE ten_sv = '$ten'";
                            $result1 = mysqli_query($conn, $kiemtratontaiMSV);
                            $kiemtratontaiEmail = "SELECT * FROM `user` WHERE email = '$email'";
                            $result2 = mysqli_query($conn, $kiemtratontaiEmail);
                            // kiểm tra tồn tại
                            if (mysqli_num_rows($result1) > 0) {
                                echo "Tài khoản đã tồn tại";
                            } elseif (mysqli_num_rows($result2) > 0) {
                                echo "Email đã được đăng ký";
                            } else {
                                // nhập thông tin đăng ký vào cơ sở dữ liệu
                                $sql = "INSERT INTO `user`(`id_user`, `ten_sv`, `email`, `mat_khau`, `role`) VALUES (null,'$ten','$email','$mkmd5',1)";
                                if (mysqli_query($conn, $sql)) {
                                    echo '<div class="alert alert-success" role="alert">Đăng ký tài khoản thành công!</div>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Lỗi: ' . mysqli_error($conn) . '</div>';
                                }
                            }
                        }
                    }
    ?>
                    <div class="d-grid mb-3">
                        <input type="submit" class="btn btn-primary" name="sb" value="Đăng Ký">
                    </div>
                </form>
                <div class="text-center">
                    Bạn đã có tài khoản? <a href="login.php">Đăng Nhập</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>