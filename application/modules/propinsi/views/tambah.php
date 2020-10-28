<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">propinsi - Tambah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">propinsi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
          <form action="<?= site_url() ?>propinsi/simpan" method="post" enctype="multipart/form-data">
              
                <?= 
                  form::input([
                    "title" => "nama provinsi",
                    "type" => "text",
                    "fc" => "nama_provinsi",
                    "placeholder" => "tambahkan nama_provinsi",
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>propinsi">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>