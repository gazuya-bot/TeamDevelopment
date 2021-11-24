<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MOT / login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="http://localhost/FXTRT/Views/css/style.css" rel="stylesheet">
    <!-- WebアイコンCDN Font Awesome-->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Theme style -->
<link rel="stylesheet" href="http://localhost/MOT/css/adminlte.min.css">
<!-- style.css -->
<link rel="stylesheet" href="{{ asset('/css/style_M.css') }}">
<link rel="stylesheet" href="{{ asset('/css/bbs.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
    <img src="http://localhost/MOT/img/MOT_01.gif" alt="ロゴ" width=200px>
    <p><b>ログイン画面</b></p>
</div>

<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-lock"></span>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">ログイン</button>
        </div>
        </div>
    </form>
    </div>
</div>
</div>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>