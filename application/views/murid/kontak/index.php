<div class="main-content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 md-4 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Hubungi Kami</h4>
                                <?php echo $this->session->flashdata('Msg');?> 
                                <div id="user-statistics">
                                    <?= form_open('kontak/sendMsg') ?>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Email</span>
                                        </div>
                                            <input type="email" id="email" name="email" class="form-control" aria-label="email" aria-describedby="basic-addon1" value="<?= $siswa['email'] ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Pesan</span>
                                        </div>
                                            <textarea class="form-control" aria-label="Pesan" name="pesan" width="500"></textarea>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" name="sendMsg" type="submit">Kirim</button>
                                    </div>
                                    <?= form_close() ?>     
                                </div>    
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Artikel</h4>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">List group item heading</h5>
                                            <small>3 days ago</small>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <small>Donec id elit non mi porta.</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">List group item heading</h5>
                                            <small class="text-muted">3 days ago</small>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <small class="text-muted">Donec id elit non mi porta.</small>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">List group item heading</h5>
                                            <small class="text-muted">3 days ago</small>
                                        </div>
                                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                        <small class="text-muted">Donec id elit non mi porta.</small>
                                    </a>                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">User Statistics</h4>
                                <div id="user-statistics"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
</div>
