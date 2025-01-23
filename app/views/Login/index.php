<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/Login.css" />
</head>

<body style="overflow: hidden;">
    <div class="container text-center" style="padding-top: 5%;">
        <div class="container-home">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="cola col-md-6 d-flex justify-content-center">
                    <img class="fikom-icon" src="<?= BASEURL ?>/assets/img/fikom-icons.png" alt="fikom">
                </div>
                <div class="cola col-md-6 d-flex justify-content-center mt-5">
                    <div class="card cek-pembayaran p-3 opacity-75" style="width: 20rem;">
                        <div class="card-body">
                            <img class="fikom-Login" src="<?= BASEURL ?>/assets/img/Login.png" alt="Logo-Login">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php PesanFlash::flash(); ?>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card form-cek-pembayaran d-flex justify-content-center align-items-center">
                                <form action="<?= BASEURL; ?>/Login/masuk" method="POST">
                                    <div class="card-body">
                                        <h4>Login</h4>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="username">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" placeholder="password">
                                    </div>
                                    <button type="submit" class="btn-cek">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>