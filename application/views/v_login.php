<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/') ?>css/ruang-admin.min.css" rel="stylesheet">
  <!-- Sweetalert Css -->
  <link href="<?= base_url('assets/') ?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <!-- <form class="user" action="<?= base_url('login/dologin') ?>" method='post'> -->

                    <form onsubmit="ajax_login(); return false;">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" id="username">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="password">
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                          <input type="checkbox" class="custom-control-input" id="customCheck">
                          <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                      </div>
                    </form>
                    <hr>
                    <div class="text-center">
                      <a class="font-weight-bold small" href="register.html">Create an Account!</a>
                    </div>
                    <div class="text-center">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login Content -->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/ruang-admin.min.js"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="<?= base_url('assets/') ?>plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?= base_url('assets/') ?>plugins/sweetalert/sweetshow.js"></script>

    <!-- Fungsi ajax_login -->
    <script>
      function ajax_login(){
        var username = document.getElementById("username").value;
         var username = $('#username').val();
        var password = document.getElementById("password").value;

        if(username.length > 0 && password.length > 0) {
          $.ajax({
            url : "<?= base_url('login/dologin') ?>",
            type : "POST",
            data:{
              username: username,
              password: password,
            },
            success:function(result){
              var hasil = JSON.parse(result);
              swal_show(hasil);

              if(hasil['status_code'] == 200) // Refresh jika request berhasil
                setTimeout("window.open(self.location, '_self');", 1500);
            },
          });
        }
        else{
          // alert....
        }
      }
    </script>
  </body>

  </html>