<div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <?= $this->session->flashdata('flash'); ?>
                                <h4 class="header-title">Daftar Job</h4>
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
                                                    <td><?= $psj['deskripsi'];?> </td>
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
</div>