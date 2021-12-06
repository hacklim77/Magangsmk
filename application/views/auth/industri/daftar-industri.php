<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 offset-xl-8 col-lg-6 offset-lg-6">
                    <div class="login-box-s2 ptb--100">
                    <form method="post" action="<?= base_url('auth/daftarindustri'); ?>">
                            <div class="login-form-head">
                                <h4>Daftar sebagai Industri</h4>
                                <p>Ayo bergabung bersama kami!</p>
                            </div>
                            <div class="login-form-body">
                                <div class="form-gp">
                                    <label>Email</label>
                                    <input type="text" id="email" name="email" value="<?= set_value('email'); ?>">
                                    <i class="ti-user"></i>
                                    <?= form_error('email','<div class="text-danger">','</div>'); ?>
                                </div>
                                <div class="form-gp">
                                    <label>Password</label>
                                    <input type="password" id="password1" name="password1">
                                    <i class="ti-lock"></i>
                                    <?= form_error('password1','<div class="text-danger">','</div>'); ?>
                                </div>
                                <div class="form-gp">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" id="password2" name="password2">
                                    <i class="ti-lock"></i>
                                    <div class="text-danger"></div>
                                </div>
                                <div class="submit-btn-area">
                                    <button class="btn btn-primary" type="submit">Daftar</button>
                            
                                </div>
                                <div class="form-footer text-center mt-5">
                                    <p class="text-muted">Sudah memiliki akun? <a href="<?= base_url('auth'); ?>">Login</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->