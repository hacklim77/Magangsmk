<div class="col-12 mt-4">
    <div class="row">
    
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><?= $subjudul ?></h2>
                </div>
            <!-- Canvas Profil Siswa -->    
                <div class="c0l-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-body">
                                <img class="avatar-thumb" src="<?= base_url('images/Murid/profil/').$siswa['image_profil']; ?>" alt="foto-profil" />
                                <button class="btn btn-block btn-primary btn-xs mt-3"  data-toggle="modal" data-target="#editfoto<?= $siswa['id_siswa'] ?>"><i class="ti-settings"></i><span> Edit Foto Profil</span></button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <h3><?= $siswa['username'] ?></h3>
                                <p class="text-muted"><?= $siswa['email'] ?></p>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-left">
                                            <?= $this->session->flashdata('flash'); ?>
                                            <thead class="text-uppercase">
                                            <?php foreach($profilsiswa as $row): ?>    
                                                <tr>
                                                    <th>Profil Detail</th>
                                                    <th> <a class="btn btn-block btn-success btn-xs" href="<?php echo base_url('siswa/editprofil/').$row['id_siswa'] ?>"><i class="ti-settings"></i><span> Edit Profil</span></a></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <input type="hidden" name="id_siswa" value="<?= $row['id_siswa'] ?>">                                                
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td>
                                                    <?php if($row['fullname'] == null) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b>"; } else{?>    
                                                    <b><?php echo $row['fullname'];} ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>
                                                    <?php if($row['jenis_kelamin'] == null) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b>"; } else{?>    
                                                    <b><?php echo $row['jenis_kelamin'];} ?></b>
                                                    </td>        
                                                </tr>
                                                <tr>
                                                    <td>NIS (Nomor Induk Sekolah)</td>
                                                    <td>
                                                    <?php if($row['nis'] == 0) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b>"; } else{?>    
                                                    <b><?php echo $row['nis'];} ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td>
                                                    <?php if($row['tanggal_lahir'] == 0000-00-00) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b>"; } else{?>    
                                                    <b><?php echo $row['tanggal_lahir'];} ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Asal Sekolah</td>
                                                    <td>
                                                    <?php if($row['sekolah'] == null) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b>"; } else{?>    
                                                    <b><?php echo $row['sekolah'];} ?></b>                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jurusan / Keahlian</td>
                                                    <td><b><?= $row['jurusan']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No Handphone (Whatsapp)</td>
                                                    <td>
                                                    <?php if($row['telepon'] == null) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b>"; } else{?>    
                                                    <b><?php echo $row['telepon'];} ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Rumah</td>
                                                    <td>
                                                    <?php if($row['alamat_rumah'] == null) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b>"; } else{?>    
                                                    <b><?php echo $row['alamat_rumah'];} ?><b>                                                    
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>Kemampuan Dasar</td>
                                                    <td>
                                                    <?php if($row['kemampuan'] == null) {?>
                                                    <?php echo "<b style=color:red>Data harus dilengkapi</b><br>"; 
                                                          echo "<b style=color:red>contoh: Saya Menguasai Software.., Bisa berbahasa..,dan lain-lain</b>";  } else{?>    
                                                    <b><?php echo $row['kemampuan'];} ?><b>     
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- section view portfolio -->
                        <div class="col-sm-12 mt-4">
                            <div class="card">
                                <div class="card-body">
                                <table>
                                    <tr>
                                        <th width="150"><h4 class="header-title">Portfolio Siswa</h4></th>
                                        <th><button class="btn btn-block btn-primary btn-xs"  data-toggle="modal" data-target="#insertPort">Tambah Portfolio</button></th>
                                    </tr>
                                    <?php echo $this->session->flashdata('port');?>                                   
                                </table>    
                                <?php foreach($portfolio as $row ) : ?>
                                <div class="img-responsive mt-3">
                                
                                <input type="hidden" value="<?= $row['id_siswa']  ?>">              
                                <div class="col-lg-4 col-md-4 mt-2">
                                <div class="card card-bordered">
                                               
                                            <img src="<?= base_url('images/Portfolio/images/').$row['image'];  ?>" class="img-thumbnail rounded mx-auto d-block" alt="" width="50%">
                                            <div class="card-body">
                                                <p class="text-file"><?= $row['berkas'];  ?></p>
                                                               
                                                <button class="btn btn-success btn-block btn-xs"  data-toggle="modal" data-target="#tambahPort<?php /* $row['id_siswa'] */ ?>">Update Portfolio</button>
                                            </div>
                                            <?php  endforeach;  ?> 
                                </div>
                                </div>
                                   
                            </div>
                               
                            </div>
                        </div>
                        </div>
                    <!-- closesection view portfolio -->    
                    
                    <!-- section card port     -->
                    <div class="col-lg-6 mt-5">
                        <!-- section form edit foto profil -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Modal -->
                                <?php foreach($profilsiswa as $row): ?>
                                <div class="modal fade" id="editfoto<?= $row['id_siswa'] ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Foto Profil</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">

                                                <?= form_open_multipart('siswa/editfoto/') ?>
                                                <input type="hidden" name="id_siswa" value="<?= $row['id_siswa'] ?>"> 
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" name="email" value="<?= $row['email'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>File</label>
                                                    <input class="form-control" type="file" name="image_profil" value="<?= $row['image_profil'] ?>">
                                                </div>
                                                                                   
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Simpan" />
                                            </div>
                                            <?= form_close() ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Close Section form Edit foto profil     -->
                        
                    <!-- Section Form Portofilio -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Modal -->
                                
                                <div class="modal fade" id="insertPort">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Portfolio</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                           
                                                <?= form_open_multipart('siswa/insertPort') ?> 
                                                
                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="id_siswa" value="<?= $siswa['id_siswa'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>File</label>
                                                    <input class="form-control" type="file" name="berkas" id="berkas">
                                                </div>
                                                                                   
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Simpan" />
                                            </div>
                                            <?= form_close() ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Close Section Form Portofilio -->                

                    </div>                            
                    </div>         
                </div>
            </div>
        </div>
        <!-- close card section port -->

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Kosong</h2>
                </div>
            </div>
        </div>

    </div>
</div>