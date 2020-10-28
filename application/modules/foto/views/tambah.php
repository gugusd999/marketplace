<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">foto - Tambah</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">foto</li>
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
          <form action="<?= site_url() ?>foto/simpan" method="post" enctype="multipart/form-data">
              
                <?= 
                  form::input([
                    "title" => "product",
                    "type" => "text",
                    "fc" => "product_id",
                    "placeholder" => "tambahkan product_id",
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "foto",
                    "type" => "file",
                    "fc" => "foto",
                    "placeholder" => "tambahkan foto",
                    "show-image" => true
                  ])
                ?>
                
                <?= 
                  form::input([
                    "title" => "login",
                    "type" => "hidden",
                    "fc" => "login_id",
                    "placeholder" => "tambahkan login_id",
                    "value" => generate_session('datalogin')['id']
                  ])
                ?>
                
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="<?= site_url(); ?>foto">Back</a>
              </div>
          </form>
				</div>
			</div>
		</div>
	</div>
</section>