<div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert">
                                <?= $this->session->flashdata('flash'); ?>
                                </div>
                                <h4 class="header-title">Edit Workshop</h4>
                                <!--<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>postjob/tambah">-->
                                
                                <?php echo form_open_multipart('workshop/ubah/'); ?>
                               <input class="form-control" type="hidden" name="id_workshop" value="<?= $workshop['id_workshop']; ?>"> 
                                   
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama Workshop</label>
                                            <input class="form-control" type="text" id="nama_workshop" name="nama_workshop" value="<?= $workshop['nama_workshop']; ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Penyelenggara Workshop</label>
                                            <input class="form-control" type="text" id="penyelenggara" name="penyelenggara" value="<?= $workshop['penyelenggara']; ?>">
                                    </div>
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Deskripsi Workshop</label>
                                            <textarea class="form-control" aria-label="deskripsi" id="deskripsi" name="deskripsi"><?= $workshop['deskripsi']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Tanggal Event</label>
                                            <input class="form-control" value="<?= date('Y-m-d',strtotime($workshop['tanggal']))?>" type="date" id="tanggal" name="tanggal">
                                    </div>

                                    <div class="form-group">
                                            
                                        <img src="<?= base_url('images/Workshop/').$workshop['image'];?>" width="100"> 
                                                    
                                        <label for="image">Pilih Gambar</label>
                                        <input type="file" id="image" name="image">            
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Simpan Perubahan</button>
                                  </form>
                            </div>
                        </div>
</div>