<div class="main-content-inner">
            <div class="container">
                <div class="row">                    
                    <div class="col-md-8 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="header-title">Lowongan Magang <?= $postjob['nama_industri']; ?></div>
                                    <div class="row no-gutters">
                                        <div class="col-sm-4">
                                            <div class="media">
                                                <img class="img-fluid" src="<?= base_url('images/PostJob/').$postjob['gambar']; ?>" width="90%">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 ">
                                            <div class="media-body">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h3 class="mb-1"><?= $postjob['nama_industri']; ?></h3>
                                            </div>
                                                <h5 class="mb-2 text-muted"><?= $postjob['email_industri']; ?></h5>
                                                <h6 class="mb-1">Posisi: <?= $postjob['posisi']; ?></h6>
                                                <p class="text-justify"><?= $postjob['deskripsi']; ?></p>
                                            </div>
                                            <a href="<?= base_url('home');?>" class="btn btn-success mt-4">Apply Lamaran</a>
                                        </div>
                                    </div>
                                 <a href="javascript:history.back()" class="btn btn-primary mt-4">Kembali</a>    
                            </div>
                        </div>            
                    </div>

                    <div class="col-lg-4 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Lowongan Lainnya</h4>
                                <div class="list-group">
                                <?php foreach ($otherjob as $psj):?>
                                    <a href="<?= base_url();?>postjob/detailjob/<?= $psj['id_job']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?php echo $psj['posisi']; ?></h5>
                                            <small>3 days ago</small>
                                        </div>
                                        <p class="mb-1"><?php echo substr($psj['deskripsi'],0,100); ?>...</p>
                                        <small><?php echo $psj['nama_industri'];?></small>
                                    </a>
                                <?php endforeach; ?>                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>


                   