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
                                <h3><?= $siswa['username'] ?></h3>
                                <p class="text-muted"><?= $siswa['email'] ?></p>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-left">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th>Profil Detail</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($profilsiswa as $p) : {?>
                                            <?= form_open('siswa/editprofil') ?>
                                             <input class="form-control" type="hidden" name="id_siswa" value="<?= $p['id_siswa']; ?>">
                                           
                                            <tbody>
                                                <tr>
                                                    <td>Username</td>
                                                    <td><input class="form-control" type="text" value="<?= $p['username']; ?>" placeholder="Username" id="username" name="username"></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td><input class="form-control" type="text" value="<?= $p['fullname']; ?>" placeholder="Nama Lengkap" id="fullname" name="fullname"></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>
                                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($p['jenis_kelamin'] == "Laki-laki") {echo 'checked';} ?>>
                                                    <label>Laki-laki</label>
                                                    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($p['jenis_kelamin'] == "Perempuan"){echo 'checked';} ?>>
                                                    <label>Perempuan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NIS (Nomor Induk Sekolah)</td>
                                                    <td><input class="form-control" type="text" value="<?= $p['nis']; ?>" placeholder="Nomor Induk Siswa (NIS)" id="nis" name="nis"></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Lahir</td>
                                                    <td><input class="form-control" type="date" value="<?= $p['tanggal_lahir']; ?>" id="tanggal_lahir" name="tanggal_lahir"></td>
                                                </tr>
                                                <tr>
                                                    <td>Asal Sekolah</td>
                                                    <td><input class="form-control" type="text" value="<?= $p['sekolah']; ?>" placeholder="Asal Sekolah" id="sekolah" name="sekolah"></td>
                                                </tr>
                                                <tr>
                                                    <td>Jurusan / Keahlian</td>
                                                    <td><select class="form-control" name="jurusan">
                                                    <?php foreach ($jurusan as $j): ?>	
                                                        <?php if($j == $p['jurusan']): ?>
                                                        <option value="<?= $j; ?>" selected><?= $j ?></option>
                                                        <?php else: ?>	
                                                        <option value="<?= $j; ?>"><?= $j ?></option>
                                                        <?php endif; ?>	
                                                    <?php endforeach;?></td>
                                                    </select>
                                                </tr>
                                                <tr>
                                                    <td>No Handphone (Whatsapp)</td>
                                                    <td> <input class="form-control" type="tel" value="<?= $p['telepon']; ?>" placeholder="Nomor Handphone" id="telepon" name="telepon"></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Rumah</td>
                                                    <td><textarea class="form-control" placeholder="Alamat Rumah" name="alamat_rumah" aria-label="With textarea"><?= $p['alamat_rumah']; ?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Kemampuan</td>
                                                    <td><textarea class="form-control" placeholder="Kemampuan" name="kemampuan" aria-label="With textarea"><?= $p['kemampuan']; ?></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                    <button type="submit" class="btn btn-success mt-4 pr-4 pl-4">Simpan Perubahan</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php } endforeach; ?>
                                            <?= form_close(); ?>>
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