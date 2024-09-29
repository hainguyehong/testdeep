<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/login_register.css">
</head>

<body>
    <div class="login-container bg-info-subtle">
        <div class="login-card card">
            <div class="card-body">
                <h2 class="text-center mb-4">Đăng Nhập</h2>
                <form class="login-form" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Tài khoản</label>
                        <input type="text" class="form-control" id="username" name="tk" value="<?php if (isset($_POST['tk'])) echo $_POST['tk']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" required>
                    </div>
                    <?php
                    include './function.php';
                    $tk = isset($_POST['tk']) ? $_POST['tk'] : '';
                    $mk = isset($_POST['password']) ? $_POST['password'] : '';
                    if (isset($_POST['sb'])) {
                        $kiemtraAdmin = "SELECT * FROM `user` WHERE ten_sv = 'admin'";
                        $result = mysqli_query($conn, $kiemtraAdmin);
                        if (mysqli_num_rows($result) == 0) {
                            $sqlAdmin = "INSERT INTO `user`(`id_user`, `ten_sv`, `email`, `mat_khau`) VALUES (null,'Admin','parkchoahyun@gmail.com','c4ca4238a0b923820dcc509a6f75849b')";
                            mysqli_query($conn, $sqlAdmin);
                        }
                        if (!empty($tk) && !empty($mk)) {
                            if (checkLogin($conn, $tk, md5($mk))) {
                                if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
                                    header('Location: index.php');
                                } else{
                                header('Location: show.php');
                                }
                            } else {
                                echo '<div class="alert alert-danger text-center" role="alert">Tài khoản hoặc mật khẩu không chính xác</div>';
                            }
                        }
                    }
                    ?>
                    <div class="d-grid mb-3">
                        <input type="submit" class="btn btn-primary" name="sb" value="Đăng Nhập">
                    </div>
                </form>
                <div class="login-links">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Quên mật khẩu?</a>
                    <div class="mt-3">
                        Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Quên mật khẩu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Nhập địa chỉ email của bạn để nhận liên kết đặt lại mật khẩu.</p>
                    <form action="registration.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <input type="submit" name="send-link" class="btn btn-primary" value="gửi mail">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>