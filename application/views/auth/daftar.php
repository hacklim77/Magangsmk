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
                        <form>
                        
                        <div class="login-form-body">
                            <div class="form-footer text-center mt-3 mb-3">
                                <p class="text-muted">Mendaftar Sebagai?</p>
                            </div>
                            <div class="submit-btn-area">
                                <a type="button" class="btn btn-block btn-lg btn-success mb-2" href="<?= base_url('auth/daftarsiswa'); ?>" disabled>Sebagai Siswa</a>
                                <p class="text-muted-bold mt-2 mb-2"> atau </p>
                                <a type="button" class="btn btn-block btn-lg btn-danger mb-2" href="<?= base_url('auth/daftarindustri'); ?>" disabled>Sebagai Industri</a>
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