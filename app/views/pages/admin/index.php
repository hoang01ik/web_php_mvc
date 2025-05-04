<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/admin/images/favicon.png">
    <link href="/assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="row rounded-lg" style="min-width: 450px;">
                                    <div class="col-md-6 d-flex flex-wrap align-items-center justify-content-center" >
                                        <div>
                                            <img src="/assets/img/team.jpg" style="max-width: 300px;" alt="IMG">
                                        </div>
                                    </div>
                                    <div class="auth-form col-md-6">
                                        <h4 class="text-center mb-4">Đăng nhập</h4>
                                        <form method="post">
                                            <div class="form-group">
                                                <label><strong>Tài khoản:</strong></label>
                                                <input type="text" name="username" class="form-control form-control-lg" placeholder="Nhập tài khoản" Required>
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Mật khẩu:</strong></label>
                                                <input type="password" name="password" class="form-control form-control-lg" placeholder="********" Required>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/assets/admin/vendor/global/global.min.js"></script>
    <script src="/assets/admin/js/quixnav-init.js"></script>
    <script src="/assets/admin/js/custom.min.js"></script>

</body>

</html>