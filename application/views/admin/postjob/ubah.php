<div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <?= $this->session->flashdata('flash'); ?>
                                
                                <h4 class="header-title">Edit Job</h4>
                                <!--<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>postjob/tambah">-->
                                 <?php echo form_open_multipart('postjob/ubah/'); ?> 
                                 <input class="form-control" type="hidden" name="id_job" value="<?= $postjob['id_job']; ?>">   
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama Industri</label>
                                            <input class="form-control" type="text" placeholder="Isi Nama Industri..." id="nama_industri" name="nama_industri" value="<?= $postjob['nama_industri'] ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="example-email-input" class="col-form-label">Email Industri</label>
                                            <input class="form-control" type="email" placeholder="Isi Email Industri..." id="email_industri" name="email_industri" value="<?= $postjob['email_industri'] ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Posisi</label>
                                            <input class="form-control" type="text" placeholder="Isi Email Industri..." id="posisi" name="posisi" value="<?= $postjob['posisi'] ?>">
                                    </div>
                                    <!--<div class="form-group">
                                                    <label for="image">Pilih Gambar</label>
                                                    <input type="file" id="image" name="image">
                                                    
                                    </div>-->
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Deskripsi Pekerjaan</label>
                                            <textarea class="form-control" aria-label="deskripsi" id="deskripsi" name="deskripsi"><?= $postjob['deskripsi'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                            <input type="hidden" id="date_post" name="date_post" value="<?= date("d-m-Y H:i:s"); ?>">
                                                    
                                    </div>

                                    <div class="form-group">
                                                    <img src="<?= base_url('images/PostJob/').$postjob['gambar'] ?>" width="80">
                                                    <label for="gambar">Pilih Gambar</label>
                                                    <input type="file" id="gambar" name="gambar">
                                                    
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Simpan Perubahan</button>
                                  </form>
                            </div>
                        </div>
</div>