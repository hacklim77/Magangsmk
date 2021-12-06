<div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert">
                                <?= $this->session->flashdata('flash'); ?>
                                </div>
                                <table>
                                        <tr>
                                                <td><h4 class="header-title mt-2">Daftar Workshop</h4></td>         
                                                <td><button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#tambahWorkshop">Tambah Workshop</button></td>         
                                        </tr>
                                </table>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nama Workshop</th>
                                                    <th scope="col">Penyelenggara</th>
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($workshop as $wrk): ?>
                                                <tr>
                                                    <th scope="row"><?= $no++;?></th>
                                                    <td><?= $wrk['nama_workshop'];?> </td>
                                                    <td><?= $wrk['penyelenggara'];?> </td>
                                                    <td><?= $wrk['deskripsi'];?> </td>
                                                    <td><?= $wrk['tanggal'];?> </td>
                                                    <td>
                                                        <img src="<?= base_url();?>images/workshop/<?=$wrk['image'];?>" width="100"> 
                                                    </td>        
                                                    <td>  
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="<?= base_url();?>workshop/detail/<?= $wrk['id_workshop']; ?>"><i class="fa fa-info-circle"></i></a></li>
                                                            <li class="mr-3"><a href="<?= base_url();?>workshop/ubah/<?= $wrk['id_workshop']; ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a href="<?= base_url();?>workshop/hapus/<?= $wrk['id_workshop']; ?>" class="text-danger" onClick="return confirm('yakin untuk menghapus?');"><i class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

            <!-- Modal Tambah Workshop -->        
                <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="tambahWorkshop">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Job</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
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
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Tambah Data</button>                                               
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- close Modal Tambah Workshop -->
</div>