<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">category - Ubah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">category</li>
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
          <form action="<?= site_url() ?>category/update" method="post" enctype="multipart/form-data">
              
                    <input type="hidden" name="data[id]" value="<?= $form_data->id ?>" />
                
                <?= 
                  form::input([
                    "title" => "nama kategori",
                    "type" => "text",
                    "fc" => "data[nama_kategori]",
                    "placeholder" => "tambahkan nama_kategori",
                    "value" => $form_data->nama_kategori,
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "login id",
                    "type" => "hidden",
                    "fc" => "data[login_id]",
                    "placeholder" => "tambahkan login_id",
                    "value" => generate_session('datalogin')['id']
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>category">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>