<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">supplier - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">supplier</li>
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
          <form action="<?= site_url() ?>supplier/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="id" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::input([
                    "title" => "nama supplier",
                    "type" => "text",
                    "fc" => "nama_supplier",
                    "placeholder" => "tambahkan nama_supplier",
                    "value" => $form_data->nama_supplier,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "alamat",
                    "type" => "text",
                    "fc" => "alamat",
                    "placeholder" => "tambahkan alamat",
                    "value" => $form_data->alamat,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "no telp",
                    "type" => "text",
                    "fc" => "no_telp",
                    "placeholder" => "tambahkan no_telp",
                    "value" => $form_data->no_telp,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "login id",
                    "type" => "hidden",
                    "fc" => "login_id",
                    "placeholder" => "tambahkan login_id",
                    "value" => generate_session('datalogin')['id']
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>supplier">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>