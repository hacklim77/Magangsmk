<div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert">
                                <?= $this->session->flashdata('flash'); ?>
                                </div>
                                <h4 class="header-title">Workshop</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                    <a href="<?= base_url();?>workshop/tambah" class="btn btn-success mb-3">Tambah Workshop</a>
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
</div>