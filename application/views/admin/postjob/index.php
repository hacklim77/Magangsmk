<div class="col-xl-12">

                <div class="card">
                            <div class="card-body">
                                <?= $this->session->flashdata('flash'); ?>
                                <!-- Button trigger modal -->
                                <table>
                                        <tr>
                                                <td><h4 class="header-title mt-2">Daftar Job</h4></td>         
                                                <td><button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#tambahJob">Tambah Job</button></td>         
                                        </tr>
                                </table>
                                                               
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nama Industri</th>
                                                    <th scope="col">Email Industri</th>
                                                    <th scope="col">Posisi</th>
                                                    <!--<th scope="col">Image</th>-->
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Tanggal Post</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $no=1;
                                            foreach ($postjob as $psj): ?>
                                                <tr>
                                                    <th scope="row"><?= $no++;?></th>
                                                    <td><?= $psj['nama_industri'];?> </td>
                                                    <td><?= $psj['email_industri'];?> </td>
                                                    <td><?= $psj['posisi'];?> </td>
                                                    <!--<td><?= $psj['image'];?> </td>-->
                                                    <td><?= substr($psj['deskripsi'],0,150);?>... </td>
                                                    <td><?= $psj['date_post'];?> </td>
                                                     <td>
                                                        <img src="<?= base_url('images/PostJob/').$psj['gambar'];?>" width="80">
                                                    </td>
                                                    <td>  
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="<?= base_url();?>postjob/detail/<?= $psj['id_job']; ?>"><i class="fa fa-info-circle"></i></a></li>
                                                            <li class="mr-3"><a href="<?= base_url();?>postjob/ubah/<?= $psj['id_job']; ?>" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a href="<?= base_url();?>postjob/delete/<?= $psj['id_job']; ?>" class="text-danger"><i class="ti-trash"></i></a></li>
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

                        
                <!-- Modal Tambah Job -->        
                <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="tambahJob">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Job</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open_multipart('postjob/tambah'); ?>    
                                                <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Nama Industri</label>
                                                        <input class="form-control" type="text" placeholder="Isi Nama Industri..." id="nama_industri" name="nama_industri">
                                                </div>
                                                <div class="form-group">
                                                        <label for="example-email-input" class="col-form-label">Email Industri</label>
                                                        <input class="form-control" type="email" placeholder="Isi Email Industri..." id="email_industri" name="email_industri">
                                                </div>
                                                <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Posisi</label>
                                                        <input class="form-control" type="text" placeholder="Isi Email Industri..." id="posisi" name="posisi">
                                                </div>
                                                
                                                <div class="form-group">
                                                        <label for="example-text-input" class="col-form-label">Deskripsi Pekerjaan</label>
                                                        <textarea class="form-control" aria-label="deskripsi" id="deskripsi" name="deskripsi"></textarea>
                                                </div>
                                                <div class="form-group">
                                                        <input type="hidden" id="date_post" name="date_post" value="<?= date("d-m-Y H:i:s"); ?>">
                                                                
                                                </div>

                                                <div class="form-group">
                                                                <label for="gambar">Pilih Gambar</label>
                                                                <input type="file" id="gambar" name="gambar">
                                                                
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
                <!-- close Modal Tambah Job -->

               

</div>