<div class="main-content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 md-4 mt-2">

                    <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Lowongan Magang</h4>
                                    
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Lowongan Magang</h4>
                                    <ul class="list-unstyled">
                                    <?php foreach ($postjob as $psj):?>    
                                        <li class="media mb-4">
                                            <img class="img-fluid mr-4" src="<?php echo base_url('images/PostJob/').$psj['gambar']; ?>" width="10%" alt="image">
                                            <div class="media-body">
                                                <h4 class="mb-2"><?php echo $psj['posisi']; ?></h5>
                                                <h6 class="mb-1"><?php echo $psj['nama_industri']; ?></h5>
                                                <p><?php echo substr($psj['deskripsi'],0,100); ?>...</p>   
                                                <a href="#" class="btn btn-primary">Detail Lowongan</a>
                                            </div>
                                        </li>
                                    <?php endforeach;?>    
                                    </ul>          
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

                    <div class="col-lg-8 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Workshop</h4>
                        
                                <div class="row">
                                    <?php foreach ($workshop as $wrk): ?>    
                                    <div class="col-lg-4 col-md-4 mt-2">
                                        <div class="card card-bordered">
                                            <img class="card-img-top img-fluid" src="<?= base_url('images/Workshop/').$wrk['image']; ?>" alt="image">
                                            <div class="card-body">
                                                <h4 class="title"><?= $wrk['nama_workshop']; ?></h5>
                                                <h5 class="title"><?= $wrk['penyelenggara']; ?></h5>
                                                <h6 class="title"><?= $wrk['tanggal']; ?></h5>
                                                <p class="card-text"><?= $wrk['deskripsi']; ?></p>
                                                <a href="#" class="btn btn-primary">Detail Workshop</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-4 mt-4">
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
