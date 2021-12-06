<div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert">
                                <?= $this->session->flashdata('flash'); ?>
                                </div>
                                <h4 class="header-title">Admin</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                    <button class="btn btn-success btn-block"  data-toggle="modal" data-target="#tambahAdmins">Tambah Admin Master</button>    
                                    <button class="btn btn-success btn-block"  data-toggle="modal" data-target="#tambahAdmin">Tambah Admin</button>    
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Admin</th>
                                                    <th scope="col">Kelola</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach ($listadmin as $row):  ?>
                                                <tr>
                                                    <th scope="row"><?= $no++; ?></th>
                                                    <td><?= $row['username']; ?> </td>        
                                                    <td>  
                                                        <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href=""><i class="fa fa-info-circle"></i></a></li>
                                                            
                                                            <li><a href="" class="text-danger" onClick="return confirm('yakin untuk menghapus?');"><i class="ti-trash"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                             <?php   endforeach;   ?>    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="tambahAdmins">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Admin Master</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <?= form_open_multipart('admin/tambAdmins') ?> 
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-group" type="text" name="username" id="username">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-group" type="password1" name="password1" id="password">
                                                </div>                                   
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" />
                                            </div>
                                            <?= form_close() ?>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="tambahAdmin">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Admin</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <?= form_open_multipart('admin/tambAdmin') ?> 
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-group" type="text" name="username" id="username">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-group" type="password1" name="password1" id="password">
                                                </div>                                   
                                            </div>
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" />
                                            </div>
                                            <?= form_close() ?>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
</div>