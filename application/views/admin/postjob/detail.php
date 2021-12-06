<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			
			<div class="card">
			  <div class="card-header">
			    Detail Job
			  </div>
			  <div class="card-body">
				<img src="<?= base_url('images/PostJob/').$postjob['gambar']; ?>" width="50%"> 
			    <h5 class="card-title"><?= $postjob['nama_industri']; ?></h5>
			    <h6 class="card-subtitle mb-2 text-muted"><?= $postjob['email_industri']; ?></h6>
			    <p class="card-text"><?= $postjob['posisi']; ?></p>
			    <p class="card-text"><?= $postjob['deskripsi']; ?></p>
			    <a href="<?= base_url();?>postjob/daftar" class="btn btn-primary">Kembali</a>
			  </div>
			</div>

		</div>
	</div>
</div>