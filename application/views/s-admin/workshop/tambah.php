<div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert">
                                <?= $this->session->flashdata('flash'); ?>
                                </div>
                                <h4 class="header-title">Tambah Workshop</h4>
                                <!--<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>postjob/tambah">-->
                                <?php echo form_open_multipart('workshop/tambah'); ?>    
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama Workshop</label>
                                            <input class="form-control" type="text" placeholder="Isi Nama Workshop..." id="nama_workshop" name="nama_workshop">
                                    </div>
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Penyelenggara Workshop</label>
                                            <input class="form-control" type="text" placeholder="Penyelenggara Workshop..." id="penyelenggara" name="penyelenggara">
                                    </div>
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Deskripsi Workshop</label>
                                            <textarea class="form-control" aria-label="deskripsi" id="deskripsi" name="deskripsi"></textarea>
                                    </div>
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tanggal Event</label>
                                            <input class="form-control" type="date" id="tanggal" name="tanggal">
                                    </div>

                                    <div class="form-group">
                                                    <label for="image">Pilih Gambar</label>
                                                    <input type="file" id="image" name="image">
                                                    
                                    </div>
            
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                  </form>
                            </div>
                        </div>
</div>