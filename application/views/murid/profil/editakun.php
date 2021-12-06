<div class="col-12 mt-4">
    <div class="row">
    
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"><?= $subjudul ?></h2>
                </div>
                <div class="c0l-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card-body">
                                <img class="avatar-thumb" src="<?= base_url('images/Murid/profil/').$siswa['image_profil']; ?>" alt="foto-profil" />
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-body">
                                <?= form_open_multipart('siswa/editakun') ?>
                                <input class="form-control" type="text" value="<?= $siswa['username']; ?>" placeholder="Nama Lengkap" id="username" name="username">
                                <input class="form-control" type="email" value="<?= $siswa['email']; ?>" id="email" name="email" readonly>
                                <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                                <div class="single-table">
                                    <div class="table-responsive">
                                    <table class="table text-left">
                                            <?= $this->session->flashdata('flash'); ?>
                                            <thead class="text-uppercase">
                                            <?php foreach($profilsiswa as $row): ?>    
                                                <tr>
                                                    <th>Profil Detail</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td><b><?= $row['fullname']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>NIS (Nomor Induk Sekolah)</td>
                                                    <td><b><?= $row['nis']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td><b><?= $row['tanggal_lahir']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Asal Sekolah</td>
                                                    <td><b><?= $row['sekolah']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Jurusan / Keahlian</td>
                                                    <td><b><?= $row['jurusan']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No Handphone (Whatsapp)</td>
                                                    <td><b><?= $row['telepon']; ?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Rumah</td>
                                                    <td><b><?= $row['alamat_rumah']; ?></b></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Kosong</h2>
                </div>
            </div>
        </div>

    </div>
</div>